<?php namespace Pur\Purmoduler\Regnskap;

use Illuminate\Database\Eloquent\Model;

class Bilagssekvens extends Model
{

    protected $table = 'bilagssekvenser';

    //protected $fillable = ['bilagsmalsekvens_id', 'besvarelse_id'];

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
     * Er sant hvis eleven har startet å arbeide med bilagssekvensen
     *
     * @return bool
     */
    public function erPaabegynt()
    {
        foreach ($this->bilag()->get() as $bilag)
            if ($bilag->erPaabegynt())
                return true;

        return false;
    }
}
