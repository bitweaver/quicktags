{strip}
{if $gContent->mInfo.format_guid}
	{assign var=fg value=`$gContent->mInfo.format_guid`}
{else}
	{assign var=fg value=`$default_format`}
{/if}

{foreach from=$quicktags key=qtfg item=qt}
	<div id="qt{$qtfg}" style="display:{if $qtfg eq $fg}block{else}none{/if}">
		{if $gBitSystem->isPackageActive( 'tinymce' ) and !$gBitSystem->isFeatureActive( 'tinymce_ask' ) and $fg eq 'bithtml' and $qtfg eq 'bithtml' and $browser_supports_tinymce}
		{else}
			{section name=qtg loop=$qt}
				{if $qt[qtg].taglabel eq 'newline'}
					<br />
				{elseif $qt[qtg].taglabel eq 'spacer'}
					{biticon iforce=icon ipackage=quicktags iname=$qt[qtg].tagicon class="quicktag icon" iexplain="`$qt[qtg].taglabel`"}
				{else}
					<a title="{tr}{$qt[qtg].taglabel}{/tr}" href="javascript:insertAt('{$textarea_id}','{$qt[qtg].taginsert|escape:"javascript"|escape:"htmlall"}');">
						{biticon iforce=icon ipackage=quicktags iname=$qt[qtg].tagicon class="quicktag icon" iexplain="`$qt[qtg].taglabel`"}
					</a>
				{/if}
			{/section}

			{biticon iforce=icon ipackage=quicktags iname='spacer' class="quicktag icon" iexplain="spacer"}

			<a title="{tr}special characters{/tr}" href="#" onclick="javascript:window.open('{$smarty.const.KERNEL_PKG_URL}special_chars.php?textarea_id={$textarea_id}','','menubar=no,width=252,height=35');">
				{biticon iforce=icon ipackage="quicktags" iname="special_chars" class="quicktag icon" iexplain="special characters"}
			</a>

			{if !$no_resize}
				{biticon iforce=icon ipackage=quicktags iname='spacer' class="quicktag icon" iexplain="spacer"}

				<a href="javascript:textareasize('{$textarea_id}', +10)" title="{tr}Enlarge area height{/tr}">
					{biticon iforce=icon class="quicktag icon" ipackage="wiki" iname="enlargeH" iexplain="Enlarge area height"}
				</a>

				<a href="javascript:textareasize('{$textarea_id}', -10)" title="{tr}Reduce area height{/tr}">
					{biticon iforce=icon class="quicktag icon" ipackage="wiki" iname="reduceH" iexplain="Reduce area height"}
				</a>
			{/if}
		{/if}
	</div>
{/foreach}
{/strip}
