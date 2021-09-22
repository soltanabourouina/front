<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\CodeRegroupementPrincipal;
class CodeRegroupementPrincipalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    }
    private static $codes_principales = [
		"A" => "AVANTAGE",
		"B" => "BRUT",
		"C" => "CHARGES-PAT",
		"D" => "CHARGES-SAL",
		"F" => "FRAIS",
		"I" => "INDEMNITE",
		"N" => "PAIEMENT",
		"V" => "PRELEV-SOURCE",
		"P" => "PRESTATIONS",
		"O" => "PROVISION",
		"S" => "SEUIL",
		"E" => "EFFECTIF",
		"T" => "TEMPS",
		"Z" => "COUT TOTAL",

        // 'A' => 'AVANTAGE',
        // 'B' => 'BRUT',
        // 'C' => 'CHARGES-PAT',
        // 'D' => 'CHARGES-SAL',
        // 'F' => 'FRAIS',
        // 'I' => 'INDEMNITE',
        // 'N' => 'PAIEMENT',
        // 'V' => 'PRELEV-SOURCE',
        // 'P' => 'PRESTATIONS',
        // 'O' => 'PROVISION',
        // 'S' => 'SEUIL',
        // 'T' => 'TEMPS',
        // 'Z' => 'COUT TOTAL',
    ];

    public static function populate()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        CodeRegroupementPrincipal::truncate();
        foreach (CodeRegroupementPrincipalSeeder::$codes_principales as $key => $value) {
            CodeRegroupementPrincipal::create([
                'name' => $value,
                'abreviation' => $key,
            ]);
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
