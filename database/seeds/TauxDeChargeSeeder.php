<?php

use App\TauxDeCharge;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TauxDeChargeSeeder extends Seeder
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

    private static $rates = [
		[2021, 1, "O", 0.45],
		[2021, 1, "E", 0.46],
		[2021, 1, "A", 0.47],
		[2021, 1, "T", 0.46],
		[2021, 1, "C", 0.48],
		[2021, 1, "S", 0.44],
		[2022, 1, "O", 0.455],
		[2022, 1, "E", 0.465],
		[2022, 1, "A", 0.473],
		[2022, 1, "T", 0.46],
		[2022, 1, "C", 0.485],
		[2022, 1, "S", 0.437],
    ];

    public static function populate()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        TauxDeCharge::truncate();
        foreach (Self::$rates as $key => $value) {
            TauxDeCharge::create([
                'year' => $value[0],
                'month' => $value[1],
                'csp' => $value[2],
                'taux' => $value[3],
            ]);
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
