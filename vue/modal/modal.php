<?php 
if(!isset($_SESSION)){session_start();}
require_once '/../translator.php';
//Get action
//Save or update...
$action = htmlspecialchars($_POST['action']);
$objectType = htmlspecialchars($_POST['objType']);
$actionTranslate=frenchTranslator ($action);
$objectTypeTranslate=frenchTranslator ($objectType);
require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/vue/rightHelper.php';

$rights = checkUserRights($objectType, $_SESSION ['rightList']);

if(isset($rights[$action])){
	require_once $_SERVER ["DOCUMENT_ROOT"] ."/24juin/vue/body/panel/".$objectType."/".$action.".php";
	
	$base ="<div class='modal fade' id='objModal' style='display: none;'>
          <div class='modal-dialog'>
            <div class='modal-content'>
              <div class='modal-header'>
                <h4 class='modal-title'>".$actionTranslate." ".$objectTypeTranslate."</h4>
              </div>
              <div class='modal-body'>";
	if($action == "add"){
		
		$base .= getMarkup();
	}else if($action =="update"){
		$id = htmlspecialchars($_POST['idobj']);
		$base .= getMarkup($id);
	}
	$base.="</div>
              <div class='modal-footer'>
                <a id='closeModal' class='btn btn-default pull-left' data-dismiss='modal'>Annuler</a>
                <a class='btn btn-primary action' objtype='".$objectType."' action='".$action."Obj'>Confirmer</a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
<script>$('#objModal').modal('show');  </script>
</div>";
	echo $base;
}

?>