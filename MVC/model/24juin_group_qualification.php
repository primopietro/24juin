<?php
require_once 'BaseModel.php';
class GroupQualification extends BaseModel {
	protected $table_name = 'group_qualification';
	protected $primary_key = "id_group_qualification";
	protected $id_group_qualification = 0;
	protected $id_group = 0;
	protected $id_qualification = 0;



    /**
     * id_group_qualification
     * @return unkown
     */
    protected function getId_group_qualification(){
        return $this->id_group_qualification;
    }

    /**
     * id_group_qualification
     * @param unkown $id_group_qualification
     * @return GroupQualification
     */
    protected function setId_group_qualification($id_group_qualification){
        $this->id_group_qualification = $id_group_qualification;
        return $this;
    }

    /**
     * id_group
     * @return unkown
     */
    protected function getId_group(){
        return $this->id_group;
    }

    /**
     * id_group
     * @param unkown $id_group
     * @return GroupQualification
     */
    protected function setId_group($id_group){
        $this->id_group = $id_group;
        return $this;
    }

    /**
     * id_qualification
     * @return unkown
     */
    protected function getId_qualification(){
        return $this->id_qualification;
    }

    /**
     * id_qualification
     * @param unkown $id_qualification
     * @return GroupQualification
     */
    protected function setId_qualification($id_qualification){
        $this->id_qualification = $id_qualification;
        return $this;
    }

}
