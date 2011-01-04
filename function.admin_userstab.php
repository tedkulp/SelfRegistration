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

global $gCms;
$db = $this->GetDb();
// display a table with userid, group_id (name?), username, createdate, <email address>
// and allow the admin to edit, delete, and or optionally send that user a message
// should also have a checkbox so that the admin can delete a bunch o users at the same time
// and a select all would be cool.

// get a list of all of the grups
$feusers =& $this->GetModuleInstance('FrontEndUsers');
if( !$feusers )
  {
    $this->_DisplayErrorPage($id, $params, $returnid, 
			     $this->Lang('error_nofeusersmodule'));
    return;
  }
$username_is_email = $feusers->GetPreference('username_is_email');
$grplist = array();
{
  $t_grplist = $feusers->GetGroupListFull();
  if( !is_array( $t_grplist ) || count($t_grplist) == 0 )
    {
      $this->_DisplayErrorPage($id, $params, $returnid, 
			       $this->Lang('error_nogroups'));
      return;
    }
  // for our purposes here, we'll re-org t_grouplist to be keyed by id
  foreach( $t_grplist as $grp )
    {
      $grplist[$grp['id']] = $grp;
    }
}

// an array for the group property relations (we're gonna cache em)
$relations = array();

// an array for the email field names, by group id (we're gonna cache em too)
$emailflds = array();

// get the property definitions
$props = $feusers->GetPropertyDefns();
if( $props == false )
  {
    $this->_DisplayErrorPage($id, $params, $returnid, 
			     $this->Lang('error_nopropdefns'));
    return;
  }

// some javascript
$this->smarty->assign('javascript',
		      '<SCRIPT LANGUAGE="JavaScript">
function checkAll(fmobj,state) {
  for (var i=0;i<fmobj.elements.length;i++) {
    var e = fmobj.elements[i];
    if ( (e.type=="checkbox") && (!e.disabled) ) {
      e.checked = state;
    }
  }
} </SCRIPT>');

// some labels
$this->smarty->assign('startform',$this->CreateFormStart($id,'do_deleteusersbulk'));
$this->smarty->assign('submit',$this->CreateInputSubmit($id,'delete',$this->Lang('deleteselusers')));
$this->smarty->assign('endform',$this->CreateFormEnd());
$this->smarty->assign('useridtext',$this->Lang('hdr_userid'));
$this->smarty->assign('usernametext',$this->Lang('hdr_username'));
$this->smarty->assign('grpnametext',$this->Lang('hdr_grpname'));
$this->smarty->assign('createdtext',$this->Lang('hdr_created'));
$this->smarty->assign('emailtext',$this->Lang('hdr_email'));
$this->smarty->assign('deletetext',$this->Lang('select'));
$this->smarty->assign('checkallbox',
		      $this->CreateLink($id,'defaultadmin',$returnid,
					$this->Lang('check_all'), array(), '', false, false,
					'onClick()="checkAll(document.forms[0],true);return false"').
		      "&nbsp;&nbsp;".
		      $this->CreateLink($id,'defaultadmin',$returnid,
					$this->Lang('uncheck_all'), array(), '', false, false,
					'onClick()="checkAll(document.forms[0],false);return false"'));
    
// select all the users
$rowarray = array();
// todo, add some real filtering here
$q = "SELECT * FROM ".cms_db_prefix()."module_selfreg_users LIMIT 250";
$dbresult = $db->Execute( $q );
if( $dbresult && ($dbresult->RecordCount() > 0) )
  {
    // we have rows
    $rowclass = 'row1';
    while( $row = $dbresult->FetchRow() )
      {
	if( !isset($grplist[$row['group_id']]) ) continue;
	$onerow = new StdClass();
	$onerow->userid = $row['id'];
	$onerow->username = $row['username'];
	$onerow->grpname = $grplist[$row['group_id']]['groupname'];  // ugly eh
	$onerow->created = $row['createdate'];
	$onerow->rowclass = $rowclass;
	// todo email, editlink, markdeletebox

	// now we have a group id... have to get a list of the groups properties
	if( !isset( $relations[ $row['group_id'] ] ) )
	  {
	    // not in the cache, so get them
	    $t_relations = $feusers->GetGroupPropertyRelations( $row['group_id'] );
	    if( $t_relations[0] == false )
	      {
		// this is ugly for the user to see
		// but at least the admin will be able to figure it out
		$this->_DisplayErrorPage( $id, $params, $returnid, 
					  $this->Lang('error_nogroupproprelns',$t_relations[1]) );
		return;
	      }

	    // and cache them
	    $relations[ $row['group_id'] ] = $t_relations;
	  }

	// now, go through all of the relations, xref with the properties field
	// and try to find one that's an email address for this group
	// we'll cache that too
	if( !$username_is_email )
	  {
	    if( !isset( $emailflds[ $row['group_id'] ] ) )
	      {
		$found = false;
		// not in the cache, so we'll find one
		foreach( $relations[ $row['group_id'] ] as $reln )
		  {
		    foreach( $props as $oneprop )
		      {
			if( $reln['name'] == $oneprop['name'] &&
			    $oneprop['type'] == 2 ) // email 
			  {
			    // woohoo, we found an email field in the property relations for this
			    // group
			    $emailflds[$row['group_id']] = $reln['name'];
			    $found = true;
			    break;
			  }
		      }
		  }
		
		if( !$found )
		  {
		    $this->_DisplayErrorPage($id, $params, $returnid, 
					     $this->Lang('error_noemailaddress'));
		    return;
		  }
	      }
	    
	    // now, get the email address for this user
	    $onerow->email = $this->GetTempUserProperty($row['id'],$emailflds[$row['group_id']],
							$this->Lang('unknown'));
	  }

	$onerow->editlink =
	  $this->CreateLink ($id, 'edittempuser', $returnid,
			     $gCms->variables['admintheme']->DisplayImage ('icons/system/edit.gif',
									   $this->Lang ('edit'), '', '', 'systemicon'),
			     array ('user_id' => $row['id']));
	$onerow->deletelink =
	  $this->CreateLink ($id, 'deletetempuser', $returnid,
			     $gCms->variables['admintheme']->DisplayImage ('icons/system/delete.gif',
									   $this->Lang ('delete'), '', '', 'systemicon'),
			     array ('user_id' => $row['id']),
			     $this->Lang ('areyousure_deleteuser'));
	$onerow->pushlink = 
	  $this->CreateLink ($id,'pushuserlive',$returnid,
			     $gCms->variables['admintheme']->DisplayImage ('icons/system/export.gif',
									   $this->Lang('push_live'), '', '', 'systemicon'),
			     array ('user_id' => $row['id']),
			     $this->Lang('areyousure_pushuser'));
									   
	$onerow->markdeletebox = $this->CreateInputCheckbox($id,'markdelete_'.$row['id'],$row['id']);
	    
	$rowarray[] = $onerow;
	($rowclass == "row1" ? $rowclass = "row2" : $rowclass = "row1");
      }
  }
if( $username_is_email ) $this->smarty->assign('username_is_email',1);
$this->smarty->assign('items', $rowarray);
$this->smarty->assign('itemcount',count($rowarray));
$this->smarty->assign('itemsfound',$this->Lang('usersfound'));
echo $this->ProcessTemplate('userlist.tpl');

// EOF
?>