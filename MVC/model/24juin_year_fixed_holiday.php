<?php
require_once 'BaseModel.php';
class YearFixedHoliday extends BaseModel {
    protected $table_name = 'year_fixed_holiday';
    protected $primary_key = "id_year_fixed_holiday"; 
    protected $id_year_fixed_holiday = 0; 
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
    
    public function getObjectWhereYearAndIdFixedHolidayYear($id_year,$id_fixed_holiday) {
        include $_SERVER ["DOCUMENT_ROOT"] . '/24juin/DB/dbConnect.php';
        
        $internalAttributes = get_object_vars ( $this);
        
        $sql = "SELECT * FROM `" . $this->table_name . "` WHERE id_year = '" . $id_year . "' AND id_fixed_holiday  = " . $id_fixed_holiday;
        
        $result = $conn->query ( $sql );
        
        if ($result->num_rows > 0) {
            $anObject = Array ();
            while ( $row = $result->fetch_assoc () ) {
                $anObject ["primary_key"] = $this->primary_key;
                $anObject ["table_name"] = $this->table_name;
                foreach ( $row as $aRowName => $aValue ) {
                    $anObject [$aRowName] = $aValue;
                }
            }
            
            $conn->close ();
            return $anObject;
        }
        $conn->close ();
        return null;
    }


    /**
     * id_year_fixed_holiday
     * @return unkown
     */
    public function getId_year_fixed_holiday(){
        return $this->id_year_fixed_holiday;
    }

    /**
     * id_year_fixed_holiday
     * @param unkown $id_year_fixed_holiday
     * @return YearFixedHoliday
     */
    public function setId_year_fixed_holiday($id_year_fixed_holiday){
        $this->id_year_fixed_holiday = $id_year_fixed_holiday;
        return $this;
    }

}
