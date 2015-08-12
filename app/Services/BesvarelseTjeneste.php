<?php namespace Pur\Services;

use Pur\Besvarelse;
use Pur\Bruker;
use Pur\Oppgavesett;
use Pur\Oppgavesvar;
use Pur\Purmoduler\Regnskap\Bilag;
use Pur\Purmoduler\Regnskap\Bilagssekvens;
use Pur\Purmoduler\Regnskap\Formelregner;
use Pur\Purmoduler\Regnskap\Postering;


class BesvarelseTjeneste
{

    /**
     * Oppretter en besvarelse knyttet til et oppgavesett og en bruker
     *
     * @param Bruker $bruker
     * @param Oppgavesett $oppgavesett
     * @return Besvarelse
     */
    public function opprett($bruker, $oppgavesett)
    {
        // Opprett besvarelse
        $besvarelse = new Besvarelse();
        $besvarelse->oppgavesett()->associate($oppgavesett);
        $besvarelse->skaper()->associate($bruker);
        $besvarelse->save();

        // Opprett oppgavesvar
        foreach ($oppgavesett->oppgaver as $oppgave) {
            $oppgavesvar = new Oppgavesvar();
            $oppgavesvar->oppgave()->associate($oppgave);
            $oppgavesvar->besvarelse()->associate($besvarelse);
            $this->opprettModuloppgavesvar($oppgavesvar);
        }
        return $besvarelse;
    }


    // TODO: Gjør purmodul-uavhengig
    private function opprettModuloppgavesvar($oppgavesvar)
    {

        $oppgavesvartype = 'Pur\Purmoduler\Regnskap\Bilagssekvens';
        $moduloppgavesvar = Bilagssekvens::create();

        $oppgavesvar->moduloppgavesvar_type = $oppgavesvartype;
        $oppgavesvar->moduloppgavesvar_id = $moduloppgavesvar->id;
        $oppgavesvar->save();


        // Bytter til moduloppgavenavnet i regnskapsmodulen:
        $bilagssekvens = $moduloppgavesvar;

        $this->genererVariabler($bilagssekvens);

        // Henter bilagssekvensens variabel-objekter inkl. malvariabel-objekter
        $variabler = $bilagssekvens->variabler()->with('malvariabel')->get();

        // Lager en tabell på formen "a" => "1000", "b" => "500", etc.
        $formelvariabler = $variabler->lists('verdi', 'malvariabel.tegn_i_formel')->all();

        // Formelregneren typetvinger tabellverdiene til 'float'
        $formelregner = new Formelregner($formelvariabler);


        $this->genererBilag($bilagssekvens, $formelregner);
    }

    // TODO: Flytt til en ny tjenesteklasse som er spesifikk for regnskapsmodulen:

    private function genererVariabler($bilagssekvens)
    {
        $malvariabler = $bilagssekvens->oppgavesvar->oppgave->moduloppgave->variabler;

        $variabler = array();
        foreach ($malvariabler as $malvariabel)
            $variabler[] = $malvariabel->instansier();

        $bilagssekvens->variabler()->saveMany($variabler);
    }

    private function genererBilag($bilagssekvens, $formelregner)
    {
        $bilagsmalsekvens = $bilagssekvens->oppgavesvar->oppgave->moduloppgave;

        foreach ($bilagsmalsekvens->bilagsmaler as $bilagsmal)
            $this->opprettBilagFraMal($bilagsmal, $bilagssekvens, $formelregner);

    }

    private function opprettBilagFraMal($bilagsmal, $bilagssekvens, $formelregner)
    {
        $bilag = new Bilag();
        $bilag->bilagssekvens()->associate($bilagssekvens);
        $bilag->bilagsmal()->associate($bilagsmal);
        $bilag->belop = $formelregner->brukFormel($bilag->bilagsmal->belopsformel);
        $bilag->nr_i_besvarelse = $this->giNummerIBesvarelse();
        $bilag->save();

        $posteringer = array();
        foreach ($bilagsmal->posteringsmaler as $posteringsmal)
            $posteringer[] = $this->opprettPosteringFraMal($posteringsmal, $formelregner);

        $bilag->posteringer()->saveMany($posteringer);

        // Én tom postering på hvert bilag:
        $bilag->posteringer()->create(['er_fasit' => false]);
    }

    public function giNummerIBesvarelse()
    {
        // TODO: implementer
        //
        // Mulig framgangsmåte:
        //
        // Finn antall bilag i en besvarelse
        // Lag en collection med alle tall mellom 0 og antallet av bilag
        // Shuffle tall-collectionen
        // Løp systematisk gjennom alle bilagene og gi hvert av dem det neste tallet i collectionen
        // Sørg for at bilagene beholder opprinnelig rekkefølge i sin bilagssekvens...

        return 1;
    }

    private function opprettPosteringFraMal($posteringsmal, $formelregner)
    {
        $postering = new Postering();

        $postering->er_fasit = true;
        $postering->kontokode = $posteringsmal->kontokode;
        $postering->belop = $formelregner->brukFormel($posteringsmal->formel);

        return $postering;
    }

    /**
     * Alle bilag som inngår i oppgitt besvarelse
     *
     * @param $besvarelse
     * @return array
     */
    public static function besvarelseBilag($besvarelse)
    {
        $bilagssamling = array();
        foreach ($besvarelse->oppgavesvar as $oppgavesvar) {
            $bilagssekvens = $oppgavesvar->moduloppgavesvar;
            foreach ($bilagssekvens->bilag as $bilag)
                $bilagssamling[] = $bilag;
        }
        //return $bilagssamling;


        // TODO: Lagre på bilag ved opprettelse av besvarelse:
        $besvarelseBilag = collect($bilagssamling);

        //$besvarelseBilag->shuffle();

        $besvarelseBilag->map(function ($bilag, $nrIBesvarelse = 0) {
            return $bilag->nr_i_besvarelse = ++$nrIBesvarelse;
        });

        return $besvarelseBilag;
    }
}