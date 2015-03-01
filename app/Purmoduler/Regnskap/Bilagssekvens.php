<?php namespace Pur\Purmoduler\Regnskap;

use Pur\Oppgave;

class Bilagssekvens extends Oppgave
{
    protected $table = 'bilagssekvenser';

    protected $fillable = ['sekvenstype'];

    public $timestamps = false;

    /**
     * Den som har laget bilagssekvensen
     *
     * @Override
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function skaper()
    {
        return $this->oppgave->skaper();
    }

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
