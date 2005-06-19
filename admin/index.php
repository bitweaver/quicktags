<?php

// $Header: /cvsroot/bitweaver/_bit_quicktags/admin/index.php,v 1.1 2005/06/19 05:01:29 bitweaver Exp $

// Initialization
require_once( '../../bit_setup_inc.php' );

$gBitSystem->verifyPermission( 'bit_p_admin' );

$smarty->assign_by_ref( 'gLibertySystem', $gLibertySystem );

$gBitSystem->display( 'bitpackage:quicktags/select_format.tpl');

?>
