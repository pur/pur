<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Pur\Bruker;
use Pur\Oppgave;
use Pur\Purmoduler\Regnskap\Bilag;
use Pur\Purmoduler\Regnskap\Bilagsmal;
use Pur\Purmoduler\Regnskap\Bilagssekvens;
use Pur\Purmoduler\Regnskap\Konto;
use Pur\Purmoduler\Regnskap\Postering;
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

        // Pur\Regnskap
        $this->call('BilagssekvensTableSeeder');
        $this->call('BilagsmalTableSeeder');
        $this->call('KontoTableSeeder');
        $this->call('PosteringsmalTableSeeder');
        $this->call('BilagTableSeeder');
        $this->call('PosteringTableSeeder');
    }
}

class BrukerTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('brukere')->delete();

        Bruker::create([
            'fornavn' => 'Lektor',
            'etternavn' => 'Lerd',
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
            'beskrivelse' => 'Varekjøp med 3 bilag: Faktura for varekjøp, kreditnota for del av kjøpesum, og utbetaling.',
            'bruker_id' => 1,
            'moduloppgave_id' => 1,
            'moduloppgave_type' => 'Pur\Purmoduler\Regnskap\Bilagssekvens'
        ]);

        Oppgave::create([
            'beskrivelse' => 'Brilliant oppgave...',
            'bruker_id' => 1,
            'moduloppgave_id' => 2,
            'moduloppgave_type' => 'Pur\Purmoduler\Regnskap\Bilagssekvens'
        ]);

        Oppgave::create([
            'beskrivelse' => 'Superb oppgave...',
            'bruker_id' => 2,
            'moduloppgave_id' => 3,
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
            'sekvenstype' => 'Fakturasekvens (inng.)',
        ]);

        Bilagssekvens::create([
            'sekvenstype' => 'Fakturasekvens (utg.)',
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
            'bilagssekvens_id' => 1,
        ]);

        Bilagsmal::create([
            'bilagstype' => '02 - Inngående kreditnota',
            'bilagssekvens_id' => 1,
        ]);

        Bilagsmal::create([
            'bilagstype' => '06 - Utbetaling',
            'bilagssekvens_id' => 1,
        ]);
    }
}

class PosteringsmalTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('posteringsmaler')->delete();

        // Bilag 1

        Posteringsmal::create([
            'formel' => 1,
            'bilagsmal_id' => 1,
            'kontokode' => 2400
        ]);

        Posteringsmal::create([
            'formel' => 2,
            'bilagsmal_id' => 1,
            'kontokode' => 2710
        ]);

        Posteringsmal::create([
            'formel' => 3,
            'bilagsmal_id' => 1,
            'kontokode' => 4300
        ]);


        // Bilag 2

        Posteringsmal::create([
            'formel' => 1,
            'bilagsmal_id' => 2,
            'kontokode' => 2400
        ]);

        Posteringsmal::create([
            'formel' => 2,
            'bilagsmal_id' => 2,
            'kontokode' => 2710
        ]);

        Posteringsmal::create([
            'formel' => 3,
            'bilagsmal_id' => 2,
            'kontokode' => 4300
        ]);


        // Bilag 3

        Posteringsmal::create([
            'formel' => 4,
            'bilagsmal_id' => 3,
            'kontokode' => 2400
        ]);

        Posteringsmal::create([
            'formel' => 5,
            'bilagsmal_id' => 3,
            'kontokode' => 1910
        ]);

        Posteringsmal::create([
            'formel' => 4,
            'bilagsmal_id' => 3,
            'kontokode' => 2400
        ]);

        Posteringsmal::create([
            'formel' => 6,
            'bilagsmal_id' => 3,
            'kontokode' => 2710
        ]);

        Posteringsmal::create([
            'formel' => 7,
            'bilagsmal_id' => 3,
            'kontokode' => 4300
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

class BilagTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('bilag')->delete();

        Bilag::create([
            'sekvensposisjon' => 1,
            'bilagsmal_id' => 1,
            'besvarelse_id' => 1,
        ]);

        Bilag::create([
            'sekvensposisjon' => 2,
            'bilagsmal_id' => 2,
            'besvarelse_id' => 1,

        ]);

        Bilag::create([
            'sekvensposisjon' => 3,
            'bilagsmal_id' => 3,
            'besvarelse_id' => 1,
        ]);
    }
}

class PosteringTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('posteringer')->delete();

        // Bilag 1 - fasit:

        Postering::create([
            'tid_lagret' => '2015-01-01 00:00:00',
            'belop' => -12000,
            'ant_lagringer' => 1,
            'er_fasit' => true,
            'bilag_id' => 1,
            'kontokode' => 2400,
        ]);

        Postering::create([
            'tid_lagret' => '2015-01-01 00:00:01',
            'belop' => 2424,
            'ant_lagringer' => 1,
            'er_fasit' => true,
            'bilag_id' => 1,
            'kontokode' => 2710,
        ]);

        Postering::create([
            'tid_lagret' => '2015-01-01 00:00:02',
            'belop' => 9696,
            'ant_lagringer' => 1,
            'er_fasit' => true,
            'bilag_id' => 1,
            'kontokode' => 4300,
        ]);

        // Bilag 1 - besvarelse:

        Postering::create([
            'tid_lagret' => '2015-01-01 00:01:00',
            'belop' => -12000,
            'ant_lagringer' => 1,
            'er_fasit' => false,
            'bilag_id' => 1,
            'kontokode' => 2400,
        ]);

        Postering::create([
            'tid_lagret' => '2015-01-01 00:01:01',
            'belop' => 2424,
            'ant_lagringer' => 1,
            'er_fasit' => false,
            'bilag_id' => 1,
            'kontokode' => 2710,
        ]);

        Postering::create([
            'tid_lagret' => '2015-01-01 00:01:03',
            'belop' => 9696,
            'ant_lagringer' => 1,
            'er_fasit' => false,
            'bilag_id' => 1,
            'kontokode' => 4300,
        ]);


        // Bilag 2 - fasit:

        Postering::create([
            'tid_lagret' => '2015-01-01 00:00:04',
            'belop' => 1500,
            'ant_lagringer' => 1,
            'er_fasit' => true,
            'bilag_id' => 2,
            'kontokode' => 2400,
        ]);

        Postering::create([
            'tid_lagret' => '2015-01-01 00:00:05',
            'belop' => -300,
            'ant_lagringer' => 1,
            'er_fasit' => true,
            'bilag_id' => 2,
            'kontokode' => 2710,
        ]);

        Postering::create([
            'tid_lagret' => '2015-01-01 00:00:06',
            'belop' => -1200,
            'ant_lagringer' => 1,
            'er_fasit' => true,
            'bilag_id' => 2,
            'kontokode' => 4300,
        ]);


        // Bilag 2 - besvarelse:

        Postering::create([
            'tid_lagret' => '2015-01-01 00:01:04',
            'belop' => 1500,
            'ant_lagringer' => 1,
            'er_fasit' => false,
            'bilag_id' => 2,
            'kontokode' => 2400,
        ]);

        Postering::create([
            'tid_lagret' => '2015-01-01 00:01:05',
            'belop' => -300,
            'ant_lagringer' => 1,
            'er_fasit' => false,
            'bilag_id' => 2,
            'kontokode' => 2710,
        ]);

        Postering::create([
            'tid_lagret' => '2015-01-01 00:01:06',
            'belop' => -1200,
            'ant_lagringer' => 1,
            'er_fasit' => false,
            'bilag_id' => 2,
            'kontokode' => 4300,
        ]);


        // Bilag 3 - fasit:

        Postering::create([
            'tid_lagret' => '2015-01-01 00:00:07',
            'belop' => 10460.70,
            'ant_lagringer' => 1,
            'er_fasit' => true,
            'bilag_id' => 3,
            'kontokode' => 2400
        ]);

        Postering::create([
            'tid_lagret' => '2015-01-01 00:00:08',
            'belop' => -10460.70,
            'ant_lagringer' => 1,
            'er_fasit' => true,
            'bilag_id' => 3,
            'kontokode' => 1910
        ]);

        Postering::create([
            'tid_lagret' => '2015-01-01 00:00:09',
            'belop' => 159.30,
            'ant_lagringer' => 1,
            'er_fasit' => true,
            'bilag_id' => 3,
            'kontokode' => 2400
        ]);

        Postering::create([
            'tid_lagret' => '2015-01-01 00:00:10',
            'belop' => -31.86,
            'ant_lagringer' => 1,
            'er_fasit' => true,
            'bilag_id' => 3,
            'kontokode' => 2710
        ]);

        Postering::create([
            'tid_lagret' => '2015-01-01 00:00:11',
            'belop' => -127.44,
            'ant_lagringer' => 1,
            'er_fasit' => true,
            'bilag_id' => 3,
            'kontokode' => 4300
        ]);

        // Bilag 3 - besvarelse:

        Postering::create([
            'tid_lagret' => '2015-01-01 00:01:07',
            'belop' => 10460.70,
            'ant_lagringer' => 1,
            'er_fasit' => false,
            'bilag_id' => 3,
            'kontokode' => 2400
        ]);

        Postering::create([
            'tid_lagret' => '2015-01-01 00:01:08',
            'belop' => -10460.70,
            'ant_lagringer' => 1,
            'er_fasit' => false,
            'bilag_id' => 3,
            'kontokode' => 1910
        ]);

        Postering::create([
            'tid_lagret' => '2015-01-01 00:01:09',
            'belop' => 159.30,
            'ant_lagringer' => 1,
            'er_fasit' => false,
            'bilag_id' => 3,
            'kontokode' => 2400
        ]);

        Postering::create([
            'tid_lagret' => '2015-01-01 00:01:10',
            'belop' => -31.86,
            'ant_lagringer' => 1,
            'er_fasit' => false,
            'bilag_id' => 3,
            'kontokode' => 2710
        ]);

        Postering::create([
            'tid_lagret' => '2015-01-01 00:01:11',
            'belop' => -127.44,
            'ant_lagringer' => 1,
            'er_fasit' => false,
            'bilag_id' => 3,
            'kontokode' => 4300
        ]);
    }
}