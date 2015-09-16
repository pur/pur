<?php namespace Pur\Purmoduler\Regnskap;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Konto extends Model
{
    use SoftDeletes;


    protected $table = 'kontoer';

    protected $primaryKey = 'kontokode';

    protected $fillable = ['kontokode', 'kontonavn'];

    public $timestamps = false;

    const DELETED_AT = 'tid_slettet';

    protected $dates = ['tid_slettet'];


    /**
     * Returnerer nøkkel-verdi-par egnet til nedtrekksliste
     *
     * @return mixed
     */
    public static function alleSomKodeNavnTabell()
    {
        $alleKontoer = Konto::get();
        foreach ($alleKontoer as $konto)
            $kodeNavnTabell[$konto->kontokode] = $konto->kontokode . " – " . $konto->kontonavn;
        return $kodeNavnTabell;
    }
}
