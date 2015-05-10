<?php namespace Pur\Purmoduler\Regnskap;

use Illuminate\Database\Eloquent\Model;

class BilagssekvensVar extends Model {

    protected $table = 'bilagssekvens_var';

    protected $fillable = ['verdi', 'bilagsmalsekvens_var_id', 'bilagssekvens_id'];

    public $timestamps = false;


    /**
     * Variabelens malvariabel, dvs.
     * bilagssekvens-variabelen sin bilagsmalsekvens-variabel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function malvariabel()
    {
        return $this->belongsTo('Pur\Purmoduler\Regnskap\BilagsmalsekvensVar', 'bilagsmalsekvens_var_id');
    }
}
