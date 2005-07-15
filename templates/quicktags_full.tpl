{if $gBitSystem->isPackageActive( 'quicktags' ) and $quicktags}
<div id="quicktagbar" class="row quicktags">
	{forminput}
		{include file="bitpackage:quicktags/edit_help_tool.tpl"}
	{/forminput}
</div>
{/if}
