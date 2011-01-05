{$formstart}
{if $pkgdata.name == ''}
<h3>{$mod->Lang('add_paidpkg')}</h3>
{else}
<h3>{$mod->Lang('edit_paidpkg',$pkgdata.name)}</h3>
{/if}

<div class="pageoverflow">
  <p class="pagetext">{$mod->Lang('name')}:</p>
  <p class="pageinput">
    <input type="text" size="20" maxlength="255" value="{$group.groupname}" readonly="true"/>
  </p>
</div>

<div class="pageoverflow">
  <p class="pagetext">{$mod->Lang('invite_code')}:</p>
  <p class="pageinput">
	{$input_code} <a href="#" onclick="$('#{$actionid}code').val(generatecode()); return false;">{$mod->Lang('generate_code')}</a>
  </p>
</div>

<div class="pageoverflow">
  <p class="pagetext"></p>
  <p class="pageinput">
    <input type="hidden" name="{$actionid}groupid" value="{$group.id}"/>
    <input type="submit" name="{$actionid}submit" value="{$mod->Lang('submit')}"/>
    <input type="submit" name="{$actionid}cancel" value="{$mod->Lang('cancel')}"/>
  </p>
</div>

{$formend}

{literal}
<script type="text/javascript">
<!--
function generatecode()
{
	var randomStrLength = 12,
		pool = 'abcdefghijklmnopqrstuvwxyz0123456789',
		randomStr = '';

	for (var i = 0; i < randomStrLength; i++)
	{
		var randomChar = pool.substr(Math.floor(Math.random() * pool.length), 1);
		randomStr += randomChar;   
	}

	return randomStr;
}
//-->
</script>
{/literal}
