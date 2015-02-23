<?php namespace Pur\Purmoduler\Regnskap;

use Illuminate\Database\Eloquent\Model;

class Bilagsmal extends Model {

    protected $table = 'bilagsmaler';

    protected $fillable = ['bilagstype', 'oppgave_id'];

    public $timestamps = false;

    public function bilagssekvens()
    {
        return $this->belongsTo('Pur\Purmoduler\Regnskap\Bilagssekvens');
    }
}

