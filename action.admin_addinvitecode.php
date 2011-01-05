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
if( !$this->CheckPermission('Modify Site Preferences') ) return;
$feu = $this->GetModuleInstance('FrontEndUsers');
if( !$feu ) return;

// initialization
$this->SetCurrentTab('invitecodes');
$error = '';
$group_id = '';
$group = null;

// handle incoming params
if (isset($params['groupid']))
{
	$group_id = (int)$params['groupid'];
	$group = $feu->GetGroupInfo($group_id);
}
else
{
	$this->RedirectToTab($id);
}

// handle form submit
if (isset($params['cancel']))
{
	$this->RedirectToTab($id);
}

if (isset($params['submit']))
{
	$error = false;

	if ($group_id != '' && isset($params['code']))
	{
		if ($params['code'] == '')
		{
			$error = $this->Lang('error_invitecode');
		}

		$this->SetPreference('invite_code_' . $group_id, trim($params['code']));
	}

	if (!$error)
	{
		$this->RedirectToTab($id);
	}
}

// build the form
if (!empty($error))
{
	echo $this->ShowErrors($error);
}


$smarty->assign('formstart',$this->CGCreateFormStart($id,'admin_addinvitecode',$returnid,$params));
$smarty->assign('formend',$this->CreateFormEnd());
$smarty->assign('input_code',$this->CreateInputText($id,'code', $this->GetPreference('invite_code_' . $group_id, isset($params['code']) ? $params['code'] : ''), 20));
$smarty->assign('group', $group);

echo $this->ProcessTemplate('admin_addinvitecode.tpl');

#
# EOF
#
