<?php
require_once 'BaseModel.php';
class CustomerUser extends BaseModel {
	protected $table_name = 'customer_user';
	protected $primary_key = "id_customer_user";
	protected $id_customer_user = 0;
	protected $id_customer = 0;
	protected $id_user = 0;


    /**
     * id_customer_user
     * @return unkown
     */
    protected function getId_customer_user(){
        return $this->id_customer_user;
    }

    /**
     * id_customer_user
     * @param unkown $id_customer_user
     * @return CustomerUser
     */
    protected function setId_customer_user($id_customer_user){
        $this->id_customer_user = $id_customer_user;
        return $this;
    }

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
     * @return CustomerUser
     */
    protected function setId_customer($id_customer){
        $this->id_customer = $id_customer;
        return $this;
    }

    /**
     * id_user
     * @return unkown
     */
    protected function getId_user(){
        return $this->id_user;
    }

    /**
     * id_user
     * @param unkown $id_user
     * @return CustomerUser
     */
    protected function setId_user($id_user){
        $this->id_user = $id_user;
        return $this;
    }

}
