<?php
require_once 'BaseModel.php';
class ProgramQualification extends BaseModel {
	protected $table_name = 'program_qualification';
	protected $primary_key = "id_program_qualification";
	protected $id_program_qualification =0;
	protected $id_program =0;
	protected $id_qualification =0;
	




    /**
     * id_program_qualification
     * @return unkown
     */
    protected function getId_program_qualification(){
        return $this->id_program_qualification;
    }

    /**
     * id_program_qualification
     * @param unkown $id_program_qualification
     * @return ProgramQualification
     */
    protected function setId_program_qualification($id_program_qualification){
        $this->id_program_qualification = $id_program_qualification;
        return $this;
    }

    /**
     * id_program
     * @return unkown
     */
    protected function getId_program(){
        return $this->id_program;
    }

    /**
     * id_program
     * @param unkown $id_program
     * @return ProgramQualification
     */
    protected function setId_program($id_program){
        $this->id_program = $id_program;
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
     * @return ProgramQualification
     */
    protected function setId_qualification($id_qualification){
        $this->id_qualification = $id_qualification;
        return $this;
    }

}