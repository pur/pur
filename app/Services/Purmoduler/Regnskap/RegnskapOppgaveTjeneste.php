<?php

namespace Pur\Services\Purmoduler\Regnskap;

use Pur\Oppgave;
use Pur\Purmoduler\Regnskap\Bilagsmal;
use Pur\Purmoduler\Regnskap\Bilagsmalsekvens;
use Pur\Purmoduler\Regnskap\BilagsmalsekvensVar;

class RegnskapOppgaveTjeneste
{
    public function opprett($request, $bruker)
    {
        $oppgave = new Oppgave();
        $oppgave->beskrivelse = $request->input('beskrivelse');

        $oppgave->moduloppgave_type = 'Pur\Purmoduler\Regnskap\Bilagsmalsekvens';
        $bilagsmalsekvens = Bilagsmalsekvens::create();
        $oppgave->moduloppgave_id = $bilagsmalsekvens->id;

        $oppgave->skaper()->associate($bruker);
        $oppgave->save();

        $varA = new BilagsmalsekvensVar(['tegn_i_formel' => 'a']);
        $varB = new BilagsmalsekvensVar(['tegn_i_formel' => 'b']);
        $varX = new BilagsmalsekvensVar(['tegn_i_formel' => 'x']);

        $bilagsmalsekvens->variabler()->saveMany([$varA, $varB, $varX]);

        $bilagsmaler = array();
        for ($i = 1; $i <= $request->input('antall-bilag'); $i++) {
            $bilagsmaler[] = new Bilagsmal(['nr_i_sekvens' => $i]);
        }

        $bilagsmalsekvens->bilagsmaler()->saveMany($bilagsmaler);

        return $bilagsmalsekvens;
    }
}