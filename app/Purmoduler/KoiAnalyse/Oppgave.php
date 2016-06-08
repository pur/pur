<?php

namespace Pur\Purmoduler\KoiAnalyse;

use Illuminate\Database\Eloquent\Model;

class Oppgave extends Model
{
    /**
     * Databasetabellen som modellen forholder seg til.
     *
     * @var string
     */
    protected $table = 'koia_oppgaver';

    public $timestamps = false;

    public function skaper()
    {
        return $this->belongsTo('Pur\Bruker', 'bruker_id');
    }

    public function sporsmal()
    {
        return $this->belongsToMany('Pur\Purmoduler\KoiAnalyse\Sporsmal', 'koia_oppgavesporsmal');
    }
}
