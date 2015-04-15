<?php

use Pur\Bruker;
use Pur\Oppgavesett;
use Pur\Services\BesvarelseTjeneste;

class BesvarelseTjenesteTest extends TestCase {


    public function testOpprett()
    {
        $oppgavesett = Oppgavesett::find(1);
        $bruker = Bruker::find(1);

        $besvarelseTjeneste = new BesvarelseTjeneste();
        $besvarelseTjeneste->opprett($bruker, $oppgavesett);

        $this->assertTrue($bruker->besvarelser->count() > 0);
    }
}
