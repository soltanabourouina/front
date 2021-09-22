<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // For all companies
        CodeRegroupementPrincipalSeeder::populate();
        CodeRegroupementSecondaireSeeder::populate();
        TableColumnSeeder::populate();
        ContractTypeSeeder::populate();
        CSPSeeder::populate();
        TauxDeChargeSeeder::populate();
        
        // For tests
        // EtablissementSeeder::populate();
        // ClassificationSeeder::populate();
        // MetierSeeder::populate();
        // EmploiSeeder::populate();
        // SpreadsheetColumnStructureSeeder::populate();
        // CorrespondanceLigneBudgetaireSeeder::populate();
        
        Artisan::call('delete-uploaded-files');
    }
}
