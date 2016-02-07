<?php

// $Header$

// Initialization
require_once( '../../kernel/setup_inc.php' );

$gBitSystem->verifyPermission( 'p_admin' );

$gBitSmarty->assignByRef( 'gLibertySystem', $gLibertySystem );

$gBitSystem->display( 'bitpackage:quicktags/select_format.tpl', NULL, array( 'display_mode' => 'admin' ));

?>
