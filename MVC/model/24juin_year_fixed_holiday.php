<?php
require_once 'BaseModel.php';
class YearFixedHoliday extends BaseModel {
    protected $table_name = 'year_fixed_holiday';
    protected $primary_key = "id_year_fixed_holiday";
    protected $id_year = 0; 
    protected $id_fixed_holiday = 0;
  
    
   
    

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
     * id_fixed_holiday
     * @return unkown
     */
    public function getId_fixed_holiday(){
        return $this->id_fixed_holiday;
    }

    /**
     * id_fixed_holiday
     * @param unkown $id_fixed_holiday
     * @return Building
     */
    public function setId_fixed_holiday($id_fixed_holiday){
        $this->id_fixed_holiday = $id_fixed_holiday;
        return $this;
    }
    
    

}
