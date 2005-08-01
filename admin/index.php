<?php

// $Header: /cvsroot/bitweaver/_bit_quicktags/admin/index.php,v 1.2 2005/08/01 18:41:17 squareing Exp $

// Initialization
require_once( '../../bit_setup_inc.php' );

$gBitSystem->verifyPermission( 'bit_p_admin' );

$gBitSmarty->assign_by_ref( 'gLibertySystem', $gLibertySystem );

$gBitSystem->display( 'bitpackage:quicktags/select_format.tpl');

?>
