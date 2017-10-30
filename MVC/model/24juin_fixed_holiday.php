<?php
require_once 'BaseModel.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/24juin/MVC/model/24juin_year_fixed_holiday.php';
class FixedHoliday extends BaseModel
{

    protected $table_name = 'fixed_holiday';

    protected $primary_key = "id_fixed_holiday";

    protected $id_fixed_holiday;

    protected $day;

    function getFixedHoliday()
    {
        $aListOfFixedHoliday = $this->getListOfAllDBObjects();
        return $aListOfFixedHoliday;
    }

    function printFixedHolidayList($aListOfFixedHoliday, $canBeUpdated, $canBeDeleted)
    {
        $content = '';
        if ($aListOfFixedHoliday != null) {
            foreach ($aListOfFixedHoliday as $aFixedHoliday) {
                $content .= $this->getEachFixedHolidayList($aFixedHoliday, $canBeUpdated, $canBeDeleted);
            }
        }
        
        return $content;
    }

    function getEachFixedHolidayList($aFixedHoliday, $canBeUpdated, $canBeDeleted)
    {
        $anObject = new YearFixedHoliday();
        $aYearPedagoDayAll = $anObject->getObjectWhereYearAndIdFixedHolidayYear($_SESSION['id_year'], $aFixedHoliday['id_fixed_holiday']);
        
        $line = '';
        if ($aYearPedagoDayAll != null) {
            $line .= "<tr>";
            $line .= "<td>" . $aFixedHoliday['day'] . "</td>";
            if ($canBeUpdated) {
                $line .= "<td><a objtype='" . $aFixedHoliday['table_name'] . "' action='update' class='action' idobj='" . $aFixedHoliday['id_fixed_holiday'] . "'><i class='fa fa-pencil text-green'></i></a></td>";
            }
            if ($canBeDeleted) {
                $line .= "<td><a objtype='" . $aFixedHoliday['table_name'] . "' action='delete' class='action' idobj='" . $aFixedHoliday['id_fixed_holiday'] . "'><i class='fa fa-times text-red'></i></a></td>";
            }
            $line .= "</tr>";
        }
        return $line;
    }

    /**
     * id_FixedHoliday
     * 
     * @return unkown
     */
    public function getId_fixed_holiday()
    {
        return $this->id_FixedHoliday;
    }

    /**
     * id_FixedHoliday
     * 
     * @param unkown $id_FixedHoliday
     * @return FixedHoliday
     */
    public function setId_fixed_holiday($id_fixed_holiday)
    {
        $this->id_fixed_holiday = $id_fixed_holiday;
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
     * @return FixedHoliday
     */
    public function setDay($day)
    {
        $this->day = $day;
        return $this;
    }
}
