<?php
//NAME c'est le meme que dans la BD et dans l'objet
function getMarkup($idObj){
	require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_program_pedago_day.php';
	require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_program.php';
	
	$aProgramPedago = new ProgramPedagoDay();
	$aProgram = new Program();
	
	$aProgramPedagoList  = $aProgramPedago->getListOfAllDBObjectsWhere("id_pedago_day"," = ",$idObj);
	
	$aProgramList = $aProgram->getListOfAllDBObjects();
	
	$default = "<form id='formUpdate' idobj='".$idObj."'><div class='box-body'>
                  <div class='row'>
                    <div class='col-xs-6'>
                        <h4>Programmes</h4>";
	if($aProgramList != null){
		if(sizeof($aProgramList)>0){
			$default .= "  <select style='width:100%;' multiple='multiple' name='programs[]'  > ";
			foreach($aProgramList as $theProgram){
				$default .= "   <option   value='".$theProgram['id_program']."' ";
				
				if($aProgramPedagoList != null){
					if(sizeof($aProgramPedagoList)>0){
						foreach($aProgramPedagoList as $aPPL){
							if($aPPL['id_program'] == $theProgram['id_program'] ){
								$default .= " selected ";
							}
						}
						
					}
				}
				
				$default .= " > ";
				
				$default .= $theProgram['name'];
				$default .= "   </option> ";
			}
			
			$default .= "   </select>     ";
		}
	}
	
	
	$default .= "               </div>
                </div></form>";
	
	return $default;
}

