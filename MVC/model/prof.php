<?php
require_once 'baseModel.php';
class Prof extends BaseModel {
	protected $table_name = 'teacher';
	protected $primary_key = "id_teacher";
	protected $pk_prof;
	protected $nom;
	protected $prenom;

	//modif
	public function setPk_prof($aPK) {
		$this->pk_prof = $aPK;
	}
	public function getPk_prof() {
		return $this->pk_prof;
	}
	
	/**
	 * nom
	 * 
	 * @return unkown
	 */
	public function getNom() {
		return $this->nom;
	}
	
	/**
	 * nom
	 * 
	 * @param unkown $nom        	
	 * @return Client
	 */
	public function setNom($nom) {
		$this->nom = $nom;
		return $this;
	}
	
	/**
	 * prenom
	 * 
	 * @return unkown
	 */
	public function getPrenom() {
		return $this->prenom;
	}
	
	/**
	 * prenom
	 * 
	 * @param unkown $prenom        	
	 * @return Client
	 */
	public function setPrenom($prenom) {
		$this->prenom = $prenom;
		return $this;
	}
	
	
}