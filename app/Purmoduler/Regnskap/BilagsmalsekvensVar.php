<?php namespace Pur\Purmoduler\Regnskap;

use Illuminate\Database\Eloquent\Model;

class BilagsmalsekvensVar extends Model
{

    protected $table = 'bilagsmalsekvens_var';

    protected $fillable = ['navn', 'tegn_i_formel', 'verdi_min', 'verdi_maks', 'bilagsmalsekvens_id'];

    public $timestamps = false;


    /**
     * Fabrikerer en ny bilagssekvensvariabel, gir den en tilfeldig generert verdi mellom
     * bilagsmalsekvensvariabelens min.– og maks.–verdi og knytter den til oppgitt bilagssekvens.
     * Oppgitt bilagssekvens må være tilknyttet samme bilagsmalsekvens som denne bilagsmalsekvensvariabelen.
     *
     * @param $bilagssekvens
     */
    public function instansierFor($bilagssekvens)
    {
        if ($this->bilagsmalsekvens_id == $bilagssekvens->oppgavesvar->oppgave->moduloppgave->id) {
            $variabel = new BilagssekvensVar();
            $variabel->verdi = rand($this->verdi_min, $this->verdi_maks);
            $bilagssekvens->variabler()->save($variabel);
        }
    }
}
