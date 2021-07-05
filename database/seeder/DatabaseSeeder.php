<?php

namespace Database\Seeder;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //untuk memanggil seeder dengan artisan
        // $this->call(AdminSeeder::class);
        $this->call([
            AdminSeeder::class,
        ]);
    }
}
