<?php namespace Pur\Purmoduler\Regnskap;

use Pur\Oppgave;

class Bilagssekvens extends Oppgave
{
    protected $table = 'bilagssekvenser';

    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function oppgave()
    {
        return $this->morphOne('Pur\Oppgave', 'moduloppgave');
    }
}
