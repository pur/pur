<?php

namespace Pur\Services\Purmoduler\KoiAnalyse;


use Pur\Purmoduler\KoiAnalyse\Datasett;
use Pur\Purmoduler\KoiAnalyse\Instans;

class OppgaveTjeneste {

    public function instansier($oppgave, $bruker)
    {
        // Hent et tilfeldig valgt datasett:
        $datasett = Datasett::orderByRaw("RAND()")->first();

        $instans = new Instans();
        $instans->oppgave()->associate($oppgave);
        $instans->bruker()->associate($bruker);
        //$instans->datasett()->associate($datasett); // Nødvendig å kjenne datasettet?

        // TODO: Vurder å beregne instansvariablene i Datasett-klassen
        $instans->a =  mt_rand($datasett->a_min*100, $datasett->a_maks*100) / 100;
        // TODO: Beregn resten av instansvariablene


        $instans->save();

        return $instans;
    }
}