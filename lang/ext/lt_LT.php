<?php
$lang['help_param_action'] = 'This parameter dictates the behaviour of the module.
<ul>
  <li><strong>default</strong>
   <p>This is the default action.  Based on the <em>(deprecated></em> mode parameter <em>(see below)</em> it will display either the user registration form, the verify form, or another form.</li>
  </li>
  <li>reguser_link
   <p>Display a link to the user registration form.</p>
  </li>
</ul>';
$lang['help_param_destpage'] = 'Applicable only to the action=reguser_link.. this parameter allows specifying (by alias or page id) a destination page for the link.';
$lang['help_param_group'] = 'Applicable to the action=reguser_link or action=register, this parameter allows specifying a group in which the user will be regisered';
$lang['help_param_onlyhref'] = 'Used only in the action=reguser_link, setting this parameter indicates that the output should only contain the url portion of the link';
$lang['help_param_linktext'] = 'Used only in the action_reguser_link it allows specifying the text for the generated link.  This parameter is ignored if the onlyhref parameter is specified.';
$lang['help_param_noinline'] = 'Applicable to many actions, this parameter overrides the preference in the admin panel to indicate that the output from the generated link or form should not be displayed inline.  i.e: noinline=1 on the default action will indicate that the output text will replace the {content} tag.';
$lang['error_noregister'] = 'Jūs negalite registruotis &scaron;ioje grupėje';
$lang['prompt_noregister'] = 'Uždrausti lankytojams registruotis &scaron;iose grupėse';
$lang['error_nosecondemailaddress'] = 'Jūs neįvedėte du kartus e. pa&scaron;to adreso';
$lang['push_live'] = 'Padaryti FEU naudotoju';
$lang['areyousure_pushuser'] = 'Ar tikrai norite padaryti &scaron;į naudotoją FEU naudotoju, nelaukdami registracijos patikrinimo procedūros?';
$lang['delete'] = 'I&scaron;trinti';
$lang['login_afterverify'] = 'Automatically log the user in to FrontEndUsers after the verification step is complete';
$lang['skip_final_msg'] = 'Nerodyti žinutės po registracijos';
$lang['redirect_afterregister'] = 'PageID/Alias to redirect to after registration is complete';
$lang['redirect_afterverify'] = 'PageID/Alias to redirect to after verification step is complete';
$lang['use_inline_forms'] = 'Use Inline Forms <em>(form output replaces the module tag, not all of content)</em>';
$lang['error_codesdontmatch'] = 'Pateiktas kodas yra neteisingas';
$lang['event_description_onNewUser'] = 'An event indicating that a new user has completed the registration form';
$lang['event_description_onUserRegistered'] = 'An event indicating that a user has verified his information and is now completely registered';
$lang['event_help_onNewUser'] = '<p>An event indicating that a new user has completed the registration form</p>
<h4>Parameters</h4>
<ul>
<li><em>username</em> - The new users selected username</li>
<li><em>email</em> - The new users email address</li>
</ul>
';
$lang['event_help_onUserRegistered'] = '<p>An event indicating that a user has been verified and is now registered with feusers</p>
<h4>Parameters</h4>
<ul>
<li><em>username</em> - The registered username</li>
<li><em>id</em> - The new users uid</li>
</ul>
';
$lang['confirm_submitprefs'] = 'Pakeisti admin nustatymus?';
$lang['info_admin_password'] = 'Palikite &scaron;į lauką tu&scaron;čia, jei nenorite keisti naudotojo slaptažodžio';
$lang['info_admin_repeatpassword'] = 'Palikite &scaron;į lauką tu&scaron;čia, jei nenorite keisti naudotojo slaptažodžio';
$lang['error_emaildoesnotmatch'] = 'E. pa&scaron;to adresai nesutampa';
$lang['force_email_twice'] = 'Naudotojas turi įvesti e. pa&scaron;to adresą du kartus';
$lang['again'] = 'dar kartą';
$lang['deleteselusers'] = 'I&scaron;trinti pasirinktus naudotojus';
$lang['error_nopropdefns'] = 'No property definitions, or problem retreiving them from the database';
$lang['error_nogroups'] = 'No groups, or problem retreiving group list';
$lang['error_dberror'] = 'Duomenų bazės klaida';
$lang['title_post_sendanotheremail_template'] = 'Dingusio e. lai&scaron;ko pakartojimo &scaron;ablonas';
$lang['title_sendanotheremail_template'] = 'Dingusio e. lai&scaron;ko &scaron;ablonas';
$lang['clickhere'] = 'Spausti čia';
$lang['msg_sendanotheremail'] = 'A&scaron; jau užpildžiau registracijos formą, bet negavau e. lai&scaron;ko. Pra&scaron;ome, i&scaron;siųskite e. lai&scaron;ką dar kartą';
$lang['sendanotheremail_template'] = 'Nei&scaron;siųsto e. lai&scaron;ko &scaron;ablonas';
$lang['info_userverified'] = 'Naujas naudotojas buvo pridėtas į FEU';
$lang['edit'] = 'Redaguoti';
$lang['unknown'] = 'Nežinomas';
$lang['select'] = 'Pasirinkti';
$lang['check_all'] = 'Pažymėti visus';
$lang['uncheck_all'] = 'Atžymėti visus';
$lang['send_adjustmentemail'] = 'Siųsti e. lai&scaron;ką naudotojui';
$lang['txt_adjustmentemail'] = '(informuoja naudotoją, kad jo paskyra buvo pakoreguota';
$lang['txt_changepassword'] = 'Jei norite pakeisti slaptažodį, užpildykite &scaron;iuos laukus';
$lang['edituser'] = 'Redaguoti naudotoją';
$lang['areyousure_deleteuser'] = 'Ar tikrai norite i&scaron;trinti &scaron;į dalinai užsiregistravusį naudotoją?';
$lang['hdr_userid'] = 'Naudotojo ID';
$lang['hdr_username'] = 'Naudotojo vardas';
$lang['hdr_grpname'] = 'Grupė';
$lang['hdr_created'] = 'Sukurta';
$lang['hdr_email'] = 'E. lai&scaron;kas';
$lang['usersfound'] = 'Rasti naudotojai (riba - 250 įra&scaron;ų)';
$lang['users'] = 'Nautotojai';
$lang['list1day'] = 'Rodyti įra&scaron;us senesnius negu 1 (viena) diena';
$lang['subject'] = 'Siunčiamo e. lai&scaron;ko tema';
$lang['htmlbody'] = 'HTML žinutės turinys';
$lang['textbody'] = 'Tekstinės žinutės turinys';
$lang['prompt_numresetrecord'] = 'A number of users are in the middle of registering.  Currently this count is at:';
$lang['remove1week'] = 'Remove all entries more than a week old';
$lang['remove1month'] = 'Remove all entries more than a month old';
$lang['remove1day'] = 'Remove all entries more than a day old';
$lang['removeall'] = 'Pa&scaron;alinti visus įra&scaron;us';
$lang['areyousure'] = 'Ar jūs įsitikinęs??';
$lang['registration_info_edited'] = 'Jūsų registracijos duomenys buvo modifikuoti';
$lang['registration_confirmation'] = 'Registracijos patvirtinimas';
$lang['user_registration'] = 'Registruotis';
$lang['finalmessage_template'] = 'Galutinės žinutės &scaron;ablonas';
$lang['title_verifyregistration'] = 'Patikrinti registraciją';
$lang['code'] = 'Patvirtinimo raktas';
$lang['default'] = 'Numatytieji nustatymai';
$lang['error_noproperties'] = 'Nerasta &scaron;io naudotojo savybių';
$lang['error_noproprelations'] = 'No property relations';
$lang['error_emailinvalid'] = 'Neteisingas e. pa&scaron;to adresas';
$lang['error_noemailaddress'] = 'Nerastas galiojantis e. pa&scaron;to adreso laukas';
$lang['error_requiredfield'] = 'Laukas %s privalo būti užpildytas';
$lang['registration1_template'] = 'Registracijos &scaron;ablonas';
$lang['registration2_template'] = 'Registracijos patvirtinimo &scaron;ablonas';
$lang['emailconfirm_template'] = 'Patvirtinimo e. lai&scaron;ko &scaron;ablonas';
$lang['emailuseredited_template'] = 'Pakeistų naudotojo duomenų &scaron;ablonas';
$lang['preferences'] = 'Nustatymai';
$lang['error_usernotfound'] = 'Naudotojas nerastas';
$lang['error_invalidusername'] = 'Neteisingas naudotojo vardas (per ilgas, per trumpas, arba turi neteisingų simbolių).  Pasitikrinkite- Naudotojo varde gali būti tik lotyni&scaron;kos raidės ir skaičiai (be tarpų)';
$lang['error_invalidemail'] = 'E. pa&scaron;tas yra neteisingas';
$lang['error_usernametaken'] = '&Scaron;is naudotojo vardas jau yra naudojamas';
$lang['error_passwordsdontmatch'] = 'KLAIDA: slaptažodžiai nesutampa';
$lang['error_invalidpassword'] = 'Neteisingas slaptaždis (slaptažodžio ilgis turi būti  %s iki %s simbolių)';
$lang['error_emptyusername'] = 'Naudotojo vardas negali būti tu&scaron;čias';
$lang['error_emptyemail'] = 'E. pa&scaron;to adresas negali būti tu&scaron;čias';
$lang['repeatpassword'] = 'Slaptažodis (dar kartą)';
$lang['password'] = 'Slaptažodis';
$lang['username'] = 'Naudotojo vardas';
$lang['email'] = 'E. pa&scaron;tas';
$lang['captcha_title'] = 'Įveskite tekstą pavaizduotą paveiksle';
$lang['error_insufficientparams'] = 'Insufficient number (or incorrect) parameters supplied to module';
$lang['error_nofeusersmodule'] = ' Nerastas FrontEndUsers modulis';
$lang['error_nosuchgroup'] = 'Tokios grupės nėra';
$lang['error_captchamismatch'] = 'Buvo įvestas neteisingas tekstas i&scaron; paveikslo';
$lang['send_emails_to'] = 'Registracijos e. lai&scaron;kai turi būti siunčiami adresu';
$lang['require_email_confirmation'] = 'Reikalingas registracijos patvirtinimas naudojant e. pa&scaron;tą';
$lang['notify_on_registration'] = 'Siųsti prane&scaron;imą e. pa&scaron;tu, kai kas nors užsiregistruoja';
$lang['cancel'] = 'At&scaron;aukti';
$lang['submit'] = 'Pateikti';
$lang['friendlyname'] = 'Registracijos modulis';
$lang['postinstall'] = 'Installation successfull, please remember to set the &quot;Modify SelfRegistration Settings&quot; permission.  If the Captcha module is installed, then captcha functionality is enabled by default.  We strongly reccommend that you install this module.  If the Captcha module is installed, and you want to disable it, use the nocaptcha param in your selfregistration tag.';
$lang['postuninstall'] = 'Registracijos modulis i&scaron;instaliuotas. ';
$lang['uninstalled'] = 'Modulis i&scaron;instaliuotas.';
$lang['installed'] = 'Modulio %s versija įdiegta.';
$lang['prefsupdated'] = 'Modulio nustatymai atnaujinti.';
$lang['accessdenied'] = 'Access Denied. Please check your permissions.';
$lang['error'] = 'Klaida!';
$lang['upgraded'] = 'Modulis atnaujintas iki %s versijos.';
$lang['title_mod_prefs'] = 'Modullio nustatymai';
$lang['title_mod_admin'] = 'Modulio admin panelė';
$lang['title_admin_panel'] = 'Registracijos modulis';
$lang['moddescription'] = 'A module that allows front end users to register themselves.';
$lang['welcome_text'] = '<p>Sveiki atvykę į registracijos modulį.</p>';
$lang['enable_whitelist'] = 'Enable Whitelist';
$lang['whitelist'] = 'List of whitelist username/emails. One per line. (use * for wildcards)';
$lang['whitelist_trigger_message'] = 'Message to show if a whitelist rule is triggered';
$lang['dont_use'] = 'No Whitelist';
$lang['no_matches'] = 'Don&#039;t allow matched username/emails to register';
$lang['only_matches'] = 'Only allow matched username/emails to register';
$lang['changelog'] = '<ul>
<li>Version 0.0.1. Oct 2005. Initial NRPT (Not Ready for Prime Time) release.</li>
<li>Version 0.1.0. Oct 2005. Initial release.</li>
<li>Version 0.1.1. Oct 2005. Set the HTML mail flag.</li>
<li>Version 0.1.2. Oct 2005. Moved Random stuff into feusers, and added the ability to delete old entries from the registration temporary tables</li>
<li><p>Version 0.1.3. - Dec 2005</p>
<p>Fixed the toggles in the admin preferences.  Also, changed the permissions model to not require the unique permission added previously for the selfreg module.</p>
<p>This release was removed due to possible errors</p>
</li>
<li><p>Version 0.1.4. - Jan 2006</p>
<p>Fixed minor errors with CheckPermission, replaced all assign_by_refs&#039;s with assigns for hopeful php5 compatibility.</p>
<li><p>Version 0.1.5. - Jan 2006</p>
<p>Added the ability to set the subject of the confirmation email, and added the ability to specify a text body.  Subject, and text body are required.</p>
</li>
<li><p>Version 1.0.0. - Feb 2006</p>
<p>Fixed a problem with the verify mode.</p>
<p>Added the ability to edit and delete users. with selection on the checkboxes, and &quot;checkall&quot;</p>
<p>Now require FEUsers 0.1.8 and CMSMailer 1.73.9</p>
<p>Added another tab for the &quot;your settings have been adjusted&quot; email templates</p>
<p>Added CSV Exporting</p>
<p>Added a &quot;Delete all users older than a day&quot; button</p>
<p>Now works with the maximum length field of FEUsers</p>
<p>Added support for dropdowns and text areas</p>
<p>Disallow punctuation characters in username</p>
</li>
<li><p>Version 1.0.1. - Feb 2006</p>
<p>Added the ability for users to request another registration email (uses the same code), incase they lost their first one.</p>
</li>
<li><p>Version 1.0.2. - Feb 2006</p>
<p>The &quot;Require email confirmation&quot; checkbox now works.  Users are added straight to the frontend users database</p>
<p>Fixed a bug with the confirmation emails having links to the admin section (new bug only).</p>
</li>
<li><p>Version 1.0.3. - Feb 2006</p>
<p>Added the (optional) ability to require the user enter the email address twice</p>
<p>Fixed a bug with the useredited message not being thrown through smarty</p>
<p>Fixed the default registration template a bit to aide in validation for non required fields (fixed a warning)</p>
<p>Fix problems with inline and non-inline forms and links</p>
<p>Handle another case where the admin may not have created the proper type of email property</p>
<p>Changed to require CMS 0.12-beta2 at a minimum (for safety purposes)</p>
</li>
<li><p>Version 1.0.4. - Mar 2006</p>
<p>More control over username and password field sizes (controlled by feusers)</p>
<p>Confirmation on editing preferences</p>
<p>Require 0.12 proper of cms as a minimum</p>
</li>
<li><p>Version 1.1.0. - Dec 2006</p>
    <p>Added events and 1.0 compatibility</p>
    <p>Captcha support (thanks Dittman)</p>
</li>
<li><p>Version 1.1.1. - Apr 2007</p>
    <p>Now require FEUsers 1.2.0 (minimum)</p>
    <p>Support for multiselect lists in feusers</p>
    <p>Output some more fields to smarty to allow for increased accessibility</p>
    <p>Split code out into multiple files to reduce overall memory footprint</p>
    <p>Ignore all image fields</p>
    <p>Change Captcha support to be on by default if the Captcha module is found</p>
</li>
<li><p>Version 1.1.2. - Nov 2007</p>
    <p>Fix the problem with the UserDisplayLostRegEmailForm thing</p>
    <p>Adds the id to the onUserRegistered Event</p>
    <p>Fixes the problem with checkbox properties not working</p>
    <p>Now Requires CMS 1.2 minimum</p>
    <p>You can now use {SelfRegistration group=&#039;blah&#039;}</p>
    <p>Now Requires CMS 1.3 minimum.</p>
</li>
<li><p>Version 1.1.3. - Nov 2007</p>
    <p>Fixes issue with SMTP Email address validation</p>
    <p>Now Require FEU 1.3.1</p>
    <p>Adds the noinline parameter</p>
</li>
<li><p>Version 1.1.4. - Jan 2008</p>
    <p>Splits a few more actions up into seperate files</p>
    <p>Adds preferences and behaviour for pages to redirect to after a user is registered, and/or verified</p>
</li>
<li><p>Version 1.1.5. - Feb 2008</p>
    <p>use =&amp; syntax to all calls to GetModuleInstance()</p>
    <p>Remove cancel buttons from forms (they didn&#039;t work anyways)</p>
</li>
<li><p>Version 1.1.6. - Mar 2008</p>
    <p>License change</p>
    <p>Remove cancel buttons from forms</p>
    <p>Minor bug fixes and cleanups</p>
</li>
<li><p>Version 1.2 - Mar 2008</p>
    <p>Add functionality to allow automatic logging in once verification is complete</p>
    <p>Minor, but important bug fixes.</p>
<li>
</ul>';
$lang['help'] = '<h3>What Does This Do?</h3>
<p>This module is designed to allow front end users to register themselves and fill in the required information.  It then sends a confirmation email, with a link to a second page that must be completed before the registration is complete.  Once registration is complete, a user account is created in the front end users module.</p>
<p>In order to use this module, you must create a property of type &quot;Email Address&quot; in the FrontendUsers module, and associate that property with the group to be used for self registration.</p>
<h3>How Do I Use It</h3>
<p>You place the followng tag into your page {cms_module module=SelfRegistration group=usergroup}</p>
<p>You must have previously created properties and user groups in the FrontEndUsers module in order for this to work properly.</p>
<h3>Parameters</h3>
<p><strong>mode</strong>&nbsp;<em>optional</em> - possible values are &quot;signup&quot; and &quot;verify&quot;.  If this parameter is not specified, &quot;signup&quot; is assumbed.</p>
<p><strong>group</strong>&nbsp;<em>optional</em> - This parameter is required if mode is &quot;signup&quot;, or if mode is left empty.</p>
<p><strong>nocaptcha</strong>&nbsp;<em>optional</em> - This will disable captcha on the signup form. By default, if the Captcha module is installed, captcha support is provided.  This parameter disables it.</p>
<h3>Support</h3>
<p>This module does not include commercial support. However, there are a number of resources available to help you with it:</p>
<ul>
<li>For the latest version of this module, FAQs, or to file a Bug Report or buy commercial support, please visit calguy&#039;s
module homepage at <a href="http://techcom.dyndns.org">techcom.dyndns.org</a>.</li>
<li>Additional discussion of this module may also be found in the <a href="http://forum.cmsmadesimple.org">CMS Made Simple Forums</a>.</li>
<li>The author, calguy1000, can often be found in the <a href="irc://irc.freenode.net/#cms">CMS IRC Channel</a>.</li>
<li>Lastly, you may have some success emailing the author directly.</li>  
</ul>
<p>As per the GPL, this software is provided as-is. Please read the text
of the license for the full disclaimer.</p>

<h3>Copyright and License</h3>
<p>Copyright &copy; 2008, Robert Campbel <a href="mailto:calguy1000@cmsmadesimple.org"><calguy1000@cmsmadesimple.org></a>. All Rights Are Reserved.</p>
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
';
$lang['qca'] = 'P0-397021319-1259924410830';
$lang['utma'] = '156861353.499712353.1260116687.1272125657.1272925371.65';
$lang['utmz'] = '156861353.1272925371.65.49.utmccn=(referral)|utmcsr=forum.cmsmadesimple.org|utmcct=/index.php|utmcmd=referral';
$lang['utmb'] = '156861353';
$lang['utmc'] = '156861353';
?>