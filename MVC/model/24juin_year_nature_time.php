<?php
require_once 'BaseModel.php';
class YearNatureTime extends BaseModel {
    protected $table_name = 'year_nature_time';
    protected $primary_key = "id_year_nature_time"; 
    protected $id_year_nature_time = 0; 
    protected $id_year = 0; 
    protected $id_nature_time = 0;
  
    
   
    

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
     * id_nature_time
     * @return unkown
     */
    public function getId_nature_time(){
        return $this->id_nature_time;
    }

    /**
     * id_nature_time
     * @param unkown $id_nature_time
     * @return Building
     */
    public function setId_nature_time($id_nature_time){
        $this->id_nature_time = $id_nature_time;
        return $this;
    }
    
    public function getObjectWhereYearAndIdNatureTime($id_year,$id_nature_time) {
        include $_SERVER ["DOCUMENT_ROOT"] . '/24juin/DB/dbConnect.php';
        
        $internalAttributes = get_object_vars ( $this);
        
        $sql = "SELECT * FROM `" . $this->table_name . "` WHERE id_year = '" . $id_year . "' AND id_nature_time  = " . $id_nature_time;
        
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
     * id_year_nature_time
     * @return unkown
     */
    public function getId_year_nature_time(){
        return $this->id_year_nature_time;
    }

    /**
     * id_year_nature_time
     * @param unkown $id_year_nature_time
     * @return YearFixedHoliday
     */
    public function setId_year_nature_time($id_year_nature_time){
        $this->id_year_nature_time = $id_year_nature_time;
        return $this;
    }

}
