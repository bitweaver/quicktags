{strip}
{if $gContent->mInfo.format_guid}
	{assign var=fg value=$gContent->mInfo.format_guid}
{elseif !$fg}
	{assign var=fg value=$gBitSystem->getConfig('default_format')}
{/if}

{foreach from=$quicktags key=qtfg item=qt}
	{if $gLibertySystem->mPlugins.$qtfg.is_active =='y'}
		<div id="qt{$textarea_id}{$qtfg}" style="display:{if $qtfg eq $fg}block{else}none{/if}">
			{if $gBitSystem->isPackageActive( 'tinymce' ) and !$gBitSystem->isFeatureActive( 'tinymce_ask' ) and $fg eq 'bithtml' and $qtfg eq 'bithtml' and $browser_supports_tinymce}
			{else}
				{section name=qtg loop=$qt}
					{if $qt[qtg].taglabel eq 'newline'}
						<br />
					{elseif $qt[qtg].taglabel eq 'spacer'}
						{biticon ipackage=quicktags iname=$qt[qtg].tagicon ilocation="quicktag" iexplain="`$qt[qtg].taglabel`"}
					{else}
						<a onmouseover="document.getElementById('quicktitle').innerHTML='{$qt[qtg].taglabel}: {$qt[qtg].taginsert|escape:"javascript"|escape:"htmlall"}'" title="{tr}{$qt[qtg].taglabel}{/tr}" href="javascript:BitBase.insertAt('{$textarea_id}','{$qt[qtg].taginsert|escape:"javascript"|escape:"htmlall"}');">
							{biticon ipackage=quicktags iname=$qt[qtg].tagicon ilocation="quicktag" iexplain="`$qt[qtg].taglabel`"}
						</a>
					{/if}
				{/section}
			{/if}
		</div>
	{/if}
{/foreach}

{foreach from=$gLibertySystem->mPlugins item=plugin}
	{if $plugin.is_active == 'y' and $plugin.taginsert and $plugin.biticon}
		<a onmouseover="document.getElementById('quicktitle').innerHTML='{$plugin.title|escape:"javascript"}: {$plugin.taginsert|escape:"javascript"|escape:"htmlall"}'" title="{$plugin.title|escape}" href="javascript:BitBase.insertAt('{$textarea_id}','{$plugin.taginsert|escape:"javascript"|escape:"htmlall"}');">
			{eval var=$plugin.biticon}
		</a>
	{/if}
	{if $plugin.is_active == 'y' and $plugin.taginsert and $plugin.booticon}
		<a onmouseover="document.getElementById('quicktitle').innerHTML='{$plugin.title|escape:"javascript"}: {$plugin.taginsert|escape:"javascript"|escape:"htmlall"}'" title="{$plugin.title|escape}" href="javascript:BitBase.insertAt('{$textarea_id}','{$plugin.taginsert|escape:"javascript"|escape:"htmlall"}');">{eval var=$plugin.booticon}</a> {/if}
{/foreach}

{biticon ipackage=quicktags iname="spacer" ilocation="quicktag" iexplain="spacer"}

<a onmouseover="document.getElementById('quicktitle').innerHTML='{tr}Special Characters{/tr}'" title="{tr}Special Characters{/tr}" href="#" onclick="javascript:window.open('{$smarty.const.QUICKTAGS_PKG_URL}special_chars.php?textarea_id={$textarea_id}','','menubar=no,width=252,height=35');">
	{biticon ipackage="quicktags" iname="special_chars" ilocation="quicktag" iexplain="special characters"}
</a>

{if !$no_resize}
	{biticon ipackage=quicktags iname="spacer" ilocation="quicktag" iexplain="spacer"}

	<a onmouseover="document.getElementById('quicktitle').innerHTML='{tr}Enlarge textarea height{/tr}'" href="javascript:textareasize('{$textarea_id}', +10)" title="{tr}Enlarge textarea height{/tr}">{booticon ilocation="quicktag" ipackage="quicktags" iname="icon-resize-full" iexplain="Enlarge textarea height"}</a> <a onmouseover="document.getElementById('quicktitle').innerHTML='{tr}Reduce textarea height{/tr}'" href="javascript:textareasize('{$textarea_id}', -10)" title="{tr}Reduce textarea height{/tr}">{booticon ilocation="quicktag" ipackage="quicktags" iname="icon-resize-small" iexplain="Reduce textarea height"}</a>
{/if}

<div id="quicktitle" class="small">&nbsp;</div>
{if !( $gBitSystem->isPackageActive( 'tinymce' ) and $browser_supports_tinymce) and $gBitSystem->isPackageActive( 'bnspell' )}
	<script src="{$smarty.const.BNSPELL_PKG_URL}cpaint/cpaint2.inc.compressed.js" type="text/javascript"></script>
	<script src="{$smarty.const.BNSPELL_PKG_URL}js/spell_checker.js" type="text/javascript"></script>
{/if}
{/strip}
