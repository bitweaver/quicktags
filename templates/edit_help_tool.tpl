{strip}
{if $gContent->mInfo.format_guid}
	{assign var=fg value=`$gContent->mInfo.format_guid`}
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
						{biticon iforce=icon ipackage=quicktags iname=$qt[qtg].tagicon class="quicktag icon" iexplain="`$qt[qtg].taglabel`"}
					{else}
						<a onmouseover="$('quicktitle').innerHTML='{$qt[qtg].taglabel}: {$qt[qtg].taginsert|escape:"javascript"|escape:"htmlall"}'" title="{tr}{$qt[qtg].taglabel}{/tr}" href="javascript:insertAt('{$textarea_id}','{$qt[qtg].taginsert|escape:"javascript"|escape:"htmlall"}');">
							{biticon iforce=icon ipackage=quicktags iname=$qt[qtg].tagicon class="quicktag icon" iexplain="`$qt[qtg].taglabel`"}
						</a>
					{/if}
				{/section}
			{/if}
		</div>
	{/if}
{/foreach}

{foreach from=$gLibertySystem->mPlugins item=plugin}
	{if $plugin.is_active == 'y' and $plugin.taginsert and $plugin.biticon}
		<a onmouseover="$('quicktitle').innerHTML='{$plugin.title}: {$plugin.taginsert|escape:"javascript"|escape:"htmlall"}'" title="{$plugin.title}" href="javascript:insertAt('{$textarea_id}','{$plugin.taginsert|escape:"javascript"|escape:"htmlall"}');">
			{eval var=`$plugin.biticon`}
		</a>
	{/if}
{/foreach}

{biticon iforce=icon ipackage=quicktags iname="spacer" class="quicktag icon" iexplain="spacer"}

<a onmouseover="$('quicktitle').innerHTML='{tr}Secial Characters{/tr}'" title="{tr}Special Characters{/tr}" href="#" onclick="javascript:window.open('{$smarty.const.QUICKTAGS_PKG_URL}special_chars.php?textarea_id={$textarea_id}','','menubar=no,width=252,height=35');">
	{biticon iforce=icon ipackage="quicktags" iname="special_chars" class="quicktag icon" iexplain="special characters"}
</a>

{if !$no_resize}
	{biticon iforce=icon ipackage=quicktags iname="spacer" class="quicktag icon" iexplain="spacer"}

	<a onmouseover="$('quicktitle').innerHTML='{tr}Enlarge area hight{/tr}'" href="javascript:textareasize('{$textarea_id}', +10)" title="{tr}Enlarge area height{/tr}">
		{biticon iforce=icon class="quicktag icon" ipackage="quicktags" iname="enlargeH" iexplain="Enlarge area height"}
	</a>

	<a onmouseover="$('quicktitle').innerHTML='{tr}Reduce area hight{/tr}'" href="javascript:textareasize('{$textarea_id}', -10)" title="{tr}Reduce area height{/tr}">
		{biticon iforce=icon class="quicktag icon" ipackage="quicktags" iname="reduceH" iexplain="Reduce area height"}
	</a>
{/if}

<div id="quicktitle" class="small">&nbsp;</div>
{if !( $gBitSystem->isPackageActive( 'tinymce' ) and $browser_supports_tinymce) and $gBitSystem->isPackageActive( 'bnspell' )}
	<script src="{$smarty.const.BNSPELL_PKG_URL}cpaint/cpaint2.inc.compressed.js" type="text/javascript"></script>
	<script src="{$smarty.const.BNSPELL_PKG_URL}js/spell_checker.js" type="text/javascript"></script>
{/if}
{/strip}
