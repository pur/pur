<?php namespace Pur;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Oppgavesett extends Model
{

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
     * Oppgavesettets status, slik studenten skal se den
     * (Ikke åpnet / Åpent / Lukket)
     *
     * @return string
     */
    public function status()
    {
        return $this->erAapent() ? 'Åpent' : ($this->erLukket() ? 'Lukket' : 'Ikke åpnet');
    }

    /**
     * Sant hvis oppgavesettet er lukket
     *
     * @return bool
     */
    public function erLukket()
    {
        return $this->tid_lukket->isPast();
    }

    /**
     * Sant hvis oppgavesettet er publisert
     *
     * @return bool
     */
    public function erPublisert()
    {
        return $this->tid_publisert->isPast();
    }

    /**
     * Oppgavesett som er tilgjengelige for studenter
     *
     * @return mixed
     */
    public function forStudenter()
    {
        return $this->publiserte()->get();
    }

    /**
     * Kun publiserte oppgavesett
     *
     * @param $query
     */
    public function scopePubliserte($query)
    {
        $query->where('tid_publisert', '<', Carbon::now());
    }

    /**
     * Formattert tidspunkt for da oppgavesettet ble opprettet
     *
     * @return mixed
     */
    public function tidOpprettet()
    {
        return $this->tid_opprettet->format('d.m.y H:i');
    }

    /**
     * Formattert tidspunkt for da oppgavesettet sist ble endret
     *
     * @return mixed
     */
    public function tidEndret()
    {
        return $this->tid_endret->format('d.m.y H:i');
    }

    /**
     * Formattert tidspunkt for da/når oppgavesettet ble/blir publisert
     *
     * @return mixed
     */
    public function tidPublisert()
    {
        return $this->tid_publisert->format('d.m.y H:i');
    }

    /**
     * Formattert tidspunkt for da/når oppgavesettet ble/blir åpnet
     *
     * @return mixed
     */
    public function tidAapent()
    {
        return $this->tid_aapent->format('d.m.y H:i');
    }

    /**
     * Formattert tidspunkt for da/når oppgavesettet ble/blir lukket
     *
     * @return mixed
     */
    public function tidLukket()
    {
        return $this->tid_lukket->format('d.m.y H:i');
    }

    /**
     * Er sant hvis oppgavesettet er åpent
     *
     * @return bool
     */
    public function erAapent()
    {
        return $this->tid_aapent->isPast() && $this->tid_lukket->isFuture();
    }

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

