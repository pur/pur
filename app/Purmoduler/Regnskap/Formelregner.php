<?php namespace Pur\Purmoduler\Regnskap;

class Formelregner
{

    private $a;
    private $b;
    private $x;

    public function __construct($variabler)
    {
        $this->a = $variabler['a'];
        $this->b = $variabler['b'];
        $this->x = $variabler['x'];
    }


    public function brukFormel($formelNr)
    {
        switch ($formelNr) {
            case 1 :
                return $this->formelA($this->a);
            case 2 :
                return $this->formelB($this->a);
            case 3 :
                return $this->formelC($this->a);
            case 4 :
                return $this->formelD($this->a, $this->b, $this->x);
            case 5 :
                return $this->formelE($this->a, $this->b, $this->x);
            case 6 :
                return $this->formelH($this->a, $this->b, $this->x);
            case 7 :
                return $this->formelI($this->a, $this->b, $this->x);
            case 8 :
                return $this->a;
            case 9 :
                return $this->b;
            case 10 :
                return $this->formelF($this->a, $this->b);
            case 11 :
                return $this->formelG($this->a, $this->b, $this->x);
        }
    }

    private function formelA($var)
    {
        return 0 - $var;
    }

    private function formelB($var)
    {
        return $var / 5;
    }

    private function formelC($var)
    {
        return $var / 1.25;
    }

    private function formelD($var1, $var2, $var3)
    {
        return $this->formelF($var1, $var2) * (1 - $this->formelJ($var3));
    }

    private function formelE($var1, $var2, $var3)
    {
        return $this->formelA($this->formelD($var1, $var2, $var3));
    }

    private function formelF($var1, $var2)
    {
        return $var1 - $var2;
    }

    private function formelG($var1, $var2, $var3)
    {
        return $this->formelF($var1, $var2) * $this->formelJ($var3);
    }

    private function formelH($var1, $var2, $var3)
    {
        return $this->formelB($this->formelG($var1, $var2, $var3));
    }

    private function formelI($var1, $var2, $var3)
    {
        return $this->formelC($this->formelG($var1, $var2, $var3));
    }

    private function formelJ($var)
    {
        return $var / 100;
    }


    /**
     * Returnerer tabell med definisjoner på klassens formler
     *
     * @return array
     */
    public static function navnAlleFormler()
    {
        return $navnAlleFormler = [
            'Velg formel',
            '- a',                        //  1 '- bruttobeløp'                                'Bruttobeløp som kreditt'
            'a / 5',                      //  2 'bruttobeløp / 5'                              'Mva. fra bruttobeløp a'
            'a / 1,25',                   //  3 'bruttobeløp / 1,25'                           'Bruttobeløp a eks. mva.'
            '(a - b) * (1 - (x / 100)',   //  4 'brt.belA - brt.belB * (1 - rabatt / 100)'     'Beregnet beløp med rabatt'
            '- (a - b * (100 - x))',      //  5 '-(brt.belA - brt.belB * (1 - rabatt / 100))'  'Beregnet beløp med rabatt som kreditt'
            '(a - b) * (x / 100) / 5',    //  6 'rabattbeløp / 5'                              'Mva. fra rabattbeløp'
            '(a - b) * (x / 100) / 1,25', //  7 'rabattbeløp / 1,25'                           'Rabattbeløp eks. mva'
            'a',                          //  8 'beløp a'                                      'Opprinnelig fakturabeløp'
            'b',                          //  9 'beløp b'                                      'Kreditnota-beløp'
            'a - b',                      // 10 'beløp a - beløp b'                            'Differans mellom opprinnelig fakturabeløp og beløp b'
            '(a - b) * (x / 100)'         // 11 '(beløp a - beløp b) * (rabatt / 100)'         'Rabattbeløp'
        ];
    }

}