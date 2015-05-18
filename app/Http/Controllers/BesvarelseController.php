<?php namespace Pur\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Pur\Besvarelse;
use Pur\Http\Requests;
use Pur\Oppgavesett;
use Pur\Purmoduler\Regnskap\Konto;
use Pur\Services\BesvarelseTjeneste;

class BesvarelseController extends Controller
{

    private $bruker;

    public function __construct()
    {
        $this->middleware('auth');
        $this->bruker = Auth::user();
    }

    /**
     * List opp besvarelser
     *
     * @return Response
     */
    public function opplist()
    {
        //
    }

    /**
     * Vis skjermbilde for opprettelse av ny besvarelse.
     *
     * @return Response
     */
    public function opprett(Oppgavesett $oppgavesett)
    {
        $oppgavesettsamling = $oppgavesett->forStudenter();
        return view('besvarelser.testopprett', compact('oppgavesettsamling'));
    }

    /**
     * Opprett og lagre besvarelse.
     *
     * @return Response
     */
    public function lagre(Oppgavesett $oppgavesett)
    {
        if($oppgavesett->erAapent()) {
            $besvarelseTjeneste = new BesvarelseTjeneste();
            $besvarelse = $besvarelseTjeneste->opprett($this->bruker, $oppgavesett);
            //return redirect()->route('besvarelser.rediger', $besvarelse);
        }

        flash('Ny besvarelse ble opprettet');

        return redirect()->route('oppgavesett.opplist');
    }

    /**
     * Vis besvarelse.
     *
     * @param Besvarelse $besvarelse
     * @return Response
     */
    public function vis(Besvarelse $besvarelse)
    {
        if ($besvarelse->skaper != $this->bruker)
            return redirect()->route('oppgavesett.opplist');

        return view('besvarelser.vis', compact('besvarelse'));
    }

    /**
     * Åpne besvarelse for redigering.
     *
     * @param  Besvarelse $besvarelse
     * @return Response
     */
    public function rediger(Besvarelse $besvarelse)
    {
        // TODO : Gjør Purmodul-uavhengig:
        $bilagssamling = BesvarelseTjeneste::besvarelseBilag($besvarelse);
        $selectKontoer = Konto::alleSomKodeNavnTabell();

        return view('besvarelser.rediger', compact('besvarelse', 'bilagssamling', 'selectKontoer'));
    }

    /**
     * Lagre endringer i besvarelse.
     *
     * @param  int $id
     * @return Response
     */
    public function oppdater(Besvarelse $besvarelse)
    {
        // TODO: implementér
        return "<i>Oppdater besvarelse med id " . $besvarelse->id . "</i>";

    }

    /**
     * Slett besvarelse
     *
     * @param  int $id
     * @return Response
     */
    public function slett(Besvarelse $besvarelse)
    {
        $besvarelse->delete();

        flash('Besvarelsen ble slettet');

        // TODO: Gjør purmoduluavhengig:
        return redirect('/regnskap/oppgavesett');
    }
}
