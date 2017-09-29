<?php

function getHeader($object, $actions){
	$default = "
    <!-- Content Header (Page header) -->
    <section class='content-header'>
      <h1>
        Groupes
      </h1>
      <ol class='breadcrumb'>
        <li><a href='#'>".$object."</a></li>
        <li><a href='#'>".$actions."</a></li>
      </ol>
    </section>";
	return $default;
}
