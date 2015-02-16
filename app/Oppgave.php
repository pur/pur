<?php namespace Pur;

use Illuminate\Database\Eloquent\Model;

class Oppgave extends Model {

    protected $table = 'oppgaver';

    protected $fillable = ['beskrivelse', 'brukere_id'];
}
