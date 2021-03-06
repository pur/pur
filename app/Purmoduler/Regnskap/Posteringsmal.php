<?php namespace Pur\Purmoduler\Regnskap;

use Illuminate\Database\Eloquent\Model;

class Posteringsmal extends Model
{

    protected $table = 'posteringsmaler';

    protected $fillable = ['formel', 'bilagsmal_id', 'kontokode'];

    public $timestamps = false;


    /**
     * Bilagsmalen som posteringsmalen tilhører
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bilagsmal()
    {
        return $this->belongsTo('Pur\Purmoduler\Regnskap\Bilagsmal');
    }


    /**
     * Kontoen som brukes i posteringsmalen
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function konto()
    {
        return $this->belongsTo('Pur\Purmoduler\Regnskap\Konto', 'kontokode', 'kontokode');
    }

}
