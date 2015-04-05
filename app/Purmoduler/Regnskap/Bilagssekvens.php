<?php namespace Pur\Purmoduler\Regnskap;

use Illuminate\Database\Eloquent\Model;

class Bilagssekvens extends Model {

    protected $table = 'bilagssekvenser';

    protected $fillable = ['bilagsmalsekvens_id', 'besvarelse_id'];

    public $timestamps = false;


    /**
     * Bilagsmalsekvensen som bilagssekvensen er basert på
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bilagsmalsekvens()
    {
        return  $this->belongsTo('\Pur\Purmoduler\Regnskap\Bilagsmalsekvens');
    }

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
     * Besvarelsen som bilagssekvensen inngår i
     *
     * @return mixed
     */
    public function besvarelse()
    {
        return $this->oppgavesvar->besvarelse();
    }
}
