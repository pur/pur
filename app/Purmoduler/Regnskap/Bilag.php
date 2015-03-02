<?php namespace Pur\Purmoduler\Regnskap;

use Illuminate\Database\Eloquent\Model;

class Bilag extends Model {

    protected $table = 'bilag';

    protected $fillable = ['sekvensposisjon', 'bilagsmal_id', 'besvarelse_id'];

    public $timestamps = false;


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
     * Malen som bilaget er basert på
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bilagsmal()
    {
        return $this->belongsTo('Pur\Purmoduler\Regnskap\Bilagsmal');
    }


    /**
     * Besvarelsen som bilaget inngår i
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function besvarelse()
    {
        return $this->belongsTo('Pur\Besvarelse');
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

}
