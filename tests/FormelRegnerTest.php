<?php

use Pur\Purmoduler\Regnskap\Formelregner;

class FormelregnerTest extends TestCase
{

    /**
     * Tester resultatet av beregninger gjort med formler i klassen FormelRegner.
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

        // Formel 1: a
        $this->assertEquals(12120, $formelregner->brukFormel(1), $mld . ' 1');

        // Formel 2: a / 5
        $this->assertEquals(2424, $formelregner->brukFormel(2), $mld . ' 2');

        // Formel 3: a / 1,25
        $this->assertEquals(9696, $formelregner->brukFormel(3), $mld . ' 3');

        // Formel 4: b
        $this->assertEquals(1500, $formelregner->brukFormel(4), $mld . ' 4');

        // Formel 5: b / 5
        $this->assertEquals(300, $formelregner->brukFormel(5), $mld . ' 5');

        // Formel 6: b / 1,25
        $this->assertEquals(1200, $formelregner->brukFormel(6), $mld . ' 6');

        // Formel 7: - a
        $this->assertEquals(-12120, $formelregner->brukFormel(7), $mld . ' 7');

        // Formel 8: - a / 5
        $this->assertEquals(-2424, $formelregner->brukFormel(8), $mld . ' 8');

        // Formel 9: - a / 1,25
        $this->assertEquals(-9696, $formelregner->brukFormel(9), $mld . ' 9');

        // Formel 10: - b
        $this->assertEquals(-1500, $formelregner->brukFormel(10), $mld . ' 10');

        // Formel 11: - b / 5
        $this->assertEquals(-300, $formelregner->brukFormel(11), $mld . ' 11');

        // Formel 12: - b / 1,25
        $this->assertEquals(-1200, $formelregner->brukFormel(12), $mld . ' 12');

        // Formel 13: a - b
        $this->assertEquals(10620, $formelregner->brukFormel(13), $mld . ' 13');

        // Formel 14: (a - b) * (x / 100)
        $this->assertEquals(159.3, $formelregner->brukFormel(14), $mld . ' 14');

        // Formel 15: (a - b) * (x / 100) / 5
        $this->assertEquals(31.86, $formelregner->brukFormel(15), $mld . ' 15');

        // Formel 16: (a - b) * (x / 100) / 1,25
        $this->assertEquals(127.44, $formelregner->brukFormel(16), $mld . ' 16');

        // Formel 17: (a - b) * (100 - x) / 100
        $this->assertEquals(10460.7, $formelregner->brukFormel(17), $mld . ' 17');

        // Formel 18: - (a - b) * (x / 100)
        $this->assertEquals(-159.3, $formelregner->brukFormel(18), $mld . ' 18');

        // Formel 19: - (a - b) * (x / 100) / 5
        $this->assertEquals(-31.86, $formelregner->brukFormel(19), $mld . ' 19');

        // Formel 20: - (a - b) * (x / 100) / 1,25
        $this->assertEquals(-127.44, $formelregner->brukFormel(20), $mld . ' 20');

        // Formel 21: - (a - b) * (100 - x) / 100
        $this->assertEquals(-10460.7, $formelregner->brukFormel(21), $mld . ' 21');
    }

}
