<?php
class WorkWithDate
{
    private $date;
    private $days = [1 => 'Понедельник', 2 => 'Вторник', 3 => 'Среда', 4 => 'Четверг', 5 => 'Пятница', 6 => 'Суббота', 7 => 'Воскресенье'];
    private $month = [1 => 'Январь', 2 => 'Февраль', 3 => 'Март', 4 => 'Апрель', 5 => 'Май', 6 => 'Июнь', 7 => 'Июль', 8 => 'Август', 9 => 'Сентябрь', 10 => 'Октябрь', 11 => 'Ноябрь', 12 => 'Декабрь'];
    public function __construct($enterDate = '')
    {
        return $enterDate ? $this->date = $enterDate : $this->date = 'd-m-Y';
    }
    public function getDifferenceDates($date1, $date2)
    {
        $date1 = strtotime($date1);
        $date2 = strtotime($date2);
        return ($date2 - $date1);
    }
    public function getCountDays($value)
    {
        return floor($value / 86400);
    }
    public function getNeedDateFormat($value)
    {
        return date($this->date, strtotime($value));
    }

    public function getDayOfWeek($value)
    {
        $day = date('N', strtotime($value));
        return $this->days[$day];
    }
    public function getMonth($value)
    {
        $month = date('n', strtotime($value));
        return $this->month[$month];
    }
    public function isLeapYear($value)
    {
        return (date('L', strtotime($value))) ? true : false;
    }
}
