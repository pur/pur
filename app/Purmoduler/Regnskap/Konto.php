<?php namespace Pur\Purmoduler\Regnskap;

use Illuminate\Database\Eloquent\Model;

class Konto extends Model
{
    protected $table = 'kontoer';

    protected $fillable = ['kontokode', 'kontonavn'];

    public $timestamps = false;


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
