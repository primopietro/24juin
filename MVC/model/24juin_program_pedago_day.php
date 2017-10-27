<?php
require_once 'BaseModel.php';
class ProgramPedagoDay extends BaseModel {
	protected $table_name = 'program_pedago_day';
	protected $primary_key = "id_program_pedago_day";
	protected $id_program_pedago_day = 0;
	protected $id_pedago_day = 0;
	protected $id_program = 0;

   

    /**
     * id_program_pedago_day
     * @return unkown
     */
    public function getId_program_pedago_day(){
        return $this->id_program_pedago_day;
    }

    /**
     * id_program_pedago_day
     * @param unkown $id_program_pedago_day
     * @return TeacherNatureTime
     */
    public function setId_program_pedago_day($id_program_pedago_day){
        $this->id_program_pedago_day = $id_program_pedago_day;
        return $this;
    }

    /**
     * id_pedago_day
     * @return unkown
     */
    public function getId_pedago_day(){
        return $this->id_pedago_day;
    }

    /**
     * id_pedago_day
     * @param unkown $id_pedago_day
     * @return TeacherNatureTime
     */
    public function setId_pedago_day($id_pedago_day){
        $this->id_pedago_day = $id_pedago_day;
        return $this;
    }

    /**
     * id_program
     * @return unkown
     */
    public function getId_program(){
        return $this->id_program;
    }

    /**
     * id_program
     * @param unkown $id_program
     * @return TeacherNatureTime
     */
    public function setId_program($id_program){
        $this->id_program = $id_program;
        return $this;
    }

}