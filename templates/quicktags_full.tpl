{if $gBitSystemPrefs.package_quicktags eq 'y' and $quicktags}
<div id="quicktagbar" class="row quicktags">
	{forminput}
		{include file="bitpackage:quicktags/edit_help_tool.tpl"}
	{/forminput}
</div>
{/if}
