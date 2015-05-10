<?php

use Pur\Purmoduler\Regnskap\Formelregner;

class FormelregnerTest extends TestCase
{

    /**
     * Tester resultatet av beregninger gjort av formelmetoder i Formelberegner-klassen.
     *
     * @return void
     */
    public function testBrukFormel()
    {

        $variabler = [
            'a' => 12120,
            'b' => 1500,
            'x' => 1.5
        ];

        $formelregner = new Formelregner($variabler);

        $mld = 'Beregningen er ikke riktig i formel';

        // Formel 1: '- a' -> 0 - 12120 = -12120
        $this->assertEquals(-12120, $formelregner->brukFormel(1), $mld . ' 1');

        // Formel 2: 'a / 5' -> 10 / 5 = 2424
        $this->assertEquals(2424, $formelregner->brukFormel(2), $mld . ' 2');

        // Formel 3: 'a / 1,25' -> 12120 / 1.25 = 9696
        $this->assertEquals(9696, $formelregner->brukFormel(3), $mld . ' 3');

        // Formel 4: '(a - b) * (1 - (x / 100)' -> (12120 - 1500) * (1 − (1,5 / 100)) = 10460.7
        $this->assertEquals(10460.7, $formelregner->brukFormel(4), $mld . ' 4');

        // Formel 5: '-((a - b) * (1 - (x / 100))' -> -((12120 - 1500) * (1 − (1,5 / 100))) = -10460.7
        $this->assertEquals(-10460.7, $formelregner->brukFormel(5), $mld . ' 5');

        // Formel 6: '(a - b) * (x / 100) / 5' -> (12120 - 1500) * (1,5 / 100) / 5 = 31.86
        $this->assertEquals(31.86, $formelregner->brukFormel(6), $mld . ' 6');

        // Formel 7: '(a - b) * (x / 100) / 1.25' -> (12120 - 1500) * (1,5 / 100) / 1.25 = 127.44
        $this->assertEquals(127.44, $formelregner->brukFormel(7), $mld . ' 7');

        // Formel 8: 'a' -> 12120 = 12120
        $this->assertEquals(12120, $formelregner->brukFormel(8), $mld . ' 8');

        // Formel 9: 'b' -> 1500 = 1500
        $this->assertEquals(1500, $formelregner->brukFormel(9), $mld . ' 9');

        // Formel 10: 'a - b' -> 12120 - 1500 = 10620
        $this->assertEquals(10620, $formelregner->brukFormel(10), $mld . ' 10');

        // Formel 11: '(a - b) * (x / 100)' -> (12120 - 1500) * (1,5 / 100) = 159.30
        $this->assertEquals(159.30, $formelregner->brukFormel(11), $mld . ' 11');

    }

}
