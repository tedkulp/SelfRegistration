<?php
#BEGIN_LICENSE
#-------------------------------------------------------------------------
# Module: SelfRegistration (c) 2008 by Robert Campbell 
#         (calguy1000@cmsmadesimple.org)
#  An addon module for CMS Made Simple to allow users to register themselves
#  with a website.
# 
# Version: 1.1.5
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
if( !isset($gCms) ) exit;

if( !$this->CheckPermission('Manage Registering Users' ) )
  {
    $this->_DisplayErrorPage($id, $params, $returnid, 
			     $this->Lang('accessdenied'));
    return;
  }

    if( !isset( $params['user_id'] ) )
      {
	$this->_DisplayErrorPage( $id, $params, $returnid,
				  $this->Lang('error_insufficientparams'));
	return;
      }

$feusers =& $this->GetModuleInstance('FrontEndUsers');
if( !$feusers )
  {
    // this is ugly for the user to see
    // but at least the admin will be able to figure it out
    // this shouldn't happen once the user has seen the form.
    $this->_DisplayErrorPage( $id, '', $returnid,
			      $this->Lang('error_nofeusersmodule'));
    return;
  }

$cmsmailer =& $this->GetModuleInstance('CMSMailer');
if( !$cmsmailer )
  {
    // this is ugly for the user to see
    // but at least the admin will be able to figure it out
    $this->_DisplayErrorPage( $id, '', $returnid,
			      $this->Lang('error_nofeusersmodule'));
    return;
  }

// check for required parameters
if( !isset( $params['group_id'] ) )
  {
    $this->_DisplayErrorPage( $id, $params, $returnid,
			      $this->Lang('error_insufficientparams'));
    return;
  }

// Check to ensure all required fields have some content
// and validate email fields
foreach( $params as $key => $val )
{
  if( preg_match( '/^hidden_/', $key ) )
    {
      $propname = substr($key,strlen('hidden_'));
      if( $propname == 'password' || $propname == 'repeatpassword' )
	{
	  continue;
	}
      $arr = split(";",$params[$key]);
      $required = $arr[3];
      if( $required == 2 && 
	  (!isset($params['input_'.$propname]) || $params['input_'.$propname] == '' ) )
	{
	  $params['error'] = 1;
	  $params['message'] = $this->Lang('error_requiredfield',$propname);
	  $this->myRedirect( $id, 'default', $returnid, $params );
	}

      if( $arr[1] == '2' )
	{
	  $result = $feusers->IsValidEmailAddress($params['input_'.$propname]);
	  if( $result[0] == false )
	    {
	      $params['error'] = 1;
	      $params['message'] = $result[1];
	      $this->myRedirect( $id, 'default', $returnid, $params );
	    }
	}
    }
}


// get the username and password
$username = '';
if( isset( $params['input_username'] ) )
  {
    $username = trim($params['input_username']);
  }
$password = '';
if( isset( $params['input_password'] ) )
  {
    $password = trim($params['input_password']);
  }
$repeatpassword = '';
if( isset( $params['input_repeatpassword'] ) )
  {
    $repeatpassword = trim($params['input_repeatpassword']);
  }

// check if the username is valid or taken
if( $username == '' )
  {
    $params['error'] = 1;
    $params['message'] = $this->Lang('error_emptyusername');
    $this->myRedirect( $id, 'default', $returnid, $params );
    return;
  }
if( !$feusers->IsValidUsername( $username ) )
  {
    $params['error'] = 1;
    $params['message'] = $this->Lang('error_invalidusername');
    $this->myRedirect( $id, 'default', $returnid, $params );
    return;
  }
$uid = $this->GetTempUserID($username);
if( $uid != false && $uid != $params['user_id'] )
  {
    $params['error'] = 1;
    $params['message'] = $this->Lang('error_usernametaken');
    $this->myRedirect( $id, 'default', $returnid, $params );
    return;
  }


// check if the passwords match or if they're valid
// if they're set atall
if( $password != '' )
  {
    if( $password != $repeatpassword )
      {
	$params['error'] = 1;
	$params['message'] = $this->Lang('error_passwordsdontmatch');
	$this->myRedirect( $id, 'default', $returnid, $params );
	return;
      }
    $minpwlen = $feusers->GetPreference('min_passwordlength');
    $maxpwlen = $feusers->GetPreference('max_passwordlength');
    if( strlen($password) < $minpwlen || strlen($password) > $maxpwlen )
      {
	$params['error'] = 1;
	$params['message'] = $this->Lang('error_invalidpassword',
					 array($minpwlen,$maxpwlen));
	$this->myRedirect( $id, 'default', $returnid, $params );
	return;
      }
  }


// find an email field... something that's name has email in it
// or is of type 2
$email_field = '';
foreach( $params as $key => $val )
{
  if( preg_match( '/^hidden_/', $key ) )
    {
      $propname = substr($key,strlen('hidden_'));
      $arr = split(";",$params[$key]);

      if( preg_match('/email/i',$arr[0]) || $arr[1] == 2 )
	{
	  // found something resembling an email field
	  $email_field = 'input_'.$propname;
	  break;
	}
    }
}    
if( $email_field == '' )
  {
    $params['error'] = 1;
    $params['message'] = $this->Lang('error_noemailaddress');
    $this->myRedirect( $id, 'default', $returnid, $params );
    return;
  }

// for any type 5 properties, we change the 
// array result into an encoded string
foreach( $params as $key => $val )
{
  if( preg_match( '/^hidden_/', $key ) )
    {
      $propname = substr($key,strlen('hidden_'));
      $arr = split(";",$params[$key]);
      if( $arr[1] == 5 )
	{
	  $params['input_'.$propname] = implode(',',$params['input_'.$propname]);
	}
    }
}


// generate a unique code that the user can enter to double confirm
// his login.
$code = $feusers->GenerateRandomPrintableString();

// have to add the record to the database so that we know who this guy is
// when he comes back
$return = $this->EditTempUser( $params['user_id'], $username, $password, $code );
if( $return[0] == false )
  {
    $params['error'] = 1;
    $params['message'] = $return[1];
    $this->myRedirect( $id, 'default', $returnid, $params );
    return;
  }


// remove any existing properties
$this->DeleteTempUserProperties( $params['user_id'] );

// and add his properties too
// but first we remove the ones we've handled already
$tmpuid = $params['user_id'];
unset($params['input_username'] );
unset($params['input_password'] );
unset($params['input_repeatpassword'] );
unset($params['hidden_username'] );
unset($params['hidden_password'] );
unset($params['hidden_repeatpassword'] );

foreach( $params as $key => $val )
{
  if( preg_match( '/^hidden_/', $key ) )
    {
      $propname = substr($key,strlen('hidden_'));
      if( !isset( $params['input_'.$propname] ) ) 
	{
	  continue;
	}
      $return = $this->AddTempUserProperty( $tmpuid, $propname, 
					    $params['input_'.$propname] );
      if( $return[0] == false )
	{
	  // now we have an issue to figure out
	  $params['error'] = 1;
	  $params['message'] = $return[1];
	  $this->myRedirect( $id, 'default', $returnid, $params );
	  return;
	}
    }
}

if( isset( $params['input_adjustemail'] ) && $params['input_adjustemail'] == 1 )
  {
    // okay, we're now ready to send the email, yahoo, yahoo, yahoo
    // now we have to decide what goes in it.
    $cmsmailer->AddAddress( $params[$email_field] );
    $this->smarty->assign('name',$username);
    if( $password != '' )
      {
	$this->smarty->assign('password',$password);
      }
    $this->smarty->assign('code',$code);
    $this->smarty->assign('sitename', $gCms->config['root_url']);
    $parms = array( 'mode' => 'verify',
		    'input_username' => $username,
		    'input_group_id' => $params['group_id'],
		    'input_code' => $code );

    $prettyurl = "Selfreg/confirm/$returnid/$code/{$params['group_id']}/$username";
    $url = $this->CreateLink($id,'default',$returnid,'',$parms,'',true,true,'',false,$prettyurl);
    $this->smarty->assign('url',$url);
    $this->smarty->assign('link',$this->CreateLink($id,'default',$returnid,$url,$parms,'',false,true,'',false,$prettyurl));

    $prettyurl = "Selfreg/confirm/$returnid/$code";
    $smallurl = $this->CreateLink( $id, 'default', $returnid, '', 
				   array('mode' => 'verify'),'',true,true,'',false,$prettyurl );
    $this->smarty->assign('smallurl',$smallurl);
    $this->smarty->assign('smalllink',$this->CreateLink($id,'default',$returnid,
							$smallurl,array('mode'=>'verify'),'',false,true,'',false,$prettyurl));

    $htmlbody = $this->ProcessTemplateFromDatabase('selfreg_emailuseredited_template');
    $textbody = $this->ProcessTemplateFromDatabase('selfreg_emailuseredited_texttemplate');
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
    $cmsmailer->SetSubject($this->GetPreference('selfreg_emailuseredited_subject',$this->Lang('registration_info_edited')));
    $cmsmailer->Send();
	
    // we're not redirecting anywhere we need to display some nice message
    // about we just spammed your inbox, etc, etc.
    $this->smarty->assign('username',$username);
    $this->smarty->assign('email', $params[$email_field] );
    echo $this->ProcessTemplateFromDatabase('selfreg_postreg1_template');
  }

$this->myRedirectToTab($id,'adminusers');

?>
