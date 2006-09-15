{strip}
<div class="floaticon">
	<a href="{$smarty.const.QUICKTAGS_PKG_URL}admin/admin_quicktags.php?format_guid={$format_guid}">{biticon ipackage="icons" iname="document-new" iexplain="new quicktag"}</a>
	{bithelp}
</div>

<div class="admin quicktags">
	<div class="header">
		<h1>{tr}Admin Quicktags{/tr}</h1>
	</div>

	<div class="body">
		{form legend="Create/Edit QuickTags"}
			<input type="hidden" name="tag_id" value="{$tag_id|escape}" />
			<input type="hidden" name="offset" value="{$offset|escape}" />
			<input type="hidden" name="sort_mode" value="{$sort_mode|escape}" />
			<input type="hidden" name="format_guid" value="{$format_guid}" />

			<div class="row">
				{forminput}
					<a href="javascript:insertAt('taglabel','newline');">{tr}Insert new line{/tr}</a><br />
					<a href="javascript:insertAt('taglabel','spacer');javascript:insertAt('tagicon','spacer');">{tr}Insert spacer{/tr}</a>
				{/forminput}
			</div>

			<div class="row">
				{formlabel label="Position" for="tagpos"}
				{forminput}
					<input type="text" maxlength="5" size="5" name="tagpos" id="tagpos" value="{$info.tagpos|escape}" />
				{/forminput}
			</div>

			<div class="row">
				{formlabel label="Label" for="taglabel"}
				{forminput}
					<input type="text" maxlength="255" size="20" id="taglabel" name="taglabel" value="{$info.taglabel|escape}" />
				{/forminput}
			</div>

			<div class="row">
				{formlabel label="Insert" for="taglabel"}
				{forminput}
					<input type="text" maxlength="255" size="40" name="taginsert" value="{$info.taginsert|escape}" />
					{formhelp note="use 'text' for figuring the selection."}
				{/forminput}
			</div>

			<div class="row">
				{formlabel label="Name of tag icon" for="tagicon"}
				{forminput}
					<input type="text" maxlength="255" size="40" id="tagicon" name="tagicon" value="{$info.tagicon|escape}" />
					{formhelp note="The name of the icon located in quicktags/icons/ without the extension."}
				{/forminput}
			</div>

			<div class="row submit">
				<input type="submit" name="save" value="{tr}Save{/tr}" />
			</div>
		{/form}

		<h2>{tr}Preview{/tr}</h2>
		{foreach item=tag from=`$quicktags_preview.$format_guid`}
			{if $tag.taglabel eq 'newline'}
				<br />
			{elseif $tag.taglabel eq 'spacer'}
				{biticon iforce=icon ipackage=quicktags iname=$tag.tagicon iclass="quicktag icon" iexplain="`$tag.taglabel`"}
			{else}
				<a title="{tr}{$tag.taglabel}{/tr}" href="javascript:insertAt('test_line','{$tag.taginsert|escape:"htmlall"}');">{biticon iforce=icon ipackage=quicktags iname=$tag.tagicon iclass="quicktag icon" iexplain="`$tag.taglabel`"}</a>
			{/if}
		{/foreach}

		<form action="">
			<div>
				<textarea cols="50" rows="3" id="test_line"></textarea><br />
				<input type="reset" name="clear" value="{tr}Clear{/tr}" />
			</div>
		</form>

		<table class="data">
			<caption>{tr}QuickTags{/tr}</caption>
			<tr>
				<th><a href="{$smarty.const.QUICKTAGS_PKG_URL}admin/admin_quicktags.php?offset={$offset}&amp;sort_mode={if $sort_mode eq 'tagpos_desc'}tagpos_asc{else}tagpos_desc{/if}">{tr}Position{/tr}</a></th>
				<th><a href="{$smarty.const.QUICKTAGS_PKG_URL}admin/admin_quicktags.php?offset={$offset}&amp;sort_mode={if $sort_mode eq 'taglabel_desc'}taglabel_asc{else}taglabel_desc{/if}">{tr}Label{/tr}</a></th>
				<th><a href="{$smarty.const.QUICKTAGS_PKG_URL}admin/admin_quicktags.php?offset={$offset}&amp;sort_mode={if $sort_mode eq 'taginsert_desc'}taginsert_asc{else}taginsert_desc{/if}">{tr}Insert{/tr}</a></th>
				<th><a href="{$smarty.const.QUICKTAGS_PKG_URL}admin/admin_quicktags.php?offset={$offset}&amp;sort_mode={if $sort_mode eq 'tagicon_desc'}tagicon_asc{else}tagicon_desc{/if}">{tr}Icon{/tr}</a></th>
				<th>{tr}action{/tr}</th>
			</tr>
			{foreach item=tag from=$quicktags.$format_guid}
				<tr class="{cycle values="odd,even" }">
					<td>{$tag.tagpos}</td>
					<td>{$tag.taglabel}</td>
					<td>{$tag.taginsert|escape}</td>
					<td>{if $tag.taglabel ne 'newline'}{biticon iforce=icon ipackage="quicktags" iname=$tag.iconpath iexplain="`$tag.taglabel`"}{/if} {$tag.iconpath}</td>
					<td class="actionicon">
					   <a href="{$smarty.const.QUICKTAGS_PKG_URL}admin/admin_quicktags.php?offset={$offset}&amp;sort_mode={$sort_mode}&amp;tag_id={$tag.tag_id}">{biticon ipackage="icons" iname="accessories-text-editor" iexplain="edit"}</a>
					   <a href="{$smarty.const.QUICKTAGS_PKG_URL}admin/admin_quicktags.php?offset={$offset}&amp;sort_mode={$sort_mode}&amp;remove={$tag.tag_id}">{biticon ipackage="icons" iname="edit-delete" iexplain="remove"}</a>
					</td>
				</tr>
			{/foreach}
		</table>

		{pagination format_guid=$format_guid}

	</div><!-- end .body -->
</div><!-- end .quicktags -->
{/strip}
