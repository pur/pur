<?php namespace Pur\Purmoduler\Regnskap;

use Illuminate\Database\Eloquent\Model;

class Bilag extends Model
{

    protected $table = 'bilag';

    protected $fillable = ['nr_i_oppgsett', 'bilagsmal_id', 'besvarelse_id'];

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
