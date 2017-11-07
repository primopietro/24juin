<?php
require_once 'BaseModel.php';

class GroupQualification extends BaseModel
{
    
    protected $table_name = 'group_qualification';
    
    protected $primary_key = "id_group_qualification";
    
    protected $id_group_qualification = 0;
    
    protected $id_group = 0;
    
    protected $id_qualification = 0;
    
    public function getGroupQualification()
    {
        require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_group.php';
        require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_qualification.php';
        
        $group = new Group();
        $aGroupList = $group->getGroup();
        
        $groupQualification = new GroupQualification();
        $groupQualificationList = array();
        
        $finalList = array();
        $originalList = $this->getListOfAllDBObjects();
        
        if ($aGroupList != null) {
            if (sizeof($aGroupList) > 0) {
                foreach ($aGroupList as $anObject) {
                    // Get group
                    
                    $finalList[$anObject['id_group']]['group'] = $anObject;
                    $groupQualificationList = $groupQualification->getListOfAllDBObjectsWhere("id_group"," = ", $anObject['id_group']);
                    
                    if($groupQualificationList != null){
                        if(sizeof($groupQualificationList)>0){
                            foreach($groupQualificationList as $localTQ){
                                $aQualification = new Qualification();
                                $aQualification = $aQualification->getObjectFromDB($localTQ['id_qualification']);
                                $finalList[$anObject['id_group']]['qualifications'][] = $aQualification;
                            }
                        }
                    }
                    
                    // Get all qualifications for this group
                }
            }
        }
        
        return $finalList;
    }
    
    function getEachGroupQualificationComponentList($aGroupQualification, $canBeUpdated)
    {
        
        $line = '';
        
        $line .= "<tr>";
        $line .= "<td>" . $aGroupQualification['group']['code'] . "</td>";
        $line .= "<td>";
        
        if(isset($aGroupQualification['qualifications'])){
            if($aGroupQualification['qualifications'] != null){
                if(sizeof($aGroupQualification['qualifications'])>0){
                    foreach($aGroupQualification['qualifications'] as $aQualification){
                        $line .= $aQualification['code']  . " - " . $aQualification['name'] ."<br>";
                    }
                    
                }
            }
            
        }
        
        $line .="</td>";
        if ($canBeUpdated) {
            $line .= "<td><a objtype='group_qualification' action='update' class='action btn' idobj='" . $aGroupQualification['group']['id_group'] . "'><i class='fa fa-pencil text-green'></i><div class='ripple-container'></div></a></td>";
        }
        $line .= "</tr>";
        
        return $line;
    }
    
    public function printGroupQualificationList($aListOfGroupQualifications, $canBeUpdated)
    {
        $content = "";
        if ($aListOfGroupQualifications != null) {
            if (sizeof($aListOfGroupQualifications) > 0) {
                foreach ($aListOfGroupQualifications as $aGroupQualification) {
                    $content .= $this->getEachGroupQualificationComponentList($aGroupQualification, $canBeUpdated);
                }
            }
        }
        return $content;
    }
    
    /**
     * id_group_qualification
     *
     * @return unkown
     */
    public function getId_group_qualification()
    {
        return $this->id_group_qualification;
    }
    
    /**
     * id_group_qualification
     *
     * @param unkown $id_group_qualification
     * @return GroupQualification
     */
    public function setId_group_qualification($id_group_qualification)
    {
        $this->id_group_qualification = $id_group_qualification;
        return $this;
    }
    
    /**
     * id_group
     *
     * @return unkown
     */
    public function getId_group()
    {
        return $this->id_group;
    }
    
    /**
     * id_group
     *
     * @param unkown $id_group
     * @return GroupQualification
     */
    public function setId_group($id_group)
    {
        $this->id_group = $id_group;
        return $this;
    }
    
    /**
     * id_qualification
     *
     * @return unkown
     */
    public function getId_qualification()
    {
        return $this->id_qualification;
    }
    
    /**
     * id_qualification
     *
     * @param unkown $id_qualification
     * @return GroupQualification
     */
    public function setId_qualification($id_qualification)
    {
        $this->id_qualification = $id_qualification;
        return $this;
    }
}
