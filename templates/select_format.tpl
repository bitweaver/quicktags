{* $Header$ *}

<div class="admin quicktags">
	<div class="header">
		<h1>{tr}Select Format GUID{/tr}</h1>
	</div>

	<div class="body">
		{legend legend="Select the format plugin you wish to modify"}
			{foreach from=$gLibertySystem->mPlugins item=plugin key=guid}
				{if $plugin.plugin_type eq 'format'}
					<div class="form-group">
						{forminput}
							<a href="{$smarty.const.QUICKTAGS_PKG_URL}admin/admin_quicktags.php?format_guid={$guid}">{$plugin.edit_label}</a>
							{formhelp note=$plugin.description}
						{/forminput}
					</div>
				{/if}
			{/foreach}
			{*<div class="form-group">
				{forminput}
					<a href="{$smarty.const.QUICKTAGS_PGK_URL}admin/admin_data_quicktags.php">Data Plugins - not available yet</a>
					{formhelp note="Here you can modify quicktag icons associated with data plugins. These use the same syntax regardless of format."}
				{/forminput}
			</div>*}

			<div class="form-group">
				{formhelp note="For more information and to enable / disable these plugins, please view the Liberty Plugins page."}
			</div>
		{/legend}
	</div><!-- end .body -->
</div><!-- end .login -->
