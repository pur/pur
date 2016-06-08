<?php

namespace Pur\Purmoduler\KoiAnalyse;

use Illuminate\Database\Eloquent\Model;

class Instans extends Model {
    /**
     * Databasetabellen som modellen forholder seg til.
     *
     * @var string
     */
    protected $table = 'koia_instanser';

    public $timestamps = false;

    public function oppgave()
    {
        return $this->belongsTo('Pur\Purmoduler\KoiAnalyse\Oppgave', 'oppgave_id');
    }

    public function bruker()
    {
        return $this->belongsTo('Pur\Bruker', 'bruker_id');
    }
}
