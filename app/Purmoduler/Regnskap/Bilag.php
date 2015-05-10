<?php namespace Pur\Purmoduler\Regnskap;

use Illuminate\Database\Eloquent\Model;

class Bilag extends Model
{

    protected $table = 'bilag';

    protected $fillable = ['nr_i_besvarelse', 'bilagssekvens_id', 'bilagsmal_id'];

    public $timestamps = false;


    /**
     * Bilagssekvensen som bilaget inngår i
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bilagssekvens()
    {
        return $this->belongsTo('Pur\Purmoduler\Regnskap\Bilagssekvens');
    }

    /**
     * Bilagsmalen som bilaget er basert på
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bilagsmal()
    {
        return $this->belongsTo('Pur\Purmoduler\Regnskap\Bilagsmal');
    }

    /**
     * Bilagets beløp
     *
     * @return float
     */
    public function belop()
    {
        // Henter bilagssekvensens variabel-objekter inkl. malvariabel-objekter
        $variabler = $this->bilagssekvens->variabler()->with('malvariabel')->get();

        // Lager en tabell på formen "a" => "1000", "b" => "500", etc.
        $formelvariabler = $variabler->lists('verdi', 'malvariabel.tegn_i_formel');

        // Formelregneren typetvinger tabellverdiene til 'float'
        $formelregner = new Formelregner($formelvariabler);
        $belop = $formelregner->brukFormel($this->bilagsmal->belopsformel);

        return money_format('%.2n', $belop);
    }

    /**
     * Returnerer posteringer som eleven har utført på bilaget
     *
     * @return mixed
     */
    public function elevposteringer()
    {
        return $this->posteringer()->avElev();
    }

    /**
     * Returnerer posteringer som systemet har generert som fasit for bilaget
     *
     * @return mixed
     */
    public function fasitposteringer()
    {
        return $this->posteringer()->fasit();
    }

    /**
     * Alle bilagets posteringer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posteringer()
    {
        return $this->hasMany('Pur\Purmoduler\Regnskap\Postering');
    }

    /**
     * Er sant hvis eleven har startet å arbeide med bilaget,
     * dvs. har utført posteringer for bilaget
     *
     * @return bool
     */
    public function erPaabegynt()
    {
        return $this->elevposteringer()->count() > 0;
    }

}
