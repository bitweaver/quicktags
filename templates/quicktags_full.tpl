{if $gBitSystem->isPackageActive( 'quicktags' )}
{php} include (QUICKTAGS_PKG_PATH."quicktags_inc.php"); {/php}
<div id="quicktagbar" class="row quicktags">
	{forminput}
		{include file="bitpackage:quicktags/edit_help_tool.tpl"}
	{/forminput}
</div>
{/if}
