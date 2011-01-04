{$javascript}
{if $message != ''}
  {if $error != ''}
    <p><font color="red">{$message}</font></p>
  {else}
    <p>{$message}</p>
  {/if}
{else}
<div class="pageoptions"><p class="pageoptions">{$itemcount}&nbsp;{$itemsfound}</p></div>
{if $itemcount > 0}
{$startform}
<table cellspacing="0" class="pagetable">
	<thead>
		<tr>
			<th width="5%">{$useridtext}</th>
			<th>{$usernametext}</th>
			<th>{$grpnametext}</th>
			<th>{$createdtext}</th>
			{if !isset($username_is_email)}<th>{$emailtext}</th>{/if}
			<th class="pageicon">{$deletetext}</th>
			<th class="pageicon">&nbsp;</th>
			<th class="pageicon">&nbsp;</th>
			<th class="pageicon">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
{foreach from=$items item=entry}
		<tr class="{$entry->rowclass}">
			<td>{$entry->userid}</td>
			<td>{$entry->username}</td>
			<td>{$entry->grpname}</td>
			<td>{$entry->created}</td>
			{if !isset($username_is_email)}<td>{$entry->email}</td>{/if}
			<td>{$entry->markdeletebox}</td>
			<td>{$entry->pushlink}</td>
			<td>{$entry->editlink}</td>
			<td>{$entry->deletelink}</td>
		</tr>
	 
{/foreach}
	</tbody>
</table>
{$checkallbox}<br/>
{$submit}
{/if}
{$endform}
{/if}
