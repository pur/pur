<?php namespace Pur\Purmoduler\Regnskap;

use Pur\Oppgave;

class Bilagssekvens extends Oppgave
{
    protected $table = 'bilagssekvenser';

    protected $fillable = ['sekvenstype'];

    public $timestamps = false;


    /**
     * Bilagssekvensen sine bilagsmaler
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bilagsmaler()
    {
        return $this->hasMany('\Pur\Purmoduler\Regnskap\Bilagsmal');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function oppgave()
    {
        return $this->morphOne('Pur\Oppgave', 'moduloppgave');
    }
}
