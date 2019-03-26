<?php

namespace Tests\Unit;

use App\Album;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AlbumTest extends TestCase
{
    use DatabaseMigrations;
    
    /** @test */
    public function it_will_show_all_albums()
    {
        $albums = factory(Album::class, 10)->create();

        $response = $this->get(route('albums.index'));

        $response->assertStatus(200);

        $response->assertJson($albums->toArray());
    }

    /** @test */
    public function it_will_create_albums()
    {
        $response = $this->post(route('albums.store'), [
            'album_img'  => 'This is a img',
            'album_title'  => 'This is a title',
            'artiste_name' => 'This is a artiste',
            'album_gender' => 'This is a album_gender',
            'product_date' => '2000',
            'album_label' => 'This is a album_label',
            'album_song' => ['song1', 'song2', 'song3'],
            'album_moyen' => 8,
        ]);

        $response->assertStatus(200);

        $this->assertDatabaseHas('albums', [
            'album_title' => 'This is a title'
        ]);

        $response->assertJsonStructure([
            'message',
            'album' => [
                'album_title',
                'artiste_name',
                'updated_at',
                'created_at',
                'id'
            ]
        ]);
    }

    /** @test */
    public function it_will_show_a_album()
    {
        $this->post(route('albums.store'), [
            'album_img'  => 'This is a imgp',
            'album_title'  => 'This is a title',
            'artiste_name' => 'This is a artistep',
            'album_gender' => 'This is a album_genderp',
            'product_date' => '2000',
            'album_label' => 'This is a album_labelp',
            'album_song' => ['song1', 'song2', 'song3p'],
            'album_moyen' => 8,
        ]);

        $album = Album::all()->first();

        $response = $this->get(route('albums.show', $album->id));

        $response->assertStatus(200);

        $response->assertJson($album->toArray());
    }

    /** @test */
    public function it_will_update_a_album()
    {
        $this->post(route('albums.store'), [
            'album_img'  => 'This is a img',
            'album_title'  => 'This is a title',
            'artiste_name' => 'This is a artiste',
            'album_gender' => 'This is a album_gender',
            'product_date' => '2000',
            'album_label' => 'This is a album_label',
            'album_song' => ['song1', 'song2', 'song3'],
            'album_moyen' => 8,
        ]);

        $album = Album::all()->first();

        $response = $this->put(route('albums.update', $album->id), [
            'album_title' => 'This is the updated title'
        ]);

        $response->assertStatus(200);

        $album = $album->fresh();

        $this->assertEquals($album->album_title, 'This is the updated title');

        $response->assertJsonStructure([
           'message',
           'album' => [
               'album_title',
               'artiste_name',
               'updated_at',
               'created_at',
               'id'
           ]
       ]);
    }

    /** @test */
    public function it_will_delete_a_album()
    {
        $this->post(route('albums.store'), [
            'album_img'  => 'This is a img',
            'album_title'  => 'This is a title',
            'artiste_name' => 'This is a artiste',
            'album_gender' => 'This is a album_gender',
            'product_date' => '2000',
            'album_label' => 'This is a album_label',
            'album_song' => ['song1', 'song2', 'song3'],
            'album_moyen' => 8,
        ]);

        $album = Album::all()->first();

        $response = $this->delete(route('albums.destroy', $album->id));

        $album = $album->fresh();

        $this->assertNull($album);

        $response->assertJsonStructure([
            'message'
        ]);
    }
}
