<?php

function checkUserRights($objName, $rightList) {

	if ($rightList != null) {
		if(isset($rightList[$objName])){
			$rights = array();
			foreach($rightList[$objName]['rights'] as $localRight){
				$rights[$localRight['name']] = $localRight;
			}
			return $rights;
		}
	
	}
	return null;
}

?>