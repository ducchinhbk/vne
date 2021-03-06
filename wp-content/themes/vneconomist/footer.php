<?php 
    
    include(ABSPATH . 'facebook/fb.php');
    use Facebook\FacebookSession;
    use Facebook\FacebookRedirectLoginHelper;
    use Facebook\FacebookRequest;
    use Facebook\GraphUser;
    use Facebook\FacebookCurl;
    use Facebook\FacebookHttpable;
    use Facebook\FacebookCurlHttpClient;
    
    $app_id = '189952838014491';
    $app_secret = '4112151381263a557fa64a8f92f8dbe2';
    $inClientId = '75c18x2d1j1vcr';
    $inClientSecret = '249hzZ8HKnm5fOtL';
    $callbackInLink = 'http://localhost/vneconomist/c/user/user/ilogin';
    $loginViaLinkin = 'https://www.linkedin.com/uas/oauth2/authorization?response_type=code&client_id='. $inClientId . '&redirect_uri='. $callbackInLink .'&state=DCEeFWf45A53sdfKef42afda4&scope=r_basicprofile%20r_emailaddress';
    $default_redirectURL = site_url();
    
    FacebookSession::setDefaultApplication($app_id, $app_secret);
    $helper = new FacebookRedirectLoginHelper($default_redirectURL);
    $flogin_url = $helper->getLoginUrl();
?>
<!-- END: Home Page -->
	<footer class="main-footer clearfix">
			<div class="container footer-container">
				<div class="col-sm-3 hidden-sm hidden-xs description">
					<a href="#" class="pph-logo"></a>
					<div class="description-text">
						A community of <strong>people</strong> available to dedicate to make the world better   </div>
					<div class="copyright">
						© 2015 VnEconomist Inc.    </div>
					<div class="helper-links clearfix">
						<ul>
							<li><a href="#">Terms</a></li>
							<li><a href="#">Privacy</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-12 col-md-9 col-lg-6 links clearfix">
					<div class="col-xs-12 col-sm-4">
						<h4>VnEconomist</h4>
						<ul class="footer-nav">
							<li><a target="_blank" href="#">About Us</a></li>
							<li><a href="#">Careers</a></li>
							<li><a target="_blank" href="#">Our Team</a></li>
							<li><a target="_blank" href="#">Blog</a></li>
							
						</ul>
						<hr class="visible-xs"/>
					</div>
					<div class="col-xs-12 col-sm-4">
						<h4>Trợ giúp</h4>
						<ul class="footer-nav">
							<li><a href="#">How it Works</a></li>
							<li><a target="_blank" href="#">Help Guides</a></li>
							<li><a target="_blank" href="#">Support</a></li>
						</ul>
						<hr class="visible-xs"/>
					</div>
					<div class="col-xs-12 col-sm-4">
						<h4>Liên kết</h4>
						<ul class="footer-nav">
                            <li><a target="_blank" href="#">Zotadi</a> </li>
							<li><a target="_blank" href="#">eFund</a></li>
							<li><a target="_blank" href="#">eJob</a> </li>
                            <li><a target="_blank" href="#">eAction</a> </li>
						</ul>
					</div>
				</div>
				<div class="col-xs-12 hidden-md hidden-lg copyright-mobile">
					© 2015 VnEconomist Inc.    <div class="helper-links right clearfix">
						<ul>
							<li><a href="#">Terms</a></li>
							<li><a href="#">Privacy</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-4 col-lg-3 connect visible-lg">
					<div class="email-input">       
						<form class="form" id="language-form" action="<?php echo home_url('language'); ?>" method="post">
							<div class="language" id="language-footer">
								<select class="language_se form-control" name="language" onchange="this.form.submit()">
                                    <option value="en" <?php echo ($_COOKIE['language'] == 'en')? 'selected="selected"': '' ?> >English</option>
                                    <option value="vi" <?php echo ($_COOKIE['language'] == 'vi')? 'selected="selected"': '' ?>>Tiếng Việt</option>
                                </select>
							</div>
							<input type="hidden" name="redirectUrl" value="<?php echo 'http://'.$_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] ?>" />
							
						</form>    
					</div>
					<div class="social">
						<ul class="nav nav-pills">
							<li>
								<a href="#" class="social-button facebook fa fa-facebook">&nbsp;</a>
							</li>
							<li>
								<a href="#" class="social-button twitter fa fa-twitter">&nbsp;</a>
							</li>
							<li>
								<a href="#" class="social-button linkedin fa fa-linkedin">&nbsp;</a>
							</li>
							<li>
								<a href="#" class="social-button pinterest fa fa-pinterest">&nbsp;</a>
							</li>
							<li>
								<a href="#" class="social-button google-plus fa fa-google-plus">&nbsp;</a>
							</li>
						</ul>
					</div>
				</div>    
			</div>
        <div class="detect-mobile"></div>
	</footer>       

</div>
    <div id="jsModuleLoginSignup" role="dialog" tabindex="-1" class="modal fade customUiDialog loginSignupCustomDialog login-signup-modal in" aria-hidden="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    Đăng nhập<button data-dismiss="modal" class="close" name="yt0" type="button">×</button>
                </div>
                <div class="modal-body">
                    <div title="Đăng nhập" class="widget-jsModuleLoginSignup clearfix">
                        <div class="login-signup-container">
                            <form id="login-form" action="<?php echo site_url('/c/user/user/login'); ?>" method="post">
                                <div class="insidePopup loginDiv clearfix">
                                    <div>
                                        <div class="gutter-top clearfix" data-hook="partial-social-buttons">
                                            <div class="col-xs-12 col-sm-6 social-left clearfix">
                                                <a class="action-social-login medium button social-button facebook login-fb-link" rel="nofollow" href="https://www.facebook.com/v2.3/dialog/oauth?client_id=189952838014491&redirect_uri=http%3A%2F%2Flocalhost%2Fvneconomist%2Fc%2Fuser%2Fuser&state=34481107fd96533f95a49a82fb9b7e66&sdk=php-sdk-4.0.23&scope=">
                                                    <i class="fa fa-facebook"></i><span>Đăng nhập bằng Facebook</span>
                                                </a>
                                            </div>                
                                            <div class="col-xs-12 col-sm-6 social-right">
                                                <a class="action-social-login medium button social-button linkedin last login-li-link" rel="nofollow" href="<?php echo $loginViaLinkin; ?>">
                                                    <i class="fa fa-linkedin"></i><span>LinkedIn</span>
                                                </a>
                                            </div>            
                                        </div>
                                        <div class="gutter-top align-center" data-hook="partial-facebook-button" style="display: none;">
                                            <a class="action-social-login span-7 tall button facebook" rel="nofollow" href="https://www.facebook.com/v2.3/dialog/oauth?client_id=189952838014491&redirect_uri=http%3A%2F%2Flocalhost%2Fvneconomist%2Fc%2Fuser%2Fuser&state=34481107fd96533f95a49a82fb9b7e66&sdk=php-sdk-4.0.23&scope=">Đăng nhập bằng Facebook</a>                
                                            <div class="fb-facepile-container span-8 last clearfix">
                                                <fb:facepile width="300" max_rows="1"></fb:facepile>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="or-separator clearfix gutter-top gutter-bottom">or</div>
    
                                    <div class=" signin clearfix">
                                        <div class="gutter-bottom clearfix">
                                            <label class="clear" for="LoginForm_email">Email</label>            
                                            <input tabindex="1" class="clear medium login-signup-email" name="LoginForm[email]" id="LoginForm_email" type="text" required/>     
                                        </div>
                                        <div class="clearfix gutter-bottom">
                                            <label class="clear" for="LoginForm_password">Mật khẩu</label>            
                                            <input tabindex="2" class="medium clear" autocomplete="off" name="LoginForm[password]" id="LoginForm_password" type="password" required/>                    
                                        </div>
                                        <div class="clearfix prepend-top gutter-bottom">
                                            <input id="ytLoginForm_rememberMe" type="hidden" value="0" name="LoginForm[rememberMe]"/>
                                            <input tabindex="3" checked="checked" class="plain left clear pph-custom-input" name="LoginForm[rememberMe]" id="LoginForm_rememberMe" value="1" type="checkbox"/>            
                                            <label class="left rememberMe" for="LoginForm_rememberMe">Remember me</label>            
                                            <div class="gutter-bottom clear clearfix">
                                                <a class="forgotPassword gutter-bottom clear action-forgot-toggle" rel="nofollow" href="#">Quên mật khẩu?</a>            
                                            </div>
                                
                                        </div>
                                        <div class="clearfix">
                                            <input tabindex="4" class="call-to-action medium gutter-bottom btn-inverted" type="submit" name="yt1" value="Đăng nhập"/>                
                                            <div class="tocLink clear">
                                                By clicking Log In, Facebook or LinkedIn<br/>you agree to our new <a tabindex="7" rel="nofollow" href="#">T&amp;C's</a>                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <input type="hidden" class="login-next-url" name="next" value="#"/>
                        </form> 
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="div-signup-toggle popup-footer align-center clearfix" style="display: none">
                    Already have an account?   
                    <a tabindex="-1" class="action-login-toggle call-to-action" rel="nofollow" href="#">Log In</a>
                </div>
                <div class="div-login-toggle popup-footer align-center clearfix" style="">
                    Don’t have an account?    
                    <a tabindex="-1" class="action-login-toggle call-to-action" rel="nofollow" href="#">Sign Up</a>
                </div>
            </div>
        </div>
    </div>
</div>   
<div id="bg-overlay" class=""></div>
</body>
</html>