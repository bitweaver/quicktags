<?php

$tables = array(

'quicktags' => "
	tag_id I4 PRIMARY,
	format_guid C(16) NOTNULL,
	tagpos I4,
	taglabel C(255),
	taginsert C(255),
	tagicon C(255)
"

);

global $gBitInstaller, $gBitDbType;

foreach( array_keys( $tables ) AS $tableName ) {
	$gBitInstaller->registerSchemaTable( QUICKTAGS_PKG_NAME, $tableName, $tables[$tableName] );
}

$gBitInstaller->registerPackageInfo( QUICKTAGS_PKG_NAME, array(
	'description' => "Quicktags are configurable buttons displayed above textareas, which simplifies the addition of wiki tags.",
	'license' => '<a href="http://www.gnu.org/licenses/licenses.html#LGPL">LGPL</a>',
) );

// ### Indexes
$indices = array(
	'quicktags_tag_id_idx' => array('table' => 'quicktags', 'cols' => 'tag_id', 'opts' => NULL ),
);
$gBitInstaller->registerSchemaIndexes( QUICKTAGS_PKG_NAME, $indices );

// Data pump - note sequence registration is last due to this pump
$format_guids = array(
	'markdown' => array(
		array(	'5','bold',											'bold',				'__text__'),
		array( '10','italic',										'italic',			"_text_"),
		array( '30','spacer',										'spacer',			''),
		array( '35','bullet list',									'list_bullet',		'* text'),
		array( '40','enumerated list',								'list_enum',		'1. text'),
		array( '55','spacer',										'spacer',			''),
		array( '60','large heading',								'h1',				'# text'),
		array( '65','medium heading',								'h2',				'## text'),
		array( '70','small heading',								'h3',				'### text'),
		array( '75','spacer',										'spacer',			''),
		array( '90','horizontal line',								'hr',				'---'),
		array('115','spacer',										'spacer',			''),
		array('120','table',										'table',			'use html table'),
		array('130','spacer',										'spacer',			''),
		array('135','wiki link',									'wiki_link',		'((text))'),
		array('140','external link',								'ext_link',			'[text](http://example.com)'),
	),
	'pearwiki_tiki' => array(
		array(	'5','bold',											'bold',				'__text__'),
		array( '10','italic',										'italic',			'\'\'text\'\''),
		array( '15','underline',									'underline',		'===text==='),
		array( '20','colored text',									'colored_text',		'~~red:text~~'),
		array( '25','colored background',							'colored_background','++yellow:text++'),
		array( '30','spacer',										'spacer',			''),
		array( '35','bullet list',									'list_bullet',		'*text'),
		array( '40','enumerated list',								'list_enum',		'#text'),
		array( '45','indent list without bullet or number',			'list_indent',		'+text'),
		array( '50','term and definition list',						'list_def',			';term:definition'),
		array( '55','spacer',										'spacer',			''),
		array( '60','large heading',								'h1',				'!text'),
		array( '65','medium heading',								'h2',				'!!text'),
		array( '70','small heading',								'h3',				'!!!text'),
		array( '75','spacer',										'spacer',			''),
		array( '80','title bar',									'title_bar',		'-=text=-'),
		array( '85','box',											'box',				'^text^'),
		array( '90','horizontal line',								'hr',				'---'),
		array( '95','create a new page in a multi-page post',		'new_page',			'...page...'),
		array('100','center text',									'align_center',		'::text::'),
		array('115','spacer',										'spacer',			''),
		array('125','table new',									'new_table',		'||r1c1|r1c2\nr2c1|r2c2||'),
		array('130','spacer',										'spacer',			''),
		array('135','wiki link',									'wiki_link',		'((text))'),
		array('140','external link',								'ext_link',			'[http://example.com|text]'),
	),
	'tikiwiki' => array(
		array(	'5','bold',											'bold',				'__text__'),
		array( '10','italic',										'italic',			'\'\'text\'\''),
		array( '15','underline',									'underline',		'===text==='),
		array( '20','colored text',									'colored_text',		'~~red:text~~'),
		array( '25','colored background',							'colored_background','++yellow:text++'),
		array( '30','spacer',										'spacer',			''),
		array( '35','bullet list',									'list_bullet',		'*text'),
		array( '40','enumerated list',								'list_enum',		'#text'),
		array( '45','indent list without bullet or number',			'list_indent',		'+text'),
		array( '50','term and definition list',						'list_def',			';term:definition'),
		array( '55','spacer',										'spacer',			''),
		array( '60','large heading',								'h1',				'!text'),
		array( '65','medium heading',								'h2',				'!!text'),
		array( '70','small heading',								'h3',				'!!!text'),
		array( '75','spacer',										'spacer',			''),
		array( '80','title bar',									'title_bar',		'-=text=-'),
		array( '85','box',											'box',				'^text^'),
		array( '90','horizontal line',								'hr',				'---'),
		array( '95','create a new page in a multi-page post',		'new_page',			'...page...'),
		array('100','center text',									'align_center',		'::text::'),
		array('115','spacer',										'spacer',			''),
		array('125','table new',									'new_table',		'||r1c1|r1c2\nr2c1|r2c2||'),
		array('130','spacer',										'spacer',			''),
		array('135','wiki link',									'wiki_link',		'((text))'),
		array('140','external link',								'ext_link',			'[http://example.com|text]'),
	),
	'pearwiki' => array(
		array(	'5','bold',											'bold',				'**text**'),
		array( '10','italic',										'italic',			"//text//"),
//		array( '15','underline',									'underline',		''),
//		array( '20','colored text',									'colored_text',		''),
//		array( '25','colored background',							'colored_background',''),
		array( '30','spacer',										'spacer',			''),
		array( '35','bullet list',									'list_bullet',		'* text'),
		array( '40','enumerated list',								'list_enum',		'# text'),
		array( '45','indent list without bullet or number',			'list_indent',		'+ text'),
		array( '50','term and definition list',						'list_def',			': term : definition'),
		array( '55','spacer',										'spacer',			''),
		array( '60','large heading',								'h1',				'+ text'),
		array( '65','medium heading',								'h2',				'++ text'),
		array( '70','small heading',								'h3',				'+++ text'),
		array( '75','spacer',										'spacer',			''),
//		array( '80','title bar',									'title_bar',		''),
//		array( '85','box',											'box',				''),
		array( '90','horizontal line',								'hr',				'----'),
		array( '95','create a new page in a multi-page post',		'new_page',			'...page...'),
//		array('100','center text',									'align_center',		''),
		array('110','image',										'image',			'[http://example.com/image.gif text]'),
		array('115','spacer',										'spacer',			''),
		array('125','table',										'table',			'||r1c1||r1c2||\n||r2c1||r2c2||'),
		array('130','spacer',										'spacer',			''),
//		array('135','wiki link',									'wiki_link',		''),
		array('140','external link',								'ext_link',			'[http://example.com text]'),
	),
	'bithtml' => array(
		array(	'5','bold',											'bold',				'<strong>text</strong>'),
		array( '10','italic',										'italic',			'<em>text</em>'),
		array( '15','underline',									'underline',		'<u>text</u>'),
		array( '20','colored text',									'colored_text',		'<span style="color:red">text</span>'),
		array( '25','colored background',							'colored_background','<span style="background:yellow">text</span>'),
		array( '30','spacer',										'spacer',			''),
		array( '35','bullet list',									'list_bullet',		'<ul>\n<li>text</li>\n</ul>'),
		array( '40','enumerated list',								'list_enum',		'<ol>\n<li>text</li>\n</ol>'),
		array( '45','indent list without bullet or number',			'list_indent',		'+text'),
		array( '50','term and definition list',						'list_def',			'<dl>\n<dt>text</dt>\n<dd></dd>\n</dl>'),
		array( '55','spacer',										'spacer',			''),
		array( '60','large heading',								'h1',				'<h1>text</h1>'),
		array( '65','medium heading',								'h2',				'<h2>text</h2>'),
		array( '70','small heading',								'h3',				'<h3>text</h3>'),
		array( '75','spacer',										'spacer',			''),
		array( '80','title bar',									'title_bar',		'<div class="bitbar">text</div>'),
		array( '85','box',											'box',				'<div class="bitbox">text</div>'),
		array( '90','horizontal line',								'hr',				'<hr />'),
		array( '93','new line',										'new_line',			'<br />'),
		array( '95','create a new page in a multi-page post',		'new_page',			'...page...'),
		array('100','center text',									'align_center',		'<div style="text-align:center;">text</div>'),
		array('110','image',										'image',			'<img src= width= height= align= desc= >'),
		array('115','spacer',										'spacer',			''),
		array('125','table',										'table',			'<table class="bittable">\n<tr>\n<td>text</td>\n</tr>\n</table>'),
		array('130','spacer',										'spacer',			''),
		array('135','wiki link',									'wiki_link',		'((text))'),
		array('140','external link',								'ext_link',			'<a href="http://example.com">text</a>'),
	)
);

// Adjust italic tikiwiki entry to correct escape sequence
if ( $gBitDbType == "firebird" || $gBitDbType == "mssql" || $gBitDbType == "postgres" ) {
	$format_guids['pearwiki_tiki'][1][3] = "''''text''''";
	$format_guids['tikiwiki'][1][3] = "''''text''''";
}

$tag_id_count = 0;
foreach( $format_guids as $fg => $qts ) {
	foreach( $qts as $qt ) {
		$tag_id_count++;
		$gBitInstaller->registerSchemaDefault( QUICKTAGS_PKG_NAME, 
			"INSERT INTO `".BIT_DB_PREFIX."quicktags`	(`tag_id`,`format_guid`,`tagpos`,`taglabel`,`tagicon`,`taginsert`) VALUES ('$tag_id_count','$fg','$qt[0]','$qt[1]','$qt[2]','$qt[3]')"
		);
	}
}
// End data pump

// ### Sequences
$sequences = array (
	'quicktags_tag_id_seq'      => array( 'start' => ($tag_id_count>0 ? $tag_id_count : 1) )
);
$gBitInstaller->registerSchemaSequences( QUICKTAGS_PKG_NAME, $sequences );

