<?php
require_once '/../translator.php';
function getHeader($object){
	
    $elementMenu="view";
    $elementMenu=frenchTranslator ($elementMenu);
    $object=frenchTranslator ($object);
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
