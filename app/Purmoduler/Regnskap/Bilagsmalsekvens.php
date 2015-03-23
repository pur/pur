<?php namespace Pur\Purmoduler\Regnskap;

use Pur\Oppgave;

class Bilagsmalsekvens extends Oppgave
{
    protected $table = 'bilagsmalsekvenser';

    protected $fillable = ['sekvenstype', 'motpart'];

    public $timestamps = false;



    /**
     * Returnerer nøkkel-verdi-par egnet til nedtrekksliste
     *
     * @return mixed
     */
    public function selectBilagsmaler()
    {
        foreach ($this->bilagsmaler as $bilagsmal)
            $kodeNavnTabell[$bilagsmal->nr_i_sekvens] = $bilagsmal->tittel();
        return $kodeNavnTabell;
    }


    /**
     * Den som har laget bilagsmalsekvensen
     *
     * @Override
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function skaper()
    {
        return $this->oppgave->skaper();
    }

    /**
     * Tidspunkt for når bilagsmalsekvensen ble opprettet
     *
     * @return mixed
     */
    public function tidOpprettet()
    {
        return $this->oppgave->tid_opprettet;
    }

    /**
     * Tidspunkt for når bilagsmalsekvensen ble endret
     *
     * @return mixed
     */
    public function tidEndret()
    {
        return $this->oppgave->tid_endret;
    }

    /**
     * Oppgaven som bilagsmalsekvensen henger sammen med
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function oppgave()
    {
        return $this->morphOne('Pur\Oppgave', 'moduloppgave');
    }

    /**
     * Bilagsmalsekvensen sine bilagsmaler
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bilagsmaler()
    {
        return $this->hasMany('\Pur\Purmoduler\Regnskap\Bilagsmal');
    }

}
