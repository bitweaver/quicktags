{if $gBitSystem->isPackageActive( 'quicktags' )}
{include_php file="`$smarty.const.QUICKTAGS_PKG_PATH`quicktags_inc.php"}
<div id="quicktagbar" class="control-group quicktags">
	{forminput}
		{include file="bitpackage:quicktags/edit_help_tool.tpl"}
	{/forminput}
</div>
{/if}
