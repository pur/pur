<?php

namespace Pur\Http\Controllers\Purmoduler\KoiAnalyse;

use Illuminate\Http\Request;

use Pur\Http\Requests;
use Pur\Http\Controllers\Controller;
use Pur\Purmoduler\KoiAnalyse\Oppgave;

class OppgaveController extends Controller {

    /**
     * List opp alle Kostnads- og inntektsanalyseoppgaver
     *
     * @return \Illuminate\Http\Response
     */
    public function opplist()
    {
        return Oppgave::all();
    }
}
