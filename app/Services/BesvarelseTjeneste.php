<?php namespace Pur\Services;

use Pur\Besvarelse;
use Pur\Bruker;
use Pur\Oppgavesett;
use Pur\Oppgavesvar;


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
        $besvarelse = new Besvarelse();

        $besvarelse->oppgavesett()->associate($oppgavesett);
        $besvarelse->skaper()->associate($bruker)->save();

        $oppgavesvarsett = array();
        foreach ($oppgavesett->oppgaver as $oppgave) {
            $oppgavesvar = new Oppgavesvar();
            $oppgavesvar->oppgave()->associate($oppgave);
            $oppgavesvarsett[] = $oppgavesvar;
        }

        $besvarelse->oppgavesvar()->saveMany($oppgavesvarsett);

    }
}