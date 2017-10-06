<?php
require_once 'BaseModel.php';
class CustomerBuilding extends BaseModel {
	protected $table_name = 'customer_building';
	protected $primary_key = "id_customer_building";
	protected $id_customer_building = 0;
	protected $id_customer = 0;
	protected $id_building = 0;

}
