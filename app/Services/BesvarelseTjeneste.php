<?php namespace Pur\Services;

use Pur\Besvarelse;
use Pur\Bruker;
use Pur\Oppgavesett;
use Pur\Oppgavesvar;
use Pur\Purmoduler\Regnskap\Bilag;
use Pur\Purmoduler\Regnskap\Bilagssekvens;
use Pur\Purmoduler\Regnskap\Formel;
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
        $moduloppgavesvar = Bilagssekvens::create([]);

        $oppgavesvar->moduloppgavesvar_type = $oppgavesvartype;
        $oppgavesvar->moduloppgavesvar_id = $moduloppgavesvar->id;
        $oppgavesvar->save();

        $this->genererVariabler($moduloppgavesvar);
        $this->genererBilag($moduloppgavesvar);
    }

    // TODO: Flytt til en ny tjenesteklasse som er spesifikk for regnskapsmodulen:

    private function genererVariabler($bilagssekvens)
    {
        $malvariabler = $bilagssekvens->oppgavesvar->oppgave->moduloppgave->variabler;

        foreach ($malvariabler as $malvariabel)
            $malvariabel->instansierFor($bilagssekvens);
    }

    private function genererBilag($bilagssekvens)
    {
        $bilagsmalsekvens = $bilagssekvens->oppgavesvar->oppgave->moduloppgave;

        foreach ($bilagsmalsekvens->bilagsmaler as $bilagsmal)
            $this->opprettBilagFraMal($bilagsmal, $bilagssekvens);

    }

    private function opprettBilagFraMal($bilagsmal, $bilagssekvens)
    {
        $bilag = new Bilag();
        $bilag->bilagssekvens()->associate($bilagssekvens);
        $bilag->bilagsmal()->associate($bilagsmal);
        $bilag->nr_i_besvarelse = $this->giNummerIBesvarelse();
        $bilag->save();

        foreach ($bilagsmal->posteringsmaler as $posteringsmal)
            $this->opprettPosteringFraMal($posteringsmal, $bilag);
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

    private function opprettPosteringFraMal($posteringsmal, $bilag)
    {
        $postering = new Postering();

        $postering->kontokode = $posteringsmal->kontokode;
        $postering->er_fasit = true;

        $postering->belop = $this->genererBelop($posteringsmal);

        $postering->bilag()->associate($bilag);
        $postering->save();
    }

    private function genererBelop($posteringsmal)
    {
        $formel = $posteringsmal->formel;
        $verdi1 = 0;
        $verdi2 = 0;
        $verdi3 = 0;
        $belop = Formel::brukFormel($formel, $verdi1, $verdi2, $verdi3);
        return $belop;
    }

    /**
     * Alle bilag som inngår i oppgitt besvarelse
     *
     * @param $besvarelse
     * @return array
     */
    public function besvarelseBilag($besvarelse)
    {
        $bilagssamling = array();
        foreach ($besvarelse->oppgavesvar as $oppgavesvar) {
            $bilagssekvens = $oppgavesvar->moduloppgavesvar;
            foreach ($bilagssekvens->bilag as $bilag)
                $bilagssamling[] = $bilag;
        }
        return $bilagssamling;
    }
}