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
if( !isset($gCms) ) exit();

$feusers =& $this->GetModuleInstance('FrontEndUsers');
if( !$feusers )
  {
    // this is ugly for the user to see
    // but at least the admin will be able to figure it out
    $this->_DisplayErrorPage( $id, $params, $returnid,
			      $this->Lang('error_nofeusersmodule'));
    return;
  }


// now we're ready to populate the template
// first we put in stuff that is required (username, password, etc, etc)
$rowarray = array();

$allow_invite_codes = ($this->GetPreference('allowinvitecodes', '0') == '1');
if ($allow_invite_codes)
{
	if (isset($params['input_invite_code']) && $params['input_invite_code'] != '')
	{
		$val = $db->GetOne("SELECT sitepref_name FROM " . cms_db_prefix() . "siteprefs WHERE sitepref_value = ?", array($params['input_invite_code']));
		if ($val)
		{
			$matches = array();
			if (preg_match("/SelfRegistration_mapi_pref_invite_code_([0-9]+)/", $val, $matches) && count($matches) > 1)
			{
				$group_info = $feusers->GetGroupInfo($matches[1]);
				if ($group_info)
				{
					return $this->RedirectForFrontEnd($id, $returnid, 'signup', array('group' => $group_info['groupname']));
				}
			}
		}
		$smarty->assign('message', $this->Lang('error_invitecode'));
	}

	$this->PushParamsToSession($params);

	$onerow = new StdClass();
	$onerow->name = 'invite_code';
	$onerow->prompt = $this->Lang('invite_code');
	$onerow->control = $this->CreateInputText($id, 'input_invite_code', $val, 20, 255);
	$rowarray[$onerow->name] = $onerow;

	$smarty->assign('startform', $this->CreateFormStart($id, 'invite_code', $returnid, 'post', '', $inline));
	$smarty->assign('endform', $this->CreateFormEnd());
	$smarty->assign('controls', $rowarray);
	$smarty->assign('controlcount', count($rowarray));
	$smarty->assign('submit',$this->CreateInputSubmit($id,'submit',
							  $this->Lang('submit')));

	// todo, put this into the database and let the admin play with it.
	echo $this->ProcessTemplateFromDatabase('selfreg_reg1template');
}
else
{
	echo $this->Lang("invite_codes_not_enabled");
}
