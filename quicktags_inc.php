<?php
/**
* quicktags package
*
* @author   
* @version  $Revision$
* @package  quicktags
* @subpackage  functions
*/

/**
 * required include
 */
global $gBitSmarty;
include_once( QUICKTAGS_PKG_PATH.'Quicktags.php' );
$gQuicktags = new QuickTags();
$listHash = array(
	'max_records' => -1,
	'sort_mode' => 'tagpos_asc',
);
$quicktags = $gQuicktags->getList( $listHash );
$gBitSmarty->assign_by_ref( 'quicktags', $quicktags );
?>
