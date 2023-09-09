<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $tables = [            
            'users',            
        ];

        $this->truncateTables($tables);

        $this->call([
          UserSeeder::class,
        ]);
    }

    /*------------------------------------------------------------------------*/
    protected function truncateTables(array $tables)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');                   // Inhabilita el chequeo de las claves foráneas

        foreach ($tables as $table) {
            DB::table($table)->truncate();                              // Elimina todos los datos de cada tabla...
        }

        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');                   // Rehabilita el chequeo de las claves foráneas
    }
}
