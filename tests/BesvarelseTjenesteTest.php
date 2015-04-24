<?php

use Pur\Bruker;
use Pur\Oppgavesett;
use Pur\Services\BesvarelseTjeneste;

class BesvarelseTjenesteTest extends TestCase
{
    public function testOpprett()
    {
        $besvarelseTjeneste = new BesvarelseTjeneste();
        $oppgavesett = Oppgavesett::find(1);
        $bruker = Bruker::find(1);

        // Opprett ny besvarelse
        $besvarelseTjeneste->opprett($bruker, $oppgavesett);

        // Hent den nye besvarelsen
        $nyBesvarelse = $bruker->besvarelser->last();

        // Test om rett antall oppgavesvar er blitt generert:
        $antallOppgavesvar = $nyBesvarelse->oppgavesvar->count();
        $antallOppgaver = $oppgavesett->oppgaver->count();
        $feilmld = 'Feil antall oppgavesvar i forhold til oppgaver';
        $this->assertEquals($antallOppgaver, $antallOppgavesvar, $feilmld);
    }

    public function testGiNrIBesvarelse()
    {
        $besvarelseTjeneste = new BesvarelseTjeneste();
        $nr = $besvarelseTjeneste->giNummerIBesvarelse();
        $feilmld = 'Gitt nummer kan ikke brukes';
        $this->assertEquals(1, $nr, $feilmld);
    }
}
