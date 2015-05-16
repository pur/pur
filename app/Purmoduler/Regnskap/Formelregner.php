<?php namespace Pur\Purmoduler\Regnskap;

class Formelregner
{

    private $a;
    private $b;
    private $x;

    public function __construct($variabler)
    {
        $this->a = isset($variabler['a']) ? (float)$variabler['a'] : 0.0;
        $this->b = isset($variabler['b']) ? (float)$variabler['b'] : 0.0;
        $this->x = isset($variabler['x']) ? (float)$variabler['x'] : 0.0;
    }


    public function brukFormel($formelNr)
    {
        switch ($formelNr) {
            case 1 :
                return $this->a;
            case 2 :
                return $this->a / 5;
            case 3 :
                return $this->a / 1.25;
            case 4 :
                return $this->b;
            case 5 :
                return $this->b / 5;
            case 6 :
                return $this->b / 1.25;
            case 7 :
                return 0 - $this->a;
            case 8 :
                return 0 - $this->a / 5;
            case 9 :
                return 0 - $this->a / 1.25;
            case 10 :
                return 0 - $this->b;
            case 11 :
                return 0 - $this->b / 5;
            case 12 :
                return 0 - $this->b / 1.25;
            case 13 :
                return $this->a - $this->b;
            case 14 :
                return ($this->a - $this->b) * ($this->x / 100);
            case 15 :
                return ($this->a - $this->b) * ($this->x / 100) / 5;
            case 16 :
                return ($this->a - $this->b) * ($this->x / 100) / 1.25;
            case 17 :
                return ($this->a - $this->b) * (100 - $this->x) / 100;
            case 18 :
                return 0 - (($this->a - $this->b) * ($this->x / 100));
            case 19 :
                return 0 - (($this->a - $this->b) * ($this->x / 100) / 5);
            case 20 :
                return 0 - (($this->a - $this->b) * ($this->x / 100) / 1.25);
            case 21 :
                return 0 - (($this->a - $this->b) * (100 - $this->x) / 100);
            default :
                return 0;
        }
    }


    /**
     * Returnerer tabell med definisjoner på klassens formler
     *
     * @return array
     */
    public static function navnAlleFormler()
    {
        return $navnAlleFormler = [
            0 => 'Velg formel',
            1 => 'a',
            2 => 'a / 5',
            3 => 'a / 1,25',
            4 => 'b',
            5 => 'b / 5',
            6 => 'b / 1,25',
            7 => '- a',
            8 => '- a / 5',
            9 => '- a / 1,25',
            10 => '- b',
            11 => '- b / 5',
            12 => '- b / 1,25',
            13 => 'a - b',
            14 => '(a - b) * (x / 100)',
            15 => '(a - b) * (x / 100) / 5',
            16 => '(a - b) * (x / 100) / 1,25',
            17 => '(a - b) * (100 - x) / 100',
            18 => '- ((a - b) * (x / 100)',
            19 => '- ((a - b) * (x / 100) / 5)',
            20 => '- ((a - b) * (x / 100) / 1.25)',
            21 => '- ((a - b) * (100 - x) / 100)',
        ];
    }

}