<?php
/**
* quicktags package
*
* @author   
* @version  $Revision: 1.1.1.1.2.3 $
* @package  quicktags
*/

/**
* @package  quicktags
* @subpackage  QuickTagsLib
*/
class QuickTagsLib extends BitBase {
	function QuickTagsLib() {
		BitBase::BitBase();
	}

	function list_quicktags($format_guid=NULL, $offset, $maxRecords, $sort_mode, $find) {
		global $gLibertySystem;
		$bindvars=array();
		if ($find) {
			$findesc = '%' . $find . '%';
			$mid = " WHERE (`tagname` LIKE ?)";
			$bindvars[]=$findesc;
			if( !empty( $format_guid ) ) {
				$mid = " AND `format_guid`=?";
				$bindvars[]=$format_guid;
			}
		} elseif( !empty( $format_guid ) ) {
			$mid = " WHERE `format_guid`=?";
			$bindvars[]=$format_guid;
		} else {
			$mid = '';
		}
		$query = "select * from `".BIT_DB_PREFIX."tiki_quicktags` $mid order by ".$this->mDb->convert_sortmode($sort_mode);
		$query_cant = "select count(*) from `".BIT_DB_PREFIX."tiki_quicktags` $mid";
		$result = $this->mDb->query($query,$bindvars,$maxRecords,$offset);
		$cant = $this->mDb->getOne($query_cant,$bindvars);
		$tmp = array();
		while ($res = $result->fetchRow()) {
			$res['iconpath'] = $res['tagicon'];
//			if (!is_file($res['tagicon'])) $res['tagicon'] = 'images/ed_html.gif';
			$tmp[] = $res;
		}
		//vd($gLibertySystem->mPlugins);

		foreach( $gLibertySystem->mPlugins as $plugin ) {
			if( $plugin['plugin_type'] == 'format' ) {
				foreach( $tmp as $qt ) {
					if( $qt['format_guid'] == $plugin['plugin_guid'] ) {
						$ret[$plugin['plugin_guid']][] = $qt;
					}
				}
			}
		}

		$retval = array();
		$retval["data"] = $ret;
		$retval["cant"] = $cant;
		return $retval;
	}

	function replace_quicktag($tag_id, $format_guid, $tagpos, $taglabel, $taginsert, $tagicon) {
		if ($tag_id) {
			$bindvars=array($format_guid, $tagpos, $taglabel, $taginsert, $tagicon, $tag_id);
			$query = "update `".BIT_DB_PREFIX."tiki_quicktags` set `format_guid`=?,`tagpos`=?,`taglabel`=?,`taginsert`=?,`tagicon`=? where `tag_id`=?";
			$result = $this->mDb->query($query,$bindvars);
		} else {
			$bindvars=array($format_guid, $tagpos, $taglabel, $taginsert, $tagicon);
			$query = "delete from `".BIT_DB_PREFIX."tiki_quicktags` where `format_guid`=? and `tagpos`=? and `taglabel`=? and `taginsert`=? and `tagicon`=?";
			$result = $this->mDb->query($query,$bindvars);
			$query = "insert into `".BIT_DB_PREFIX."tiki_quicktags`(`format_guid`,`tagpos`,`taglabel`,`taginsert`,`tagicon`) values(?,?,?,?,?)";
			$result = $this->mDb->query($query,$bindvars);
		}
		return true;
	}

	function remove_quicktag($tag_id) {
		$query = "delete from `".BIT_DB_PREFIX."tiki_quicktags` where `tag_id`=?";
		$this->mDb->query($query,array($tag_id));
		return true;
	}

	function get_quicktag($tag_id) {
		$query = "select * from `".BIT_DB_PREFIX."tiki_quicktags` where `tag_id`=?";
		$result = $this->mDb->query($query,array($tag_id));
		if (!$result->numRows()) return false;
		$res = $result->fetchRow();
		return $res;
	}

}

$quicktagslib = new QuickTagsLib();
?>
