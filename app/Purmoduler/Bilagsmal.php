<?php namespace Pur\Purmoduler;

use Illuminate\Database\Eloquent\Model;

class Bilagsmal extends Model {

    protected $table = 'bilagsmaler';

    protected $fillable = ['bilagstype', 'oppgave_id'];

    public $timestamps = false;

}

