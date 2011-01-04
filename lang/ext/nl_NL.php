<?php
$lang['prompt_redirect_paidpkg'] = 'Page ID/Alias to redirect to for paid packages';
$lang['info_redirect_paidpkg'] = 'A smarty template that determines the pageid or alias of a page to redirect to for paid packages. Typically a user that is registering for your site may want to go directly to your checkout page, or to the view cart page.';
$lang['info_additionalgroups_matchfields'] = 'When allowing existing users to register to an additional group, you can specify which FEU properties of the existing user must match when the user registers again.  This information will be used to uniquely identify the FEU user account';
$lang['info_cartitem_summary_tpl'] = 'A smarty template that determines the value of the summary that appears with this line item in the cart, and during the checkout process.  If no value is specified a default is used.  Valid smarty variables are {$pkg} <em>(array)</em>.  {$sku}, {$username}, {$tmpuid} <em>(the users temporary user id)</em>. <strong>Note:</strong> some payment gateways may only support a fixed number of characters for the summary.';
$lang['prompt_cartitem_summary_tpl'] = 'Cart Item Summary Template';
$lang['paid_registration'] = 'Paid Registration';
$lang['info_skip_final_msg'] = 'This option determins wether the registration complete message should be displayed to the user after registration.';
$lang['notifications'] = 'Berichten';
$lang['info_login_afterverify'] = 'This option will automatically log the visitor into the site after the user has been pushed to the Frontend Users module.  This option has no effect if allowing paid registration';
$lang['info_email_confirmation'] = 'This option sends an email to the registerd user account with a link that allows verifying that the account information entered is valid.<br/><strong>Note:</strong> This option should not be used when allowing paid registrations';
$lang['prompt_registration_settings'] = 'Registratie Instellingen';
$lang['none'] = 'Geen';
$lang['month'] = 'Maand';
$lang['year'] = 'Jaar';
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
$lang['description'] = 'Omschrijving';
$lang['edit_paidpkg'] = 'Edit Paid Package &quot;%s&quot;';
$lang['add_paidpkg'] = 'Add Paid Package';
$lang['name'] = 'Naam';
$lang['prompt'] = 'Prompt';
$lang['group'] = 'Groep';
$lang['cost'] = 'Kosten';
$lang['regpkgs_tab'] = 'Registration Packages';
$lang['prompt_allow_paid_registration'] = 'Require members to pay for registration to your site';
$lang['info_allow_paid_registration'] = 'Please also select Selfregistration as a source module from CGEcommerceBase, and configure the &quot;Paid Registration&quot; Tab.  Additionally, you must enable package selection above.';
$lang['email-password'] = 'E-mail Adres en Wachtwoord';
$lang['username-password'] = 'Gebruikersnaam en Wachtwoord';
$lang['help_param_allowoverwrite'] = 'This parameter allows overwriting existing FEU users. In conjunction with the preferences in the SelfRegistration admin panel you can specify what data will be used to specify what data will be used to uniquely identify a user account&#039;;';
$lang['into_additionalgroups_matchfields'] = 'Benoem welke velden moeten worden gebruikt om een gebruiker te identificeren als unieke gebruiker. Dit kan gebruikt worden als een gebruiker wil registreren terwijl deze al een account heeft onder een andere gebruikersnaam.';
$lang['prompt_additionalgroups_matchfields'] = 'Wanneer een bestaande account wordt overschreven dan moeten de volgende velden overeenkomen';
$lang['prompt_reg_additionalgroups'] = 'Bestaande gebruikers toestaan om zich te registreren voor extra groepen?';
$lang['prompt_additionalgroups_settings'] = 'Extra Groep Instellingen';
$lang['prompt_general_settings'] = 'Algemene Instellingen';
$lang['prompt_security_settings'] = 'Beveiliging Instellingen';
$lang['error_uniquefield'] = 'De ingevoerde waarde &quot;%s&quot; is al in gebruik door een andere geregistreerde gebruiker';
$lang['help_param_action'] = 'This parameter dictates the behaviour of the module. 
<ul>
  <li><strong>default</strong>
   <p>This is the default action.  Based on the <em>(deprecated></em> mode parameter <em>(see below)</em> it will display either the user registration form, the verify form, or another form.</li>
  </li>
  <li>reguser_link
   <p>Display a link to the user registration form.</p>
  </li>
</ul>';
$lang['help_param_destpage'] = 'Alleen toepasbaar in de  action=reguser_link. Met deze parameter kunt u de doel pagina voor de link instellen (alias of page_id).';
$lang['help_param_group'] = 'Toepasbaar in de action=reguser_link of action=register. Met deze parameter kunt u een groep specificeren waar de gebruiker in geregistreerd zal worden.';
$lang['help_param_onlyhref'] = 'Geldt alleen bij de action=reguser_link. Met deze parameter kunt u instellen dat alleen het url gedeelte van de link weergegeven wordt.';
$lang['help_param_linktext'] = 'Geldt alleen bij de action=reguser_link.  Hiermee kan de linktekst worden opgegeven.  Deze parameter wordt genegeerd als de onlyhref parameter gebruikt is.';
$lang['help_param_noinline'] = 'Toepasbaar voor veel actions. Deze parameter overschrijft de voorkeur in het admin panel en zorgt ervoor dat de output van een gegenereerde link of formulier niet inline wordt getoond. Bijvoorbeeld noinline=1 in combinatie met de default action zal tot gevolg hebben dat de module-output de {content} tag zal vervangen.';
$lang['error_noregister'] = 'U kunt zich niet registreren als lid van deze groep';
$lang['prompt_noregister'] = 'Sta niet toe dat bezoekers zich registreren voor deze groepen';
$lang['error_nosecondemailaddress'] = 'U heeft uw e-mail adres niet twee keer ingevoerd';
$lang['push_live'] = 'Deze gebruiker direct naar FEU';
$lang['areyousure_pushuser'] = 'Weet je zeker dat je deze gebruiker naar FEU wilt duwen zonder het validatie proces te hebben afgerond?';
$lang['delete'] = 'Verwijderen';
$lang['login_afterverify'] = 'Log de gebruiker na de bevestiging stap automatisch aan';
$lang['skip_final_msg'] = 'Laatste bericht niet tonen na registratie';
$lang['redirect_afterregister'] = 'Te openen PageID/Alias na registratie';
$lang['redirect_afterverify'] = 'Te openen PageID/Alias na bevestiging';
$lang['use_inline_forms'] = 'Gebruik &quot;Inline&quot; formulieren <em>(module aanroep wordt vervangen, niet de inhoud)</em>';
$lang['error_codesdontmatch'] = 'De ingevoerde validatiesleutel is ongeldig';
$lang['event_description_onNewUser'] = 'Een tag die wordt aangeroepen als een nieuwe gebruiker het registratieformulier heeft ingevuld';
$lang['event_description_onUserRegistered'] = 'Een tag die wordt aangeroepen als een gebruiker zijn gegevens heeft gevalideerd en nu volledig is geregistreerd.';
$lang['event_help_onNewUser'] = '<p>Een gebeurtenis die wordt aangeroepen als een nieuwe gebruiker het registratieformulier heeft ingevuld</p>
<h4>Parameters</h4>
<ul>
<li><em>username</em> - De geselecteerde gebruikersnaam</li>
<li><em>email</em> - Het geselecteerde emailadres</li>
</ul>
';
$lang['event_help_onUserRegistered'] = '<p>Een gebeurtenis die wordt aangeroepen als een gebruiker zijn gegevens heeft gevalideerd en nu volledig is geregistreerd.</p>
<h4>Parameters</h4>
<ul>
<li><em>username</em> - De geregistreerde gebruikersnaam</li>
<li><em>id</em> - De nieuwe gebruikers uid</li>
</ul>
';
$lang['confirm_submitprefs'] = 'Wijzig beheersvoorkeuren?';
$lang['info_admin_password'] = 'Laat dit veld leeg om het gebruikerswachtwoord te behouden';
$lang['info_admin_repeatpassword'] = 'Laat dit veld leeg om het gebruikerswachtwoord te behouden';
$lang['error_emaildoesnotmatch'] = 'E-mailadressen komen niet overeen';
$lang['force_email_twice'] = 'Verplicht gebruikers om hun emailadres twee maal in te voeren';
$lang['again'] = 'opnieuw';
$lang['deleteselusers'] = 'Verwijder geselecteerde gebruikers';
$lang['error_nopropdefns'] = 'Geen eigenschapsdefinitie of een probleem om deze uit de database te halen';
$lang['error_nogroups'] = 'Geen groepen of een probleem met het ophalen van de groepenlijst';
$lang['error_dberror'] = 'Database-fout';
$lang['title_post_sendanotheremail_template'] = 'Post verloren e-mailsjabloon';
$lang['title_sendanotheremail_template'] = 'Verloren e-mailsjabloon';
$lang['clickhere'] = 'Klik hier';
$lang['msg_sendanotheremail'] = 'Ik heb het registratieformulier al ingevuld, maar heb nog geen email ontvangen. Kunt u het opnieuw versturen?';
$lang['sendanotheremail_template'] = 'Verloren e-mailsjabloon';
$lang['info_userverified'] = 'Een nieuwe gebruiker is toegevoegd aan FrontEndUsers';
$lang['edit'] = 'Bewerk';
$lang['unknown'] = 'Onbekend';
$lang['select'] = 'Selecteer';
$lang['check_all'] = 'Selecteer alles';
$lang['uncheck_all'] = 'Deselecteer alles';
$lang['send_adjustmentemail'] = 'Stuur een e-mail naar de gebruiker';
$lang['txt_adjustmentemail'] = '(informeert de gebruiker dat zijn account is aangepast';
$lang['txt_changepassword'] = 'Vul deze velden in om het gebruikerswachtwoord te veranderen';
$lang['edituser'] = 'Bewerk gebruiker';
$lang['areyousure_deleteuser'] = 'Weet u zeker dat deze, deels geregistreerde gebruiker, verwijderd moet worden?';
$lang['hdr_userid'] = 'Gebruikers-ID';
$lang['hdr_username'] = 'Gebruikersnaam';
$lang['hdr_grpname'] = 'Groep';
$lang['hdr_created'] = 'Aangemaakt';
$lang['hdr_email'] = 'E-mail';
$lang['usersfound'] = 'gebruiker(s) gevonden (beperkt tot maximaal 250)';
$lang['users'] = 'Gebruikers';
$lang['list1day'] = 'Toon alle invoer van meer dan &eacute;&eacute;n dag oud';
$lang['subject'] = 'Onderwerp van uitgaande e-mail';
$lang['htmlbody'] = 'HTML tekst van de e-mail';
$lang['textbody'] = 'Platte tekst van de e-mail';
$lang['prompt_numresetrecord'] = 'Een aantal gebruikers is zich aan het registreren. Dit zijn er nu:';
$lang['remove1week'] = 'Verwijder alle invoer van meer dan een week oud';
$lang['remove1month'] = 'Verwijder alle invoer van meer dan een maand oud';
$lang['remove1day'] = 'Verwijder alle invoer van meer dan een dag oud';
$lang['removeall'] = 'Verwijder alle invoer';
$lang['areyousure'] = 'Weet u het zeker?';
$lang['registration_info_edited'] = 'Uw registratie informatie is aangepast';
$lang['registration_confirmation'] = 'Registratiebevestiging';
$lang['user_registration'] = 'Registreer';
$lang['finalmessage_template'] = 'Afrondingsboodschapsjabloon';
$lang['title_verifyregistration'] = 'Verifieer registratie';
$lang['code'] = 'Validatiesleutel';
$lang['default'] = 'Activeer standaardwaarden';
$lang['error_noproperties'] = 'Geen eigenschappen voor deze gebruiker gevonden';
$lang['error_noproprelations'] = 'Geen eigenschapsrelaties';
$lang['error_emailinvalid'] = 'Ongeldig e-mailadres';
$lang['error_noemailaddress'] = 'Geen geldig e-mailadresveld gevonden';
$lang['error_requiredfield'] = 'Veld %s moet ingevuld zijn';
$lang['registration1_template'] = 'Registratiesjabloon 1';
$lang['registration2_template'] = 'Registratiesjabloon 2';
$lang['emailconfirm_template'] = 'Bevestigingse-mail-sjabloon';
$lang['emailuseredited_template'] = 'Gebruikersinfo-sjabloon';
$lang['preferences'] = 'Voorkeuren';
$lang['error_usernotfound'] = 'Gebruiker niet gevonden';
$lang['error_invalidusername'] = 'Gebruikersnaam is ongeldig (te lang, te kort of ongeldige karakters). Tip: gebruikersnamen mogen alleen alfanumerieke karakters en geen spaties bevatten';
$lang['error_invalidemail'] = 'E-mail is niet geldig';
$lang['error_usernametaken'] = 'De gebruikersnaam is al in gebruik';
$lang['error_passwordsdontmatch'] = 'Fout: Wachtwoorden komen niet overeen';
$lang['error_invalidpassword'] = 'Wachtwoord is fout (wachtwoorden moeten tussen de %s en %s karakters lang zijn)';
$lang['error_emptyusername'] = 'Gebruikersnaam kan niet leeg zijn';
$lang['error_emptyemail'] = 'E-mail moet ingevuld worden';
$lang['repeatpassword'] = 'Wachtwoord (opnieuw)';
$lang['password'] = 'Wachtwoord';
$lang['username'] = 'Gebruikersnaam';
$lang['email'] = 'E-mail';
$lang['captcha_title'] = 'Voer de tekst uit het plaatje in';
$lang['error_insufficientparams'] = 'Onvoldoende (of incorrecte) parameters opgegeven aan de module';
$lang['error_nofeusersmodule'] = 'Kon geen verbinding met de FrontEndUsers-module krijgen';
$lang['error_nosuchgroup'] = 'Opgegevens groepsnaam bestaat niet';
$lang['error_captchamismatch'] = 'De tekst uit het plaatje is niet goed ingevoerd';
$lang['send_emails_to'] = 'Registratie e-mail moet verstuurd worden aan';
$lang['require_email_confirmation'] = 'Verplicht de gebruiker om de registratie te bevestigen via e-mail';
$lang['notify_on_registration'] = 'Stuur een e-mailbevestiging als iemand zich registreert';
$lang['cancel'] = 'Annuleer';
$lang['submit'] = 'Verstuur';
$lang['friendlyname'] = 'Self Registration-module';
$lang['postinstall'] = 'De installatie is afgerond. Vergeet niet om de rechten van &quot;Modify SelfRegistration Settings&quot; in te stellen. Als de Captcha module ge&iuml;nstalleerd is, dan staat deze functionaliteit standaard aan. We raden u sterk aan om deze module te installeren. Als de Captcha module ge&iuml;nstalleerd is en u wilt deze uitschakelen, gebruik dan de nocaptcha parameter in de selfregistration tag';
$lang['postuninstall'] = 'De Self Registration-module is ge&iuml;nstalleerd';
$lang['uninstalled'] = 'Module gedeinstalleerd';
$lang['installed'] = 'Moduleversie %s ge&iuml;nstalleerd.';
$lang['prefsupdated'] = 'Modulevoorkeuren ge&uuml;pdate.';
$lang['accessdenied'] = 'Toegang geweigerd. Controleer uw rechten.';
$lang['error'] = 'Fout!';
$lang['upgraded'] = 'Module opgewaardeerd naar versie %s.';
$lang['title_mod_prefs'] = 'Modulevoorkeuren';
$lang['title_mod_admin'] = 'Modulebeheerpaneel';
$lang['title_admin_panel'] = 'Self Registration-module';
$lang['moddescription'] = 'Een module die het FrontEnd gebruikers mogelijk maakt zichzelf te registreren.';
$lang['welcome_text'] = '<p>Welkom bij de Self Registration-module.</p>';
$lang['enable_whitelist'] = 'Activeer Whitelist';
$lang['whitelist'] = 'Lijst met whitelist gebruikersnaam/email. E&eacute;n per regel. (gebruik * voor wildcards)';
$lang['whitelist_trigger_message'] = 'Bericht om weer te geven of een whitelist regel is uitgevoerd';
$lang['dont_use'] = 'Geen Whitelist';
$lang['no_matches'] = 'Sta niet toe dat overeenkomende gebruikersnaam/e-mail zich registreren';
$lang['only_matches'] = 'Laat alleen overeenkomende gebruikersnaam/e-mail zich registreren';
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
<p>Copyright &amp;copy; 2008, Robert Campbel <a href="mailto:calguy1000@cmsmadesimple.org">&amp;lt;calguy1000@cmsmadesimple.org&amp;gt;</a>. All Rights Are Reserved.</p>
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
</ul>';
$lang['utma'] = '156861353.1738896039.1278840000.1284305541.1284310044.441';
$lang['utmz'] = '156861353.1284226324.433.76.utmccn=(referral)|utmcsr=forum.cmsmadesimple.org|utmcct=/index.php/topic,47241.msg225414/topicseen.html|utmcmd=referral';
$lang['qca'] = 'P0-854387043-1278840000917';
$lang['utmc'] = '156861353';
$lang['utmb'] = '156861353';
?>