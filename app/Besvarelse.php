<?php namespace Pur;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Besvarelse extends Model
{

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

    public function erLevert()
    {
        return $this->tidLevert() != null && Carbon::now() > $this->tidLevert();
    }

    /**
     * Formattert tidspunkt for da besvarelsen ble levert
     *
     * @return mixed
     */
    public function tidLevert()
    {
        return (starts_with($this->tid_levert, '-')) ? null :
            $this->tid_levert->format('d.m.y H:i');
    }

    /**
     * Er sant hvis besvarelsen kan endres
     *
     * @return bool
     */
    public function kanEndres()
    {
        return (!$this->erLevert()) && $this->oppgavesett->erAapent();
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
     * Alle besvarelsens oppgavesvar
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function oppgavesvar()
    {
        return $this->hasMany('Pur\Oppgavesvar');
    }

    /**
     * Antallet oppgavesvar besvarelsen skal inneholde ved levering
     *
     * @return mixed
     */
    public function antKrevdeSvar()
    {
        return $this->oppgavesett->oppgaver()->count();
    }

    /**
     * Prosentandelen av oppgavesettet som er påbegynt av studenten
     *
     * @return float
     */
    public function prosentPaabegynt()
    {
        $antKrevdeSvar = $this->antKrevdeSvar();

        $prosentPaabegynt = 0;
        foreach ($this->oppgavesvar as $oppgavesvar)
            $prosentPaabegynt += $oppgavesvar->prosentPaabegynt() / $antKrevdeSvar;

        return ($antKrevdeSvar == 0) ? 0 : round($prosentPaabegynt, 0);
    }
}
