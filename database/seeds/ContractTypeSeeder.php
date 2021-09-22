<?php


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\ContractType;

class ContractTypeSeeder extends Seeder
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

    private static $types = [
		'APP' => 'Contrat d\'Apprentissage',
		'CDD' => 'Contrat Durée Déterminée',
		'CDI' => 'Contrat Durée Inéterminée',
		'EXP' => 'Expatrié',
		'EXT' => 'Prestataire Extérieur',
		'IMP' => 'Impatrié',
		'INT' => 'Intérimaire',
		'SNC' => 'Stagiaire Non Conventionné',
		'STG' => 'Stagiaire indemnisé',
		'STN' => 'Stagiaire non indemnisé',
    ];

    public static function populate()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        ContractType::truncate();
        foreach (ContractTypeSeeder::$types as $key => $value) {
            ContractType::create([
                'abreviation' => $key,
                'verbose' => $value,
            ]);
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
