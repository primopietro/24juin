<?php
$elementMenu;
function getHeader($object, $actions){

    if ($actions=="add") {
        $elementMenu="Ajout";
    }else if ($actions=="view") {
        $elementMenu="Consultation";
    } else if ($actions=="add,view") {
        $elementMenu="Ajout et consultation";
    }
	$default = "
    <!-- Content Header (Page header) -->
    <section class='content-header'>
      <h1>
        ".$object."
      </h1>
      <ol class='breadcrumb'>
        <li><a href='#'>".$object."</a></li>
        <li><a href='#'>".$elementMenu."</a></li>
      </ol>
    </section>";
	return $default;
}
