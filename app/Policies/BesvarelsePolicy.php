<?php

namespace Pur\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Pur\Besvarelse;
use Pur\Bruker;

class BesvarelsePolicy {

    use HandlesAuthorization;

    /**
     * Sant hvis bruker har adgang til å se besvarelse
     *
     * @param Bruker $bruker
     * @param Besvarelse $besvarelse
     * @return bool
     */
    public function vis(Bruker $bruker, Besvarelse $besvarelse)
    {
        return $this->erBrukersBesvarelse($bruker, $besvarelse)
            || $this->erBesvarelsePaaBrukerOppgavesett($bruker, $besvarelse);
    }

    /**
     * Sant hvis bruker har adgang til å redigere besvarelse
     *
     * @param Bruker $bruker
     * @param Besvarelse $besvarelse
     * @return bool
     */
    public function rediger(Bruker $bruker, Besvarelse $besvarelse)
    {
        return $this->erBrukersBesvarelse($bruker, $besvarelse)
        || $this->erBesvarelsePaaBrukerOppgavesett($bruker, $besvarelse);
    }

    /**
     * Sant hvis besvarelse tilhører bruker
     *
     * @param Bruker $bruker
     * @param Besvarelse $besvarelse
     * @return bool
     */
    private function erBrukersBesvarelse(Bruker $bruker, Besvarelse $besvarelse)
    {
        return $bruker->id === $besvarelse->bruker_id;
    }

    /**
     * Sant hvis bruker har laget oppgavesettet til besvarelsen
     *
     * @param $bruker
     * @param $besvarelse
     * @return bool
     */
    private function erBesvarelsePaaBrukerOppgavesett($bruker, $besvarelse)
    {
        return $bruker->id === $besvarelse->oppgavesett->skaper->id;
    }

}
