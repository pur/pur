<?php namespace Pur\Purmoduler\Regnskap;

use Illuminate\Database\Eloquent\Model;

class BilagsmalsekvensVar extends Model {

    protected $table = 'bilagsmalsekvens_var';

    protected $fillable = ['navn', 'tegn_i_formel', 'verdi_min', 'verdi_maks', 'bilagsmalsekvens_id'];

    public $timestamps = false;

}
