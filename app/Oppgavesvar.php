<?php namespace Pur;

use Illuminate\Database\Eloquent\Model;

class Oppgavesvar extends Model
{

    protected $table = 'oppgavesvar';

    protected $fillable = [
        'kommentar',
        'moduloppgavesvar_type',
        'moduloppgavesvar_id',
        'oppgave_id',
        'besvarelse_id'
    ];

    const CREATED_AT = 'tid_opprettet';
    const UPDATED_AT = 'tid_endret';


    /**
     * Oppgaven som svaret hører til
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function oppgave()
    {
        return $this->belongsTo('Pur\Oppgave');
    }

    /**
     * Besvarelsen som oppgavesvaret inngår i
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function besvarelse()
    {
        return $this->belongsTo('Pur\Besvarelse');
    }

    /**
     * Purmodul-spesifikt oppgavesvar som henger sammen med dette oppgavesvaret
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function moduloppgavesvar()
    {
        return $this->morphTo();
    }

    /**
     * Prosentandelen av oppgaven som er påbegynt av studenten
     *
     * @return mixed
     */
    public function prosentPaabegynt()
    {
        return $this->moduloppgavesvar->prosentPaabegynt();
    }

    /**
     * Prosentandelen av oppgaven som er korrekt besvart av studenten
     *
     * @return mixed
     */
    public function prosentKorrekt()
    {
        return $this->moduloppgavesvar->prosentKorrekt();
    }

}
