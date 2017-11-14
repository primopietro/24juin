<?php
if (! isset ( $_SESSION ))
	session_start ();
	require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_teacher_qualification_teached.php';
	
	$id_teacher = $_GET['id_teacher'];
	
	$aTeacherQualificationTeached = new TeacherQualificationTeached();
	$aTeacherQualificationTeached->getObjectAsSelectWhere($id_teacher);
	
?>