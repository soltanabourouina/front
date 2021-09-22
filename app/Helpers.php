
<?php


use Carbon\Carbon;

class Helpers
{
    public static function getMonthNameFromNumber($monthNumber)
    {
        $monthText = '';
        switch ($monthNumber) {
            case 1:
                $monthText = 'Janvier';
                break;
            case 2:
                $monthText = 'Février';
                break;
            case 3:
                $monthText = 'Mars';
                break;
            case 4:
                $monthText = 'Avril';
                break;
            case 5:
                $monthText = 'May';
                break;
            case 6:
                $monthText = 'Juin';
                break;
            case 7:
                $monthText = 'Juillet';
                break;
            case 8:
                $monthText = 'Aout';
                break;
            case 9:
                $monthText = 'Septembre';
                break;
            case 10:
                $monthText = 'Octobre';
                break;
            case 11:
                $monthText = 'Novembre';
                break;
            case 12:
                $monthText = 'Décembre';
                break;
            default:
                break;
        }
        return $monthText;
    }

    public static function showMonetaryValue($value)
    {
        //return ceil($value/100)  . " €"; // demande de prendre que la valeure entiere 

        return number_format($value / 100, 2, ',', ' ') . " €";
    }

    public static function getCurrentYear()
    {
        return intval(Carbon::now()->format('Y'));
    }

    public static function getCurrentMonth()
    {
        return intval(Carbon::now()->format('m'));
    }
}

