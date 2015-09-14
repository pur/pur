<?php namespace Pur\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Pur\Http\Requests;
use Pur\Oppgave;
use Pur\Oppgavesett;
use Pur\Services\BesvarelseTjeneste;

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
        $alleOppgaver = Oppgave::get(); // TODO: Kun forseglede oppgaver

        return view('oppgavesett.opprett', compact('alleOppgaver'));
    }

    /**
     * Lagre oppgavesett.
     *
     * @param Oppgavesett $oppgavesett
     * @param Request $request
     * @return Response
     */
    public function lagre(Request $request)
    {
        // TODO: Flytt validering til egen valideringsklasse for gjenbruk i oppdater()
        $this->validate($request, [
            'tittel' => 'required|max:28', // TODO: Tittel bør være unik for en og samme bruker
            'type' => 'required',
            'tid_publisert' => 'required|date_format:d.m.y H:i|after:now',
            'tid_aapent' => 'required|date_format:d.m.y H:i|after:tid_publisert',
            'tid_lukket' => 'required|date_format:d.m.y H:i|after:tid_aapent'
        ]);

        $oppgavesett = Auth::user()->oppgavesett()->create($request->all());

        $oppgavesett->oppgaver()->sync($request->input('oppgaver', []));

        $oppgavesettsamling = $this->bruker->oppgavesett;

        flash('Oppgavesettet ble opprettet');

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
     * Test oppgavesett ved å generere en testbesvarelse
     *
     * @param Oppgavesett $oppgavesett
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function test(Oppgavesett $oppgavesett)
    {
        if($oppgavesett->skaper->id == Auth::user()->id) {

            // TODO: Bruk ev. eksisterende besvarelse hvis ingen endring i oppgavesett

            $oppgavesett->besvarelser()->whereBrukerId(Auth::user()->id)->delete();

            $besvarelseTjeneste = new BesvarelseTjeneste();
            $besvarelse = $besvarelseTjeneste->opprett($this->bruker, $oppgavesett);

            return redirect()->route('besvarelser.rediger', $besvarelse);
        }
        return redirect('/home');
    }


    /**
     * Åpne oppgavesett for redigering.
     *
     * @param  int $id
     * @return Response
     */
    public function rediger(Oppgavesett $oppgavesett)
    {
        $alleOppgaver = Oppgave::get(); // TODO: Kun forseglede oppgaver
        $settoppgaver = $oppgavesett->oppgaver()->get();

        return view('oppgavesett.rediger', compact('oppgavesett', 'alleOppgaver', 'settoppgaver'));
    }

    /**
     * Lagre endringer i oppgavesett.
     *
     * @param  int $id
     * @return Response
     */
    public function oppdater(Oppgavesett $oppgavesett, Request $request)
    {
        // TODO: Flytt validering til egen valideringsklasse for gjenbruk i lagre()
        $this->validate($request, [
            'tittel' => 'required|max:28', // TODO: Tittel bør være unik for en og samme bruker
            'type' => 'required',
            'tid_publisert' => 'required|date_format:d.m.y H:i|after:now',
            'tid_aapent' => 'required|date_format:d.m.y H:i|after:tid_publisert',
            'tid_lukket' => 'required|date_format:d.m.y H:i|after:tid_aapent'
        ]);

        $oppgavesett->update($request->all());

        $oppgavesett->oppgaver()->sync($request->input('oppgaver', []));

        $oppgavesettsamling = $this->bruker->oppgavesett;

        return view('oppgavesett.opplistForLaerer', compact('oppgavesettsamling'));
    }

    /**
     * Slett oppgavesett.
     *
     * @param  int $id
     * @return Response
     */
    public function slett(Oppgavesett $oppgavesett)
    {
        $oppgavesett->delete();

        flash('Oppgavesettet ble slettet');

        // TODO: Gjør purmoduluavhengig:
        return redirect('/regnskap/oppgavesett');
    }

}
