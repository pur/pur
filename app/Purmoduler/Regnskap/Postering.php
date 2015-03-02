<?php namespace Pur\Purmoduler\Regnskap;

use Illuminate\Database\Eloquent\Model;

class Postering extends Model {

    protected $table = 'posteringer';

    protected $fillable = ['belop', 'tid_lagret', 'ant_lagringer', 'er_fasit', 'bilag_id', 'kontokode'];

    public $timestamps = false;


    /**
     * Begrenser spørreresultatet til rader der kolonnen 'er_fasit' = 'false'
     *
     * @param $query
     */
    public function scopeAvElev($query)
    {
        $query->whereErFasit(false);
    }

    /**
     * Begrenser spørreresultatet til rader der kolonnen 'er_fasit' = 'true'
     *
     * @param $query
     */
    public function scopeFasit($query)
    {
        $query->whereErFasit(true);
    }
}
