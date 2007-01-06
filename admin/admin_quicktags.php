<?php
// $Header: /cvsroot/bitweaver/_bit_quicktags/admin/admin_quicktags.php,v 1.5 2007/01/06 11:02:10 squareing Exp $

require_once( '../../bit_setup_inc.php' );
$gBitSystem->verifyPermission( 'p_admin' );

include_once( QUICKTAGS_PKG_PATH.'Quicktags.php' );
$gQuicktags = new QuickTags();

// send users to guid selection page if we don't know what format
if( !isset( $_REQUEST['format_guid'] ) ) {
	header ( "Location: ".QUICKTAGS_PKG_URL."admin/index.php" );
	die;
}

// process form
if( !empty( $_REQUEST["tag_id"] )) {
	$gBitSmarty->assign('info', $gQuicktags->getQuicktag( $_REQUEST["tag_id"] ));
}

if( isset( $_REQUEST["remove"] )) {
	$gQuicktags->expunge( $_REQUEST["remove"] );
}

if( isset( $_REQUEST["save"] )) {
	$gQuicktags->replaceQuicktag( $_REQUEST );
}

// get list of quicktags
$listHash = $_REQUEST;
$quicktags = $gQuicktags->getList( $listHash );
$gBitSmarty->assign( 'quicktags', $quicktags[$_REQUEST['format_guid']] );
$gBitSmarty->assign( 'listInfo', $listHash['listInfo'] );

// preview the saved settings
$listHash['sort_mode'] = 'tagpos_asc';
$listHash['max_records'] = -1;
$quicktags_preview = $gQuicktags->getList( $listHash );
$gBitSmarty->assign( 'quicktags_preview', $quicktags_preview[$_REQUEST['format_guid']] );

// Display the template
$gBitSystem->display( 'bitpackage:quicktags/admin_quicktags.tpl');
?>
