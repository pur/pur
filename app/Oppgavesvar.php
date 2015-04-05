<?php namespace Pur;

use Illuminate\Database\Eloquent\Model;

class Oppgavesvar extends Model
{

    protected $table = 'oppgavesvar';

    protected $fillable = [
        'kommentar',
        'moduloppgavesvar_type',
        'moduloppgavesvar_id',
        'besvarelse_id'
    ];

    const CREATED_AT = 'tid_opprettet';
    const UPDATED_AT = 'tid_endret';


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

}
