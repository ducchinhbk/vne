<?php echo $header_view;?>

<div id="main-container" class="wrap-container container clearfix offcanvas offcanvas-right">
    <div class="main-content controller-member action-edit">
        <div class="append-bottom">
            <form id="member-edit-form" action="#" method="post">
                <div style="display:none">
                    <input type="hidden" value="5c2696c5a2b1244f11d3a184cc47c3f866772c5c" name="YII_CSRF_TOKEN"/>
                </div>    
                <header class="clearfix">
                    <h1>
                        Edit your Profile <aside class="below">Fill in your profile information</aside>
                    </h1>
                </header>
                <div class="gutter-top form-group row">
                    <div class="col-sm-6 col-xs-12">
                        <label class="clearfix" for="MemberProfile_fname">First Name</label>
                        <input class="form-control" name="MemberProfile[fname]" id="MemberProfile_fname" type="text" value="Micheal"/>        
                        </div>
                    <div class="col-sm-6 col-xs-12">
                        <label class="clearfix" for="MemberProfile_lname">Last Name</label>
                        <input class="form-control popover-toggle"  name="MemberProfile[lname]" id="MemberProfile_lname" type="text" value="Tran"/>        
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="form-group">
                    <label class="clearfix" for="MemberProfile_job_title">Job Title</label>
                    <input class="form-control popover-toggle" placeholder="Example: Web Designer; Copywriter; Virtual Assistant..." name="MemberProfile[job_title]" id="MemberProfile_job_title" type="text" value="Senior Software Engineer"/>    
                </div>
                <div class="form-group">
                    <label id="edit-cover-image" class="clearfix" for="MemberProfile_coverImage">Cover image<span class="discreet">(recommended)</span></label>
                    <span class="pull-right popover-toggle tooltip-visible-lg" ><i class="color-info fa fa-question-circle"></i></span>
                    <span class="pull-right bootbox-toggle clickable tooltip-hidden-lg" title="Help tip"><i class="color-info fa fa-question-circle"></i></span>
                    <div style="display: none !important;" id="help-content-5618998b57678"></div>
                    <div>
                        <div class="widget-jsModuleAttachFiles clearfix ImageCrop-enabled" id="attachFiles-box-MemberProfile_coverImage" data-id="MemberProfile_coverImage" style="position: relative;">
                            <ul class="attachFiles-list ">
                                <li class="attach-success" style="opacity: 1; width: 60px;" data-category="other" id="cover_710651">
                                    <a href="#" class="remove" title="Remove">Remove</a>
                                    <div class="attachFiles-item">
                                        
                                        <img alt="undefined - " class="preview" style="" src="http://d3v9w2rcr4yc0o.cloudfront.net/uploads/covers/thumbs/930f0bd4ee4d1e5656cbd940c72e948a_320x90.jpg"/>
                                    </div>
            
                                    <input type="hidden" name="MemberProfile[coverImage][cover_710651][name]" class="file-attachment file-attach-cover_710651" value=""/>
                                    <input type="hidden" name="MemberProfile[coverImage][cover_710651][type]" class="file-attachment file-attach-cover_710651" value="other"/>
                                    <input type="hidden" name="MemberProfile[coverImage][cover_710651][path]" class="file-attachment file-attach-cover_710651" value=""/>
                                    <input type="hidden" name="MemberProfile[coverImage][cover_710651][thumb]" class="file-attachment file-attach-cover_710651" value=""/>
                                    <input type="hidden" name="MemberProfile[coverImage][cover_710651][id]" class="file-attachment file-attach-cover_710651" value=""/>
                                    <input type="hidden" name="MemberProfile[coverImage][cover_710651][filesize]" class="file-attachment file-attach-cover_710651" value=""/>
                                    <input type="hidden" name="MemberProfile[coverImage][cover_710651][description]" class="file-attachment file-attach-cover_710651" value=""/>
                                </li>
                            </ul>
                            <div class="attachFiles-dropArea only-upload" id="attachFiles-dropArea-1" style="display: none; position: relative;">
                                <div class="attachFiles-normalOptions">
                                    <span class="attachFiles-dragSupport">Drop files here or</span>
                                    <a class="call-to-action attachFiles-pick _attachFiles-link" href="#" id="attachFiles-pick-1" style="position: relative; z-index: 1;">
                                    Browse<br/></a> to add attachments        
                                </div>
                                <div class="attachFiles-maxFiles">Max<br/> Files        </div>
                            </div>
    
                        </div>
                        
                        
                    </div>        
                </div>
                <div class="form-group">
                    <label class="pull-left" for="MemberProfile_images">
                        Profile picture<span class="discreet">(recommended)</span>
                    </label>
                    <span class="pull-right popover-toggle tooltip-visible-lg" >
                        <i class="color-info fa fa-question-circle"></i>
                    </span>
                    <span class="pull-right bootbox-toggle clickable tooltip-hidden-lg" data-content-selector="#profile-image-suggestion" data-trigger="click" title="Help tip">
                        <i class="color-info fa fa-question-circle"></i>
                    </span>
                    <div style="display: none !important;" id="help-content-5618998b58203"></div>        
                    <div class="clear"></div>
                    <div>
                        <div class="widget-jsModuleAttachFiles clearfix" id="attachFiles-box-MemberProfile_images" data-id="MemberProfile_images" style="position: relative;">
                            <ul class="attachFiles-list ">
                                <li class="attach-success" style="opacity: 1; width: 60px;" data-category="other" id="710651">
                                    <a href="#" class="remove" title="Remove">Remove</a>
                                    <div class="attachFiles-item">
                                        <img alt="undefined - " class="preview" style="" src="http://d3v9w2rcr4yc0o.cloudfront.net/uploads/thumbs/902af83297ca2ee2b4e73a6ceef84f7d_70x70.png">
                                    </div>
            
                                    <input type="hidden" name="MemberProfile[images][710651][name]" data-file-id="710651" data-property="name" class="file-attachment file-attach-710651" value="902af83297ca2ee2b4e73a6ceef84f7d.png"><input type="hidden" name="MemberProfile[images][710651][type]" data-file-id="710651" data-property="type" class="file-attachment file-attach-710651" value="other"><input type="hidden" name="MemberProfile[images][710651][path]" data-file-id="710651" data-property="path" class="file-attachment file-attach-710651" value=""><input type="hidden" name="MemberProfile[images][710651][thumb]" data-file-id="710651" data-property="thumb" class="file-attachment file-attach-710651" value=""><input type="hidden" name="MemberProfile[images][710651][id]" data-file-id="710651" data-property="id" class="file-attachment file-attach-710651" value="710651"><input type="hidden" name="MemberProfile[images][710651][filesize]" data-file-id="710651" data-property="filesize" class="file-attachment file-attach-710651" value="undefined"><input type="hidden" name="MemberProfile[images][710651][description]" data-file-id="710651" data-property="description" class="file-attachment file-attach-710651" value=""/>
                                </li>
                            </ul>
                            <div class="attachFiles-dropArea only-upload  " id="attachFiles-dropArea-2" style="display: none; position: relative;">
                                <div class="attachFiles-normalOptions">
                                    <span class="attachFiles-dragSupport">Drop files here or </span>
                                        <a class="call-to-action attachFiles-pick _attachFiles-link" href="#" id="attachFiles-pick-2" style="position: relative; z-index: 1;">
                                            Browse<br/>
                                        </a> to add attachments        
                                </div>
                                <div class="attachFiles-maxFiles">Max<br/> Files </div>
                            </div>
    
                          
                          
                        </div>
                    </div>    
                </div>
                 
                 <div class="form-group">
                    <label class="clearfix" for="MemberProfile_about">About You</label>
                    <textarea class="form-control popover-toggle" rows="10" placeholder="Introduce yourself..." name="MemberProfile[about]" id="MemberProfile_about">
                        5 years in web developer, Php developer
                    </textarea>    
                 </div>
                 <div class="form-group">
                    <label class="pull-left" for="MemberProfile_skillsString">Your profile skills</label>
                    <span class="pull-right popover-toggle tooltip-visible-lg" title="">
                        <i class="color-info fa fa-question-circle"></i>
                    </span>
                    <span class="pull-right bootbox-toggle clickable tooltip-hidden-lg" title="Help tip">
                        <i class="color-info fa fa-question-circle"></i>
                    </span>
                           
                    <div class="clear"></div>
                    <div class="select2-container select2-container-multi clear form-control" id="s2id_MemberProfile_skillsString">
                        <ul class="select2-choices">  
                            <li class="select2-search-choice">    
                                <div>Mobile app design</div>    
                                <a href="#" class="select2-search-choice-close" tabindex="-1"></a>
                            </li>
                            <li class="select2-search-choice">    
                                <div>Website design</div>    
                                <a href="#" class="select2-search-choice-close" tabindex="-1"></a>
                            </li>
                            <li class="select2-search-choice">    
                                <div>Wordpress design</div>    
                                <a href="#" class="select2-search-choice-close" tabindex="-1"></a>
                            </li>
                            <li class="select2-search-choice">    
                                <div>CMS</div>    
                                <a href="#" class="select2-search-choice-close" tabindex="-1"></a>
                            </li>
                            <li class="select2-search-choice">    
                                <div>Code igniter</div>    
                                <a href="#" class="select2-search-choice-close" tabindex="-1"></a>
                            </li>
                                                
                        </ul>
                    </div>
                            
                    <p class="contact-skills">
                        Can't find a skill? 
                        <a id="skill-suggestion-trigger-selector" 0="Contact us" href="#">Contact us</a> to add it.        
                    </p>
                    </div>
                    <div class="form-group">
                        <label class="clearfix" id="location-city-anchor" for="MemberProfile_location_city">Location (city)</label>
                        <div class="widget-jsModuleLocationCombo" id="widget-jsModuleLocationCombo-profile-edit-location">
                        <span class="twitter-typeahead" style="position: relative; display: inline-block; direction: ltr;">
                            <input class="location-combo-input clearfix form-control tt-hint" type="text" value="Singapore, SG" disabled="" autocomplete="off" spellcheck="false" style="position: absolute; top: 0px; left: 0px; border-color: transparent; box-shadow: none; background: none 0% 0% / auto repeat scroll padding-box padding-box rgb(255, 255, 255);">
                            <input id="" class="location-combo-input clearfix form-control tt-input" placeholder="Type a city" data-tooltip-pos="bottom" data-tooltip-fallback-pos="right" data-input-suggestion="Indicate the City you are based in." type="text" value="Singapore, SG" name="location_combo" autocomplete="off" spellcheck="false" dir="auto" style="position: relative; vertical-align: top; background-color: rgba(0, 0, 0, 0);">
                           
                        </span>
                        <input name="MemberProfile[locationCity]" id="MemberProfile_locationCity" type="hidden" value="Singapore"/>
                        <input  name="MemberProfile[locationCountry]" id="MemberProfile_locationCountry" type="hidden" value="SG"/>
                        <input  name="MemberProfile[locationID]" id="MemberProfile_locationID" type="hidden" value="1880252"/>
                        </div>    
                    </div>
                    <div class="form-group">
                        <input class="action-declineDialog-submit tall col-xs-4 btn btn-pph" id="edit-profile-submit" type="submit" name="yt3" value="Done"/>        
                        <div class="clear"></div>
                    </div>
                 </form>
            </div>
    </div>
    <aside class="right-column sidebar-member-edit offcanvas-sidebar">
        <div class="clearfix append-bottom">
            <h3 class="sidebar-header">Seller Tips</h3>
            <div class="lifted-corners with-handles">
                <div class="handles"></div>
                <div>
                    <ul class="numbered-tips">
                        <li class="clearfix">Tell your personal story, how you got to being a freelancer. There is no substitute for the real ‘you’ story :)</li>
                        <li class="clearfix">Reveal your passion and drive. What gets you up in the morning?</li>
                        <li class="clearfix">Why did you choose to become a freelancer?</li>
                        <li class="clearfix">Upload a high quality cover image and a real photo of yourself to engage Buyers</li>
                        <li class="clearfix">Keep it real!</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="clearfix">
            <h3 class="sidebar-header">What to avoid</h3>
            <div class="lifted-corners with-handles">
                <div class="handles"></div>
                <div>
                    <ul class="numbered-tips">
                        <li class="clearfix">No corporate boring stuff... keep your Profile light and ‘human’. Buyers don’t hire a ‘resume’ they want to hire a person.</li>
                        <li class="clearfix">No logos or imagery</li>
                        <li class="clearfix">No contact details. The integrity of the PPH system is paramount to our community.</li>
                        <li class="clearfix">No resumes or CVs...keep it real!</li>
                    </ul>
                </div>
            </div>
        </div>
    </aside>
</div>