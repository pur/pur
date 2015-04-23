<?php namespace Pur\Purmoduler\Regnskap;

use Illuminate\Database\Eloquent\Model;

class Bilagssekvens extends Model
{

    protected $table = 'bilagssekvenser';

    public $timestamps = false;


    /**
     * Bilagssekvensen sine bilag
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bilag()
    {
        return $this->hasMany('\Pur\Purmoduler\Regnskap\Bilag');
    }

    /**
     * Oppgavesvaret som bilagssekvensen henger sammen med
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function oppgavesvar()
    {
        return $this->morphOne('Pur\Oppgavesvar', 'moduloppgavesvar');
    }

    /**
     * Elevens kommentar på oppgavesvaret/bilagssekvensen
     *
     * @return mixed
     */
    public function kommentar()
    {
        return $this->oppgavesvar->kommentar;
    }

    /**
     * Prosentandelen av bilagssekvensen som er påbegynt av studenten
     *
     * @return float|int
     */
    public function prosentPaabegynt()
    {
        $antPaabegynteBilag = 0;

        foreach ($this->bilag as $bilag)
            if ($bilag->erPaabegynt())
                $antPaabegynteBilag++;

        $antBilag = $this->oppgavesvar->oppgave->moduloppgave->bilagsmaler->count();

        return ($antBilag == 0) ? 0 : round($antPaabegynteBilag / $antBilag * 100, 0);
    }
}
