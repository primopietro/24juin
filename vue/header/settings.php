<?php


function getHeaderSettings($aUser){
	$settings ="";
	if (!$aUser->getAdministrateur()) {
		$settings= "<li class='dropdown user user-menu'>
		            <a href='components/body/error/error404.php' >
		              <span class='hidden-xs'>Mon panier(1)</span>
		            </a>
		          </li>";
	}
	
	$settings.= "<li class='dropdown user user-menu logout'>
		<a href='javascript:void(0)' id='logout' >
		<span class='hidden-xs' >Se déconnecter</span>
		</a>
		</li>";
	
	return $settings;
}
