<?php namespace Pur\Http\Controllers;

use Illuminate\Http\Request;
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
        $rolle = ($rolle) ? $rolle : $this->bruker->rolle;

        switch ($rolle) {
            case 'laerer' :
                $oppgavesettsamling = $this->bruker->oppgavesett;
                $retur = view('oppgavesett.opplistForLaerer', compact('oppgavesettsamling'));
                break;
            case 'student' :
                $oppgavesettsamling = $oppgavesett->forStudenter();
                $besvarelser = $this->bruker->besvarelser; // TODO : JOIN/Merge oppgavesett og besvarelser, og vis i én liste(?)
                $retur = view('oppgavesett.opplistForStudent', compact('oppgavesettsamling', 'besvarelser'));
                break;
            default :
                $retur = redirect('/home');
        }

        return $retur;
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
     * @param Oppgavesett $oppgavesett
     * @param Request $request
     * @return Response
     */
    public function lagre(Oppgavesett $oppgavesett, Request $request)
    {
        // TODO: Flytt validering til egen valideringsklasse for gjenbruk i oppdater()
        $this->validate($request, [
            'tittel' => 'required|max:28', // TODO: Tittel bør være unik for en og samme bruker
            'type' => 'required',
            'tid_publisert' => 'required|date_format:d.m.y H:i|after:now',
            'tid_aapent' => 'required|date_format:d.m.y H:i|after:tid_publisert',
            'tid_lukket' => 'required|date_format:d.m.y H:i|after:tid_aapent'
        ]);

        Auth::user()->oppgavesett()->save($oppgavesett->fill($request->all()));

        $oppgavesettsamling = $this->bruker->oppgavesett;
        return view('oppgavesett.opplistForLaerer', compact('oppgavesettsamling'));
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
