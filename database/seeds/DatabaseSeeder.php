<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Pur\Bruker;
use Pur\Oppgave;
use Pur\Purmoduler\Bilagsmal;


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

		$this->call('BrukerTableSeeder');
		$this->call('OppgaveTableSeeder');
		$this->call('BilagsmalTableSeeder');
	}
}

class BrukerTableSeeder extends Seeder {

	public function run()
	{
		DB::table('brukere')->delete();

		Bruker::create([
			'fornavn' => 'Lektor',
			'etternavn' => 'Lur',
			'epost' => 'lektor@lur.no',
			'passord' => bcrypt('passord'),
			'rolle' => 'faglærer'
		]);

		Bruker::create([

			'fornavn' => 'Professor',
			'etternavn' => 'Proff',
			'epost' => 'professor@proff.no',
			'passord' => bcrypt('passord'),
			'rolle' => 'faglærer'
		]);

		Bruker::create([
			'fornavn' => 'Sture',
			'etternavn' => 'Student',
			'epost' => 'sture@student.no',
			'passord' => bcrypt('passord'),
			'rolle' => 'student',
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

