<?php namespace Pur\Purmoduler\Regnskap;

use Illuminate\Database\Eloquent\Model;

class Bilagsmal extends Model
{

    protected $table = 'bilagsmaler';

    protected $fillable = ['nr_i_sekvens', 'belopsformel', 'bilagstype', 'infotekst', 'bilagsmalsekvens_id'];

    public $timestamps = false;


    /**
     * Tittel = Nummer i sekvens + bilagstype
     *
     * @return string
     */
    public function tittel()
    {
        return "Bilag nr. " . $this->nr_i_sekvens . " – " . $this->bilagstype;
    }

    /**
     * Bilagsmalsekvensen som bilagsmalen inngår i
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bilagsmalsekvens()
    {
        return $this->belongsTo('Pur\Purmoduler\Regnskap\Bilagsmalsekvens');
    }

    /**
     * Alle bilagsmalens posteringsmaler
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posteringsmaler()
    {
        return $this->hasMany('Pur\Purmoduler\Regnskap\Posteringsmal');
    }
}

