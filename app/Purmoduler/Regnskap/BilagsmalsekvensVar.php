<?php namespace Pur\Purmoduler\Regnskap;

use Illuminate\Database\Eloquent\Model;

class BilagsmalsekvensVar extends Model
{

    protected $table = 'bilagsmalsekvens_var';

    protected $fillable = ['navn', 'tegn_i_formel', 'verdi_min', 'verdi_maks', 'bilagsmalsekvens_id'];

    public $timestamps = false;


    /**
     * Fabrikerer en ny bilagssekvensvariabel og gir den en tilfeldig generert verdi mellom
     * bilagsmalsekvensvariabelens minimums– og maksimumsverdi.
     *
     * @return BilagssekvensVar
     */
    public function instansier()
    {
        $variabel = new BilagssekvensVar();
        $variabel->malvariabel()->associate($this);
        $variabel->verdi = rand($this->verdi_min, $this->verdi_maks);
        return $variabel;
    }
}
