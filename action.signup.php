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

if( $this->GetPreference('allowselectpkg') && !isset($params['group']))
  {
    // we're allowing paid registration, but don't have a package/group specified
    // so we need to ask it.
    $this->DoAction('selpkg',$id,$params,$returnid);
    return;
  }

$allow_invite_codes = ($this->GetPreference('allowinvitecodes', '0') == '1');
$smarty->assign('invite_codes', $allow_invite_codes);

$feusers =& $this->GetModuleInstance('FrontEndUsers');
if( !$feusers )
  {
    // this is ugly for the user to see
    // but at least the admin will be able to figure it out
    $this->_DisplayErrorPage( $id, $params, $returnid,
			      $this->Lang('error_nofeusersmodule'));
    return;
  }

$cmsmailer =& $this->GetModuleInstance('CMSMailer');
if( !$cmsmailer )
  {
    // this is ugly for the user to see
    // but at least the admin will be able to figure it out
    $this->_DisplayErrorPage( $id, $params, $returnid,
			      $this->Lang('error_nofeusersmodule'));
    return;
  }

$grpid = -1;
$relations = array();
if (!$allow_invite_codes)
{
	if( !isset( $params['group'] ) )
	  {
		// this is ugly for the user to see
		// but at least the admin will be able to figure it out
		$this->_DisplayErrorPage( $id, $params, $returnid,
					  $this->Lang('error_insufficientparams'));
		return;
	  }

	// yep, all the modules are here, now we
	// have to convert the groupname into an id
	$grpid = $feusers->GetGroupID($params['group']);
	if( $grpid == false )
	  {
		// this is ugly for the user to see
		// but at least the admin will be able to figure it out
		$this->_DisplayErrorPage( $id, $params, $returnid,
					  $this->Lang('error_nosuchgroup'));
		return;
	  }

	// now we have an id... have to get a list of the groups properties
	$relations = $feusers->GetGroupPropertyRelations( $grpid );
	if( $relations[0] == false )
	  {
		// this is ugly for the user to see
		// but at least the admin will be able to figure it out
		$this->_DisplayErrorPage( $id, $params, $returnid, $relations[1] );
		return;
	  }
}
uasort( $relations,
	array('SelfregUtils','compare_elements_by_sortorder_key') );

// now we have the properties, gotta show something to the user
// dammit.
if( isset( $params['error'] ) )
  {
    $smarty->assign('error', $params['error']);
  }
if( isset( $params['message'] ) )
  {
    $smarty->assign('message', $params['message']);
  }

// now we're ready to populate the template
// first we put in stuff that is required (username, password, etc, etc)
$rowarray = array();

// make sure username is in there
$onerow = new StdClass();
$onerow->color = $feusers->GetPreference('required_field_color','blue');
$onerow->marker = $feusers->GetPreference('required_field_marker','*');
$onerow->required = 1;
$val = (isset($params['input_username'])) ? $params['input_username'] : '';
if ($feusers->GetPreference('username_is_email'))
  {
    $onerow->prompt = $this->Lang('email');
  }
else
  {
    $onerow->prompt = $this->Lang('username');
  }
$onerow->name = 'username';
$onerow->control =$this->CreateInputText($id, 'input_username', $val,
					 $feusers->GetPreference('usernamefldlength'),
					 $feusers->GetPreference('max_usernamelength'));
$rowarray[$onerow->name] = $onerow;

if( $this->GetPreference('selfreg_force_email_twice' ) )
  {
    // add it again
    $onerow = new StdClass();
    $onerow->color = $feusers->GetPreference('required_field_color','blue');
    $onerow->marker = $feusers->GetPreference('required_field_marker','*');
    $onerow->required = 1;
    $val = (isset($params['input_username_again'])) ? $params['input_username_again'] : '';

    if ($feusers->GetPreference('username_is_email'))
      {
	$onerow->prompt = $this->Lang('email');
      }
    else
      {
	$onerow->prompt = $this->Lang('username');
      }
    $onerow->prompt .= ' ('.$this->Lang('again').')';
    $onerow->name = 'username_again';
    $onerow->control =$this->CreateInputText($id, 'input_username_again', $val,
					     $feusers->GetPreference('usernamefldlength'),
					     $feusers->GetPreference('max_usernamelength'));
    $rowarray[$onerow->name] = $onerow;
  }


// and password
$onerow = new StdClass();
$onerow->color = $feusers->GetPreference('required_field_color','blue');
$onerow->marker = $feusers->GetPreference('required_field_marker','*');
$onerow->required = 1;
$val = (isset($params['input_password'])) ? $params['input_password'] : '';
$onerow->prompt = $this->Lang('password');
$onerow->name = 'password';
$onerow->control =$this->CreateInputPassword($id, 'input_password', $val,
					     $feusers->GetPreference('passwordfldlength'),
					     $feusers->GetPreference('max_passwordlength'));
$rowarray[$onerow->name] = $onerow;

// and make him repeat the password
$onerow = new StdClass();
$onerow->color = $feusers->GetPreference('required_field_color','blue');
$onerow->marker = $feusers->GetPreference('required_field_marker','*');
$onerow->required = 1;
$val = (isset($params['input_repeatpassword'])) ? $params['input_repeatpassword'] : '';
$onerow->prompt = $this->Lang('repeatpassword');
$onerow->name = 'repeatpassword';
$onerow->control =$this->CreateInputPassword($id, 'input_repeatpassword', $val,
					     $feusers->GetPreference('passwordfldlength'),
					     $feusers->GetPreference('max_passwordlength'));
$rowarray[$onerow->name] = $onerow;

if ($allow_invite_codes)
{
	$onerow = new StdClass();
	$onerow->name = 'invite_code';
	$onerow->prompt = $this->Lang('invite_code');
	$onerow->control = $this->CreateInputText($id, 'input_invite_code', $val, 20, 255);
	$rowarray[$onerow->name] = $onerow;
}

$relations2 = array();
foreach( $relations as $reln )
{
  $defn = $feusers->GetPropertyDefn( $reln['name'] );
  if( $defn['type'] == 6 )
    {
      // images are ignored
      // user can fill them in after registration
      continue;
    }

  $reln['mapto'] = $defn['name'];
  $reln['prompt'] = $defn['prompt'];
  if( $this->GetPreference('selfreg_force_email_twice' ) )
    {
      $relations2[] = $reln;
      if( $defn['type'] == 2 && !$feusers->GetPreference('username_is_email') )
	{
		
	  // todo, change something here
	  $reln['name'] = $reln['name'].'_again';
	  $reln['mapto'] = $defn['name'];
	  $reln['prompt'] = $defn['prompt'].' ('.$this->Lang('again').')';
	  $relations2[] = $reln;
	}
    }
  else
    {
      $relations2[] = $reln;
    }
}

foreach( $relations2 as $reln )
{
  // don't process hidden fields here
  if( $reln['required'] == 3 ) continue;

  // get the property definition
  $defn = $feusers->GetPropertyDefn( $reln['mapto'] );

  $onerow = new StdClass();

  $color = '';
  $marker = '';
  if( $defn['encrypt'] )
    {
      $color = $this->GetPreference('secure_field_color','yellow');
      $marker = $this->GetPreference('secure_field_marker','^^');
    }
  if( $reln['required'] == 2 ) $color = $feusers->GetPreference('required_field_color','blue');
  if( $reln['required'] == 2 ) $marker = $feusers->GetPreference('required_field_marker','*');
  $onerow->required = ($reln['required'] == 2);
  $onerow->color    = $color;
  $onerow->marker   = $marker;

  $val = isset($params['input_'.$reln['name']]) ? $params['input_'.$reln['name']] : '';
  $onerow->prompt = $reln['prompt'];
  $onerow->name = $reln['name'];
  $onerow->labelfor = $id.$reln['name'];
  switch( $defn['type'] )
    {
    case 0: // text
      $onerow->control = $this->CreateInputText( $id, 'input_'.$reln['name'],
						 $val, $defn['length'], $defn['maxlength'] );
      break;

    case 1: // checkbox
      $onerow->control = SelfregUtils::myCreateInputCheckbox( $id, 'input_'.$reln['name'], 1, $val );
      break;

    case 2: // email
      $onerow->control = $this->CreateInputText( $id, 'input_'.$reln['name'],
						 $val, $defn['length'], ($defn['maxlength']) );
      break;

    case 3: // textarea
      $onerow->control = $this->CreateTextArea(false, $id, $val, 'input_'.$reln['name']);
      break;

    case 4: // dropdown
      $onerow->control = $this->CreateInputDropdown(
						    $id,
						    'input_'.$reln['name'],
						    $feusers->GetSelectOptions($defn['name'], 1),
						    -1,
						    $val);
      break;

    case 5: // multiselect
      $tmp = $feusers->GetSelectOptions($defn['name'],1);
      if( !is_array($val) ) $val = array($val);
      $onerow->control = $this->CreateInputSelectList($id,
						      'input_'.$defn['name'].'[]',
						      $tmp,
						      $val,
						      min(count($tmp),5));
      break;

    case 7: // radio buttons
      $onerow->control = $this->CreateInputRadioGroup($id, 'input_'.$defn['name'],
						      $feusers->GetSelectOptions($defn['name'], 1), $val, '', '<br/>');
      break;

    case 8: // date field
      {
	$attribs = unserialize($defn['attribs']);
	$parms = array();
	$parms['prefix'] = $id.'input_'.$defn['name'];
	if( $val ) $parms['time'] = $val;
	$parms['start_year'] = (isset($attribs['startyear']))?$attribs['startyear']:"-5";
	$parms['end_year'] = (isset($attribs['endyear']))?$attribs['endyear']:"+10";
	$str = '{html_select_date ';
	foreach( $parms as $key=>$value )
	  {
	    $str.=$key.'="'.$value.'" ';
	  }
	$str .= '}';
	$onerow->control = $this->ProcessTemplateFromData($str);
      }
      break;
    }

  $rowarray[$onerow->name] = $onerow;
}


$inline = $this->GetPreference('inline_forms',true);
if( isset($params['noinline']) )
  {
    $inline = false;
  }
// and the rest of the stuff
$smarty->assign ('startform',
		 $this->CreateFormStart ($id, 'reguser',
					 $returnid, 'post', '', $inline));
$smarty->assign ('endform', $this->CreateFormEnd ());
$smarty->assign('title',$this->Lang('user_registration'));

$allow_overwrite = (isset($params['allowoverwrite']))?$params['allowoverwrite']:0;
$smarty->assign('hidden',
		$this->CreateInputHidden($id, 'orig_url', cge_url::current_url()).
		$this->CreateInputHidden($id, 'group_id', $grpid ).
		$this->CreateInputHidden($id, 'group', $params['group']).
		$this->CreateInputHidden($id, 'allowoverwrite',$allow_overwrite));
$smarty->assign('controls', $rowarray);
$smarty->assign('controlcount', count($rowarray));
$smarty->assign('submit',$this->CreateInputSubmit($id,'submit',
						  $this->Lang('submit')));
$smarty->assign('msg_sendanotheremail',
		$this->Lang('msg_sendanotheremail'));
$smarty->assign('link_sendanotheremail',
		$this->CreateLink($id,'default',$returnid,$this->Lang('clickhere'),
				  array('mode'=>'sendanotheremail'),'',false,true));

$captcha =& $this->GetModuleInstance('Captcha');
if( is_object($captcha) && !isset($params['nocaptcha']) )
  {
    $smarty->assign('captcha_title', $this->Lang('captcha_title'));
    $smarty->assign('captcha', $captcha->getCaptcha());
    $smarty->assign('input_captcha',
		    $this->CreateInputText($id,'input_captcha','',10));
  }


// todo, put this into the database and let the admin play with it.
echo $this->ProcessTemplateFromDatabase('selfreg_reg1template');

#
# EOF
#
?>
