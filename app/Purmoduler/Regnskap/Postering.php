<?php namespace Pur\Purmoduler\Regnskap;

use Illuminate\Database\Eloquent\Model;

class Postering extends Model {

    protected $table = 'posteringer';

    protected $fillable = ['belop', 'tid_opprettet', 'tid_endret', 'ant_lagringer', 'er_fasit', 'bilag_id', 'kontokode'];

    const CREATED_AT = 'tid_opprettet';
    const UPDATED_AT = 'tid_endret';

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
