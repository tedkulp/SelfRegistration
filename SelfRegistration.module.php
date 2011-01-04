<?php
#BEGIN_LICENSE
#-------------------------------------------------------------------------
# Module: SelfRegistration (c) 2008 by Robert Campbell 
#         (calguy1000@cmsmadesimple.org)
#  An addon module for CMS Made Simple to allow users to register themselves
#  with a website.
# 
# Version: 1.2
#
#-------------------------------------------------------------------------
# CMS - CMS Made Simple is (c) 2005 by Ted Kulp (wishy@cmsmadesimple.org)
# This project's homepage is: http://www.cmsmadesimple.org
#
#-------------------------------------------------------------------------
#
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
#
# However, as a special exception to the GPL, this software is distributed
# as an addon module to CMS Made Simple.  You may not use this software
# in any Non GPL version of CMS Made simple, or in any version of CMS
# Made simple that does not indicate clearly and obviously in its admin 
# section that the site was built with CMS Made simple.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
# Or read it online: http://www.gnu.org/licenses/licenses.html#GPL
#
#-------------------------------------------------------------------------
#END_LICENSE

$cgextensions = cms_join_path($gCms->config['root_path'],'modules',
			      'CGExtensions','CGExtensions.module.php');
if( !is_readable( $cgextensions ) )
{
  echo '<h1><font color="red">ERROR: The CGExtensions module could not be found.</font></h1>';
  return;
}
require_once($cgextensions);

require_once(dirname(__FILE__)."/functions.php" );

#-------------------------------------------------------------------------
class SelfRegistration extends CGExtensions
{
  /*---------------------------------------------------------
   The default template used for the first registration form
   ---------------------------------------------------------*/
  var $dflt_registration1_template = '
<!-- Registration 1 template -->
{$title}
{if isset($message) && $message != \'\'}
  {if isset($error) && $error != \'\'}
    <p><font color="red">{$message}</font></p>
  {else}
    <p>{$message}</p>
  {/if}
{/if}
{$startform}
{if $controlcount > 0}
  <center>
  <table width="75%">
{foreach from=$controls item=control}
  <tr>
    <td>{$control->hidden}
    {if $control->color != \'\'}
      <font color="{$control->color}">{$control->prompt}{$control->marker}</font>
    {else}
      {$control->prompt}{$control->marker}
    {/if}
    </td>
    <td>{$control->control}</td>
  </tr>
{/foreach}
  </table>
  </center>
<br/>
{/if}
{if isset($captcha)}
{$captcha_title}: {$input_captcha}<br />
  {$captcha}<br />
{/if}
 {$hidden}{if isset($hidden2)}{$hidden2}{/if}{$submit}<br/>
{$msg_sendanotheremail}&nbsp;{$link_sendanotheremail}
{$endform}
<!-- Registration 1 template -->
 ';

  var $dflt_postreg1_template = '
<!-- Post Registration 1 template -->
{$title}
{if isset($messasge) && $message != \'\'}
  {if isset($error) && $error != \'\'}
    <p><font color="red">{$message}</font></p>
  {else}
    <p>{$message}</p>
  {/if}
{/if}
<p>Thank you {$username} for registering with {$sitename}.  An email has been sent to {$email} with instructions on how to continue the registration process</p>
<!-- Post Registration 1 template -->
';

  var $dflt_registration2_template = '
<!-- Registration 1 template -->
{$title}
{if isset($messsage) && $message != \'\'}
  {if isset($error) && $error != \'\'}
    <p><font color="red">{$message}</font></p>
  {else}
    <p>{$message}</p>
  {/if}
{/if}
{$startform}
  <center>
  <table width="75%">
  <tr>
    <td>{$prompt_username}</font>
    </td>
    <td>{$input_username}</td>
  </tr>
  <tr>
    <td>{$prompt_password}</font>
    </td>
    <td>{$input_password}</td>
  </tr>
  <tr>
    <td>{$prompt_code}</font>
    </td>
    <td>{$input_code}</td>
  </tr>
  </table>
  </center>
<br/>
 {$hidden}{$hidden2}{$submit}
{$endform}
<!-- Registration 2 template -->
 ';  

  var $dflt_emailconfirm_template = '
<!-- EmailConfirm template -->
<html>
<body>
<p>Greetings {$name} welcome to the site.  This email is being sent because somebody registered for access to {$sitename} using this email address. If this was you, please click on the following link and enter your username, password, and the unique code below</p>
   <p>Follow this link: {$link}</p>
   <p>or this link: {$smalllink}</p>
   <p>Code: {$code}</p>
</body>
</html>
<!-- EmailConfirm template -->
';

  var $dflt_emailconfirm_texttemplate = '
Greetings {$name} welcome to the site.  This email is being sent because somebody registered for access to {$sitename} using this email address. If this was you, please click on the following link and enter your username, password, and the unique code below.

Follow this link: {$url}
or this link: {$smallurl}</p>
Code: {$code}
';

  var $dflt_emailuseredited_template = '
<!-- EmailUserEdited template -->
<html>
<body>
<p>Greetings {$name} welcome to the site.  This email is being sent because, although you have already registered with {$sitename}, there was an error in your input.  The administrator has done his best to correct this data, and you are now being sent an updated registration form. Please click on the following link and enter your username, password, and the unique code below</p>
   <p>Follow this link: {$link}</p>
   <p>or this link: {$smalllink}</p>
   <p>Password: {$password}</p>
   <p>Code: {$code}</p>
</body>
</html>
<!-- EmailUserEdited template -->
';

  var $dflt_emailuseredited_texttemplate = '
Greetings {$name} welcome to the site.  This email is being sent because, although you have already registered with {$sitename}, there was an error in your input.  The administrator has done his best to correct this data, and you are now being sent an updated registration form. Please click on the following link and enter your username, password, and the unique code below
   Follow this link: {$url}
     or this link: {$smallurl}</p>
   Password: {$password}
   Code: {$code}
';

  var $dflt_finalmessage_template = '
<!-- FinalMessage Template -->
<p>Welcome {$username} to {$sitename}.  Your registration is complete.  Please login to continue</p>
<!-- FinalMessage Template -->
  ';

  var $dflt_sendanotheremail_template = '
<!-- SendAnotherEmail Template -->
{$title}
{if isset($message) && $message != \'\'}
  {if isset($message) && $error != \'\'}
    <p><font color="red">{$message}</font></p>
  {else}
    <p>{$message}</p>
  {/if}
{/if}
<p>I didn\'t receive my confirmation email, please send another one.</p>
<p>My Username is: {$startform}{$input_username}&nbsp;{$submit}{$endform}</p>
<!-- SendAnotherEmail Template -->
  ';

  var $dflt_post_sendanotheremail_template = '
<!-- Post SendAnotherEmail template -->
{$title}
{if isset($message) && $message != \'\'}
  {if isset($error) && $error != \'\'}
    <p><font color="red">{$message}</font></p>
  {else}
    <p>{$message}</p>
  {/if}
{/if}
<p>Thank you {$username} for registering with {$sitename}.  We are sorry you had difficulty receiving your email.  A second email has been sent to {$email} with instructions on how to continue the registration process</p>
<!-- Post SendAnotherEmail template -->
';


  /*---------------------------------------------------------
   GetName()
   ---------------------------------------------------------*/
  function GetName()
  {
    return 'SelfRegistration';
  }


  /*---------------------------------------------------------
   GetFriendlyName()
   ---------------------------------------------------------*/
  function GetFriendlyName()
  {
    return $this->Lang('friendlyname');
  }

	
  /*---------------------------------------------------------
   MinimumCMSVersion()
   ---------------------------------------------------------*/
  function MinimumCMSVersion()
  {
    return "1.8.1";
  }

  
  /*---------------------------------------------------------
   GetVersion()
   ---------------------------------------------------------*/
  function GetVersion()
  {
    return '1.6.7';
  }


  /*---------------------------------------------------------
   GetHelp()
   ---------------------------------------------------------*/
  function GetHelp()
  {
    return $this->Lang('help');
  }

  
  /*---------------------------------------------------------
   GetAuthor()
   ---------------------------------------------------------*/
  function GetAuthor()
  {
    return 'Calguy1000';
  }


  /*---------------------------------------------------------
   GetAuthorEmail()
   ---------------------------------------------------------*/
  function GetAuthorEmail()
  {
    return 'calguy1000@hotmail.com';
  }

  
  /*---------------------------------------------------------
   GetChangeLog()
   ---------------------------------------------------------*/
  function GetChangeLog()
  {
    return file_get_contents(dirname(__FILE__).'/changelog.inc');
  }

  
  /*---------------------------------------------------------
   IsPluginModule()
   ---------------------------------------------------------*/
  function IsPluginModule()
  {
    return true;
  }


  /*---------------------------------------------------------
   HasAdmin()
   This function returns a boolean value, depending on
   whether your module adds anything to the Admin area of
   the site. For the rest of these comments, I'll be calling
   the admin part of your module the "Admin Panel" for
   want of a better term.
   ---------------------------------------------------------*/
  function HasAdmin()
  {
    return true;
  }


  /*---------------------------------------------------------
   GetAdminSection()
   ---------------------------------------------------------*/
  function GetAdminSection()
  {
    return 'usersgroups';
  }


  /*---------------------------------------------------------
   GetEventDescription()
   ---------------------------------------------------------*/
  function GetEventDescription( $eventname )
  {
    return $this->Lang('event_description_'.$eventname );
  }


  /*---------------------------------------------------------
   GetEventDescription()
   ---------------------------------------------------------*/
  function GetEventHelp( $eventname )
  {
    return $this->Lang('event_help_'.$eventname );
  }


  /*---------------------------------------------------------
   GetAdminDescription()
   ---------------------------------------------------------*/
  function GetAdminDescription()
  {
    return $this->Lang('moddescription');
  }
  

  /*---------------------------------------------------------
   VisibleToAdminUser()
   ---------------------------------------------------------*/
  function VisibleToAdminUser()
  {
    $status = $this->CheckPermission('Manage Registering Users')
      || $this->CheckPermission('Modify Site Preferences')
      || $this->CheckPermission('Modify Templates');
    return $status;
  }


  /*---------------------------------------------------------
   GetDependencies()
   ---------------------------------------------------------*/
  function GetDependencies()
  {
    return array( 'CMSMailer' => '1.73.9',
		  'CGExtensions' => '1.21',
		  'FrontEndUsers' => '1.12.5' );
  }
  

  /*---------------------------------------------------------
   HandlesEvents()
   ---------------------------------------------------------*/
  function HandlesEvents()
  {
    return $this->GetPreference('allowpaidregistration',0);
  }

  /*---------------------------------------------------------
   SetParameters()
   ---------------------------------------------------------*/
  function SetParameters()
  {
    $this->RegisterModulePlugin();
    //$this->RestrictUnknownParams();
    $this->SetParameterType('mode',CLEAN_STRING);
    $this->SetParameterType('nocaptcha',CLEAN_INT);
    $this->SetParameterType('group',CLEAN_STRING);
    $this->SetParameterType('noinline',CLEAN_INT);
    $this->SetParameterType('input_username',CLEAN_STRING);
    $this->SetParameterType('input_code',CLEAN_STRING);
    $this->SetParameterType('input_group_id',CLEAN_INT);

    $this->CreateParameter('action','default',$this->Lang('help_param_action'));
    $this->CreateParameter('destpage','',$this->Lang('help_param_destpage'));
    $this->CreateParameter('group','',$this->Lang('help_param_group'));
    $this->CreateParameter('onlyhref','',$this->Lang('help_param_onlyhref'));
    $this->CreateParameter('linktext','',$this->Lang('help_param_linktext'));
    $this->CreateParameter('noinline','',$this->Lang('help_param_noinline'));

    $this->SetParameterType('destpage',CLEAN_STRING);
    $this->SetParameterType('group',CLEAN_STRING);
    $this->SetParameterType('onlyhref',CLEAN_INT);
    $this->SetParameterType('linktext',CLEAN_STRING);
    $this->SetParameterType('noinline',CLEAN_INT);

    $this->SetParameterType('allowoverwrite',CLEAN_INT);
    $this->CreateParameter('allowoverwrite','',$this->Lang('help_param_allowoverwrite'));

    $this->RegisterRoute('/[Ss]elfreg\/register\/(?P<destpage>[0-9]+)\/(?P<group>.*)$/',
			 array('action'=>'default','mode'=>'signup'));
    $this->RegisterRoute('/[Ss]elfreg\/confirm\/(?P<returnid>[0-9]+)\/(?P<input_code>.*?)\/(?P<input_group_id>.*?)\/(?P<input_username>.*?)$/',
			 array('action'=>'default','mode'=>'verify'));
    $this->RegisterRoute('/[Ss]elfreg\/confirm\/(?P<returnid>[0-9]+)\/(?P<input_code>.*?)$/',
			 array('action'=>'default','mode'=>'verify'));
			 
  }


  /*---------------------------------------------------------
   InstallPostMessage()
   ---------------------------------------------------------*/
  function InstallPostMessage()
  {
    // permissions
    return $this->Lang('postinstall');

  }


  /*---------------------------------------------------------
   UninstallPostMessage()
   ---------------------------------------------------------*/
  function UninstallPostMessage()
  {
    return $this->Lang('postuninstall');
  }


  function myGetPageName( $aliasorid )
  {
    $obj = ContentManager::LoadPageFromAlias( $aliasorid );
    return $obj->Name();
  }


  // deprecated
  function myRedirectToTab( $id, $tab, $params = '' )
  {
    $parms = array();
    if( is_array( $params ) )
      {
	$parms = $params;
      }
    unset( $parms['hidden_password'] );
    unset( $parms['hidden_repeatpassword'] );
    unset( $parms['input_password'] );
    unset( $parms['input_repeatpassword'] );
    unset( $parms['password'] );
    unset( $parms['repeatpassword'] );
    unset( $parms['action'] );
    $this->RedirectToTab($id,$tab,$parms);
  }


  function myRedirect( $id, $action, $returnid, $params = '' )
  {
    // unset any password things 
    unset( $params['hidden_password'] );
    unset( $params['hidden_repeatpassword'] );
    unset( $params['input_password'] );
    unset( $params['input_repeatpassword'] );
    unset( $params['password'] );
    unset( $params['repeatpassword'] );
    unset( $params['action'] );
    return $this->DoAction($action, $id, $params, $returnid);
  }


  /*---------------------------------------------------------
   DoAction($action, $id, $params, $return_id)
   ---------------------------------------------------------*/
  function DoAction($action, $id, $params, $returnid=-1)
  {
    global $gCms;
    $smarty =& $gCms->GetSmarty();
    $smarty->assign('selfregactionid',$id);
    $smarty->assign('selfregparams',$params);
    $smarty->assign('mod',$this);
    $smarty->assign($this->GetName(),$this);

    switch ($action)
      {
      case 'deletetempuser':
	{
	  if( $this->CheckPermission('Manage Registering Users' ) )
	    {
	      $this->_DoDeleteUser( $id, $params, $returnid );
	    }
	  else
	    {
	      $this->_DisplayErrorPage($id, $params, $returnid, 
				       $this->Lang('accessdenied'));
	    }
	  break;
	}
      case 'do_deleteusersbulk':
	{
	  if( $this->CheckPermission('Manage Registering Users' ) )
	    {
	      $this->_DoDeleteBulkUsers( $id, $params, $returnid );
	    }
	  else
	    {
	      $this->_DisplayErrorPage($id, $params, $returnid, 
				       $this->Lang('accessdenied'));
	    }
	  break;
	}
      case 'sendanotheremail':
	{
	  $this->_SendAnotherRegEmail($id, $params, $returnid );
	  break;
	}
      case 'set_reg1template':
	{
	  if( $this->CheckPermission( 'Modify Templates' ) )
	    {
	      $this->_SetAdminReg1Template( $id, $params, $returnid );
	    }
	  else
	    {
	      $this->_DisplayErrorPage($id, $params, $returnid, 
				       $this->Lang('accessdenied'));
	    }
	  break;
	}
      case 'set_reg2template':
	{
	  if( $this->CheckPermission( 'Modify Templates' ) )
	    {
	      $this->_SetAdminReg2Template( $id, $params, $returnid );
	    }
	  else
	    {
	      $this->_DisplayErrorPage($id, $params, $returnid, 
				       $this->Lang('accessdenied'));
	    }
	  break;
	}
      case 'set_emailconfirm_template':
	{
	  if( $this->CheckPermission( 'Modify Templates' ) )
	    {
	      $this->_SetAdminEmailConfirmTemplate( $id, $params, $returnid );
	    }
	  else
	    {
	      $this->_DisplayErrorPage($id, $params, $returnid, 
				       $this->Lang('accessdenied'));
	    }
	  break;
	}
      case 'set_emailuseredited_template':
	{
	  if( $this->CheckPermission( 'Modify Templates' ) )
	    {
	      $this->_SetAdminEmailUserEditedTemplate( $id, $params, $returnid );
	    }
	  else
	    {
	      $this->_DisplayErrorPage($id, $params, $returnid, 
				       $this->Lang('accessdenied'));
	    }
	  break;
	}
      case 'set_finalmessage_template':
	{
	  if( $this->CheckPermission( 'Modify Templates' ) )
	    {
	      $this->_SetAdminFinalMessageTemplate( $id, $params, $returnid );
	    }
	  else
	    {
	      $this->_DisplayErrorPage($id, $params, $returnid, 
				       $this->Lang('accessdenied'));
	    }
	  break;
	}
      case 'set_sendanotheremail_template':
	{
	  if( $this->CheckPermission( 'Modify Templates' ) )
	    {
	      $this->_SetAdminSendAnotherEmailTemplate( $id, $params, $returnid );
	    }
	  else
	    {
	      $this->_DisplayErrorPage($id, $params, $returnid, 
				       $this->Lang('accessdenied'));
	    }
	  break;
	}

//       case 'default':
//       case 'defaultadmin':
//       case 'do_edituser':
//       case 'edittempuser':
//       case 'reguser':
//       case 'setprefs':
//       case 'verifyuser':
      default:
	{
	  return parent::DoAction($action, $id, $params, $returnid );
	  break;
	}
      }
  }


  /*---------------------------------------------------------
   _CreateFrontendUser($id, $params, $return_id )
   NOT PART OF THE MODULE API
   ---------------------------------------------------------*/
  function _CreateFrontendUser( $tmpid, $group_id, $username, $password, $expires = '', $do_md5 = true )
  {
    global $gCms;
    $db = $gCms->GetDb(); 
    $feusers =& $this->GetModuleInstance('FrontEndUsers');
    if( !$feusers )
      {
	return array(FALSE,$this->Lang('error_nofeusersmodule'));
      }

    $query = 'SELECT * FROM '.cms_db_prefix().'module_selfreg_users
               WHERE id = ?';
    $row = $db->GetRow($query,array($tmpid));
    if( !$row )
      {
	return array(FALSE,$this->Lang('error_usernotfound'));
      }

    if( $expires == '' )
      {
	$timeperiod = $feusers->GetPreference('expireage_months',120);
	$expires = strtotime("+{$timeperiod} months",time());
      }
    if( $row['overwrite_uid'] )
      {
	// we're overwriting a user account
	$result = $feusers->SetUser( $row['overwrite_uid'], $username, 
				     $password, $expires, $do_md5 );
	if( $result[0] == false )
	  {
	    return array(FALSE,$result[1]);
	  }
      }
    else
      {
	$result = $feusers->AddUser( $username, $password, $expires, $do_md5 );
	if( $result[0] == false )
	  {
	    return array(FALSE,$result[1]);
	  }
      }

    $uid = $result[1];
    $feusers->SetEncryptionKey($uid,1);
    $gid = $this->GetPreference('default_group', -1);
    if( $gid != -1 )
      {
	// a default group is required,
	// so add him to that group
	if( !$feusers->AssignUserToGroup( $uid, $gid ) )
	  {
	    return array(FALSE,$this->Lang('warning_couldnotaddgroup'));
	  }
      }
    
    // and add the user to whatever group specified in the groups parameter
    if( $group_id )
      {
	if( !$feusers->AssignUserToGroup( $uid, $group_id ) )
	  {
	    return array(FALSE,$this->Lang('warning_couldnotaddgroup'));
	  }
      }    
    
    // he's in.... he's in... now just add his properties
    $q = "SELECT * FROM ".cms_db_prefix()."module_selfreg_properties
          WHERE user = ?";
    $dbresult = $db->Execute( $q, array( $tmpid ) );
    if( !$dbresult )
      {
	return array(FALSE,$this->Lang('error_dberror'));
      }
    while( $row = $dbresult->FetchRow() )
      {
	$feusers->SetUserPropertyFull( $row['title'], $row['data'], $uid );
      }

    // send an event
    $this->SendEvent('onUserRegistered',
		     array('username'=>$username,
			   'id'=>$uid));

    // and notify the administrator
    // if the admin wants notifications.
    // off we go.
    if( $this->GetPreference('notify_on_registration') )
      {
	
	$cmsmailer =& $this->GetModuleInstance('CMSMailer');
	if( !$cmsmailer )
	  {
	    return array(FALSE,$this->Lang('error_nocmsmailermodule'));
	  }
	
	$cmsmailer->AddAddress($this->GetPreference('send_emails_to'));
	$cmsmailer->SetSubject('A new user has registered on '.$gCms->config['root_url']);
	$msg = 'A new user ('.$username.' with uid '.$uid.') has completed registration to your site. you should check this user out and validate that the information provided is as complete and valid as possible.';
	$cmsmailer->SetBody($msg);  
	$cmsmailer->IsHTML(false); // we're not sending an html mail
	$cmsmailer->Send();
      }

    $this->Audit( 0, $this->Lang('friendlyname'), 
		  $this->Lang('info_userverified').": ".$username);
    return array(TRUE,$uid);
  }




  /*---------------------------------------------------------
   DisplayErrorPage($id, $params, $return_id, $message)
   NOT PART OF THE MODULE API
   ---------------------------------------------------------*/
  function _DisplayErrorPage($id, &$params, $returnid, $message='')
  {
    $this->smarty->assign('title_error', $this->Lang('error'));
    if ($message != '')
      {
	$this->smarty->assign('message', $message);
      }
    
    // Display the populated template
    echo $this->ProcessTemplate('error.tpl');
  }


  /*---------------------------------------------------------
   _DoDeleteBulkUsers($id, $params, $return_id)
   NOT PART OF THE MODULE API
   ---------------------------------------------------------*/
  function _DoDeleteBulkUsers( $id, &$params, $returnid )
  {
    foreach( $params as $key => $value )
      {
	if( $key == 'markdelete_'.$value )
	  {
	    $this->DeleteTempUserProperties( $value );
	    $this->DeleteTempUser( $value ); 
	  }
      }
    $this->myRedirectToTab($id,'adminusers');
  }


  /*---------------------------------------------------------
   _DoDeleteUser($id, $params, $return_id, $message)
   NOT PART OF THE MODULE API
   ---------------------------------------------------------*/
  function _DoDeleteUser( $id, &$params, $returnid )
  {
    if( !isset( $params['user_id'] ) )
      {
	// this is ugly for the user to see
	// but at least the admin will be able to figure it out
	$this->_DisplayErrorPage( $id, $params, $returnid,
				  $this->Lang('error_insufficientparams'));
	return;
      }

    $id = $params['user_id'];
    $this->DeleteTempUserProperties( $id );
    $this->DeleteTempUser( $id ); 
    $this->myRedirectToTab('','adminusers');
  }


  /*---------------------------------------------------------
   SendAnotherEmail($id, $params, $return_id, $message)
   NOT PART OF THE MODULE API
   ---------------------------------------------------------*/
  function _SendAnotherRegEmail( $id, &$params, $returnid )
  {
    // we have the username (theoretically) in the $params
    if( !isset( $params['input_username'] ) )
      {
	$parms['mode'] = 'sendanotheremail';
	$parms['error'] = 1;
	$parms['message'] = $this->Lang('error_insufficientparams');
	$parms['mode'] = 'sendanotheremail';
	$this->myRedirect( $id, 'default', $returnid, $parms );
	return;
      }
    $username = $params['input_username'];

    // look up the username and get an id
    $tempuserid = $this->GetTempUserID( $username );
    if( !$tempuserid )
      {
	$parms['error'] = 1;
	$parms['message'] = $this->Lang('error_usernotfound');
	$parms['mode'] = 'sendanotheremail';
	$this->myRedirect( $id, 'default', $returnid, $parms );
	return; 
      }

    // and whatever details we can from the users table
    $details = $this->GetTempUserDetails( $tempuserid );
    if( $details == false )
      {
	$parms['error'] = 1;
	$parms['message'] = $this->Lang('error_usernotfound');
	$parms['mode'] = 'sendanotheremail';
	$this->myRedirect( $id, 'default', $returnid, $parms );
	return; 
      }

    $email = '';
    if( is_email($username) )
      {
	$email = $username;
      }
    else
      {
	// now get properties
	$tempuserprops = $this->GetTempUserProperties( $tempuserid );
	if( $tempuserprops == false )
	  {
	    $parms['error'] = 1;
	    $parms['message'] = $this->Lang('error_noproperties');
	    $parms['mode'] = 'sendanotheremail';
	    $this->myRedirect( $id, 'default', $returnid, $parms );
	    return; 
	  }

	$feusers =& $this->GetModuleInstance('FrontEndUsers');
	if( !$feusers )
	  {
	    $parms['error'] = 1;
	    $parms['message'] = $this->Lang('error_nofeusersmodule');
	    $parms['mode'] = 'sendanotheremail';
	    $this->myRedirect( $id, 'default', $returnid, $parms );
	    return; 
	  }

	// have the group id, get the group property relations
	$relations = $feusers->GetGroupPropertyRelations( $details['group_id'] );
	if( $relations[0] == false )
	  {
	    $parms['error'] = 1;
	    $parms['message'] = $relations[1];
	    $parms['mode'] = 'sendanotheremail';
	    $this->myRedirect( $id, 'default', $returnid, $parms );
	    return; 
	  }

	$props = $feusers->GetPropertyDefns();
	if( $props == false )
	  {
	    $parms['error'] = 1;
	    $parms['message'] = $this->Lang('error_dberror');
	    $parms['mode'] = 'sendanotheremail';
	    $this->myRedirect( $id, 'default', $returnid, $parms );
	    return; 
	  }

	// now find an email address property
	// and make sure it's of type 2
	$found = '';
	foreach( $relations as $reln )
	  {
	    foreach( $props as $prop )
	      {
		if( $prop['type'] == 2 && $reln['name'] == $prop['name'] )
		  {
		    // found an email property
		    foreach( $tempuserprops as $tempprop )
		      {
			if( $reln['name'] == $tempprop['title'] )
			  {
			    $found = $tempprop['data'];
			    break;
			  }
		      }
		  }
		if( $found != '' )
		  {
		    break;
		  }
	      }
	    if( $found != '' )
	      {
		break;
	      }
	  }
	if( !$found )
	  {
	    $parms['error'] = 1;
	    $parms['message'] = $this->Lang('error_noemailaddress');
	    $parms['mode'] = 'sendanotheremail';
	    $this->myRedirect( $id, 'default', $returnid, $parms );
	    return; 
	  }
	$email = $found;
      }

    $this->_SendUserConfirmationEmail( $id,$returnid,$email, $username, $details['group_id'],
				       $details['code'] );

    // we're not redirecting anywhere we need to display some nice message
    // about we just spammed your inbox, etc, etc.
    global $gCms;
    $this->smarty->assign('sitename', $gCms->config['root_url']);
    $this->smarty->assign('username',$username);
    $this->smarty->assign('email', $found );
    echo $this->ProcessTemplateFromDatabase('selfreg_post_sendanotheremail_template');
  }

  function PushParamsToSession($prefs)
  {
	foreach ($prefs as $k=>$v)
	{
		$_SESSION['selfreg_' . $k] = $v;
	}
  }

  /*---------------------------------------------------------
   Override GetPreference so we can inject any prefs that 
   might've come in via the original command.
   ---------------------------------------------------------*/
  function GetPreference($preference_name, $defaultvalue='')
  {
	if (!isset($GLOBALS['CMS_ADMIN_PAGE']) && isset($_SESSION['selfreg_' . $preference_name]))
		return $_SESSION['selfreg_' . $preference_name];
	else
		return get_site_preference($this->GetName() . "_mapi_pref_" . $preference_name, $defaultvalue);
  }


  /*---------------------------------------------------------
   SendUserConfirmationEmail($address,$username,$group_id,$code);
   NOT PART OF THE MODULE API
   ---------------------------------------------------------*/
  function _SendUserConfirmationEmail($id,$returnid,$address,$username,$group_id,$code)
  {
    global $gCms;
    $cmsmailer =& $this->GetModuleInstance('CMSMailer');
    if( !$cmsmailer )
      {
	return false;
      }

    $cmsmailer->AddAddress( $address );
    $this->smarty->assign('name',$username);
    $this->smarty->assign('code',$code);
    $this->smarty->assign('sitename', $gCms->config['root_url']);
    $parms = array( 'mode' => 'verify',
		    'input_username' => $username,
		    'input_group_id' => $group_id,
		    'input_code' => $code );
    $prettyurl = "Selfreg/confirm/$returnid/$code/$group_id/$username";
    $url = $this->CreateLink($id,'default',$returnid,'',$parms,'',true,true,'',false,$prettyurl);
    $this->smarty->assign('url',$url);
    $this->smarty->assign('link',$this->CreateLink($id,'default',$returnid,$url,$parms,'',false,true,'',false,$prettyurl));

    $prettyurl = "Selfreg/confirm/$returnid/$code";
    $smallurl = $this->CreateLink( $id, 'default', $returnid, '', 
				   array('mode' => 'verify'),'',true, true,'',false,$prettyurl);
    $this->smarty->assign('smallurl',$smallurl);
    $this->smarty->assign('smalllink',$this->CreateLink($id,'default',$returnid,$smallurl,
							array('mode'=>'verify'),'',false,true,'',false,$prettyurl));
    $htmlbody = $this->ProcessTemplateFromDatabase('selfreg_emailconfirm_template');
    $textbody = $this->ProcessTemplateFromDatabase('selfreg_emailconfirm_texttemplate');
    $cmsmailer->SetBody( $textbody );
    if( $htmlbody != '' )
      {
	$cmsmailer->IsHTML(true);  // we're sending an html mail
	$cmsmailer->SetBody( $htmlbody );
	$cmsmailer->SetAltBody( $textbody );
      }
    else
      {
	$cmsmailer->IsHTML(false);  // we're sending an html mail
	$cmsmailer->SetBody( $textbody );
      }
    $cmsmailer->SetSubject($this->GetPreference('selfreg_emailconfirm_subject',$this->Lang('registration_confirmation')));
    $cmsmailer->Send();

  }


  /*---------------------------------------------------------
   SetAdminReg1Template($id, $params, $return_id, $message)
   NOT PART OF THE MODULE API
   ---------------------------------------------------------*/
  function _SetAdminReg1Template( $id, &$params, $returnid )
  {
    if( isset( $params['defaultbutton'] ) )
      {
	$this->SetTemplate( 'selfreg_reg1template',
			    $this->dflt_registration1_template );
	$this->SetTemplate( 'selfreg_postreg1_template',
			    $this->dflt_postreg1_template );
      }
    else if( isset( $params['reg1_templatecontent'] ) ||
	     isset( $params['postreg1_templatecontent'] ) )
      {
	$this->SetTemplate( 'selfreg_reg1template',
			    $params['reg1_templatecontent'] );
	$this->SetTemplate( 'selfreg_postreg1_template',
			    $params['postreg1_templatecontent'] );
      }
    $this->myRedirectToTab( $id, 'reg1template' );
  }


  /*---------------------------------------------------------
   SetAdminReg2Template($id, $params, $return_id, $message)
   NOT PART OF THE MODULE API
   ---------------------------------------------------------*/
  function _SetAdminReg2Template( $id, &$params, $returnid )
  {
    if( isset( $params['defaultbutton'] ) )
      {
	$this->SetTemplate( 'selfreg_reg2template',
			    $this->dflt_registration2_template );
      }
    else if( isset( $params['templatecontent'] ) )
      {
	$this->SetTemplate( 'selfreg_reg2template',
			    $params['templatecontent'] );
      }
    $this->myRedirectToTab( $id, 'reg2template' );
  }


  /*---------------------------------------------------------
   SetAdminEmailConfirmationTemplate($id, $params, $return_id, $message)
   NOT PART OF THE MODULE API
   ---------------------------------------------------------*/
  function _SetAdminEmailConfirmTemplate( $id, &$params, $returnid )
  {
    if( isset( $params['defaultbutton'] ) )
      {
	$this->SetTemplate( 'selfreg_emailconfirm_template',
			    $this->dflt_emailconfirm_template );
	$this->SetTemplate( 'selfreg_emailconfirm_texttemplate',
			    $this->dflt_emailconfirm_texttemplate );
      }
    else 
      {
	$htmltemplate = '';
	if( isset( $params['templatecontent'] ) )
	  {
	    $htmltemplate = $params['templatecontent'];
	  }
	$texttemplate = '';
	if( isset( $params['texttemplatecontent'] ) )
	  {
	    $texttemplate = $params['texttemplatecontent'];
	  }
	$subject = '';
	if( isset( $params['input_subject'] ) )
	  {
	    $subject = $params['input_subject'];
	  }
	if( $subject == '' )
	  {
	    $this->_DisplayErrorPage($id,$params,$returnid,
				     $this->Lang('error_mustspecifysubject'));
	    return;
	  }
	if( $texttemplate == '' )
	  {
	    $this->_DisplayErrorPage($id,$params,$returnid,
				     $this->Lang('error_mustspecifytexttemplate'));
	    return;
	  }

	$this->SetTemplate( 'selfreg_emailconfirm_template',
			    $params['templatecontent'] );
	$this->SetTemplate( 'selfreg_emailconfirm_texttemplate',
			    $params['texttemplatecontent'] );
	$this->SetPreference( 'selfreg_emailconfirm_subject',
			      $params['input_subject'] );
	
      }
    $this->myRedirectToTab( $id, 'emailconfirm_template' );
  }


  /*---------------------------------------------------------
   SetAdminFinalMessageTemplate($id, $params, $return_id, $message)
   NOT PART OF THE MODULE API
   ---------------------------------------------------------*/
  function _SetAdminFinalMessageTemplate( $id, &$params, $returnid )
  {
    if( isset( $params['defaultbutton'] ) )
      {
	$this->SetTemplate( 'selfreg_finalmessage_template',
			    $this->dflt_finalmessage_template );
      }
    else if( isset( $params['templatecontent'] ) )
      {
	$this->SetTemplate( 'selfreg_finalmessage_template',
			    $params['templatecontent'] );
      }
    $this->myRedirectToTab( $id, 'finalmessage_template' );
  }


  /*---------------------------------------------------------
   SetAdminEmailConfirmationTemplate($id, $params, $return_id, $message)
   NOT PART OF THE MODULE API
   ---------------------------------------------------------*/
  function _SetAdminEmailUserEditedTemplate( $id, &$params, $returnid )
  {
    if( isset( $params['defaultbutton'] ) )
      {
	$this->SetTemplate( 'selfreg_emailuseredited_template',
			    $this->dflt_emailuseredited_template );
	$this->SetTemplate( 'selfreg_emailuseredited_texttemplate',
			    $this->dflt_emailuseredited_texttemplate );
      }
    else 
      {
	$htmltemplate = '';
	if( isset( $params['templatecontent'] ) )
	  {
	    $htmltemplate = $params['templatecontent'];
	  }
	$texttemplate = '';
	if( isset( $params['texttemplatecontent'] ) )
	  {
	    $texttemplate = $params['texttemplatecontent'];
	  }
	$subject = '';
	if( isset( $params['input_subject'] ) )
	  {
	    $subject = $params['input_subject'];
	  }
	if( $subject == '' )
	  {
	    $this->_DisplayErrorPage($id,$params,$returnid,
				     $this->Lang('error_mustspecifysubject'));
	    return;
	  }
	if( $texttemplate == '' )
	  {
	    $this->_DisplayErrorPage($id,$params,$returnid,
				     $this->Lang('error_mustspecifytexttemplate'));
	    return;
	  }

	$this->SetTemplate( 'selfreg_emailuseredited_template',
			    $params['templatecontent'] );
	$this->SetTemplate( 'selfreg_emailuseredited_texttemplate',
			    $params['texttemplatecontent'] );
	$this->SetPreference( 'selfreg_emailuseredited_subject',
			      $params['input_subject'] );
	
      }
    $this->myRedirectToTab( $id, 'emailuseredited_template' );
  }


  /*---------------------------------------------------------
   SetAdminSetAnotherEmailTemplate($id, $params, $return_id, $message)
   NOT PART OF THE MODULE API
   ---------------------------------------------------------*/
  function _SetAdminSendAnotherEmailTemplate( $id, &$params, $returnid )
  {
    if( isset( $params['defaultbutton'] ) )
      {
	$this->SetTemplate( 'selfreg_sendanotheremail_template',
			    $this->dflt_sendanotheremail_template );
	$this->SetTemplate( 'selfreg_post_sendanotheremail_template',
			    $this->dflt_post_sendanotheremail_template );
      }
    else if( isset( $params['templatecontent'] ) )
      {
	$this->SetTemplate( 'selfreg_sendanotheremail_template',
			    $params['templatecontent'] );
	$this->SetTemplate( 'selfreg_post_sendanotheremail_template',
			    $params['templatecontent2'] );
      }
    $this->myRedirectToTab( $id, 'sendanotheremail_template' );
  }


  /////////////////////////////////////////////////////////////////
  // API FUNCTIONS
  /////////////////////////////////////////////////////////////////

  function AddTempUserProperty( $uid, $propname, $propvalue )
  {
    $db = $this->GetDb();
    $id = $db->GenID(cms_db_prefix()."module_selfreg_users_seq");
    $q = "INSERT INTO ".cms_db_prefix()."module_selfreg_properties
          VALUES (?,?,?,?)";
    $dbresult = $db->Execute( $q, array( $id, $uid, $propname, $propvalue ) );
    if( !$dbresult )
      {
	return array(FALSE,$db->sql.' - '.$db->ErrorMsg());
      }
    return array(TRUE);
  }


  function CountTempUsers()
  {
    $db = $this->GetDb();
    $q = "SELECT count(*) as count FROM ".cms_db_prefix()."module_selfreg_users";
    $dbresult = $db->Execute( $q );
    if( !$dbresult ) {
      return false;
    }
    $row = $dbresult->FetchRow();
    return $row['count'];
  }


  function CreateTempUser( $gid, $username, $password, $code, $overwrite_uid = null )
  {
    $db = $this->GetDb();
    if( $username == '' || $password == '' )
      {
	return false;
      }

    // get an id
    $id = $db->GenID(cms_db_prefix()."module_selfreg_users_seq");
    $q = "INSERT INTO ".cms_db_prefix()."module_selfreg_users
           (id,group_id,username,passsword,code,createdate,overwrite_uid)
          VALUES (?,?,?,?,?,NOW(),?)";
    $dbresult = $db->Execute( $q, array( $id, $gid, $username, md5($password), 
					 $code, $overwrite_uid ) );
    if( !$dbresult )
      {
	return array(FALSE,$db->ErrorMsg());
      }

    $this->Audit($id,$this->GetName(),sprintf('User %s registered',$username));
    return array(TRUE,$id);
  }


  function CSVOldTempUsers($expirycode)
  {
    $db = $this->GetDb();
    $expires = $db->DbTimeStamp(strtotime( $expirycode ));
    // find all the user id's that match
    $q = "SELECT * FROM ".cms_db_prefix()."module_selfreg_users
          WHERE createdate < ?";
    $dbresult = $db->Execute( $q, array( $expires ) ); 
    $result = '';

    while( $row = $dbresult->FetchRow() ) 
      {
	$vals = array_values( $row );
	$result .= $row['id'].",".$row['username'].",".$row['code'].",".$row['createdate'].",";
	$q2 = "SELECT * FROM ".cms_db_prefix()."module_selfreg_properties
              WHERE user = ? ORDER by id";
	$dbresult2 = $db->Execute( $q2, array( $row['id'] ) );
	while( $row2 = $dbresult2->FetchRow() )
	  {
	    $result .= $row2['data'].",";
	  }
	$result .= "end\n";
      }

    return $result;
  }


  function EditTempUser( $uid, $username, $password, $code )
  {
    $db = $this->GetDb();
    if( $username == '' )
      {
	return false;
      }

    $q = "UPDATE ".cms_db_prefix()."module_selfreg_users
          SET username = ?, code = ?";
    $params = array($username,$code);
    if( $password != '' )
      {
	$q .= ",passsword = ?";
	$params[] = md5($password);
      }
    $q .= " WHERE id = ?";
    $params[] = $uid;

    $dbresult = $db->Execute( $q, $params );
    if( !$dbresult )
      {
	return array(FALSE,$db->ErrorMsg());
      }
    return array(TRUE);
  }


  function ExpireOldTempUsers($expirycode)
  {
    $db = $this->GetDb();
    $expires = $db->DbTimeStamp(strtotime( $expirycode ));
    // find all the user id's that match
    $q = "SELECT * FROM ".cms_db_prefix()."module_selfreg_users
          WHERE createdate < ?";
    $dbresult = $db->Execute( $q, array( $expires ) ); 
    while( $row = $dbresult->FetchRow() ) 
      {
	// then delete their properties
	$q2 = "DELETE FROM ".cms_db_prefix()."module_selfreg_properties
             WHERE user = ?";
	$dbresult2 = $db->Execute( $q2, array( $row['id'] ) );
      }

    // then delete them
    $q = "DELETE FROM ".cms_db_prefix()."module_selfreg_users
          WHERE createdate > ?";
    $dbresult = $db->Execute( $q, array( $expires ) );
    if( !$dbresult ) return false;
    return true;
  }


  function DeleteTempUser( $uid )
  {
    $db = $this->GetDb();
    $q = "DELETE FROM ".cms_db_prefix()."module_selfreg_users
          WHERE id = ?";
    $dbresult = $db->Execute( $q, array($uid) );
    if( !$dbresult ) return false;
    return true;
  }


  function DeleteTempUserProperties( $uid )
  {
    $db = $this->GetDb();
    $q = "DELETE FROM ".cms_db_prefix()."module_selfreg_properties 
          WHERE user = ?";
    $dbresult = $db->Execute( $q, array( $uid ) );
    if( !$dbresult ) return false;
    return true;
  }


  function GetTempUserDetails( $uid )
  {
    $db = $this->GetDb();
    $q = "SELECT * FROM ".cms_db_prefix()."module_selfreg_users
          WHERE id = ?";
    $dbresult = $db->Execute( $q, array( $uid ) );
    if( !$dbresult || $dbresult->RecordCount() == 0 ) return false;
    $row = $dbresult->FetchRow();
    return $row;
  }


  function GetTempUserID( $username )
  {
    $db = $this->GetDb();

    if( $username == '' )
      {
	return false;
      }

    $q = "SELECT * FROM ".cms_db_prefix()."module_selfreg_users WHERE
          username = ?";
    $dbresult = $db->Execute( $q, array( $username ) );
    if( !$dbresult )
      {
	return false;
      }

    $row = $dbresult->FetchRow();
    if( !$row )
      {
	return false;
      }

    return $row['id'];
  }


  function GetTempUserProperty( $uid, $propname, $dflt )
  {
    $db = $this->GetDb();
    $q = "SELECT data FROM ".cms_db_prefix()."module_selfreg_properties
          WHERE user = ? AND title =  ?";
    $dbresult = $db->Execute( $q, array( $uid, $propname ) );
    if( !$dbresult )
      {
	return $dflt;
      }
    $row = $dbresult->FetchRow();
    if( !$row )
      {
	return $dflt;
      }
    return $row['data'];
  }


  function GetTempUserProperties( $uid )
  {
    $db = $this->GetDb();
    $q = "SELECT * FROM ".cms_db_prefix()."module_selfreg_properties
          WHERE user = ?";
    $dbresult = $db->Execute( $q, array( $uid ) );
    if( !$dbresult || $dbresult->RecordCount() == 0 )
      {
	return false;
      }
    $result = array();
    while( $row = $dbresult->FetchRow() )
      {
	$result[] = $row;
      }
    return $result;
  }

  
  function get_product_info($temp_user_id)
  {
    $res = array();
    $res['id'] = $temp_user_id;
    $res['product_name'] = 'Account Registration';
    return $res;
  }
}

?>
