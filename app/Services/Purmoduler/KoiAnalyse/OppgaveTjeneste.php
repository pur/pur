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

        $instans->a = $this->genererVariabel($datasett->a_min, $datasett->a_maks, $datasett->a_intervall);
        $instans->b = $this->genererVariabel($datasett->b_min, $datasett->b_maks, $datasett->b_intervall);
        $instans->d = $this->genererVariabel($datasett->d_min, $datasett->d_maks, $datasett->d_intervall);
        $instans->m = $this->genererVariabel($datasett->m_min, $datasett->m_maks, $datasett->m_intervall);
        $instans->n = $this->genererVariabel($datasett->n_min, $datasett->n_maks, $datasett->n_intervall);
        $instans->q = $this->genererVariabel($datasett->q_min, $datasett->q_maks, $datasett->q_intervall);
        $instans->kapasitet = $datasett->kapasitet;

        $instans->save();

        return $instans;
    }

    public function genererVariabel($min, $max, $intervall)
    {
        return $intervall * mt_rand(1, abs(($max - $min) / $intervall)) + $min;
    }
}