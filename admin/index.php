<?php

// $Header: /cvsroot/bitweaver/_bit_quicktags/admin/index.php,v 1.1.1.1.2.1 2005/07/26 15:50:25 drewslater Exp $

// Initialization
require_once( '../../bit_setup_inc.php' );

$gBitSystem->verifyPermission( 'bit_p_admin' );

$gBitSmarty->assign_by_ref( 'gLibertySystem', $gLibertySystem );

$gBitSystem->display( 'bitpackage:quicktags/select_format.tpl');

?>
