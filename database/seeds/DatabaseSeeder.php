<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Pur\Oppgave;
use Pur\User;

class DatabaseSeeder extends Seeder
{

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('UserTableSeeder');
		$this->call('OppgaveTableSeeder');
	}
}

class UserTableSeeder extends Seeder {

	public function run()
	{
		DB::table('users')->delete();

		User::create([
			'name' => 'Lektor Lur',
			'email' => 'lektor@lur.no',
			'password' => bcrypt('passord'),
		]);

		User::create([
			'name' => 'Professor Proff',
			'email' => 'professor@proff.no',
			'password' => bcrypt('passord'),
		]);
	}
}

class OppgaveTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('oppgaver')->delete();

		Oppgave::create([
			'beskrivelse' => 'Første oppgave...',
			'brukere_id' => '1',
		]);

		Oppgave::create([
			'beskrivelse' => 'Andre oppgave...',
			'brukere_id' => '1',
		]);

		Oppgave::create([
			'beskrivelse' => 'Tredje oppgave...',
			'brukere_id' => '2',
		]);
	}
}

