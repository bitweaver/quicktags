<?php
/**
* quicktags package
*
* @author   
* @version  $Revision: 1.2 $
* @package  quicktags
* @subpackage  functions
*/

/**
 * required include
 */
include_once( QUICKTAGS_PKG_PATH.'quicktags_lib.php' );
$quicktags = $quicktagslib->list_quicktags(NULL,0,-1,'tagpos_asc','');
$smarty->assign_by_ref('quicktags', $quicktags["data"]);
?>
