<?php
require_once 'BaseModel.php';
class Groupe extends BaseModel {
	protected $table_name = 'groupe';
	protected $primary_key = "id_groupe";
	protected $id_groupe = 0;
	protected $annee = "";

    /**
     * table_name
     * @param unkown $table_name
     * @return 24juin_Groupe
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
     * @return 24juin_Groupe
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
     * @return 24juin_Groupe
     */
    public function setAnnee($annee){
        $this->annee = $annee;
        return $this;
    }
    
    function getActiveGroupe(){
        $aListOfGroupe = $this->getListOfAllDBObjects();
        return $aListOfGroupe;
    }

    function printGroupe($aListOfGroupe){
        $content = '';
        if($aListOfGroupe != null){
            foreach($aListOfGroupe as $aGroupe){
                $content .= $this->getEachGroupeComponent($aGroupe);
            }
        }
        
        return $content;
    }
    
    function getEachGroupeComponent($aGroupe){
        $format = 'Y-m-d';
        $annee = DateTime::createFromFormat($format, $aGroupe['annee']);
        
        $line = '';
        $line .= "<tr>";
        $line .= "<td>" . $aGroupe['id_groupe'] . "</td>";
        $line .= "<td>" . $annee->format('Y') . "</td>";
        $line .= "<td><a href='#'><i class='fa fa-times text-red'></i></a></td>";
        $line .= "</tr>";
        
        return $line;
    }
}
