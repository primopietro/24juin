<?php
require_once 'BaseModel.php';
class YearPedagoDayAll extends BaseModel {
    protected $table_name = 'year_pedago_day_all';
    protected $primary_key = "id_year_pedago_day_all";
    protected $id_year = 0; 
    protected $id_pedago_day_all= 0;
  
    
   
    

    /**
     * id_year
     * @return unkown
     */
    public function getId_year(){
        return $this->id_year;
    }

    /**
     * id_year
     * @param unkown $id_year
     * @return Building
     */
    public function setId_year($id_year){
        $this->id_year = $id_year;
        return $this;
    }


    /**
     * id_pedago_day_all
     * @return unkown
     */
    public function getId_pedago_day_all(){
        return $this->id_pedago_day_all;
    }

    /**
     * id_pedago_day_all
     * @param unkown $id_pedago_day_all
     * @return YearPedagoDayAll
     */
    public function setId_pedago_day_all($id_pedago_day_all){
        $this->id_pedago_day_all = $id_pedago_day_all;
        return $this;
    }

}
