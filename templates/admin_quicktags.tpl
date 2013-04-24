{strip}
<div class="floaticon">
	<a href="{$smarty.const.QUICKTAGS_PKG_URL}admin/admin_quicktags.php?format_guid={$smarty.request.format_guid}">{booticon iname="icon-file" ipackage="icons" iexplain="new quicktag"}</a>
	{bithelp}
</div>

<div class="admin quicktags">
	<div class="header">
		<h1>{tr}Admin Quicktags{/tr}</h1>
	</div>

	<div class="body">
		{form legend="Create/Edit QuickTags"}
			<input type="hidden" name="tag_id" value="{$smarty.request.tag_id}" />
			<input type="hidden" name="format_guid" value="{$smarty.request.format_guid}" />

			<div class="control-group">
				{forminput}
					<a href="javascript:BitBase.insertAt('taglabel','newline');">{tr}Insert new line{/tr}</a><br />
					<a href="javascript:BitBase.insertAt('taglabel','spacer');javascript:BitBase.insertAt('tagicon','spacer');">{tr}Insert spacer{/tr}</a>
				{/forminput}
			</div>

			<div class="control-group">
				{formlabel label="Position" for="tagpos"}
				{forminput}
					<input type="text" maxlength="5" size="5" name="tagpos" id="tagpos" value="{$info.tagpos|escape}" />
				{/forminput}
			</div>

			<div class="control-group">
				{formlabel label="Label" for="taglabel"}
				{forminput}
					<input type="text" maxlength="255" size="20" id="taglabel" name="taglabel" value="{$info.taglabel|escape}" />
				{/forminput}
			</div>

			<div class="control-group">
				{formlabel label="Insert" for="taglabel"}
				{forminput}
					<input type="text" maxlength="255" size="40" name="taginsert" value="{$info.taginsert|escape}" />
					{formhelp note="use 'text' for figuring the selection."}
				{/forminput}
			</div>

			<div class="control-group">
				{formlabel label="Name of tag icon" for="tagicon"}
				{forminput}
					<input type="text" maxlength="255" size="40" id="tagicon" name="tagicon" value="{$info.tagicon|escape}" />
					{formhelp note="The name of the icon located in quicktags/icons/ without the extension."}
				{/forminput}
			</div>

			<div class="control-group submit">
				<input type="submit" class="btn" name="save" value="{tr}Save{/tr}" />
			</div>
		{/form}

		<h2>{tr}Preview{/tr}</h2>
		{foreach item=tag from=$quicktags_preview}
			{if $tag.taglabel eq 'newline'}
				<br />
			{elseif $tag.taglabel eq 'spacer'}
				{biticon iforce=icon ipackage=quicktags iname=$tag.tagicon iclass="quicktag icon" iexplain="`$tag.taglabel`"}
			{else}
				<a title="{tr}{$tag.taglabel}{/tr}" href="javascript:BitBase.insertAt('test_line','{$tag.taginsert|escape:"javascript"}');">{biticon iforce=icon ipackage=quicktags iname=$tag.tagicon iclass="quicktag icon" iexplain="`$tag.taglabel`"}</a>
			{/if}
		{/foreach}

		<form action="">
			<div>
				<textarea cols="50" rows="3" id="test_line"></textarea><br />
				<input type="reset" name="clear" value="{tr}Clear{/tr}" />
			</div>
		</form>

		<table class="table data">
			<caption>{tr}QuickTags{/tr}</caption>
			<tr>
				<th>{smartlink format_guid=$smarty.request.format_guid ititle="Position" isort=tagpos idefault=1 icontrol=$listInfo}</th>
				<th>{smartlink format_guid=$smarty.request.format_guid ititle="Label" isort=taglabel icontrol=$listInfo}</th>
				<th>{smartlink format_guid=$smarty.request.format_guid ititle="Insert" isort=taginsert icontrol=$listInfo}</th>
				<th>{smartlink format_guid=$smarty.request.format_guid ititle="Icon" isort=tagicon icontrol=$listInfo}</th>
				<th>{tr}Action{/tr}</th>
			</tr>
			{foreach item=tag from=$quicktags}
				<tr class="{cycle values="odd,even"}">
					<td>{$tag.tagpos}</td>
					<td>{$tag.taglabel}</td>
					<td>{$tag.taginsert|escape}</td>
					<td>{if $tag.taglabel ne 'newline'}{biticon iforce=icon ipackage="quicktags" iname=$tag.iconpath iexplain="`$tag.taglabel`"}{/if} {$tag.iconpath}</td>
					<td class="actionicon">
						{smartlink format_guid=$smarty.request.format_guid tag_id=$tag.tag_id ititle="Edit" icontrol=$listInfo booticon="icon-edit"}
						{smartlink format_guid=$smarty.request.format_guid remove=$tag.tag_id ititle="Remove" icontrol=$listInfo booticon="icon-trash"}
					</td>
				</tr>
			{/foreach}
		</table>

		{pagination format_guid=$smarty.request.format_guid}
	</div><!-- end .body -->
</div><!-- end .quicktags -->
{/strip}
