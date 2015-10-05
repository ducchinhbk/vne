(function (exports) {
	'use strict';

	var addEventListener = !!document['addEventListener'];
	var Event = {
		on: (function () {
			return addEventListener ? function (element, type, listener, useCapture) {
				return element.addEventListener(type, listener, useCapture);
			} : function (element, type, listener) {
				return element.attachEvent('on' + type, listener);
			};
		})(),
		off: (function () {
			return addEventListener ? function (element, type, listener, useCapture) {
				return element.removeEventListener(type, listener, useCapture);
			} : function (element, type, listener) {
				return element.detachEvent('on' + type, listener);
			};
		})(),
		supportsDOM3: addEventListener
	};

	exports.EventApi = Event;

})(window);
