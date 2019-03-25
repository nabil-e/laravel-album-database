<?php

use Illuminate\Database\Seeder;
use App\Album;
class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Album::class, 20)->create();
    }
}
