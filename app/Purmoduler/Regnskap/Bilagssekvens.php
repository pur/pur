<?php namespace Pur\Purmoduler\Regnskap;

use Illuminate\Database\Eloquent\Model;

class Bilagssekvens extends Model {

    protected $table = 'bilagssekvenser';

    protected $fillable = ['bilagsmalsekvens_id', 'besvarelse_id'];

    public $timestamps = false;


    /**
     * Bilagsmalsekvensen som bilagssekvensen er basert på
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bilagsmalsekvens()
    {
        return  $this->belongsTo('\Pur\Purmoduler\Regnskap\Bilagsmalsekvens');
    }

    /**
     * Bilagssekvensen sine bilag
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bilag()
    {
        return $this->hasMany('\Pur\Purmoduler\Regnskap\Bilag');
    }

}
