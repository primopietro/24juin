<?php
require_once 'BaseModel.php';
class Customer extends BaseModel {
	protected $table_name = 'customer';
	protected $primary_key = "id_customer";
	protected $id_customer = 0;
	protected $name = "";


    /**
     * id_customer
     * @return unkown
     */
    protected function getId_customer(){
        return $this->id_customer;
    }

    /**
     * id_customer
     * @param unkown $id_customer
     * @return Customer
     */
    protected function setId_customer($id_customer){
        $this->id_customer = $id_customer;
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
     * @return Customer
     */
    protected function setName($name){
        $this->name = $name;
        return $this;
    }

}
