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
     * Formattert tidspunkt for da besvarelsen ble opprettet
     *
     * @return mixed
     */
    public function tidOpprettet()
    {
        return $this->tid_opprettet->format('d.m.y H:i');
    }

    /**
     * Formattert tidspunkt for da besvarelsen sist ble endret
     *
     * @return mixed
     */
    public function tidEndret()
    {
        return $this->tid_endret->format('d.m.y H:i');
    }

    /**
     * Formattert tidspunkt for da besvarelsen ble levert
     *
     * @return mixed
     */
    public function tidLevert()
    {
        return $this->tid_levert->format('d.m.y H:i');
    }

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
