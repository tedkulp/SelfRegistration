<?php
$lang['prompt_redirect_paidpkg'] = 'Page ID/Alias to redirect to for paid packages';
$lang['info_redirect_paidpkg'] ='A smarty template that determines the pageid or alias of a page to redirect to for paid packages. Typically a user that is registering for your site may want to go directly to your checkout page, or to the view cart page.';
$lang['info_additionalgroups_matchfields'] = 'When allowing existing users to register to an additional group, you can specify which FEU properties of the existing user must match when the user registers again.  This information will be used to uniquely identify the FEU user account';
$lang['info_cartitem_summary_tpl'] = 'A smarty template that determines the value of the summary that appears with this line item in the cart, and during the checkout process.  If no value is specified a default is used.  Valid smarty variables are {$pkg} <em>(array)</em>.  {$sku}, {$username}, {$tmpuid} <em>(the users temporary user id)</em>. <strong>Note:</strong> some payment gateways may only support a fixed number of characters for the summary.';
$lang['prompt_cartitem_summary_tpl'] = 'Cart Item Summary Template';
$lang['paid_registration'] = 'Paid Registration';
$lang['info_skip_final_msg'] = 'This option determins wether the registration complete message should be displayed to the user after registration.';
$lang['notifications'] = 'Notifications';
$lang['info_login_afterverify'] = 'This option will automatically log the visitor into the site after the user has been pushed to the Frontend Users module.  This option has no effect if allowing paid registration';
$lang['info_email_confirmation'] = 'This option sends an email to the registerd user account with a link that allows verifying that the account information entered is valid.<br/><strong>Note:</strong> This option should not be used when allowing paid registrations';
$lang['prompt_registration_settings'] = 'Registration Settings';
$lang['none'] = 'None';
$lang['month'] = 'Month';
$lang['year'] = 'Year';
$lang['subscription_expires'] = 'Subscription renews every';
$lang['error_policycantadd'] = 'The policy of this website does not allow adding this item to your cart.  Please contact the site administrator';
$lang['prompt_allow_select_pkg'] = 'Allow users to select a package (group) to register to';
$lang['info_allowselectpkg'] = 'You may wish to allow your users to select an FEU group to register to.  These groups are tied to packages (for ecommerce purposes).  However if not using the E-commerce functionality, the price data can be ignored';
$lang['error_nopkgs'] = 'No packages have been defined to allow the customer to register to';
$lang['selpkg_template'] = 'Select Package Template';
$lang['title_selpkg_template'] = 'Select Subscription Package Template';
$lang['info_selpkg_template'] = 'This template is used when paid subscriptions are enabled to allow the user to select a paid subscription package';
$lang['error_pkgcost'] = 'Package Cost is Invalid';
$lang['error_pkgexists'] = 'A package with a %s of %s already exists';
$lang['description'] = 'Description';
$lang['edit_paidpkg'] = 'Edit Paid Package &quot;%s&quot;';
$lang['add_paidpkg'] = 'Add Paid Package';
$lang['name'] = 'Name';
$lang['prompt'] = 'Prompt';
$lang['group'] = 'Group';
$lang['cost'] = 'Cost';
$lang['regpkgs_tab'] = 'Registration Packages';
$lang['prompt_allow_paid_registration'] = 'Require members to pay for registration to your site';
$lang['info_allow_paid_registration'] = 'Please also select Selfregistration as a source module from CGEcommerceBase, and configure the &quot;Paid Registration&quot; Tab.  Additionally, you must enable package selection above.';
$lang['email-password'] = 'Email Address and Password';
$lang['username-password'] = 'Username and Password';
$lang['help_param_allowoverwrite'] = <<<EOT
This parameter allows overwriting existing FEU users. In conjunction with the preferences in the SelfRegistration admin panel you can specify what data will be used to uniquely identify a user account';
EOT;
$lang['into_additionalgroups_matchfields'] = 'Specify which fields should be used to uniquely identify a user.  This can be used to allow the user to register when an account already exists for that user with a different username.';
$lang['prompt_additionalgroups_matchfields'] = 'When overwriting an existing account the following fields must match';
$lang['prompt_reg_additionalgroups'] = 'Allow existing users to register for additional groups?';
$lang['prompt_additionalgroups_settings'] = 'Additional Groups Settings';
$lang['prompt_general_settings'] = 'General Settings';
$lang['prompt_security_settings'] = 'Security Settings';
$lang['error_uniquefield'] = 'The value specified for &quot;%s&quot; is already in use by another registered user';
$lang['help_param_action'] = <<<EOT
This parameter dictates the behaviour of the module.
<ul>
  <li><strong>default</strong>
   <p>This is the default action.  Based on the <em>(deprecated></em> mode parameter <em>(see below)</em> it will display either the user registration form, the verify form, or another form.</li>
  </li>
  <li>reguser_link
   <p>Display a link to the user registration form.</p>
  </li>
</ul>
EOT;
$lang['help_param_destpage'] = 'Applicable only to the action=reguser_link.. this parameter allows specifying (by alias or page id) a destination page for the link.';
$lang['help_param_group'] = 'Applicable to the action=reguser_link or action=register, this parameter allows specifying a group in which the user will be regisered';
$lang['help_param_onlyhref'] = 'Used only in the action=reguser_link, setting this parameter indicates that the output should only contain the url portion of the link';
$lang['help_param_linktext'] = 'Used only in the action_reguser_link it allows specifying the text for the generated link.  This parameter is ignored if the onlyhref parameter is specified.';
$lang['help_param_noinline'] = 'Applicable to many actions, this parameter overrides the preference in the admin panel to indicate that the output from the generated link or form should not be displayed inline.  i.e: noinline=1 on the default action will indicate that the output text will replace the {content} tag.';
$lang['error_noregister'] = 'You cannot register to become a member of this user group';
$lang['prompt_noregister'] = 'Absolutely forbid users to register to these groups';
$lang['error_nosecondemailaddress'] = 'You did not enter your email address twice';
$lang['push_live'] = 'Push this user into FEU';
$lang['areyousure_pushuser'] = 'Are you sure you want to push this user into FEU without completing the validation process?';
$lang['delete'] = 'Delete';
$lang['login_afterverify'] = 'Automatically log the user in to FrontEndUsers after the verification step is complete';
$lang['skip_final_msg'] = 'Don\'t display the final message after registration';
$lang['redirect_afterregister'] = 'PageID/Alias to redirect to after registration is complete';
$lang['redirect_afterverify'] = 'PageID/Alias to redirect to after verification step is complete';
$lang['use_inline_forms'] = 'Use Inline Forms <em>(form output replaces the module tag, not all of content)</em>';
$lang['error_codesdontmatch'] = 'The validation key supplied is invalid';
$lang['event_description_onNewUser'] = 'An event indicating that a new user has completed the registration form';
$lang['event_description_onUserRegistered'] = 'An event indicating that a user has verified his information and is now completely registered';
$lang['event_help_onNewUser'] = '
<p>An event indicating that a new user has completed the registration form</p>
<h4>Parameters</h4>
<ul>
<li><em>username</em> - The new users selected username</li>
<li><em>email</em> - The new users email address</li>
</ul>
';
$lang['event_help_onUserRegistered'] = '
<p>An event indicating that a user has been verified and is now registered with feusers</p>
<h4>Parameters</h4>
<ul>
<li><em>username</em> - The registered username</li>
<li><em>id</em> - The new users uid</li>
</ul>
';
$lang['confirm_submitprefs'] = 'Change admin preferences?';
$lang['info_admin_password'] = 'Leave this field empty to preserve the user password';
$lang['info_admin_repeatpassword'] = 'Leave this field empty to preserve the user password';
$lang['error_emaildoesnotmatch'] = 'Email addresses do not match';
$lang['force_email_twice'] = 'Require users to enter their email address twice';
$lang['again'] = 'again';
$lang['deleteselusers'] = 'Delete Selected Users';
$lang['error_nopropdefns'] = 'No property definitions, or problem retreiving them from the database';
$lang['error_nogroups'] = 'No groups, or problem retreiving group list';
$lang['error_dberror'] = 'Database error';
$lang['title_post_sendanotheremail_template'] = 'Post Lost Email Template';
$lang['title_sendanotheremail_template'] = 'Lost Email Template';
$lang['clickhere'] = 'Click Here';
$lang['msg_sendanotheremail'] = 'I have already completed the registration form, but did not receive an email, can you please re-send it';
$lang['sendanotheremail_template'] = 'Lost Email Template';
$lang['info_userverified'] = 'A new user has been added to FrontEndUsers';
$lang['edit'] = 'Edit';
$lang['unknown'] = 'Unknown';
$lang['select'] = 'Select';
$lang['check_all'] = 'Check All';
$lang['uncheck_all'] = 'Uncheck All';
$lang['send_adjustmentemail'] = 'Send an email to the user';
$lang['txt_adjustmentemail'] = '(informs the user that their account has been adjusted';
$lang['txt_changepassword'] = 'Fill in these fields to change the user password';
$lang['edituser'] = 'Edit User';
$lang['areyousure_deleteuser'] = 'Are you sure you want to delete this partially registered user?';
$lang['hdr_userid'] = 'UserID';
$lang['hdr_username'] = 'Username';
$lang['hdr_grpname'] = 'Group';
$lang['hdr_created'] = 'Created';
$lang['hdr_email'] = 'Emaii';
$lang['usersfound'] = 'Users found (limited to a maximum of 250)';
$lang['users'] = 'Users';
$lang['list1day'] = 'List all entries more than 1 day old';
$lang['subject'] = 'Subject for outgoing email';
$lang['htmlbody'] = 'HTML message body';
$lang['textbody'] = 'Text message body';
$lang['prompt_numresetrecord'] = 'A number of users are in the middle of registering.  Currently this count is at:';
$lang['remove1week'] = 'Remove all entries more than a week old';
$lang['remove1month'] = 'Remove all entries more than a month old';
$lang['remove1day'] = 'Remove all entries more than a day old';
$lang['removeall'] = 'Remove all entries';
$lang['areyousure'] = 'Are you sure?'; 
$lang['registration_info_edited'] = 'Your registration info has been modified';
$lang['registration_confirmation'] = 'Registration Confirmation';
$lang['user_registration'] = 'Register';
$lang['finalmessage_template'] = 'Final Message Template';
$lang['title_verifyregistration'] = 'Verify Registration';
$lang['code'] = 'Validation Key';
$lang['default'] = 'Set To Defaults';
$lang['error_noproperties'] = 'No properties found for this user';
$lang['error_noproprelations'] = 'No property relations';
$lang['error_emailinvalid'] = 'Invalid email address';
$lang['error_noemailaddress'] = 'No valid email address field found';
$lang['error_requiredfield'] = 'Field %s must be filled in';
$lang['registration1_template'] = 'Registration Template 1';
$lang['registration2_template'] = 'Registration Template 2';
$lang['emailconfirm_template'] = 'Confirmation Email Template';
$lang['emailuseredited_template'] = 'User Info Changed Template';
$lang['preferences'] = 'Preferences';
$lang['error_usernotfound'] = 'User not found';
$lang['error_invalidusername'] = 'Username is invalid (too long, too short, or contains invalid characters).  Hint- Usernames must contain only alphanumeric characters (no spaces)';
$lang['error_invalidemail'] = 'Email is invalid.';
$lang['error_usernametaken'] = 'That username is currently in use';
$lang['error_passwordsdontmatch'] = 'ERROR: Passwords dont match';
$lang['error_invalidpassword'] = 'Password is invalid (passwords must be between %s and %s characters in length)';
$lang['error_emptyusername'] = 'Username cannot be empty';
$lang['error_emptyemail'] = 'Email cannot be empty';
$lang['repeatpassword'] = 'Password (again)';
$lang['password'] = 'Password';
$lang['username'] = 'Username';
$lang['email'] = 'Email';
$lang['captcha_title'] = 'Enter the text from the image';
$lang['error_insufficientparams'] = 'Insufficient number (or incorrect) parameters supplied to module';
$lang['error_nofeusersmodule'] = 'Could not get instance of FrontEndUsers module';
$lang['error_nosuchgroup'] = 'Group name specified does not exist';
$lang['error_captchamismatch'] = 'The text from the image was not entered correctly';
$lang['send_emails_to'] = 'Registration emails should be sent to';
$lang['require_email_confirmation'] = 'Require the user to confirm registration via email';
$lang['notify_on_registration'] = 'Send an email notification when someone registers';
$lang['cancel'] = 'Cancel';
$lang['submit'] = 'Submit';
$lang['friendlyname'] = 'Self Registration Module';
$lang['postinstall'] = 'Installation successfull, please remember to set the &quot;Modify SelfRegistration Settings&quot; permission.  If the Captcha module is installed, then captcha functionality is enabled by default.  We strongly reccommend that you install this module.  If the Captcha module is installed, and you want to disable it, use the nocaptcha param in your selfregistration tag.';
$lang['postuninstall'] = 'Self Registration module is uninstalled.  See you later.';
$lang['uninstalled'] = 'Module Uninstalled.';
$lang['installed'] = 'Module version %s installed.';
$lang['prefsupdated'] = 'Module preferences updated.';
$lang['accessdenied'] = 'Access Denied. Please check your permissions.';
$lang['error'] = 'Error!';
$lang['upgraded'] = 'Module upgraded to version %s.';
$lang['title_mod_prefs'] = 'Module Preferences';
$lang['title_mod_admin'] = 'Module Admin Panel';
$lang['title_admin_panel'] = 'Self Registration Module';
$lang['moddescription'] = 'A module that allows front end users to register themselves.';
$lang['welcome_text'] = '<p>Welcome to the self registration module.</p>';
$lang['enable_whitelist'] = 'Enable Whitelist';
$lang['whitelist'] = 'List of whitelist username/emails. One per line. (use * for wildcards)';
$lang['whitelist_trigger_message'] = 'Message to show if a whitelist rule is triggered';
$lang['dont_use'] = 'No Whitelist';
$lang['no_matches'] = 'Don\'t allow matched username/emails to register';
$lang['only_matches'] = 'Only allow matched username/emails to register';
$lang['help'] = '<h3>What Does This Do?</h3>
<p>This module is designed to allow front end users to register themselves and fill in the required information.  It then sends a confirmation email, with a link to a second page that must be completed before the registration is complete.  Once registration is complete, a user account is created in the front end users module.</p>
<p>In order to use this module, you must create a property of type "Email Address" in the FrontendUsers module, and associate that property with the group to be used for self registration.</p>
<h3>How Do I Use It</h3>
<p>You place the followng tag into your page {cms_module module=SelfRegistration group=usergroup}</p>
<p>You must have previously created properties and user groups in the FrontEndUsers module in order for this to work properly.</p>
<h3>Parameters</h3>
<p><strong>mode</strong>&nbsp;<em>optional</em> - possible values are "signup" and "verify".  If this parameter is not specified, "signup" is assumbed.</p>
<p><strong>group</strong>&nbsp;<em>optional</em> - This parameter is required if mode is "signup", or if mode is left empty.</p>
<p><strong>nocaptcha</strong>&nbsp;<em>optional</em> - This will disable captcha on the signup form. By default, if the Captcha module is installed, captcha support is provided.  This parameter disables it.</p>
<h3>Support</h3>
<p>This module does not include commercial support. However, there are a number of resources available to help you with it:</p>
<ul>
<li>For the latest version of this module, FAQs, or to file a Bug Report or buy commercial support, please visit calguy\'s
module homepage at <a href="http://techcom.dyndns.org">techcom.dyndns.org</a>.</li>
<li>Additional discussion of this module may also be found in the <a href="http://forum.cmsmadesimple.org">CMS Made Simple Forums</a>.</li>
<li>The author, calguy1000, can often be found in the <a href="irc://irc.freenode.net/#cms">CMS IRC Channel</a>.</li>
<li>Lastly, you may have some success emailing the author directly.</li>  
</ul>
<p>As per the GPL, this software is provided as-is. Please read the text
of the license for the full disclaimer.</p>

<h3>Copyright and License</h3>
<p>Copyright &copy; 2008, Robert Campbel <a href="mailto:calguy1000@cmsmadesimple.org">&lt;calguy1000@cmsmadesimple.org&gt;</a>. All Rights Are Reserved.</p>
<p>This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.</p>
<p>However, as a special exception to the GPL, this software is distributed
as an addon module to CMS Made Simple.  You may not use this software
in any Non GPL version of CMS Made simple, or in any version of CMS
Made simple that does not indicate clearly and obviously in its admin 
section that the site was built with CMS Made simple.</p>
<p>This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
Or read it <a href="http://www.gnu.org/licenses/licenses.html#GPL">online</a></p>
<h3>Sponsors</h3>
<p>There have been many sponsors for this module, some of these are listed below:</p>
<ul.>
 <li><a href="http://www.matterhornmarketing.com">Matterhorn Marketing</a></li>
 <li><a href="http://www.bpti.eu">Baltic Institute of Advanced Technology</a></li>
</ul>

';
?>
