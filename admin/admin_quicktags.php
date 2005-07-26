<?php

// $Header: /cvsroot/bitweaver/_bit_quicktags/admin/admin_quicktags.php,v 1.1.1.1.2.1 2005/07/26 15:50:25 drewslater Exp $

// Copyright (c) 2002-2003, Luis Argerich, Garland Foster, Eduardo Polidor, et. al.
// All Rights Reserved. See copyright.txt for details and a complete list of authors.
// Licensed under the GNU LESSER GENERAL PUBLIC LICENSE. See license.txt for details.

// Initialization
require_once( '../../bit_setup_inc.php' );

include_once( QUICKTAGS_PKG_PATH.'quicktags_lib.php' );

$gBitSystem->verifyPermission( 'bit_p_admin' );

// send users to guid selection page if we don't know what format
if( !isset( $_REQUEST['format_guid'] ) ) {
	header ( "Location: ".QUICKTAGS_PKG_URL."admin/index.php" );
	die;
} else {
	$format_guid = $_REQUEST['format_guid'];
	$gBitSmarty->assign( 'format_guid', $format_guid );
}

if (!isset($_REQUEST["tag_id"])) {
	$_REQUEST["tag_id"] = 0;
}

$gBitSmarty->assign('tag_id', $_REQUEST["tag_id"]);

if ($_REQUEST["tag_id"]) {
	$info = $quicktagslib->get_quicktag($_REQUEST["tag_id"]);
} else {
	$info = array();

	$info['format_guid'] = '';
	$info['taglabel'] = '';
	$info['taginsert'] = '';
	$info['tagicon'] = '';
}


if (isset($_REQUEST["remove"])) {
	$quicktagslib->remove_quicktag($_REQUEST["remove"]);
}

if (isset($_REQUEST["save"])) {
	$quicktagslib->replace_quicktag($_REQUEST["tag_id"], $_REQUEST["format_guid"], $_REQUEST["tagpos"], $_REQUEST["taglabel"], $_REQUEST['taginsert'], $_REQUEST['tagicon']);

	$info = array();
	$info['format_guid'] = '';
	$info['taglabel'] = '';
	$info['taginsert'] = '';
	$info['tagicon'] = '';
	$gBitSmarty->assign('name', '');
}

$gBitSmarty->assign('info', $info);

if ( empty( $_REQUEST["sort_mode"] ) ) {
	$sort_mode = 'tagpos_asc';
} else {
	$sort_mode = $_REQUEST["sort_mode"];
}

if (!isset($_REQUEST["offset"])) {
	$offset = 0;
} else {
	$offset = $_REQUEST["offset"];
}
if (isset($_REQUEST['page'])) {
	$page = &$_REQUEST['page'];
	$offset = ($page - 1) * $maxRecords;
}
$gBitSmarty->assign_by_ref('offset', $offset);

if (isset($_REQUEST["find"])) {
	$find = $_REQUEST["find"];
} else {
	$find = '';
}

$gBitSmarty->assign('find', $find);

$gBitSmarty->assign_by_ref('sort_mode', $sort_mode);
$quicktags = $quicktagslib->list_quicktags($format_guid, $offset, $maxRecords, $sort_mode, $find);

$cant_pages = ceil($quicktags["cant"] / $maxRecords);
$gBitSmarty->assign_by_ref('cant_pages', $cant_pages);
$gBitSmarty->assign('actual_page', 1 + ($offset / $maxRecords));

if ($quicktags["cant"] > ($offset + $maxRecords)) {
	$gBitSmarty->assign('next_offset', $offset + $maxRecords);
} else {
	$gBitSmarty->assign('next_offset', -1);
}

// If offset is > 0 then prev_offset
if ($offset > 0) {
	$gBitSmarty->assign('prev_offset', $offset - $maxRecords);
} else {
	$gBitSmarty->assign('prev_offset', -1);
}

$gBitSmarty->assign_by_ref('quicktags', $quicktags["data"]);

$quicktags_preview = $quicktagslib->list_quicktags($format_guid, '', '', 'tagpos_asc','');
$gBitSmarty->assign_by_ref('quicktags_preview', $quicktags_preview["data"]);

// Display the template
$gBitSystem->display( 'bitpackage:quicktags/admin_quicktags.tpl');

?>
