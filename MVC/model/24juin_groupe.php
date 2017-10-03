<?php
require_once 'baseModel.php';
class Prof extends BaseModel {
	protected $table_name = 'group';
	protected $primary_key = "id_group";
	protected $pk_group;
	protected $year;


	public function setPk_group($aPK) {
		$this->pk_group = $aPK;
	}
	public function getPk_group() {
		return $this->pk_group;
	}
	
	/**
	 * year
	 * 
	 * @return unkown
	 */
	public function getyear() {
		return $this->year;
	}
	
	/**
	 * year
	 * 
	 * @param unkown $year        	
	 * @return Client
	 */
	public function setyear($year) {
		$this->year = $year;
		return $this;
	}
	
	
}