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

        $nyBesvarelse = $bruker->besvarelser->last();
        $antallOppgavesvar = $nyBesvarelse->oppgavesvar->count();
        $antallOppgaver = $oppgavesett->oppgaver->count();

        $feilmld = 'Feil antall oppgavesvar i forhold til oppgaver';
        $this->assertEquals($antallOppgaver, $antallOppgavesvar, $feilmld);
    }
}
