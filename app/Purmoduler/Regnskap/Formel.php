<?php namespace Pur\Purmoduler\Regnskap;

class Formel
{

    private static $navnAlleFormler = [
        'Velg formel',
        '- a',                   //  1 'bruttobeløp - bruttobeløp'                // 'Bruttobeløp som kreditt'
        'a / 5',                 //  2 'bruttobeløp / 5'                          // 'Mva. fra bruttobeløp a'
        'a / 1,25',              //  3 'bruttobeløp / 1,25'                       // 'Bruttobeløp a eks. mva.'
        'a - b * (100 - x)',     //  4 'brt.belA - brt.belB * (100-rabattA)'
        '- (a - b * (100 - x))', //  5 '-(brt.belA - brt.belB * (100-rabattA))'
        'x / 5',                 //  6 'rabattbeløp / 5'
        'x / 1,25',              //  7 'rabattbeløp / 1,25'
        'a',                     //  8 'beløp a'
        'b',                     //  9 'beløp b'
        'a - b'                  // 10 'beløp a - beløp b'
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


    public static function brukFormel($formelNr, $verdi1 = 0, $verdi2 = 0, $verdi3 = 0)
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
                return self::formelB($verdi1);
            case 7 :
                return self::formelC($verdi1);
            case 8 :
                return $verdi1;
            case 9 :
                return $verdi1;
            case 10 :
                return self::formelF($verdi1, $verdi2);
        }
    }

    private static function formelA($verdi)
    {
        return 0 - $verdi;
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
        return self::formelF($verdi1, $verdi2) * (100 - $verdi3);
    }

    private static function formelE($verdi1, $verdi2, $verdi3)
    {
        return self::formelA(self::formelD($verdi1, $verdi2, $verdi3));
    }

    private static function formelF($verdi1, $verdi2)
    {
        return $verdi1 - $verdi2;
    }
}

