<?php namespace Pur\Purmoduler\Regnskap;

use Illuminate\Database\Eloquent\Model;

class BilagssekvensVar extends Model {

    protected $table = 'bilagssekvens_var';

    protected $fillable = ['verdi', 'bilagssekvens_id'];

    public $timestamps = false;

}
