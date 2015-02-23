<?php namespace Pur;

use Illuminate\Database\Eloquent\Model;

class Oppgave extends Model
{

    protected $table = 'oppgaver';

    protected $fillable = ['beskrivelse', 'bruker_id'];

    const CREATED_AT = 'tid_opprettet';
    const UPDATED_AT = 'tid_endret';

    /**
     * Den brukeren som har laget oppgaven
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function skaper()
    {
        return $this->belongsTo('Pur\Bruker', 'bruker_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function moduloppgave()
    {
        return $this->morphTo();
    }
}
