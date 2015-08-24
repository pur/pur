<?php namespace Pur;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;

class Bruker extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'brukere';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['epost', 'password', 'rolle', 'navn'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

    const CREATED_AT = 'tid_opprettet';
    const UPDATED_AT = 'tid_endret';


    /**
     * Kompabilitetsmetode
     *
     * @return $this->navn()
     */
    public function fulltNavn() // TODO: Endre alle kall til navn() og fjern denne metoden
    {
        return $this->navn();
    }

    /**
     * Returnerer brukerens visningsnavn hvis satt, epost ellers
     *
     * @return string
     */
    public function navn()
    {
        return !empty($this->navn) ? $this->navn : $this->epost;
    }

    /**
     * Brukerens oppgavesett
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function oppgavesett()
    {
        return $this->hasMany('Pur\Oppgavesett');
    }

    /**
     * Brukerens besvarelser
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function besvarelser()
    {
        return $this->hasMany('Pur\Besvarelse');
    }

    /**
     * Sant hvis bruker er en lærer
     *
     * @return bool
     */
    public function erLaerer()
    {
        return $this->harRolle('laerer');
    }

    /**
     * Sant hvis bruker er en student
     *
     * @return bool
     */
    public function erStudent()
    {
        return $this->harRolle('student');
    }

    /**
     * Sant hvis bruker er en administrator
     *
     * @return bool
     */
    public function erAdmin()
    {
        return $this->harRolle('admin');
    }

    /**
     * Sant hvis bruker har rollen oppgitt med parameter
     *
     * @param $rolle
     * @return bool
     */
    public function harRolle($rolle)
    {
        return $this->rolle == $rolle;
    }
}
