<?php
require_once 'BaseModel.php';
class Week extends BaseModel {
	protected $table_name = 'week';
	protected $primary_key = "id_week";
	protected $id_week = 0;
	
	protected $year = 0;
	protected $name = 0;
	protected $start_date = 0;
	protected $date_finish = 0;



    /**
     * id_week
     * @return unkown
     */
    protected function getId_week(){
        return $this->id_week;
    }

    
    /**
     * id_week
     * @param unkown $id_week
     * @return Week
     */
    protected function setId_week($id_week){
        $this->id_week = $id_week;
        return $this;
    }

    /**
     * year
     * @return unkown
     */
    protected function getYear(){
        return $this->year;
    }

    /**
     * year
     * @param unkown $year
     * @return Week
     */
    protected function setYear($year){
        $this->year = $year;
        return $this;
    }

    /**
     * name
     * @return unkown
     */
    protected function getName(){
        return $this->name;
    }

    /**
     * name
     * @param unkown $name
     * @return Week
     */
    protected function setName($name){
        $this->name = $name;
        return $this;
    }

    /**
     * start_date
     * @return unkown
     */
    protected function getStart_date(){
        return $this->start_date;
    }

    /**
     * start_date
     * @param unkown $start_date
     * @return Week
     */
    protected function setStart_date($start_date){
        $this->start_date = $start_date;
        return $this;
    }

    /**
     * date_finish
     * @return unkown
     */
    protected function getDate_finish(){
        return $this->date_finish;
    }

    /**
     * date_finish
     * @param unkown $date_finish
     * @return Week
     */
    protected function setDate_finish($date_finish){
        $this->date_finish = $date_finish;
        return $this;
    }

}
