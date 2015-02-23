<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Pur\Bruker;
use Pur\Oppgave;
use Pur\Purmoduler\Regnskap\Bilagsmal;
use Pur\Purmoduler\Regnskap\Bilagssekvens;


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

        // Pur
        $this->call('BrukerTableSeeder');
        $this->call('OppgaveTableSeeder');

        //Pur\Regnskap
        $this->call('BilagssekvensTableSeeder');
        $this->call('BilagsmalTableSeeder');
    }
}

class BrukerTableSeeder extends Seeder
{

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
            'beskrivelse' => 'Genial oppgave...',
            'bruker_id' => '1',
            'moduloppgave_id' => '1',
            'moduloppgave_type' => 'Pur\Purmoduler\Regnskap\Bilagssekvens'
        ]);

        Oppgave::create([
            'beskrivelse' => 'Brilliant oppgave...',
            'bruker_id' => '1',
            'moduloppgave_id' => '2',
            'moduloppgave_type' => 'Pur\Purmoduler\Regnskap\Bilagssekvens'
        ]);

        Oppgave::create([
            'beskrivelse' => 'Superb oppgave...',
            'bruker_id' => '2',
            'moduloppgave_id' => '3',
            'moduloppgave_type' => 'Pur\Purmoduler\Regnskap\Bilagssekvens'
        ]);
    }
}

class BilagssekvensTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('bilagssekvenser')->delete();

        Bilagssekvens::create([
            'sekvenstype' => 'Fakturasekvens (inngående)',
        ]);

        Bilagssekvens::create([
            'sekvenstype' => 'Fakturasekvens (utgående)',
        ]);

        Bilagssekvens::create([
            'sekvenstype' => 'Lønnssekvens',
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
            'bilagssekvens_id' => '1',
        ]);

        Bilagsmal::create([
            'bilagstype' => '02 - Inngående kreditnota',
            'bilagssekvens_id' => '1',
        ]);

        Bilagsmal::create([
            'bilagstype' => '06 - Utbetaling',
            'bilagssekvens_id' => '1',
        ]);
    }
}

