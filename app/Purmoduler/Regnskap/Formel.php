<?php namespace Pur\Purmoduler\Regnskap;

class Formel //extends Model
{

    private static $navnAlleFormler = [
        '1' => 'bruttobeløp - bruttobeløp',
        '2' => 'bruttobeløp / 5',
        '3' => 'bruttobeløp / 1,25',
        '4' => 'brt.belA - brt.belB * (100-rabattA)',
        '5' => '-(brt.belA - brt.belB * (100-rabattA))',
        '6' => 'rabattbeløp / 5',
        '7' => 'rabattbeløp / 1,25'
    ];


    /**
     * Returnerer tabell av strenger med klassens formler
     *
     * @return array
     */
    public static function navnAlleFormler()
    {
        return self::$navnAlleFormler;
    }


    public static function brukFormel($formelNr, $verdi1, $verdi2, $verdi3)
    {
        switch ($formelNr) {
            case 1 :
                return self::formelA($verdi1);
            case 2 :
                return self::formelB($verdi1);
            case 3 :
                return self::formelC($verdi1);
            case 4 :
                return self::formelD($verdi1, $verdi2, $verdi3);
            case 5 :
                return self::formelE($verdi1, $verdi2, $verdi3);
            case 6 :
                return self::formelA($verdi1);
            case 7 :
                return self::formelB($verdi1);
        }
    }

    private static function formelA($verdi)
    {
        return $verdi - $verdi;
    }

    private static function formelB($verdi)
    {
        return $verdi / 5;
    }

    private static function formelC($verdi)
    {
        return $verdi / 1.25;
    }

    private static function formelD($verdi1, $verdi2, $verdi3)
    {
        return $verdi1 - $verdi2 * (100 - $verdi3);
    }

    private static function formelE($verdi1, $verdi2, $verdi3)
    {
        return self::formelA(self::formelD($verdi1, $verdi2, $verdi3));
    }
}

