<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Pur\Bilagsmal;
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
		$this->call('BilagsmalTableSeeder');
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

		User::create([
			'name' => 'Sture Student',
			'email' => 'sture@student.no',
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
			'bruker_id' => '1',
		]);

		Oppgave::create([
			'beskrivelse' => 'Andre oppgave...',
			'bruker_id' => '1',
		]);

		Oppgave::create([
			'beskrivelse' => 'Tredje oppgave...',
			'bruker_id' => '2',
		]);
	}
}

class BilagsmalTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('bilagsmaler')->delete();

		Bilagsmal::create([
			'bilagstype' => '01 - Inngående faktura',
			'oppgave_id' => '1',
		]);

		Bilagsmal::create([
			'bilagstype' => '02 - Inngående kreditnota',
			'oppgave_id' => '1',
		]);

		Bilagsmal::create([
			'bilagstype' => '06 - Utbetaling',
			'oppgave_id' => '1',
		]);
	}
}

