<?php
require_once 'BaseModel.php';
class Prof extends BaseModel {
	protected $table_name = 'groupe';
	protected $primary_key = "id_groupe";
	protected $id_groupe;
	protected $annee;

	
	

    /**
     * table_name
     * @param unkown $table_name
     * @return Prof
     */
    public function setTable_name($table_name){
        $this->table_name = $table_name;
        return $this;
    }

    /**
     * id_groupe
     * @return int
     */
    public function getId_groupe(){
        return $this->id_groupe;
    }

    /**
     * id_groupe
     * @param int $id_groupe
     * @return Prof
     */
    public function setId_groupe($id_groupe){
        $this->id_groupe = $id_groupe;
        return $this;
    }

    /**
     * annee
     * @return string
     */
    public function getAnnee(){
        return $this->annee;
    }

    /**
     * annee
     * @param string $annee
     * @return Prof
     */
    public function setAnnee($annee){
        $this->annee = $annee;
        return $this;
    }

}