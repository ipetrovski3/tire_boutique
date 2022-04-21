<?php


class Helpers
{
    public static function category_icon($category)
    {
        switch ($category) {
            case 'car':
                return 'sport-car.png';
                break;
            case 'van':
                return 'delivery.png';
                break;
            case 'suv':
                return 'suv.png';
                break;
        }

    }

    public static function season_icon($season)
    {
        switch ($season) {
            case 'Summer':
                return 'images/helpers/sunny.png';
                break;
            case 'Winter':
                return 'images/helpers/snowflake.png';
                break;
            case 'All Season':
                return 'images/helpers/season.png';
                break;
        }

    }

    public function to_mk($season)
    {
        switch ($season) {
            case 'Winter':
                return 'Зимски';
                break;
            case 'Summer':
                return 'Летни';
                break;
            case 'All Season':
                return 'Сите Сезони';
                break;
        }
    }

    public function load_indexes()
    {
        $indexes = [];
        for($i=20; $i<150; $i++) {
            $indexes[] = $i;
        }
        return $indexes;
    }

    public function cat_to_mk($category)
    {
        switch ($category) {
            case 'car':
                return 'Патничkи';
                break;
            case 'van':
                return 'Комби';
                break;
            case 'suv':
                return 'Џип';
                break;
        }
    }

}
