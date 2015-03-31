<?php namespace Pur;

use Illuminate\Database\Eloquent\Model;

class Oppgavesett extends Model {

    protected $table = 'oppgavesett';

    protected $fillable = [
        'beskrivelse',
        'tid_publisert',
        'tid_aapent',
        'tid_lukket',
        'bruker_id',
    ];

    const CREATED_AT = 'tid_opprettet';
    const UPDATED_AT = 'tid_endret';

    protected $dates = ['tid_publisert', 'tid_aapent', 'tid_lukket'];

    /**
     * Den brukeren som har laget oppgavesettet
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function skaper()
    {
        return $this->belongsTo('Pur\Bruker', 'bruker_id');
    }


    /**
     * Alle oppgavesettets oppgaver
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function oppgaver()
    {
       return $this->belongsToMany('Pur\Oppgave', 'settoppgaver');
    }


    /**
     * Besvarelser på oppgaver i oppgavesettet
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function besvarelser()
    {
        return $this->hasMany('Pur\Besvarelse');
    }
}
