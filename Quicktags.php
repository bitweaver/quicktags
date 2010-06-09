<?php
/**
* quicktags package
*
* @author   
* @version  $Revision$
* @package  quicktags
*/

/**
 * @package  quicktags
 */
class QuickTags extends BitBase {
	/**
	 * QuickTags Initiation
	 * 
	 * @access public
	 */
	function QuickTags() {
		BitBase::BitBase();
	}

	/**
	 * getList 
	 * 
	 * @param array $pListHash 
	 * @access public
	 * @return TRUE on success, FALSE on failure - mErrors will contain reason for failure
	 */
	function getList( &$pListHash ) {
		global $gLibertySystem;

		if( empty( $pListHash['sort_mode'] ) ) {
			$pListHash['sort_mode'] = 'tagpos_asc';
		}

		LibertyBase::prepGetList( $pListHash );
		$bindvars = array();

		if( !empty( $pListHash['find'] ) ) {
			$findesc = '%'.$pListHash['find'].'%';
			$mid = " WHERE (`tagname` LIKE ?)";
			$bindvars[]=$findesc;
			if( !empty( $pListHash['format_guid'] ) ) {
				$mid = " AND `format_guid`=?";
				$bindvars[]=$pListHash['format_guid'];
			}
		} elseif( !empty( $pListHash['format_guid'] ) ) {
			$mid = " WHERE `format_guid`=?";
			$bindvars[]=$pListHash['format_guid'];
		} else {
			$mid = '';
		}

		$query = "SELECT * FROM `".BIT_DB_PREFIX."quicktags` $mid ORDER BY ".$this->mDb->convertSortmode( $pListHash['sort_mode'] );
		$result = $this->mDb->query( $query, $bindvars, $pListHash['max_records'], $pListHash['offset'] );
		$tmp = array();
		while( $res = $result->fetchRow() ) {
			$res['iconpath'] = $res['tagicon'];
			$tmp[] = $res;
		}

		$ret = array();
		foreach( $gLibertySystem->mPlugins as $plugin ) {
			if( $plugin['plugin_type'] == 'format' ) {
				foreach( $tmp as $qt ) {
					if( $qt['format_guid'] == $plugin['plugin_guid'] ) {
						$ret[$plugin['plugin_guid']][] = $qt;
					}
				}
			}
		}

		$pListHash["cant"] = $this->mDb->getOne( "SELECT COUNT(*) FROM `".BIT_DB_PREFIX."quicktags` $mid", $bindvars );
		LibertyContent::postGetList( $pListHash );

		return $ret;
	}

	/**
	 * store 
	 * 
	 * @param array $pParamHash 
	 * @access public
	 * @return TRUE on success, FALSE on failure - mErrors will contain reason for failure
	 */
	function store( $pParamHash ) {
		if( $this->verify( $pParamHash )) {
			if( @BitBase::verifyId( $pParamHash['tag_id'] )) {
				$this->mDb->associateUpdate( BIT_DB_PREFIX."quicktags", $pParamHash['store_quicktag'], array( 'tag_id' => $pParamHash['tag_id'] ));
			} else {
				$pParamHash['store_quicktag']['tag_id'] = $this->mDb->GenID( 'quicktags_tag_id_seq' );
				$this->mDb->associateInsert( BIT_DB_PREFIX."quicktags", $pParamHash['store_quicktag'] );
			}
		}
		return TRUE;
	}

	/**
	 * verify 
	 * 
	 * @param array $pParamHash 
	 * @access public
	 * @return TRUE on success, FALSE on failure - mErrors will contain reason for failure
	 */
	function verify( &$pParamHash ) {
		if( !empty( $pParamHash['format_guid'] ) ) {
			$pParamHash['store_quicktag']['format_guid'] = $pParamHash['format_guid'];
		} else {
			$this->mErrors['format_guid'] = tra( "We require a format guid to store the quicktag." );
		}

		if( @BitBase::verifyId( $pParamHash['tagpos'] ) ) {
			$pParamHash['store_quicktag']['tagpos'] = $pParamHash['tagpos'];
		} else {
			$pParamHash['store_quicktag']['tagpos'] = 0;
		}

		if( !empty( $pParamHash['taglabel'] ) ) {
			$pParamHash['store_quicktag']['taglabel'] = $pParamHash['taglabel'];
		} else {
			$pParamHash['store_quicktag']['taglabel'] = '';
		}

		if( !empty( $pParamHash['taginsert'] ) ) {
			$pParamHash['store_quicktag']['taginsert'] = $pParamHash['taginsert'];
		} else {
			$pParamHash['store_quicktag']['taginsert'] = '';
		}

		if( !empty( $pParamHash['tagicon'] ) ) {
			$pParamHash['store_quicktag']['tagicon'] = $pParamHash['tagicon'];
		} else {
			$pParamHash['store_quicktag']['tagicon'] = 'spacer';
		}

		return( count( $this->mErrors ) == 0 );
	}

	/**
	 * expunge 
	 * 
	 * @param array $pTagId 
	 * @access public
	 * @return TRUE on success, FALSE on failure - mErrors will contain reason for failure
	 */
	function expunge( $pTagId ) {
		$this->mDb->query( "DELETE FROM `".BIT_DB_PREFIX."quicktags` WHERE `tag_id`=?", array( $pTagId ));
		return TRUE;
	}

	/**
	 * getQuicktag 
	 * 
	 * @param array $pTagId 
	 * @access public
	 * @return TRUE on success, FALSE on failure - mErrors will contain reason for failure
	 */
	function getQuicktag( $pTagId ) {
		return $this->mDb->getRow( "SELECT * FROM `".BIT_DB_PREFIX."quicktags` WHERE `tag_id`=?", array( $pTagId ));
	}
}
?>
