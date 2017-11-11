<?php
//NAME c'est le meme que dans la BD et dans l'objet
function getMarkup($idObj){
    require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_timeslot_week.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_week.php';
    
    $aTimeslotWeek = new TimeslotWeek();
    $aTimeslotWeekList  = $aTimeslotWeek ->getListOfAllDBObjectsWhere("id_timeslot"," = ",$idObj);
    
    $aWeek = new Week();
    $aWeekList = $aWeek->getListOfAllDBObjectsWhere("year"," LIKE ", "'".$_SESSION['year']."'");
    
    $default = "<form id='formUpdate' idobj='".$idObj."'><div class='box-body'>
                  <div class='row'>
                    <div class='col-xs-6'>
                        <h4>Weeks</h4>";
    if($aWeekList != null){
        if(sizeof($aWeekList)>0){
            $default .= "  <select multiple='multiple' name='weeks[]'  > ";
            foreach($aWeekList as $aWeek){
                $default .= "   <option   value='".$aWeek['id_week']."' ";
                
                
                if($aTimeslotWeekList!=null){
                    if(sizeof($aTimeslotWeekList)>0){
                        foreach($aTimeslotWeekList as $aTW){
                            if($aTW['id_week'] == $aWeek['id_week'] ){
                                $default .= " selected ";
                            }
                        }
                        
                    }
                }
                
                $default .= " > ";
                
                
                $default .=  $aWeek['name']  . " / " . $aWeek['date_start'] . " - " . $aWeek['date_finish'];
                $default .= "   </option> ";
            }
            
            $default .= "   </select>     ";
        }
    }
    
    
    $default .= "               </div>
                </div></form>";
    
    return $default;
}


