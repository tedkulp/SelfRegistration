{* select subscription package *}
<div id="selfreg_selpkg">
{$formstart}

<table>
{foreach from=$pkgs item=pkg}
  <tr>
   <td align="left" width="5%">
     <input type="radio" name="{$actionid}selfreg_pkg" value="{$pkg.id}"/>
   </td>
   <td align="left">{$pkg.prompt}</td>
   <td align="right" width="15%">{$currency_symbol}{$pkg.cost|number_format:2}{$currency_code}</td>
  </tr>
  <tr>
   <td></td>
   <td colspan="3">{$pkg.description}</td>
  </tr>
{/foreach}
</table>

<div class="row">
  <p class="prompt"></p>
  <p class="input">
    <input type="submit" name="{$actionid}selfreg_submit" value="{$SelfRegistration->Lang('submit')}"/>
  </p>
</div>

{$formend}
</div>