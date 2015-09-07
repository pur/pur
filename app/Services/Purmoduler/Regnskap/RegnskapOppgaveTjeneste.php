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

    public function oppdater($bilagsmalsekvens, $request) {

        $bilagsmalsekvens->fill($request->all())->save();
        $bilagsmalsekvens->oppgave->fill($request->all())->save();


        $varA = $bilagsmalsekvens->variabler->where('tegn_i_formel', 'a')->first();
        $varA->navn = $request->input('anavn');
        $varA->verdi_min = $request->input('aMin');
        $varA->verdi_maks = $request->input('aMaks');
        $varA->save();

        $varB = $bilagsmalsekvens->variabler->where('tegn_i_formel', 'b')->first();
        $varB->navn = $request->input('bnavn');
        $varB->verdi_min = $request->input('bMin');
        $varB->verdi_maks = $request->input('bMaks');
        $varB->save();

        $varX = $bilagsmalsekvens->variabler->where('tegn_i_formel', 'x')->first();
        $varX->navn = $request->input('xnavn');
        $varX->verdi_min = $request->input('xMin');
        $varX->verdi_maks = $request->input('xMaks');
        $varX->save();
    }
}