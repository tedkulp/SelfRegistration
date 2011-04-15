{$formstart}
{if isset($grouplist)}
<div class="pageoverflow">
<table class="pagetable" cellspacing="0">
  <thead>
    <tr>
      <th>{$mod->Lang('group')}</th>
      <th>{$mod->Lang('invite_code')}</th>
      <th class="pageicon"></th>
      <th class="pageicon"></th>
    </tr>
  </thead>
  <tbody>
  {foreach from=$grouplist item='onegroup'}
    <tr class="{$onegroup.rowclass}">
      <td><a href="{$onegroup.edit_url}">{$onegroup.groupname}</a></td>
      <td>{$onegroup.code}</td>
      <td>{$onegroup.edit_link}</td>
      <td>{$onegroup.delete_link}</td>
    </tr>
  {/foreach}
  </tbody>
</table>
</div>
{/if}

{$formend}
