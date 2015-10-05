/* jshint undef: true */
/* global EventApi */
/**
 * Exports:
 * prelauncher: {
 *  _clientInfo: -- If initialized contains object with client name and version
 *  parseAgent(uaString) -- Parses ua string and returns parsed client info
 *  init(uaString) -- Parses uaString and initializes prelaunchers screen
 *                   if browser aren't supported or platform is android or ios.
 *                   Or runs portal app if browser is supported
 *  runApp() -- Bootstrap's portal app
 * }
 * */
(function (exports) {
	'use strict';

	exports.lw = {};

	var MOBILE_HOLDER_CLASS = 'has-mobile-holder';

	function readSafariAgent(regex) {
		return function (ua) {
			var match = regex.exec(ua);
			return match ? [match[0], match[2], match[1]] : null;
		};
	}

	var SUPPORTED_CLIENTS = {
		desktop: [
			{
				re: /(msie) ([\w.]+)/,
				version: 10
			},
			{
				//IE 11
				//http://stackoverflow.com/questions/17907445/how-to-detect-ie11
				re: function (ua) {
					var match = /(trident)(?:.*rv:([\w.]+))/.exec(ua),
							strictlyIE11 = ua.indexOf('slimbrowser') === -1;
					return (strictlyIE11 && match) ? match : [null, null, null];
				},
				version: 11
			},
			{
				re: /(edge)\/([\w.]+)/,
				version: 12
			},
			{
				re: /(opera)(?:.*version)?[ \/]([\w.]+)/,
				version: 12
			},
			{
				re: /(mozilla)(?:.*? rv:([\w.]+)).*?(?:firefox\/[\w.]+)$/,
				version: 23
			},
			{
				re: /(chrome|crios)[ \/]([\w.]+) (?:safari\/[\w.]+)(?:\s(?:opr\/[\w.]+))?$/,
				version: 27
			},
			{
				re: /(yabrowser)\/([\w.]+)/,
				version: 14
			},
			{
				re: /(phantomjs)\/([\w.]+)/,
				version: 1.9
			},
			{
				//Use function instead of complex regexp
				re: readSafariAgent(/version[ \/]([\w.]+).*?(safari)/),
				version: 5.1
			}
		],
		mobile: [
			{
				description: 'Mobile Chrome Or Chrome-like',
				re: /(chrome|crios)[ \/]([\w.]+) (mobile.* )?safari\/[\w.]+/,
				version: 18
			},
			{
				description: 'Mobile Safari and WebKit-based',
				re: readSafariAgent(/version[ \/]([\w.]+).*?(safari)/),
				version: 4.0
			},
			{
				description: 'Everything webkit-based on iOS. This will cover the embedded browser',
				re: /(iphone|ipad).*applewebkit\/([\d.]+).*mobile/,
				version: 0
			},
			{
				re: /(msie) ([\w.]+)/,
				version: 10
			}
		]
	};

	var prelauncher = exports.prelauncher = {
		SOCIAL_ESCAPE_FRAGMENT_KEY: 'fbAppPath',
		INIT_APP_PATH_KEY: 'appPath',

		_readyFired: false,
		_appLaunched: false,
		clientInfo: null,
		isMobile: false,

		getBasePath: getBasePath,

		parseClient: function (uaString, isMobile) {
			if (!uaString) {
				throw new Error('Unsupported environment! UserAgent string should be specified');
			}

			return parseClient(uaString.toLowerCase(), isMobile);
		},

		init: function (uaString) {
			var dontShow = isSupportedFlagSaved(),
					osFamily = window.platform.os.family,
					mobileModifiers = {
								'iOS': 'mobile',
								'Android': 'mobile',
								'Windows Phone OS': 'mobile'
							}[osFamily] || '',
					platformModifiers = {
								'iOS': 'ios',
								'Android': 'android'
							}[osFamily] || '',
					userModifiers = dontShow ? '' : MOBILE_HOLDER_CLASS,
					cssClasses = [
						mobileModifiers,
						platformModifiers,
						userModifiers
					].filter(Boolean).join(' ');

			this.isMobile = !!mobileModifiers;

			this.clientInfo = this.parseClient(uaString, this.isMobile);

			var showPrelauncher = !(dontShow || this.clientInfo);

			if (showPrelauncher) {
				//http://stackoverflow.com/questions/5301383/ie-prevent-errors-from-being-shown-in-ie
				window.onerror = function () {
					return true;
				};
			} else {
				togglePrelaunchScreen(false);
				toggleDomReadyHandler(true);
			}

			toggleHtmlClass(true, cssClasses);

			return this.clientInfo;
		},

		runApp: function (remember) {
			return runApp(remember);
		},

		dontBother: function () {
			var d = new Date();
			d.setMonth(d.getMonth() + 1);
			document.cookie = 'forceSupport=true;expires=' + d.toUTCString();
			toggleHtmlClass(false, MOBILE_HOLDER_CLASS);
		}
	};

	function stripFromUrlStart(path, chars) {
		if (path.indexOf(chars) === 0) {
			location.replace(location.origin + path.replace(chars, ''));
			return true;
		}
		return false;
	}

	function fixLegacyUrls() {
		var path = location.href.replace(location.origin, '');
		return stripFromUrlStart(path, '/#!') || stripFromUrlStart(path, '/#');
	}

	function getBasePath() {
		return [
			window.location.protocol === 'https:' ? 'https://' : 'http://',
			window.location.host
		].join('');
	}

	function toggleDomReadyHandler(watch) {
		if (EventApi.supportsDOM3) {
			EventApi[watch ? 'on' : 'off'](document, 'DOMContentLoaded', onDomReady, false);
		} else {
			EventApi[watch ? 'on' : 'off'](document, 'onreadystatechange', onDomReady, false);
		}
	}

	function onDomReady(e) {
		var continueAs = document.getElementsByClassName('lw-stub-continue'), i, len;

		for (i = 0, len = continueAs.length; i < len; i++) {
			continueAs[i].href = location.href;
		}

		if (exports.prelauncher._readyFired) {
			return;
		}

		if (EventApi.supportsDOM3 || document.readyState === 'complete') {
			exports.prelauncher._readyFired = true;
			runApp(false);
			toggleDomReadyHandler(false);
		}
	}

	function runAngular() {
		try {
			window.angular && window.angular.bootstrap(document.documentElement, ['portal']);
			exports.prelauncher._appLaunched = true;
		} catch (e) {
			window['console'] &&
			window['console']['log'] &&
			window.console.log('angular.bootstrap error: ', e);
		}
	}

	function runApp(remember) {
		if (exports.prelauncher._appLaunched) {
			return;
		}

		togglePrelaunchScreen(false);
		if (remember) {
			window.prelauncher.dontBother();
		}

		if (fixLegacyUrls()) {
			return;
		}

		$.get('/portal-api/site/prerequisite', null, function (prereq) {
			exports.lw.prerequisites = prereq;
			runAngular();
		});

	}

	function togglePrelaunchScreen(show) {
		toggleHtmlClass(show, 'launch-message');
	}

	function toggleHtmlClass(add, classes) {
		document.documentElement.className = add
				? document.documentElement.className + ' ' + classes + ' '
				: document.documentElement.className.replace(classes, '');
	}

	function parseClient(uaString, isMobile) {
		var supportedList = isMobile ? SUPPORTED_CLIENTS.mobile : SUPPORTED_CLIENTS.desktop;

		for (var i = 0; i < supportedList.length; i++) {
			var checker = supportedList[i].re,
					match = checker instanceof RegExp ? checker.exec(uaString) : checker(uaString);

			if (match && match[1] && parseFloat(match[2]) >= supportedList[i].version) {
				return {
					name: match[1],
					version: parseFloat(match[2])
				};
			}
		}

		return null;
	}

	function isSupportedFlagSaved() {
		var setted = false;

		for (var i = 0, cookies = document.cookie.split(';') || []; i < cookies.length; i++) {
			if (cookies[i].indexOf('forceSupport') > -1) {
				setted = true;
				break;
			}
		}

		return setted;
	}

})(this);
