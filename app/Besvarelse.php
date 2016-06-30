<?php namespace Pur;

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
     * @param string $format
     * @return string
     */
    public function tidOpprettet($format = 'd.m.y H:i')
    {
        return $this->tid_opprettet->format($format);
    }

    /**
     * Formattert tidspunkt for besvarelsens leveringsfrist
     *
     * @param string $format
     * @return string
     */
    public function frist($format = 'd.m.y H:i')
    {
        return $this->oppgavesett->tid_lukket->format($format);
    }

    /**
     * Formattert tidspunkt for da besvarelsen sist ble endret
     *
     * @param string $format
     * @return string
     */
    public function tidEndret($format = 'd.m.y H:i')
    {
        return $this->tid_endret->format($format);
    }

    /**
     * Formattert tidspunkt for da besvarelsen ble levert
     *
     * @param string $format
     * @return string
     */
    public function tidLevert($format = 'd.m.y H:i')
    {
        return $this->erLevert() ? $this->tid_levert->format($format) : null;
    }

    /**
     * Er sant hvis besvarelsen er levert
     *
     * @return bool
     */
    public function erLevert()
    {
        return !starts_with($this->tid_levert, '-') && $this->tid_levert->isPast();
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
     * @return int
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

    /**
     * Prosentandelen av oppgavesettet som er korrekt besvart av studenten
     *
     * @return float
     */
    public function prosentKorrekt()
    {
        $antallKrevdeOppgaveSvar = $this->antKrevdeSvar();

        $prosentKorrekt = 0;
        foreach ($this->oppgavesvar as $oppgavesvar)
            $prosentKorrekt += $oppgavesvar->prosentKorrekt() / $antallKrevdeOppgaveSvar;

        return ($antallKrevdeOppgaveSvar == 0) ? 0 : round($prosentKorrekt, 0);
    }
}
