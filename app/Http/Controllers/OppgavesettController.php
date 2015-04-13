<?php namespace Pur\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Pur\Http\Requests;
use Pur\Oppgavesett;

class OppgavesettController extends Controller
{
    private $bruker;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('laerer', ['except' => ['opplist', 'vis']]);
        $this->bruker = Auth::user();
    }

    /**
     * List opp oppgavesett.
     *
     * For lærer: Alle lærerens oppgavesett.
     * For student: Alle publiserte oppgavesett og alle studentens besvarelser.
     *
     * @param Oppgavesett $oppgavesett
     * @param null $rolle Ev. overstyring av rolle
     * @return \Illuminate\View\View
     */
    public function opplist(Oppgavesett $oppgavesett, $rolle = null)
    {
        // Ev. overstyring av rolle:
        $rolle = ($rolle) ? $rolle : $this->bruker->rolle;

        if ($rolle == 'laerer') $oppgavesettsamling = $this->bruker->oppgavesett;
        else { // Student
            $oppgavesettsamling = $oppgavesett->publiserte()->get();
            $besvarelser = $this->bruker->besvarelser;
        }
        return view('oppgavesett.opplist', compact('oppgavesettsamling', 'besvarelser'));
    }

    /**
     * Vis skjermbilde for opprettelse av nytt oppgavesett.
     *
     * @return Response
     */
    public function opprett()
    {
        return view('oppgavesett.opprett');
    }

    /**
     * Lagre oppgavesett.
     *
     * @return Response
     */
    public function lagre(Oppgavesett $oppgavesett)
    {
        // TODO: implementér
        return "<i>Lagre nytt oppgavesett</i>";
    }

    /**
     * Vis oppgavesett (view er rolleavhengig)
     *
     * @param Oppgavesett $oppgavesett
     * @param null $rolle Ev. overstyring av rolle
     * @return \Illuminate\View\View
     */
    public function vis(Oppgavesett $oppgavesett, $rolle = null)
    {
        $rolle = ($rolle) ? $rolle : $this->bruker->rolle;

        $view = $rolle == 'laerer' ? 'oppgavesett.visForLaerer' : 'oppgavesett.visForStudent';

        return view($view, compact('oppgavesett'));
    }

    /**
     * Åpne oppgavesett for redigering.
     *
     * @param  int $id
     * @return Response
     */
    public function rediger(Oppgavesett $oppgavesett)
    {
        return view('oppgavesett.rediger', compact('oppgavesett'));
    }

    /**
     * Lagre endringer i oppgavesett.
     *
     * @param  int $id
     * @return Response
     */
    public function oppdater(Oppgavesett $oppgavesett)
    {
        // TODO: implementér
        return "<i>Oppdater oppgavesett med id " . $oppgavesett->id . "</i>";
    }

    /**
     * Slett oppgavesett.
     *
     * @param  int $id
     * @return Response
     */
    public function slett(Oppgavesett $oppgavesett)
    {
        // TODO: implementér
        return "<i>Slett oppgavesett med id " . $oppgavesett->id . "</i>";
    }

}
