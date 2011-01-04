<?php
$lang['info_additionalgroups_matchfields'] = 'When allowing existing users to register to an additional group, you can specify which FEU properties of the existing user must match when the user registers again.  This information will be used to uniquely identify the FEU user account';
$lang['info_cartitem_summary_tpl'] = 'A smarty template that determines the value of the summary that appears with this line item in the cart, and during the checkout process.  If no value is specified a default is used.  Valid smarty variables are {$pkg} <em>(array)</em>.  {$sku}, {$username}, {$tmpuid} <em>(the users temporary user id)</em>. <strong>Note:</strong> some payment gateways may only support a fixed number of characters for the summary.';
$lang['prompt_cartitem_summary_tpl'] = 'Cart Item Summary Template';
$lang['paid_registration'] = 'Paid Registration';
$lang['info_skip_final_msg'] = 'This option determins wether the registration complete message should be displayed to the user after registration.';
$lang['notifications'] = 'Notificazioni';
$lang['info_login_afterverify'] = 'This option will automatically log the visitor into the site after the user has been pushed to the Frontend Users module.  This option has no effect if allowing paid registration';
$lang['info_email_confirmation'] = 'This option sends an email to the registerd user account with a link that allows verifying that the account information entered is valid.<br/><strong>Note:</strong> This option should not be used when allowing paid registrations';
$lang['prompt_registration_settings'] = 'Configurazioni di registrazione';
$lang['none'] = 'Nessuno';
$lang['month'] = 'Mese';
$lang['year'] = 'Anno';
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
$lang['description'] = 'Descrizione';
$lang['edit_paidpkg'] = 'Edit Paid Package &quot;%s&quot;';
$lang['add_paidpkg'] = 'Add Paid Package';
$lang['name'] = 'Nome';
$lang['prompt'] = 'Prompt';
$lang['group'] = 'Gruppo';
$lang['cost'] = 'Costo';
$lang['regpkgs_tab'] = 'Registration Packages';
$lang['prompt_allow_paid_registration'] = 'Require members to pay for registration to your site';
$lang['info_allow_paid_registration'] = 'Please also select Selfregistration as a source module from CGEcommerceBase, and configure the &quot;Paid Registration&quot; Tab.  Additionally, you must enable package selection above.';
$lang['email-password'] = 'Indirizzi Email e Password';
$lang['username-password'] = 'Username e Password';
$lang['help_param_allowoverwrite'] = 'This parameter allows overwriting existing FEU users. In conjunction with the preferences in the SelfRegistration admin panel you can specify what data will be used to uniquely identify a user account&#039;;';
$lang['into_additionalgroups_matchfields'] = 'Specify which fields should be used to uniquely identify a user.  This can be used to allow the user to register when an account already exists for that user with a different username.';
$lang['prompt_additionalgroups_matchfields'] = 'When overwriting an existing account the following fields must match';
$lang['prompt_reg_additionalgroups'] = 'Allow existing users to register for additional groups?';
$lang['prompt_additionalgroups_settings'] = 'Configurazioni dei gruppi addizionali';
$lang['prompt_general_settings'] = 'Configurazioni generali';
$lang['prompt_security_settings'] = 'Configurazioni securezza';
$lang['error_uniquefield'] = 'Il valore specificato per &quot;%s&quot; &egrave; sempre in uso da altro utente registrato';
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
$lang['error_noregister'] = 'Non potete registrarvi per diventare un membrp di questo gruppo';
$lang['prompt_noregister'] = 'Absolutely forbid users to register to these groups';
$lang['error_nosecondemailaddress'] = 'Non avete inserito la Vostra email di conferma';
$lang['push_live'] = 'Inserisce questo user in FEU';
$lang['areyousure_pushuser'] = 'Siete sicuri di voler inserire questo user in FEU senza completare il processo di validazione?';
$lang['delete'] = 'Cancella';
$lang['login_afterverify'] = 'Automaticamente inserisce lo user nel modulo FrontEndUsers dopo che i passi di verifica sono completati';
$lang['skip_final_msg'] = 'Non visualizzare il messaggio finale dopo la registrazione';
$lang['redirect_afterregister'] = 'ID/Alias da redirigere dopo che la registrazione &egrave; completa';
$lang['redirect_afterverify'] = 'ID/Alias da redirigere dopo che il processo di verifica &egrave; completo';
$lang['use_inline_forms'] = 'Usa il form Inline <em>(l&#039;uscita del form riposiziona il modulo tag, non tutto il  content)</em>';
$lang['error_codesdontmatch'] = 'La chiave di validazione non &egrave; valida';
$lang['event_description_onNewUser'] = 'Un evento indica che un nuovo utente ha completato il modulo di registrazione';
$lang['event_description_onUserRegistered'] = 'Un evento indica che un utente ha verificato le sue informazioni e ora &egrave; completamente registrato';
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
</ul>
';
$lang['confirm_submitprefs'] = 'Cambiare le preferenze di amministrazione?';
$lang['info_admin_password'] = 'Lascia questo campo vuoto per preservare la password';
$lang['info_admin_repeatpassword'] = 'Lascia questo campo vuoto per preservare la password';
$lang['error_emaildoesnotmatch'] = 'Indirizzi email non coincidono';
$lang['force_email_twice'] = 'E&#039; richiesto che l&#039;utente introduca l&#039;indirizzo email due volte';
$lang['again'] = 'di nuovo';
$lang['deleteselusers'] = 'Cancella gli utenti selezionati';
$lang['error_nopropdefns'] = 'Nessuna definizione di propriet&agrave;, o un problema a riceverle dal database';
$lang['error_nogroups'] = 'Nessun gruppo, o un problema a ricevere la lista gruppi';
$lang['error_dberror'] = 'Errore nel database';
$lang['title_post_sendanotheremail_template'] = 'Modello per Email persa inserito';
$lang['title_sendanotheremail_template'] = 'Modello per Email persa';
$lang['clickhere'] = 'premendo qua';
$lang['msg_sendanotheremail'] = 'Se avete completato il modulo di registrazione ma non avete ricevuto la email, potete rispedirne un&#039;altra';
$lang['sendanotheremail_template'] = 'Modello per Email persa';
$lang['info_userverified'] = 'Un nuovo utente &egrave; stato aggiunto ai FrontEndUsers';
$lang['edit'] = 'Modifica';
$lang['unknown'] = 'Sconosciuto';
$lang['select'] = 'Seleziona';
$lang['check_all'] = 'Seleziona tutto';
$lang['uncheck_all'] = 'Deseleziona tutto';
$lang['send_adjustmentemail'] = 'Spedisce una email all&#039;utente';
$lang['txt_adjustmentemail'] = '(informa l&#039;utente che l&#039;account &egrave; stato modificato';
$lang['txt_changepassword'] = 'Riempire questi campi per cambiare la password';
$lang['edituser'] = 'Modifica utente';
$lang['areyousure_deleteuser'] = 'Siete sicuro di voler cancellare questo utente registrato parzialmente?';
$lang['hdr_userid'] = 'ID Utente';
$lang['hdr_username'] = 'Username';
$lang['hdr_grpname'] = 'Gruppo';
$lang['hdr_created'] = 'Creato';
$lang['hdr_email'] = 'Email';
$lang['usersfound'] = 'Utenti trovati (limitato ad un massimo di 250)';
$lang['users'] = 'Utenti';
$lang['list1day'] = 'Visualizza tutte le entrate pi&ugrave; vecchie di un giorno';
$lang['subject'] = 'Oggetto per le email in uscita';
$lang['htmlbody'] = 'Corpo del messaggio in HTML';
$lang['textbody'] = 'Corpo del messaggio come testo';
$lang['prompt_numresetrecord'] = 'Un numero di utenti sono nel mezzo della registrazione. In questo momento il contatore &egrave; a:';
$lang['remove1week'] = 'Rimuove tutte le entrate pi&ugrave; vecchie di una settimana';
$lang['remove1month'] = 'Rimuove tutte le entrate pi&ugrave; vecchie di un mese';
$lang['remove1day'] = 'Rimuove tutte le entrate pi&ugrave; vecchie di un giorno';
$lang['removeall'] = 'Rimuove tutte le entrate';
$lang['areyousure'] = 'Siete sicuro?';
$lang['registration_info_edited'] = 'La vostra registrazione &egrave; stata modificata';
$lang['registration_confirmation'] = 'Conferma della registrazione';
$lang['user_registration'] = 'Registrati';
$lang['finalmessage_template'] = 'Modello del messaggio finale';
$lang['title_verifyregistration'] = 'Verifica della registrazione';
$lang['code'] = 'Chiave di validazione';
$lang['default'] = 'Setta ai valori predefiniti';
$lang['error_noproperties'] = 'Nessuna propriet&agrave; per questo utente';
$lang['error_noproprelations'] = 'Nessuna relazione delle propriet&agrave;';
$lang['error_emailinvalid'] = 'Indirizzo email non valido';
$lang['error_noemailaddress'] = 'Nessun campo per un valido indirizzo email &egrave; stato trovato';
$lang['error_requiredfield'] = 'Il campo %s deve essere presente';
$lang['registration1_template'] = 'Modello 1 per la registrazione';
$lang['registration2_template'] = 'Modello 2 per la registrazione';
$lang['emailconfirm_template'] = 'Modello per la conferma da email';
$lang['emailuseredited_template'] = 'Modello per il cambio delle informazioni utente';
$lang['preferences'] = 'Preferenze';
$lang['error_usernotfound'] = 'Utente non trovato';
$lang['error_invalidusername'] = 'Username non valido (troppo lungo, troppo corto o contiene caratteri non validi). Si ricorda che deve contenere solo caratteri alfanumerici senza spazi.';
$lang['error_invalidemail'] = 'Email &egrave; invalida.';
$lang['error_usernametaken'] = 'Questo username &egrave; gi&agrave; in uso';
$lang['error_passwordsdontmatch'] = 'Errore: le password non coincidono';
$lang['error_invalidpassword'] = 'Password invalida (deve essere compresa fra %s e %s caratteri alfanumerici senza spazi)';
$lang['error_emptyusername'] = 'Username non pu&ograve; essere vuoto';
$lang['error_emptyemail'] = 'Email non pu&ograve; essere vuota';
$lang['repeatpassword'] = 'Password (di nuovo)';
$lang['password'] = 'Password';
$lang['username'] = 'Nome utente';
$lang['email'] = 'Email';
$lang['captcha_title'] = 'Inserire il testo dall&#039;immagine';
$lang['error_insufficientparams'] = 'Numero insufficiente (o non corretto) di parametri introdotti al modulo';
$lang['error_nofeusersmodule'] = 'Non posso prendere una istanza del modulo FrontEndUsers';
$lang['error_nosuchgroup'] = 'Il nome gruppo specificato non esiste';
$lang['error_captchamismatch'] = 'Il testo dall&#039;immagine non &egrave; stato inserito correttamente';
$lang['send_emails_to'] = 'La email di registrazione sar&agrave; spedita a';
$lang['require_email_confirmation'] = 'Si richiede che l&#039;utente confermi la registrazione via email';
$lang['notify_on_registration'] = 'Spedisce una email di notifica quando qualcuno si registra';
$lang['cancel'] = 'Cancella';
$lang['submit'] = 'Inoltra';
$lang['friendlyname'] = 'Modulo di Self Registration';
$lang['postinstall'] = 'Installato con successo, si ricordi si settare il permesso per &quot;Modify SelfRegistration Settings&quot;. Se il modulo Captcha &egrave; installato, allora la sua funzionalit&agrave; &egrave; abilitata per default. Incoraggiamo tale installazione poich&egrave; utilizzando il parametro nocaptcha &egrave; possibile disabilitare tale funzionalit&agrave;.';
$lang['postuninstall'] = 'Il modulo Self Registration &egrave; disinstallato.';
$lang['uninstalled'] = 'Modulo disinstallato.';
$lang['installed'] = 'Versione del modulo %s installata.';
$lang['prefsupdated'] = 'Preferenze del modulo aggiornate.';
$lang['accessdenied'] = 'Accesso negato. Si prega di controllare i permessi.';
$lang['error'] = 'Errore!';
$lang['upgraded'] = 'Modulo aggiornato alla versione %s.';
$lang['title_mod_prefs'] = 'Preferenze modulo';
$lang['title_mod_admin'] = 'Pannello di amministrazione del modulo';
$lang['title_admin_panel'] = 'Modulo Self Registration';
$lang['moddescription'] = 'Un modulo che permette agli utenti di auto registrarsi.';
$lang['welcome_text'] = '<p>Benvenuti nel modulo di autoregistrazione.</p>';
$lang['enable_whitelist'] = 'Abilita la Whitelist';
$lang['whitelist'] = 'List of whitelist username/emails. One per line. (use * for wildcards)';
$lang['whitelist_trigger_message'] = 'Message to show if a whitelist rule is triggered';
$lang['dont_use'] = 'Nessuna Whitelist';
$lang['no_matches'] = 'Don&#039;t allow matched username/emails to register';
$lang['only_matches'] = 'Only allow matched username/emails to register';
$lang['help'] = '<h3>What Does This Do?</h3>
<p>This module is designed to allow front end users to register themselves and fill in the required information.  It then sends a confirmation email, with a link to a second page that must be completed before the registration is complete.  Once registration is complete, a user account is created in the front end users module.</p>
<p>In order to use this module, you must create a property of type &quot;Email Address&quot; in the FrontendUsers module, and associate that property with the group to be used for self registration.</p>
<h3>How Do I Use It</h3>
<p>You place the followng tag into your page {cms_module module=SelfRegistration group=usergroup}</p>
<p>You must have previously created properties and user groups in the FrontEndUsers module in order for this to work properly.</p>
<h3>Parameters</h3>
<p><strong>mode</strong> <em>optional</em> - possible values are &quot;signup&quot; and &quot;verify&quot;.  If this parameter is not specified, &quot;signup&quot; is assumbed.</p>
<p><strong>group</strong> <em>optional</em> - This parameter is required if mode is &quot;signup&quot;, or if mode is left empty.</p>
<p><strong>captcha</strong> <em>optional</em> - This will enable captcha on the signup form. The Captcha module must be installed for this parameter to work.</p>
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
Or read it <a href="http://www.gnu.org/licenses/licenses.html#GPL">online</a></p>';
$lang['qca'] = 'P0-250679722-1271187168764';
?>