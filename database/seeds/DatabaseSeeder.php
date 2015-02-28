<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Pur\Bruker;
use Pur\Oppgave;
use Pur\Purmoduler\Regnskap\Bilagsmal;
use Pur\Purmoduler\Regnskap\Bilagssekvens;
use Pur\Purmoduler\Regnskap\Konto;
use Pur\Purmoduler\Regnskap\Posteringsmal;


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
        $this->call('KontoTableSeeder');
        $this->call('PosteringsmalTableSeeder');
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

class PosteringsmalTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('posteringsmaler')->delete();

        Posteringsmal::create([
            'formel' => 'formelA',
            'bilagsmal_id' => '1',
            'kontokode' => '1300'
        ]);

        Posteringsmal::create([
            'formel' => 'formelB',
            'bilagsmal_id' => '1',
            'kontokode' => '1480'
        ]);

        Posteringsmal::create([
            'formel' => 'formelC',
            'bilagsmal_id' => '1',
            'kontokode' => '1760'
        ]);

        Posteringsmal::create([
            'formel' => 'formelA',
            'bilagsmal_id' => '2',
            'kontokode' => '1900'
        ]);

        Posteringsmal::create([
            'formel' => 'formelB',
            'bilagsmal_id' => '2',
            'kontokode' => '1612'
        ]);

        Posteringsmal::create([
            'formel' => 'formelC',
            'bilagsmal_id' => '2',
            'kontokode' => '1100'
        ]);
    }
}

class KontoTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('kontoer')->delete();

        $csvFile = 'database/seeds/Kontoplan_NS-4102.csv';
        $file_handle = fopen($csvFile, 'r');
        while (!feof($file_handle))
            $kontoer[] = fgetcsv($file_handle, 1024);
        fclose($file_handle);

        foreach ($kontoer as $konto) {
            Konto::create([
                'kontokode' => $konto[0],
                'kontonavn' => $konto[1],
            ]);
        }
    }
}