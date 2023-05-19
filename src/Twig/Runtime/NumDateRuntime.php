<?php

namespace App\Twig\Runtime;

use Twig\Extension\RuntimeExtensionInterface;

class NumDateRuntime implements RuntimeExtensionInterface
{
    public function __construct()
    {
        // Inject dependencies if needed
    }

    public function daysInMonth($value)
    {
        if ($value < 13) {
            return cal_days_in_month(CAL_GREGORIAN, $value, date('Y'));
        } else
            return $value . " месяц не существует";
    }

    public function numToDate($value, bool $days = false)
    {

//        $dateObj = DateTime::createFromFormat('!m', $value);
//        setlocale(LC_ALL, 'ru_RU', 'ru_RU.UTF-8', 'ru', 'russian');
//        $dateObj->format('F');
        if (!$days)
            $arr = [
                'январь',
                'февраль',
                'март',
                'апрель',
                'май',
                'июнь',
                'июль',
                'август',
                'сентябрь',
                'октябрь',
                'ноябрь',
                'декабрь'
            ];
        else
            $arr = [
                'января',
                'февраля',
                'марта',
                'апреля',
                'мая',
                'июня',
                'июля',
                'августа',
                'сентября',
                'октября',
                'ноября',
                'декабря'
            ];
        if ($value < 13)
            return $arr[$value - 1];
        else
            return $value . " месяц не существует";
    }
}
