<?php namespace Pur\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Pur\Besvarelse;
use Pur\Http\Requests;
use Pur\Oppgavesett;
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
        $besvarelser = $this->bruker->besvarelser;

        return view('besvarelser.testing.opplist', compact('besvarelser'));
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
        $besvarelseTjeneste = new BesvarelseTjeneste();
        $besvarelse = $besvarelseTjeneste->opprett($this->bruker, $oppgavesett);

        return redirect()->route('besvarelser.vis', $besvarelse);
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
            return redirect()->route('besvarelser.opplist');

        return view('besvarelser.testing.vis', compact('besvarelse'));
    }

    /**
     * Åpne besvarelse for redigering.
     *
     * @param  Besvarelse $besvarelse
     * @return Response
     */
    public function rediger(Besvarelse $besvarelse)
    {
        return view('besvarelser.rediger', compact('besvarelse'));
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
        // TODO: implementér
        return "<i>Slett besvarelse med id " . $besvarelse->id . "</i>";
    }
}
