<?php
require_once 'BaseModel.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_year_pedago_day_all.php';

class PedagoDayAll extends BaseModel
{

    protected $table_name = 'pedago_day_all';

    protected $primary_key = "id_pedago_day_all";

    protected $id_pedago_day_all;

    protected $day;

    function getPedagoDayAll()
    {
        $aListOfPedagoDayAll = $this->getListOfAllDBObjects();
        return $aListOfPedagoDayAll;
    }

    function printPedagoDayAllList($aListOfPedagoDayAll, $canBeUpdated, $canBeDeleted)
    {
        $content = '';
        if ($aListOfPedagoDayAll != null) {
            foreach ($aListOfPedagoDayAll as $aPedagoDayAll) {
                $content .= $this->getEachPedagoDayAllList($aPedagoDayAll, $canBeUpdated, $canBeDeleted);
            }
        }
        
        return $content;
    }

    function getEachPedagoDayAllList($aPedagoDayAll, $canBeUpdated, $canBeDeleted)
    {
        $anObject = new YearPedagoDayAll();
        $aYearPedagoDayAll = $anObject->getObjectWhereYearAndIdPedagoDayAll($_SESSION['id_year'], $aPedagoDayAll['id_pedago_day_all']);
        
        $line = '';
        if($aYearPedagoDayAll != null){
            $line .= "<tr>";
            $line .= "<td>" . $aPedagoDayAll['day'] . "</td>";
            if ($canBeUpdated) {
                $line .= "<td><a objtype='" . $aPedagoDayAll['table_name'] . "' action='update' class='action' idobj='" . $aPedagoDayAll['id_pedago_day_all'] . "'><i class='fa fa-pencil text-green'></i></a></td>";
            }
            if ($canBeDeleted) {
                $line .= "<td><a objtype='" . $aPedagoDayAll['table_name'] . "' action='delete' class='action' idobj='" . $aPedagoDayAll['id_pedago_day_all'] . "'><i class='fa fa-times text-red'></i></a></td>";
            }
            $line .= "</tr>";
        }
        return $line;
    }

    /**
     * id_pedago_day_all
     * 
     * @return unkown
     */
    public function getId_pedago_day_all()
    {
        return $this->id_pedago_day_all;
    }

    /**
     * id_pedago_day_all
     * 
     * @param unkown $id_pedago_day_all
     * @return Customer
     */
    public function setId_pedago_day_all($id_pedago_day_all)
    {
        $this->id_pedago_day_all = $id_pedago_day_all;
        return $this;
    }

    /**
     * day
     * 
     * @return unkown
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * day
     * 
     * @param unkown $day
     * @return Customer
     */
    public function setDay($day)
    {
        $this->day = $day;
        return $this;
    }
}
