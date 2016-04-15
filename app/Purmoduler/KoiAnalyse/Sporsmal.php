<?php

namespace Pur\Purmoduler\KoiAnalyse;

use Illuminate\Database\Eloquent\Model;

class Sporsmal extends Model
{
    /**
     * Databasetabellen som modellen forholder seg til.
     *
     * @var string
     */
    protected $table = 'koia_sporsmal';

    public $timestamps = false;

    public function oppgave()
    {
        return $this->belongsToMany('Pur\Purmoduler\KoiAnalyse\Oppgave', 'koia_oppgavesporsmal');
    }
}
