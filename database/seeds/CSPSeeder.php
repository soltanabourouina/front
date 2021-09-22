<?php


use App\CategorieSocioprofessionelle;
use App\ContractType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CSPSeeder extends Seeder
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

    private static $categories = [
		["O", "Ouvrier", false],
		["E", "Employé", false],
		["A", "Agent de maistrise", false],
		["T", "Technicien", false],
		["C", "Cadre", true],
		["S", "Cadre supérieur", true],
    ];

    public static function populate()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        CategorieSocioprofessionelle::truncate();
        foreach (CSPSeeder::$categories as $key => $value) {
            CategorieSocioprofessionelle::create([
                'abreviation' => $value[0],
                'libelle' => $value[1],
                'cadre' => $value[2],
            ]);
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
