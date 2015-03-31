<?php namespace Pur;

use Illuminate\Database\Eloquent\Model;

class Besvarelse extends Model {

    protected $table = 'besvarelser';

    protected $fillable = [
        'tid_levert',
        'kommentar',
        'bruker_id',
        'oppgavesett_id'
    ];

    const CREATED_AT = 'tid_opprettet';
    const UPDATED_AT = 'tid_endret';

    protected $dates = ['tid_levert'];

    /**
     * Den brukeren som har laget besvarelsen
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function skaper()
    {
        return $this->belongsTo('Pur\Bruker', 'bruker_id');
    }

    /**
     * Oppgavesettet som besvarelsen er på
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function oppgavesett()
    {
        return $this->belongsTo('Pur\Oppgavesett');
    }

    /**
     * Alle besvarelsens bilag
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bilag() // TODO: Gjør morfologisk
    {
        return $this->hasMany('\Pur\Purmoduler\Regnskap\Bilag');
    }
}
