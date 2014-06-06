{if $gBitSystem->isPackageActive( 'quicktags' )}
{include_php file="`$smarty.const.QUICKTAGS_PKG_PATH`quicktags_inc.php"}
<div id="quicktagbar" class="form-group quicktags">
	{forminput}
		{include file="bitpackage:quicktags/edit_help_tool.tpl"}
	{/forminput}
</div>
{/if}
