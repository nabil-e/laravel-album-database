<?php

use Illuminate\Database\Seeder;
// use App\Album;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(AlbumSeeder::class);
        // factory(App\Album::class, 20)->create();
    }
}
