<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Pur\Besvarelse;
use Pur\Bruker;
use Pur\Oppgave;
use Pur\Oppgavesett;
use Pur\Oppgavesvar;
use Pur\Purmoduler\KoiAnalyse\Datasett;
use Pur\Purmoduler\KoiAnalyse\Instans;
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
        $this->call('OppgavesettTableSeeder');
        $this->call('OppgaveTableSeeder');
        $this->call('SettoppgaveTableSeeder');
        //$this->call('BesvarelseTableSeeder');
        //$this->call('OppgavesvarTableSeeder');

        // Pur\..\Regnskap
        $this->call('KontoTableSeeder');
        $this->call('BilagsmalsekvensTableSeeder');
        $this->call('BilagsmalsekvensVarTableSeeder');
        $this->call('BilagsmalTableSeeder');
        $this->call('PosteringsmalTableSeeder');
        //$this->call('BilagssekvensTableSeeder');
        //$this->call('BilagssekvensVarTableSeeder');
        //$this->call('BilagTableSeeder');
        //$this->call('PosteringTableSeeder');

        // Pur\..\Kostnads- og inntektsanalyse
        $this->call('KoiaOppgaveTableSeeder');
        $this->call('KoiaSporsmalTableSeeder');
        $this->call('KoiaOppgavesporsmalTableSeeder');
        $this->call('DatasettTableSeeder');
        $this->call('InstansTableSeeder');
    }
}

// Pur

class BrukerTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('brukere')->delete();

        Bruker::create([
            'email' => 'lektor@lur.no',
            'password' => bcrypt('test'),
            'rolle' => 'laerer',
            'navn' => 'Lektor Lur'
        ]);

        Bruker::create([
            'email' => 'professor@proff.no',
            'password' => bcrypt('test'),
            'rolle' => 'laerer',
            'navn' => 'Professor Proff'
        ]);

        Bruker::create([
            'email' => 'sture@student.no',
            'password' => bcrypt('test'),
            'rolle' => 'student',
            'navn' => 'Sture Student',
        ]);

        Bruker::create([
            'email' => 'ellen@elev.no',
            'password' => bcrypt('test'),
            'rolle' => 'student',
            'navn' => 'Ellen Elev'
        ]);
    }
}

class OppgaveTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('oppgaver')->delete();

        Oppgave::create([
            'beskrivelse' => 'Inngående faktura-sekvens (3 bilag)',
            'bruker_id' => 1,
            'moduloppgave_type' => 'Pur\Purmoduler\Regnskap\Bilagsmalsekvens',
            'moduloppgave_id' => 1
        ]);

        Oppgave::create([
            'beskrivelse' => 'Utgående faktura-sekvens (3 bilag)',
            'bruker_id' => 1,
            'moduloppgave_type' => 'Pur\Purmoduler\Regnskap\Bilagsmalsekvens',
            'moduloppgave_id' => 2
        ]);

//        Oppgave::create([
//            'beskrivelse' => 'Lønnsutbetaling (1 bilag)',
//            'bruker_id' => 2,
//            'moduloppgave_type' => 'Pur\Purmoduler\Regnskap\Bilagsmalsekvens',
//            'moduloppgave_id' => 3
//        ]);
    }
}

class OppgavesettTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('oppgavesett')->delete();

        Oppgavesett::create([
            'type' => 'øving',
            'tittel' => 'Øving 1',
            'beskrivelse' => 'Test-øving',
            'tid_opprettet' => '2015-01-01 09:00:00',
            'tid_endret' => '2015-05-01 09:00:00',
            'tid_publisert' => '10.01.15 10:00',
            'tid_aapent' => '15.01.15 10:00',
            'tid_lukket' => '20.01.15 10:00',
            'bruker_id' => 1
        ]);

        Oppgavesett::create([
            'type' => 'øving',
            'tittel' => 'Øving 2',
            'beskrivelse' => 'Test-øving',
            'tid_opprettet' => '2015-05-01 09:00:00',
            'tid_endret' => '2015-05-02 09:00:00',
            'tid_publisert' => '10.05.15 10:00',
            'tid_aapent' => '12.05.15 10:00',
            'tid_lukket' => '31.12.15 10:00',
            'bruker_id' => 1,
        ]);

        Oppgavesett::create([
            'type' => 'oblig',
            'tittel' => 'Oblig. 1',
            'beskrivelse' => 'Test-oblig',
            'tid_opprettet' => '2015-01-05 09:00:00',
            'tid_endret' => '2015-05-05 09:00:00',
            'tid_publisert' => '10.08.15 10:00',
            'tid_aapent' => '10.10.15 10:00',
            'tid_lukket' => '10.11.15 10:00',
            'bruker_id' => 1,
        ]);

        Oppgavesett::create([
            'type' => 'oblig',
            'tittel' => 'Oblig 2',
            'beskrivelse' => 'Test-oblig',
            'tid_opprettet' => '2015-10-05 09:00:00',
            'tid_endret' => '2015-12-05 09:00:00',
            'tid_publisert' => '15.09.15 10:00',
            'tid_aapent' => '20.09.15 10:00',
            'tid_lukket' => '20.10.15 10:00',
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
//        DB::insert('insert into settoppgaver (oppgavesett_id, oppgave_id) values (?, ?)', [1, 3]);
        DB::insert('insert into settoppgaver (oppgavesett_id, oppgave_id) values (?, ?)', [2, 1]);
        DB::insert('insert into settoppgaver (oppgavesett_id, oppgave_id) values (?, ?)', [2, 2]);
//        DB::insert('insert into settoppgaver (oppgavesett_id, oppgave_id) values (?, ?)', [2, 3]);
        DB::insert('insert into settoppgaver (oppgavesett_id, oppgave_id) values (?, ?)', [3, 1]);
        DB::insert('insert into settoppgaver (oppgavesett_id, oppgave_id) values (?, ?)', [3, 2]);
//        DB::insert('insert into settoppgaver (oppgavesett_id, oppgave_id) values (?, ?)', [3, 3]);
        DB::insert('insert into settoppgaver (oppgavesett_id, oppgave_id) values (?, ?)', [4, 1]);
        DB::insert('insert into settoppgaver (oppgavesett_id, oppgave_id) values (?, ?)', [4, 2]);
//        DB::insert('insert into settoppgaver (oppgavesett_id, oppgave_id) values (?, ?)', [4, 3]);
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

class OppgavesvarTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('oppgavesvar')->delete();

        Oppgavesvar::create([
            'moduloppgavesvar_type' => 'Pur\Purmoduler\Regnskap\Bilagssekvens',
            'moduloppgavesvar_id' => 1,
            'oppgave_id' => 1,
            'besvarelse_id' => 1,
        ]);

        Oppgavesvar::create([
            'moduloppgavesvar_type' => 'Pur\Purmoduler\Regnskap\Bilagssekvens',
            'moduloppgavesvar_id' => 2,
            'oppgave_id' => 1,
            'besvarelse_id' => 1,
        ]);

        Oppgavesvar::create([
            'moduloppgavesvar_type' => 'Pur\Purmoduler\Regnskap\Bilagssekvens',
            'moduloppgavesvar_id' => 3,
            'oppgave_id' => 1,
            'besvarelse_id' => 1,
        ]);
    }
}

// Pur\..\Regnskap

class KontoTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('kontoer')->delete();

        try
        {
            $csvFile = 'database/seeds/Kontoplan_NS-4102.csv';
            $file_handle = fopen($csvFile, 'r');

            $kontoer = array();
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
        catch (Exception $e)
        {
            $this->command->info('Seeding av kontotabell feilet: ' . $e->getMessage());
        }
    }
}

class BilagsmalsekvensTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('bilagsmalsekvenser')->delete();

        // Sekvens for inngående faktura
        Bilagsmalsekvens::create([
            'sekvenstype' => 'Inngående faktura-sekvens',
            'motpart' => 'Hansen & Hansen AS'
        ]);

        // Sekvens for utgående faktura
        Bilagsmalsekvens::create([
            'sekvenstype' => 'Utgående faktura-sekvens',
            'motpart' => 'Jensen & Co AS'
        ]);

//        // Lønnsutbetaling
//        Bilagsmalsekvens::create([
//            'sekvenstype' => 'Lønnsutbetaling',
//            'motpart' => 'T. Lønnes Dah'
//        ]);
    }
}

class BilagsmalsekvensVarTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('bilagsmalsekvens_var')->delete();


        // Bilagsmalsekvens 1 - Sekvens for inngående faktura

        BilagsmalsekvensVar::create([
            'navn' => 'Bruttobeløp',
            'tegn_i_formel' => 'a',
            'verdi_min' => '20000',
            'verdi_maks' => '40000',
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
            'verdi_min' => '1',
            'verdi_maks' => '2',
            'bilagsmalsekvens_id' => 1
        ]);


        // Bilagsmalsekvens 2 - Sekvens for utgående faktura

        BilagsmalsekvensVar::create([
            'navn' => 'Bruttobeløp',
            'tegn_i_formel' => 'a',
            'verdi_min' => '30000',
            'verdi_maks' => '50000',
            'bilagsmalsekvens_id' => 2
        ]);

        BilagsmalsekvensVar::create([
            'navn' => 'Bruttobeløp',
            'tegn_i_formel' => 'b',
            'verdi_min' => '3000',
            'verdi_maks' => '5000',
            'bilagsmalsekvens_id' => 2
        ]);

        BilagsmalsekvensVar::create([
            'navn' => 'Rabattsats',
            'tegn_i_formel' => 'x',
            'verdi_min' => '2',
            'verdi_maks' => '4',
            'bilagsmalsekvens_id' => 2
        ]);


        // Bilagsmalsekvens 3

//        BilagsmalsekvensVar::create([
//            'navn' => 'Bruttobeløp',
//            'tegn_i_formel' => 'a',
//            'verdi_min' => '40000',
//            'verdi_maks' => '60000',
//            'bilagsmalsekvens_id' => 3
//        ]);
//
//        BilagsmalsekvensVar::create([
//            'navn' => 'Bruttobeløp',
//            'tegn_i_formel' => 'b',
//            'verdi_min' => '4000',
//            'verdi_maks' => '6000',
//            'bilagsmalsekvens_id' => 3
//        ]);
//
//        BilagsmalsekvensVar::create([
//            'navn' => 'Rabattsats',
//            'tegn_i_formel' => 'x',
//            'verdi_min' => '3',
//            'verdi_maks' => '5',
//            'bilagsmalsekvens_id' => 3
//        ]);
    }
}

class BilagsmalTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('bilagsmaler')->delete();

        Bilagsmal::create([
            'nr_i_sekvens' => 1,
            'belopsformel' => 1,
            'bilagstype' => 'Inngående faktura',
            'infotekst' => 'Faktura for varekjøp inkl. 25% mva.',
            'bilagsmalsekvens_id' => 1
        ]);

        Bilagsmal::create([
            'nr_i_sekvens' => 2,
            'belopsformel' => 4,
            'bilagstype' => 'Inngående kreditnota',
            'infotekst' => 'Inngående kreditnota',
            'bilagsmalsekvens_id' => 1
        ]);

        Bilagsmal::create([
            'nr_i_sekvens' => 3,
            'belopsformel' => 13,
            'bilagstype' => 'Utbetaling',
            'infotekst' => 'Betalt faktura for varekjøp via bank med fradrag for kreditnota og rabatt',
            'bilagsmalsekvens_id' => 1
        ]);

        Bilagsmal::create([
            'nr_i_sekvens' => 1,
            'belopsformel' => 1,
            'bilagstype' => 'Utgående faktura',
            'infotekst' => 'Utgående faktura for varesalg inkl. 25% mva.',
            'bilagsmalsekvens_id' => 2
        ]);

        Bilagsmal::create([
            'nr_i_sekvens' => 2,
            'belopsformel' => 4,
            'bilagstype' => 'Utgående kreditnota',
            'infotekst' => 'Utgående kreditnota pga. retur av deler av vareparti',
            'bilagsmalsekvens_id' => 2
        ]);

        Bilagsmal::create([
            'nr_i_sekvens' => 3,
            'belopsformel' => 13,
            'bilagstype' => 'Innbetaling',
            'infotekst' => 'Mottatt betaling fra kunde via bank med fradrag av kreditnota og rabatt',
            'bilagsmalsekvens_id' => 2
        ]);

//        Bilagsmal::create([
//            'nr_i_sekvens' => 1,
//            'belopsformel' => 1,
//            'bilagstype' => 'Lønn',
//            'infotekst' => '',
//            'bilagsmalsekvens_id' => 3
//        ]);
    }
}

class PosteringsmalTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('posteringsmaler')->delete();

        // Sekvens 1

        // Bilag 1 (Inngående faktura)

        Posteringsmal::create([
            'formel' => 7,
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


        // Bilag 2 (Inngående kreditnota)

        Posteringsmal::create([
            'formel' => 4,
            'bilagsmal_id' => 2,
            'kontokode' => 2400
        ]);

        Posteringsmal::create([
            'formel' => 11,
            'bilagsmal_id' => 2,
            'kontokode' => 2710
        ]);

        Posteringsmal::create([
            'formel' => 12,
            'bilagsmal_id' => 2,
            'kontokode' => 4300
        ]);


        // Bilag 3 (Utbetaling)

        Posteringsmal::create([
            'formel' => 17,
            'bilagsmal_id' => 3,
            'kontokode' => 2400
        ]);

        Posteringsmal::create([
            'formel' => 21,
            'bilagsmal_id' => 3,
            'kontokode' => 1910
        ]);

        Posteringsmal::create([
            'formel' => 14,
            'bilagsmal_id' => 3,
            'kontokode' => 2400
        ]);

        Posteringsmal::create([
            'formel' => 19,
            'bilagsmal_id' => 3,
            'kontokode' => 2710
        ]);

        Posteringsmal::create([
            'formel' => 20,
            'bilagsmal_id' => 3,
            'kontokode' => 4300
        ]);


        // Sekvens 2:

        // Bilag 4 (Utgående faktura)

        Posteringsmal::create([
            'formel' => 1,
            'bilagsmal_id' => 4,
            'kontokode' => 1500
        ]);

        Posteringsmal::create([
            'formel' => 8,
            'bilagsmal_id' => 4,
            'kontokode' => 2700
        ]);

        Posteringsmal::create([
            'formel' => 9,
            'bilagsmal_id' => 4,
            'kontokode' => 3000
        ]);


        // Bilag 5 (Utgående kreditnota)

        Posteringsmal::create([
            'formel' => 10,
            'bilagsmal_id' => 5,
            'kontokode' => 1500
        ]);

        Posteringsmal::create([
            'formel' => 5,
            'bilagsmal_id' => 5,
            'kontokode' => 2700
        ]);

        Posteringsmal::create([
            'formel' => 6,
            'bilagsmal_id' => 5,
            'kontokode' => 3000
        ]);


        // Bilag 6 (Innbetaling)

        Posteringsmal::create([
            'formel' => 21,
            'bilagsmal_id' => 6,
            'kontokode' => 1500
        ]);

        Posteringsmal::create([
            'formel' => 17,
            'bilagsmal_id' => 6,
            'kontokode' => 1910
        ]);

        Posteringsmal::create([
            'formel' => 18,
            'bilagsmal_id' => 6,
            'kontokode' => 1500
        ]);

        Posteringsmal::create([
            'formel' => 15,
            'bilagsmal_id' => 6,
            'kontokode' => 2700
        ]);

        Posteringsmal::create([
            'formel' => 16,
            'bilagsmal_id' => 6,
            'kontokode' => 3000
        ]);

        // Sekvens 3

        // Bilag 7

//        Posteringsmal::create([
//            'formel' => 1,
//            'bilagsmal_id' => 7,
//            'kontokode' => 2930
//        ]);

    }
}

class BilagssekvensTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('bilagssekvenser')->delete();

        Bilagssekvens::create([]);

        Bilagssekvens::create([]);

        Bilagssekvens::create([]);
    }
}


class BilagTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('bilag')->delete();

        Bilag::create([
            'nr_i_besvarelse' => 1,
            'bilagssekvens_id' => 1
        ]);

        Bilag::create([
            'nr_i_besvarelse' => 2,
            'bilagssekvens_id' => 1
        ]);

        Bilag::create([
            'nr_i_besvarelse' => 3,
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
//            'tid_endret' => '2015-01-01 00:00:00',
            'belop' => -12000,
            'ant_lagringer' => 1,
            'er_fasit' => true,
            'bilag_id' => 1,
            'kontokode' => 2400,
        ]);

        Postering::create([
//            'tid_endret' => '2015-01-01 00:00:01',
            'belop' => 2424,
            'ant_lagringer' => 1,
            'er_fasit' => true,
            'bilag_id' => 1,
            'kontokode' => 2710,
        ]);

        Postering::create([
//            'tid_endret' => '2015-01-01 00:00:02',
            'belop' => 9696,
            'ant_lagringer' => 1,
            'er_fasit' => true,
            'bilag_id' => 1,
            'kontokode' => 4300,
        ]);

        // Bilag 1 - besvarelse:

        Postering::create([
//            'tid_endret' => '2015-01-01 00:01:00',
            'belop' => -12000,
            'ant_lagringer' => 1,
            'er_fasit' => false,
            'bilag_id' => 1,
            'kontokode' => 2400,
        ]);

        Postering::create([
//            'tid_endret' => '2015-01-01 00:01:01',
            'belop' => 2424,
            'ant_lagringer' => 1,
            'er_fasit' => false,
            'bilag_id' => 1,
            'kontokode' => 2710,
        ]);

        Postering::create([
//            'tid_endret' => '2015-01-01 00:01:03',
            'belop' => 9696,
            'ant_lagringer' => 1,
            'er_fasit' => false,
            'bilag_id' => 1,
            'kontokode' => 4300,
        ]);


        // Bilag 2 - fasit:

        Postering::create([
//            'tid_endret' => '2015-01-01 00:00:04',
            'belop' => 1500,
            'ant_lagringer' => 1,
            'er_fasit' => true,
            'bilag_id' => 2,
            'kontokode' => 2400,
        ]);

        Postering::create([
//            'tid_endret' => '2015-01-01 00:00:05',
            'belop' => -300,
            'ant_lagringer' => 1,
            'er_fasit' => true,
            'bilag_id' => 2,
            'kontokode' => 2710,
        ]);

        Postering::create([
//            'tid_endret' => '2015-01-01 00:00:06',
            'belop' => -1200,
            'ant_lagringer' => 1,
            'er_fasit' => true,
            'bilag_id' => 2,
            'kontokode' => 4300,
        ]);


        // Bilag 2 - besvarelse:

        Postering::create([
//            'tid_endret' => '2015-01-01 00:01:04',
            'belop' => 1500,
            'ant_lagringer' => 1,
            'er_fasit' => false,
            'bilag_id' => 2,
            'kontokode' => 2400,
        ]);

        Postering::create([
//            'tid_endret' => '2015-01-01 00:01:05',
            'belop' => -300,
            'ant_lagringer' => 1,
            'er_fasit' => false,
            'bilag_id' => 2,
            'kontokode' => 2710,
        ]);

        Postering::create([
//            'tid_endret' => '2015-01-01 00:01:06',
            'belop' => -1200,
            'ant_lagringer' => 1,
            'er_fasit' => false,
            'bilag_id' => 2,
            'kontokode' => 4300,
        ]);


        // Bilag 3 - fasit:

        Postering::create([
//            'tid_endret' => '2015-01-01 00:00:07',
            'belop' => 10460.70,
            'ant_lagringer' => 1,
            'er_fasit' => true,
            'bilag_id' => 3,
            'kontokode' => 2400
        ]);

        Postering::create([
//            'tid_endret' => '2015-01-01 00:00:08',
            'belop' => -10460.70,
            'ant_lagringer' => 1,
            'er_fasit' => true,
            'bilag_id' => 3,
            'kontokode' => 1910
        ]);

        Postering::create([
//            'tid_endret' => '2015-01-01 00:00:09',
            'belop' => 159.30,
            'ant_lagringer' => 1,
            'er_fasit' => true,
            'bilag_id' => 3,
            'kontokode' => 2400
        ]);

        Postering::create([
//            'tid_endret' => '2015-01-01 00:00:10',
            'belop' => -31.86,
            'ant_lagringer' => 1,
            'er_fasit' => true,
            'bilag_id' => 3,
            'kontokode' => 2710
        ]);

        Postering::create([
//            'tid_endret' => '2015-01-01 00:00:11',
            'belop' => -127.44,
            'ant_lagringer' => 1,
            'er_fasit' => true,
            'bilag_id' => 3,
            'kontokode' => 4300
        ]);

        // Bilag 3 - besvarelse:

        Postering::create([
//            'tid_endret' => '2015-01-01 00:01:07',
            'belop' => 10460.70,
            'ant_lagringer' => 1,
            'er_fasit' => false,
            'bilag_id' => 3,
            'kontokode' => 2400
        ]);

        Postering::create([
//            'tid_endret' => '2015-01-01 00:01:08',
            'belop' => -10460.70,
            'ant_lagringer' => 1,
            'er_fasit' => false,
            'bilag_id' => 3,
            'kontokode' => 1910
        ]);

        Postering::create([
//            'tid_endret' => '2015-01-01 00:01:09',
            'belop' => 159.30,
            'ant_lagringer' => 1,
            'er_fasit' => false,
            'bilag_id' => 3,
            'kontokode' => 2400
        ]);

        Postering::create([
//            'tid_endret' => '2015-01-01 00:01:10',
            'belop' => -31.86,
            'ant_lagringer' => 1,
            'er_fasit' => false,
            'bilag_id' => 3,
            'kontokode' => 2710
        ]);

        Postering::create([
//            'tid_endret' => '2015-01-01 00:01:11',
            'belop' => -127.44,
            'ant_lagringer' => 1,
            'er_fasit' => false,
            'bilag_id' => 3,
            'kontokode' => 4300
        ]);
    }
}

// Pur\..\Kostnads- og inntektsanalyse

class KoiaOppgaveTableSeeder extends Seeder {

    public function run()
    {
        DB::table('koia_oppgaver')->delete();

        \Pur\Purmoduler\KoiAnalyse\Oppgave::create();
        \Pur\Purmoduler\KoiAnalyse\Oppgave::create();
    }
}

class KoiaSporsmalTableSeeder extends Seeder {

    public function run()
    {
        DB::table('koia_sporsmal')->delete();

        \Pur\Purmoduler\KoiAnalyse\Sporsmal::create([
            'sporsmalstekst' => 'Hva er kostnadsoptimal produksjonsmengde?',
            'formel' => 'KO'
        ]);
        \Pur\Purmoduler\KoiAnalyse\Sporsmal::create([
            'sporsmalstekst' => 'Hva er gevinstoptimal produksjonsmengde?',
            'formel' => 'GOM'
        ]);
        \Pur\Purmoduler\KoiAnalyse\Sporsmal::create([
            'sporsmalstekst' => 'Hvilken pris vil være optimal?',
            'formel' => 'GOP'
        ]);
    }
}

class KoiaOppgavesporsmalTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('koia_oppgavesporsmal')->delete();

        DB::insert('insert into koia_oppgavesporsmal (oppgave_id, sporsmal_id) values (?, ?)', [1, 1]);
        DB::insert('insert into koia_oppgavesporsmal (oppgave_id, sporsmal_id) values (?, ?)', [1, 2]);
        DB::insert('insert into koia_oppgavesporsmal (oppgave_id, sporsmal_id) values (?, ?)', [1, 3]);
        DB::insert('insert into koia_oppgavesporsmal (oppgave_id, sporsmal_id) values (?, ?)', [2, 3]);
        DB::insert('insert into koia_oppgavesporsmal (oppgave_id, sporsmal_id) values (?, ?)', [2, 2]);
        DB::insert('insert into koia_oppgavesporsmal (oppgave_id, sporsmal_id) values (?, ?)', [2, 1]);
    }
}



class DatasettTableSeeder extends Seeder {

    public function run()
    {
        DB::table('koia_datasett')->delete();

        Datasett::create([
            'a_min' => 0.020,
            'a_maks' => 0.040,
            'a_intervall' => 0.005,
            'b_min' => -10,
            'b_maks' => -9,
            'b_intervall' => 0.1,
            'c_min' => 7000,
            'c_maks' => 8000,
            'c_intervall' => 100,
            'd_min' => 900000,
            'd_maks' => 1100000,
            'd_intervall' => 100000,
            'm_min' => -16,
            'm_maks' => -13,
            'm_intervall' => 0.01,
            'n_min' => 14000,
            'n_maks' => 18000,
            'n_intervall' => 100,
            'q_min' => 6000,
            'q_maks' => 7000,
            'q_intervall' => 100,
            'kapasitet' => 450,
        ]);

        Datasett::create([
            'a_min' => 0.010,
            'a_maks' => 0.050,
            'a_intervall' => 0.01,
            'b_min' => -12,
            'b_maks' => -7,
            'b_intervall' => 0.2,
            'c_min' => 5000,
            'c_maks' => 10000,
            'c_intervall' => 200,
            'd_min' => 1000000,
            'd_maks' => 1600000,
            'd_intervall' => 50000,
            'm_min' => -18,
            'm_maks' => -10,
            'm_intervall' => 0.05,
            'n_min' => 10000,
            'n_maks' => 20000,
            'n_intervall' => 50,
            'q_min' => 3000,
            'q_maks' => 10000,
            'q_intervall' => 50,
            'kapasitet' => 500,
        ]);
    }
}

class InstansTableSeeder extends Seeder {

    public function run()
    {
        DB::table('koia_instanser')->delete();

        Instans::create([
            'a' => 0.020,
            'b' => -10,
            'c' => 7000,
            'd' => 900000,
            'm' => -13,
            'n' => 14000,
            'q' => 7500,
            'kapasitet' => 450,
            'bruker_id' => 4,
            'oppgave_id' => 1
        ]);
    }
}

