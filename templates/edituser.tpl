<!-- Registration 1 template -->
{$title}
{if $message != ''}
  {if $error != ''}
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
    <font color="{$control->color}">{$control->prompt}{$control->marker}</font>
    </td>
    <td>{$control->control}
    {if $control->extratext}
      &nbsp;{$control->extratext}
    {/if}
    </td>
  </tr>
{/foreach}
  </table>
  </center>
<br/>
{/if}
{$hidden}{$hidden2}{$submit}{$cancel}
{$endform}
<!-- Registration 1 template -->
