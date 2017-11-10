<?php
require_once 'BaseModel.php';

class GroupQualificationTeached extends BaseModel
{

    protected $table_name = 'group_qualification_teached';

    protected $primary_key = "id_group_qualification_teached";

    protected $id_group_qualification_teached = 0;

    protected $id_group = 0;

    protected $id_qualification_teached = 0;

    public function getGroupQualificationTeached()
    {
        require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_group.php';
        require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_qualification_teached.php';
        
        $group = new Group();
        $aGroupList = $group->getGroup();
        
        $groupQualificationTeached = new GroupQualificationTeached();
        $groupQualificationTeachedList = array();
        
        $finalList = array();
        $originalList = $this->getListOfAllDBObjects();
        
        if ($aGroupList != null) {
            if (sizeof($aGroupList) > 0) {
                foreach ($aGroupList as $anObject) {
                    // Get group
                    
                    $finalList[$anObject['id_group']]['group'] = $anObject;
                    $groupQualificationTeachedList = $groupQualificationTeached->getListOfAllDBObjectsWhere("id_group", " = ", $anObject['id_group']);
                    
                    if ($groupQualificationTeachedList != null) {
                        if (sizeof($groupQualificationTeachedList) > 0) {
                            foreach ($groupQualificationTeachedList as $localTQ) {
                                $aQualificationTeached = new QualificationTeached();
                                $aQualificationTeached = $aQualificationTeached->getObjectFromDB($localTQ['id_qualification_teached']);
                                $finalList[$anObject['id_group']]['qualification_teacheds'][] = $aQualificationTeached;
                            }
                        }
                    }
                    
                    // Get all qualification_teacheds for this group
                }
            }
        }
        
        return $finalList;
    }

    function getEachGroupQualificationTeachedComponentList($aGroupQualificationTeached, $canBeUpdated)
    {
        $line = '';
        
        $line .= "<tr>";
        $line .= "<td>" . $aGroupQualificationTeached['group']['code'] . "</td>";
        $line .= "<td>";
        
        if (isset($aGroupQualificationTeached['qualification_teacheds'])) {
            if ($aGroupQualificationTeached['qualification_teacheds'] != null) {
                if (sizeof($aGroupQualificationTeached['qualification_teacheds']) > 0) {
                    foreach ($aGroupQualificationTeached['qualification_teacheds'] as $aQualificationTeached) {
                        if ($aQualificationTeached['year'] == $_SESSION['year']) {
                            $line .= $aQualificationTeached['code'] . " - " . $aQualificationTeached['name'] . "<br>";
                        }
                    }
                }
            }
        }
        
        $line .= "</td>";
        if ($canBeUpdated) {
            $line .= "<td><a objtype='group_qualification_teached' action='update' class='action btn' idobj='" . $aGroupQualificationTeached['group']['id_group'] . "'><i class='fa fa-pencil text-green'></i><div class='ripple-container'></div></a></td>";
        }
        $line .= "</tr>";
        
        return $line;
    }

    public function printGroupQualificationTeachedList($aListOfGroupQualificationTeacheds, $canBeUpdated)
    {
        $content = "";
        if ($aListOfGroupQualificationTeacheds != null) {
            if (sizeof($aListOfGroupQualificationTeacheds) > 0) {
                foreach ($aListOfGroupQualificationTeacheds as $aGroupQualificationTeached) {
                    $content .= $this->getEachGroupQualificationTeachedComponentList($aGroupQualificationTeached, $canBeUpdated);
                }
            }
        }
        return $content;
    }

    function deleteFromDBWhereAndGroup($id_group, $year) {
        $sql = "DELETE pq FROM `" . $this->table_name . "` pq
 		JOIN qualification_teached qt ON qt.id_qualification_teached = pq.id_qualification_teached
		WHERE id_group = " . $id_group . " AND qt.year = '" . $year . "'";
        include $_SERVER ["DOCUMENT_ROOT"] . '/24juin/DB/dbConnect.php';
        
        if ($conn->query ( $sql ) === TRUE) {
            return "success";
        } else {
            return  "fail";
        }
        
        $conn->close ();
    }
    
    /**
     * id_group_qualification_teached
     *
     * @return unkown
     */
    public function getId_group_qualification_teached()
    {
        return $this->id_group_qualification_teached;
    }

    /**
     * id_group_qualification_teached
     *
     * @param unkown $id_group_qualification_teached
     * @return GroupQualificationTeached
     */
    public function setId_group_qualification_teached($id_group_qualification_teached)
    {
        $this->id_group_qualification_teached = $id_group_qualification_teached;
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
     * @return GroupQualificationTeached
     */
    public function setId_group($id_group)
    {
        $this->id_group = $id_group;
        return $this;
    }

    /**
     * id_qualification_teached
     *
     * @return unkown
     */
    public function getId_qualification_teached()
    {
        return $this->id_qualification_teached;
    }

    /**
     * id_qualification_teached
     *
     * @param unkown $id_qualification_teached
     * @return GroupQualificationTeached
     */
    public function setId_qualification_teached($id_qualification_teached)
    {
        $this->id_qualification_teached = $id_qualification_teached;
        return $this;
    }
}
