<?php

// $Header: /cvsroot/bitweaver/_bit_quicktags/admin/index.php,v 1.3 2006/04/11 13:07:54 squareing Exp $

// Initialization
require_once( '../../bit_setup_inc.php' );

$gBitSystem->verifyPermission( 'p_admin' );

$gBitSmarty->assign_by_ref( 'gLibertySystem', $gLibertySystem );

$gBitSystem->display( 'bitpackage:quicktags/select_format.tpl');

?>
