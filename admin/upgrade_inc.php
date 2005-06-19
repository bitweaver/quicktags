<?php
global $gBitSystem, $gUpgradeFrom, $gUpgradeTo;

$upgrades = array(

'BONNIE' => array(
	'CLYDE' => array(
// STEP 1
array( 'DATADICT' => array(
array( 'RENAMECOLUMN' => array(
	'tiki_quicktags' => array( '`tagId`' => '`tag_id` I4 AUTO' ),
)),
array( 'ALTER' => array(
	'tiki_quicktags' => array(
		'tagpos' => array( '`tagpos`', 'I4' ), // , 'NOTNULL' ),
		'format_guid' => array( '`format_guid`', 'VARCHAR(16)' ), // , 'NOTNULL' ),
	),
))
)),

// STEP 3
array( 'QUERY' =>
	array( 'SQL92' => array(
"UPDATE `".BIT_DB_PREFIX."tiki_quicktags` SET `tagicon`='bold' WHERE taglabel='bold'",
"UPDATE `".BIT_DB_PREFIX."tiki_quicktags` SET `tagicon`='italic' WHERE taglabel='italic'",
"UPDATE `".BIT_DB_PREFIX."tiki_quicktags` SET `tagicon`='underline' WHERE taglabel='underline'",
"UPDATE `".BIT_DB_PREFIX."tiki_quicktags` SET `tagicon`='table' WHERE taglabel='table'",
"UPDATE `".BIT_DB_PREFIX."tiki_quicktags` SET `tagicon`='new_table' WHERE taglabel='table new'",
"UPDATE `".BIT_DB_PREFIX."tiki_quicktags` SET `tagicon`='ext_link' WHERE taglabel='external link'",
"UPDATE `".BIT_DB_PREFIX."tiki_quicktags` SET `tagicon`='wiki_link' WHERE taglabel='wiki link'",
"UPDATE `".BIT_DB_PREFIX."tiki_quicktags` SET `tagicon`='h1' WHERE taglabel='heading1'",
"UPDATE `".BIT_DB_PREFIX."tiki_quicktags` SET `tagicon`='title_bar' WHERE taglabel='title bar'",
"UPDATE `".BIT_DB_PREFIX."tiki_quicktags` SET `tagicon`='box' WHERE taglabel='box'",
"UPDATE `".BIT_DB_PREFIX."tiki_quicktags` SET `tagicon`='rss' WHERE taglabel='rss feed'",
"UPDATE `".BIT_DB_PREFIX."tiki_quicktags` SET `tagicon`='dyn_content' WHERE taglabel='dynamic content'",
"UPDATE `".BIT_DB_PREFIX."tiki_quicktags` SET `tagicon`='tagline' WHERE taglabel='tagline'",
"UPDATE `".BIT_DB_PREFIX."tiki_quicktags` SET `tagicon`='hr' WHERE taglabel='hr'",
"UPDATE `".BIT_DB_PREFIX."tiki_quicktags` SET `tagicon`='align_center' WHERE taglabel='center text'",
"UPDATE `".BIT_DB_PREFIX."tiki_quicktags` SET `tagicon`='colored_text' WHERE taglabel='colored text'",
"UPDATE `".BIT_DB_PREFIX."tiki_quicktags` SET `tagicon`='dyn_vars' WHERE taglabel='dynamic variable'",
"UPDATE `".BIT_DB_PREFIX."tiki_quicktags` SET `tagicon`='image' WHERE taglabel='image'",
"UPDATE `".BIT_DB_PREFIX."tiki_quicktags` SET `tagpos`='5' WHERE `tagicon`='bold'",
"UPDATE `".BIT_DB_PREFIX."tiki_quicktags` SET `tagpos`='10' WHERE `tagicon`='italic'",
"UPDATE `".BIT_DB_PREFIX."tiki_quicktags` SET `tagpos`='15' WHERE `tagicon`='underline'",
"UPDATE `".BIT_DB_PREFIX."tiki_quicktags` SET `tagpos`='20' WHERE `tagicon`='colored_text'",
"INSERT INTO `".BIT_DB_PREFIX."tiki_quicktags` (`tagpos`,`taglabel`,`taginsert`,`tagicon`) VALUES ('25','colored background','++yellow:text++','colored_background')",
"INSERT INTO `".BIT_DB_PREFIX."tiki_quicktags` (`tagpos`,`taglabel`,`taginsert`,`tagicon`) VALUES ('30','spacer','','spacer')",
"INSERT INTO `".BIT_DB_PREFIX."tiki_quicktags` (`tagpos`,`taglabel`,`taginsert`,`tagicon`) VALUES ('35','bullet list','*text','list_bullet')",
"INSERT INTO `".BIT_DB_PREFIX."tiki_quicktags` (`tagpos`,`taglabel`,`taginsert`,`tagicon`) VALUES ('40','enumerated list','#text','list_enum')",
"INSERT INTO `".BIT_DB_PREFIX."tiki_quicktags` (`tagpos`,`taglabel`,`taginsert`,`tagicon`) VALUES ('45','indent list without bullet or number','+text','list_indent')",
"INSERT INTO `".BIT_DB_PREFIX."tiki_quicktags` (`tagpos`,`taglabel`,`taginsert`,`tagicon`) VALUES ('50','term and definition list','term:definition','list_def')",
"INSERT INTO `".BIT_DB_PREFIX."tiki_quicktags` (`tagpos`,`taglabel`,`taginsert`,`tagicon`) VALUES ('55','spacer','','spacer')",
"UPDATE `".BIT_DB_PREFIX."tiki_quicktags` SET `tagpos`='5', `taglabel`='large heading' WHERE `tagicon`='h1'",
"INSERT INTO `".BIT_DB_PREFIX."tiki_quicktags` (`tagpos`,`taglabel`,`taginsert`,`tagicon`) VALUES ('65','medium heading','!!text','h2')",
"INSERT INTO `".BIT_DB_PREFIX."tiki_quicktags` (`tagpos`,`taglabel`,`taginsert`,`tagicon`) VALUES ('70','small heading','!!!text','h3')",
"INSERT INTO `".BIT_DB_PREFIX."tiki_quicktags` (`tagpos`,`taglabel`,`taginsert`,`tagicon`) VALUES ('75','spacer','','spacer')",
"UPDATE `".BIT_DB_PREFIX."tiki_quicktags` SET `tagpos`='80' WHERE `tagicon`='title_bar'",
"UPDATE `".BIT_DB_PREFIX."tiki_quicktags` SET `tagpos`='85' WHERE `tagicon`='box'",
"UPDATE `".BIT_DB_PREFIX."tiki_quicktags` SET `tagpos`='90' WHERE `tagicon`='hr'",
"INSERT INTO `".BIT_DB_PREFIX."tiki_quicktags` (`tagpos`,`taglabel`,`taginsert`,`tagicon`) VALUES ('95','create a new page in a multi-page post','...page...','new_page')",
"UPDATE `".BIT_DB_PREFIX."tiki_quicktags` SET `tagpos`='100' WHERE `tagicon`='align_center'",
"INSERT INTO `".BIT_DB_PREFIX."tiki_quicktags` (`tagpos`,`taglabel`,`taginsert`,`tagicon`) VALUES ('105','spacer','','spacer')",
"UPDATE `".BIT_DB_PREFIX."tiki_quicktags` SET `tagpos`='110' WHERE `tagicon`='image'",
"INSERT INTO `".BIT_DB_PREFIX."tiki_quicktags` (`tagpos`,`taglabel`,`taginsert`,`tagicon`) VALUES ('115','newline','','')",
"UPDATE `".BIT_DB_PREFIX."tiki_quicktags` SET `tagpos`='120' WHERE `tagicon`='table'",
"UPDATE `".BIT_DB_PREFIX."tiki_quicktags` SET `tagpos`='125' WHERE `tagicon`='new_table'",
"INSERT INTO `".BIT_DB_PREFIX."tiki_quicktags` (`tagpos`,`taglabel`,`taginsert`,`tagicon`) VALUES ('130','spacer','','spacer')",
"UPDATE `".BIT_DB_PREFIX."tiki_quicktags` SET `tagpos`='135' WHERE `tagicon`='wiki_link'",
"UPDATE `".BIT_DB_PREFIX."tiki_quicktags` SET `tagpos`='140' WHERE `tagicon`='ext_link'",
"UPDATE `".BIT_DB_PREFIX."tiki_quicktags` SET `tagpos`='145' WHERE `tagicon`='rss'",
"UPDATE `".BIT_DB_PREFIX."tiki_quicktags` SET `tagpos`='150' WHERE `tagicon`='tagline'",
"INSERT INTO `".BIT_DB_PREFIX."tiki_quicktags` (`tagpos`,`taglabel`,`taginsert`,`tagicon`) VALUES ('155','spacer','','spacer')",
"UPDATE `".BIT_DB_PREFIX."tiki_quicktags` SET `tagpos`='160' WHERE `tagicon`='dyn_vars'",
"UPDATE `".BIT_DB_PREFIX."tiki_quicktags` SET `tagpos`='165' WHERE `tagicon`='dyn_content'",
"INSERT INTO `".BIT_DB_PREFIX."tiki_quicktags` (`tagpos`,`taglabel`,`taginsert`,`tagicon`) VALUES ('170','table of contents (links to headings in page)','{maketoc}','maketoc')",
"INSERT INTO `".BIT_DB_PREFIX."tiki_quicktags` (`tagpos`,`taglabel`,`taginsert`,`tagicon`) VALUES ('175','table of contents (if part of a book)','{toc}','toc')",
"UPDATE `".BIT_DB_PREFIX."tiki_quicktags` SET `format_guid`='tikiwiki'",
		),
)),

	)
)
);

if( isset( $upgrades[$gUpgradeFrom][$gUpgradeTo] ) ) {
	$gBitSystem->registerUpgrade( QUICKTAGS_PKG_NAME, $upgrades[$gUpgradeFrom][$gUpgradeTo] );
}


?>
