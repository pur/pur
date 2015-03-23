<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Pur\Besvarelse;
use Pur\Bruker;
use Pur\Oppgave;
use Pur\Oppgavesett;
use Pur\Purmoduler\Regnskap\Bilag;
use Pur\Purmoduler\Regnskap\Bilagsmal;
use Pur\Purmoduler\Regnskap\Bilagsmalsekvens;
use Pur\Purmoduler\Regnskap\BilagsmalsekvensVar;
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
        $this->call('OppgavesettTableSeeder');
        $this->call('SettoppgaveTableSeeder');
        $this->call('BesvarelseTableSeeder');

        // Pur\..\Regnskap
        $this->call('KontoTableSeeder');
        $this->call('BilagsmalsekvensTableSeeder');
        $this->call('BilagsmalsekvensVarTableSeeder');
        $this->call('BilagsmalTableSeeder');
        $this->call('PosteringsmalTableSeeder');
        $this->call('BilagssekvensTableSeeder');
        //$this->call('BilagssekvensVarTableSeeder');
        $this->call('BilagTableSeeder');
        $this->call('PosteringTableSeeder');
    }
}

// Pur

class BrukerTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('brukere')->delete();

        Bruker::create([
            'fornavn' => 'Lærer',
            'etternavn' => 'Lærd',
            //'epost' => 'lektor@lerd.no',
            'email' => 'laerer@laerd.no',
            //'passord' => bcrypt('passord'),
            'password' => bcrypt('passord'),
            'rolle' => 'faglærer'
        ]);

        Bruker::create([

            'fornavn' => 'Professor',
            'etternavn' => 'Proff',
            //'epost' => 'professor@proff.no',
            'email' => 'professor@proff.no',
            //'passord' => bcrypt('passord'),
            'password' => bcrypt('passord'),
            'rolle' => 'faglærer'
        ]);

        Bruker::create([
            'fornavn' => 'Sture',
            'etternavn' => 'Student',
            //'epost' => 'sture@student.no',
            'email' => 'sture@student.no',
            //'passord' => bcrypt('passord'),
            'password' => bcrypt('passord'),
            'rolle' => 'student',
        ]);

        Bruker::create([
            'fornavn' => 'Ellen',
            'etternavn' => 'Elev',
            //'epost' => 'ellen@elev.no',
            'email' => 'ellen@elev.no',
            //'passord' => bcrypt('passord'),
            'password' => bcrypt('passord'),
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
            'moduloppgave_type' => 'Pur\Purmoduler\Regnskap\bilagsmalsekvens'
        ]);

        Oppgave::create([
            'beskrivelse' => 'En annen oppgave...',
            'bruker_id' => 1,
            'moduloppgave_id' => 2,
            'moduloppgave_type' => 'Pur\Purmoduler\Regnskap\bilagsmalsekvens'
        ]);

        Oppgave::create([
            'beskrivelse' => 'Nok en oppgave...',
            'bruker_id' => 2,
            'moduloppgave_id' => 3,
            'moduloppgave_type' => 'Pur\Purmoduler\Regnskap\bilagsmalsekvens'
        ]);
    }
}

class OppgavesettTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('oppgavesett')->delete();

        Oppgavesett::create([
            'beskrivelse' => 'Øvingsoppgavesett 1',
            'tid_opprettet' => '2015-08-01 09:00:00',
            'tid_endret' => '2015-08-05 09:00:00',
            'tid_publisert' => '2015-08-05 10:00:00',
            'tid_aapent' => '2015-08-10 10:00:00',
            'tid_lukket' => '2015-09-10 10:00:00',
            'bruker_id' => 1,
        ]);

        Oppgavesett::create([
            'beskrivelse' => 'Obligatorisk oppgavesett 1',
            'tid_opprettet' => '2015-09-01 09:00:00',
            'tid_endret' => '2015-09-05 09:00:00',
            'tid_publisert' => '2015-09-05 10:00:00',
            'tid_aapent' => '2015-09-10 10:00:00',
            'tid_lukket' => '2015-10-10 10:00:00',
            'bruker_id' => 1,
        ]);

        Oppgavesett::create([
            'beskrivelse' => 'Øvingsoppgavesett 2',
            'tid_opprettet' => '2015-10-01 09:00:00',
            'tid_endret' => '2015-10-05 09:00:00',
            'tid_publisert' => '2015-10-05 10:00:00',
            'tid_aapent' => '2015-10-10 10:00:00',
            'tid_lukket' => '2015-11-10 10:00:00',
            'bruker_id' => 1,
        ]);

        Oppgavesett::create([
            'beskrivelse' => 'Obligatorisk oppgavesett 2',
            'tid_opprettet' => '2015-11-01 09:00:00',
            'tid_endret' => '2015-11-05 09:00:00',
            'tid_publisert' => '2015-11-05 10:00:00',
            'tid_aapent' => '2015-11-10 10:00:00',
            'tid_lukket' => '2015-12-10 10:00:00',
            'bruker_id' => 1,
        ]);
    }
}

class SettoppgaveTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('settoppgaver')->delete();

        DB::insert('insert into settoppgaver (oppgavesett_id, oppgave_id) values (?, ?)', [1, 1]);
        DB::insert('insert into settoppgaver (oppgavesett_id, oppgave_id) values (?, ?)', [1, 2]);
        DB::insert('insert into settoppgaver (oppgavesett_id, oppgave_id) values (?, ?)', [1, 3]);
        DB::insert('insert into settoppgaver (oppgavesett_id, oppgave_id) values (?, ?)', [2, 1]);
        DB::insert('insert into settoppgaver (oppgavesett_id, oppgave_id) values (?, ?)', [2, 2]);
        DB::insert('insert into settoppgaver (oppgavesett_id, oppgave_id) values (?, ?)', [2, 3]);
    }
}

class BesvarelseTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('besvarelser')->delete();

        Besvarelse::create([
            'tid_opprettet' => '2015-08-10 11:00:00',
            'tid_endret' => '2015-09-10 08:45:00',
            'tid_levert' => '2015-09-10 09:00:00',
            'kommentar' => 'Har vi lært dette?! :-O',
            'bruker_id' => 3, // Sture Student
            'oppgavesett_id' => 1,
        ]);

        Besvarelse::create([
            'tid_opprettet' => '2015-08-10 12:00:00',
            'tid_endret' => '2015-09-01 11:45:00',
            'tid_levert' => '2015-09-01 12:00:00',
            'kommentar' => 'Det var mye morsommere da vi gjorde dette på papir :-(',
            'bruker_id' => 4, // Ellen Elev
            'oppgavesett_id' => 1,
        ]);
    }
}


// Pur\..\Regnskap

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

class BilagsmalsekvensTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('bilagsmalsekvenser')->delete();

        Bilagsmalsekvens::create([
            'sekvenstype' => 'Fakturasekvens (inng.)',
            'motpart' => 'Hansen & Hansen AS'
        ]);

        Bilagsmalsekvens::create([
            'sekvenstype' => 'Fakturasekvens (utg.)',
            'motpart' => 'Monsen & Monsen AS'
        ]);

        Bilagsmalsekvens::create([
            'sekvenstype' => 'Lønnssekvens',
            'motpart' => 'Jensen & Jensen AS'
        ]);
    }
}

class BilagsmalsekvensVarTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('bilagsmalsekvens_var')->delete();

        BilagsmalsekvensVar::create([
            'navn' => 'Bruttobeløp',
            'tegn_i_formel' => 'a',
            'verdi_min' => '30000',
            'verdi_maks' => '50000',
            'bilagsmalsekvens_id' => 1
        ]);

        BilagsmalsekvensVar::create([
            'navn' => 'Bruttobeløp',
            'tegn_i_formel' => 'b',
            'verdi_min' => '2000',
            'verdi_maks' => '4000',
            'bilagsmalsekvens_id' => 1
        ]);

        BilagsmalsekvensVar::create([
            'navn' => 'Rabattsats',
            'tegn_i_formel' => 'x',
            'verdi_min' => '10',
            'verdi_maks' => '10',
            'bilagsmalsekvens_id' => 1
        ]);
    }
}

class BilagsmalTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('bilagsmaler')->delete();

        Bilagsmal::create([
            'bilagstype' => 'Inngående faktura',
            'nr_i_sekvens' => 1,
            'bilagsmalsekvens_id' => 1
        ]);

        Bilagsmal::create([
            'bilagstype' => 'Inngående kreditnota',
            'nr_i_sekvens' => 2,
            'bilagsmalsekvens_id' => 1
        ]);

        Bilagsmal::create([
            'bilagstype' => 'Utbetaling',
            'nr_i_sekvens' => 3,
            'bilagsmalsekvens_id' => 1
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

class BilagssekvensTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('bilagssekvenser')->delete();

        Bilagssekvens::create([
            'bilagsmalsekvens_id' => 1,
            'besvarelse_id' => 1
        ]);

        Bilagssekvens::create([
            'bilagsmalsekvens_id' => 1,
            'besvarelse_id' => 1
        ]);

        Bilagssekvens::create([
            'bilagsmalsekvens_id' => 1,
            'besvarelse_id' => 1
        ]);
    }
}


class BilagTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('bilag')->delete();

        Bilag::create([
            'nr_i_oppgsett' => 1,
            'bilagssekvens_id' => 1
        ]);

        Bilag::create([
            'nr_i_oppgsett' => 2,
            'bilagssekvens_id' => 1
        ]);

        Bilag::create([
            'nr_i_oppgsett' => 3,
            'bilagssekvens_id' => 1
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