<?php namespace Pur\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Pur\Http\Requests;
use Pur\Oppgave;

class OppgaveController extends Controller
{

    private $bruker;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('laerer', ['except' => ['opplist', 'vis']]);

        $this->bruker = Auth::user();
    }


    /**
     * List opp oppgaver.
     *
     * @param Oppgave $oppgave
     * @return \Illuminate\View\View
     */
    public function opplist(Oppgave $oppgave)
    {
        //
    }

    /**
     * Vis skjermbilde for opprettelse av ny oppgave.
     *
     * @return Response
     */
    public function opprett()
    {
        // TODO: implementér
        return "<i>Vis skjermbilde for opprettelse av purmodul-spesifikk oppgave</i>";
    }

    /**
     * Lagre oppgave.
     *
     * @param Oppgave $oppgave
     * @return Response
     */
    public function lagre(Oppgave $oppgave)
    {
        // TODO: implementér
        return "<i>Lagre ny purmodul-spesifikk oppgave</i>";
    }

    /**
     * Vis oppgave.
     *
     * @param Oppgave $oppgave
     * @param null $rolle Ev. overstyring av rolle
     * @return string
     */
    public function vis(Oppgave $oppgave, $rolle = null)
    {
        // TODO: implementér
        return "<i>Vis purmodul-spesifikk oppgave med id " . $oppgave->id . "</i>";
    }

    /**
     * Åpne oppgave for redigering.
     *
     * @param Oppgave $oppgave
     * @return Response
     * @internal param int $id
     */
    public function rediger(Oppgave $oppgave)
    {
        // TODO: implementér
        return "<i>Rediger purmodul-spesifikk oppgave med id " . $oppgave->id . "</i>";
    }

    /**
     * Lagre endringer i oppgave.
     *
     * @param Oppgave $oppgave
     * @return Response
     * @internal param int $id
     */
    public function oppdater(Oppgave $oppgave)
    {
        // TODO: implementér
        return "<i>Oppdater purmodul-spesifikk oppgave med id " . $oppgave->id . "</i>";
    }

    /**
     * Slett oppgave.
     *
     * @param Oppgave $oppgave
     * @return Response
     * @internal param int $id
     */
    public function slett(Oppgave $oppgave)
    {
        // TODO: implementér
        return "<i>Slett purmodul-spesifikk oppgave med id " . $oppgave->id . "</i>";
    }
}
