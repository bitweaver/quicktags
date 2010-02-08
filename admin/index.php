<?php

// $Header: /cvsroot/bitweaver/_bit_quicktags/admin/index.php,v 1.5 2010/02/08 21:27:25 wjames5 Exp $

// Initialization
require_once( '../../kernel/setup_inc.php' );

$gBitSystem->verifyPermission( 'p_admin' );

$gBitSmarty->assign_by_ref( 'gLibertySystem', $gLibertySystem );

$gBitSystem->display( 'bitpackage:quicktags/select_format.tpl', NULL, array( 'display_mode' => 'admin' ));

?>
