<?php

namespace Pur\Purmoduler\KoiAnalyse;

use Illuminate\Database\Eloquent\Model;

class Instans extends Model
{
    /**
     * Databasetabellen som modellen forholder seg til.
     *
     * @var string
     */
    protected $table = 'koia_instanser';

    public $timestamps = false;
}
