<?php
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionTableSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{


$permissions = [

        
        'utilisateurs',
        'liste utilisateurs',
        'permissions utilisateurs',
        'clients',
        'contacts',
        'motifs',
        'liste clients',
        'liste contacts',


        'ajouter utilisateurs',
        'modifier utilisateurs',
        'supprimer utilisateurs',

        'afficher permissions',
        'ajouter permissions',
        'modifier permissions',
        'supprimer permissions',

      
    
];



foreach ($permissions as $permission) {
    
Permission::create(['name' => $permission]);
}


}
}