<?php namespace Pur;

use Illuminate\Database\Eloquent\Model;

class Oppgave extends Model
{

    protected $table = 'oppgaver';

    protected $fillable = ['beskrivelse', 'bruker_id'];

    const CREATED_AT = 'tid_opprettet';
    const UPDATED_AT = 'tid_endret';

    /**
     * Formattert tidspunkt for da oppgaven ble opprettet
     *
     * @return mixed
     */
    public function tidOpprettet()
    {
        return $this->tid_opprettet->format('d.m.y H:i');
    }

    /**
     * Formattert tidspunkt for da oppgaven sist ble endret
     *
     * @return mixed
     */
    public function tidEndret()
    {
        return $this->tid_endret->format('d.m.y H:i');
    }

    /**
     * Den brukeren som har laget oppgaven
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function skaper()
    {
        return $this->belongsTo('Pur\Bruker', 'bruker_id');
    }


    /**
     * Alle oppgavesett som oppgaven inngår i
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function oppgavesett()
    {
        return $this->belongsToMany('Pur\Oppgavesett', 'settoppgaver');
    }

    /**
     * Purmodul-spesifikk oppgave som arver fra denne klassen
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function moduloppgave()
    {
        return $this->morphTo();
    }
}
