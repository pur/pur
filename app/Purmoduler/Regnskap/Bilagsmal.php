<?php namespace Pur\Purmoduler\Regnskap;

use Illuminate\Database\Eloquent\Model;

class Bilagsmal extends Model
{

    protected $table = 'bilagsmaler';

    protected $fillable = ['bilagstype', 'oppgave_id'];

    public $timestamps = false;


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bilagssekvens()
    {
        return $this->belongsTo('Pur\Purmoduler\Regnskap\Bilagssekvens');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posteringsmaler()
    {
        return $this->hasMany('Pur\Purmoduler\Regnskap\Posteringsmal');
    }
}

