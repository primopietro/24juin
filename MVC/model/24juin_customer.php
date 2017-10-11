<?php
require_once 'BaseModel.php';
class Customer extends BaseModel {
	protected $table_name = 'customer';
	protected $primary_key = "id_customer";
	protected $id_customer;
	protected $name;

	/**
	 * id_customer
	 * @return int
	 */
	public function getId_customer(){
	    return $this->id_customer;
	}
	
	/**
	 * id_customer
	 * @param int $id_customer
	 * @return 24juin_customer
	 */
	public function setId_customer($id_customer){
	    $this->id_customer = $id_customer;
	    return $this;
	}
	
	/**
	 * name
	 * @return string
	 */
	public function getName(){
	    return $this->name;
	}
	
	/**
	 * name
	 * @param string $name
	 * @return 24juin_customer
	 */
	public function setName($name){
	    $this->name = $name;
	    return $this;
	}
	
	
    function getActiveCustomer(){
        $aListOfCustomer = $this->getListOfAllDBObjects();
        return $aListOfCustomer;
    }
    
    function printCustomerList($aListOfCustomer,$canBeUpdated,$canBeDeleted){
        $content = '';
        if($aListOfCustomer != null){
            foreach($aListOfCustomer as $aCustomer){
                $content .= $this->getEachCustomerComponentList($aCustomer,$canBeUpdated,$canBeDeleted);
            }
        }
        
        return $content;
    }
    
    function getEachCustomerComponentList($aCustomer,$canBeUpdated,$canBeDeleted){
        
        $line = '';
        $line .= "<tr>";
        $line .= "<td>" . $aCustomer['name'] . "</td>";
        if($canBeUpdated){
            $line .= "<td><a objtype='".$aCustomer['table_name']."' action='update' class='action' idobj='".  $aCustomer['id_customer']."'><i class='fa fa-pencil text-green'></i></a></td>";
        }
        if($canBeDeleted){
            $line .= "<td><a objtype='".$aCustomer['table_name']."' action='delete' class='action' idobj='".$aCustomer['id_customer']."'><i class='fa fa-times text-red'></i></a></td>";
        }
        $line .= "</tr>";
        
        return $line;
    }

    

}
