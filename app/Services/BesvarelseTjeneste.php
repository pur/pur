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

        $besvarelse->skaper()->associate($bruker);
        $besvarelse->oppgavesett()->associate($oppgavesett);
    }
}