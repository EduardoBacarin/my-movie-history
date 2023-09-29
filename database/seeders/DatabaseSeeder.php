<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Cast;
use App\Models\Director;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\User;
use Carbon\Carbon;
use Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Type::create([
            'name' => "Movies",
            'image' => "https://png.pngtree.com/element_our/png_detail/20181227/movie-icon-which-is-designed-for-all-application-purpose-new-png_287896.jpg",
            'description' => substr('A film – also called a movie, motion picture, moving picture, picture, photoplay or (slang) flick – is a work of visual art that simulates experiences and otherwise communicates ideas, stories, perceptions, feelings, beauty, or atmosphere through the use of moving images. These images are generally accompanied by sound and, more rarely, other sensory stimulations.[1] The word "cinema", short for cinematography, is often used to refer to filmmaking and the film industry, and the art form that is the result of it.', 0, 200)
        ],
        [
            'name' => "TV Series",
            'image' => "https://media.istockphoto.com/id/653116838/pt/vetorial/tv-icon-illustration-design.jpg",
            'description' => substr('A television show – or simply a TV show – is the general reference to any content produced for viewing on a television set that is broadcast via over-the-air, satellite, or cable. This includes content made by television broadcasters and content made for broadcasting by film production companies. It excludes breaking news, advertisements, or trailers that are typically placed between shows.', 0, 200)
        ]);

        $genresData = json_decode(file_get_contents(database_path("/data/genres.json")));
        $genresInsert = array();
        foreach ($genresData as $item) {
            $itemData = [
		        'name' => $item->name,
		        'image' => $item->image,
        		'description' => ""
            ];
            array_push($genresInsert, $itemData);
        }
        Genre::insert($genresInsert);

        $castsData = json_decode(file_get_contents(database_path("/data/casts.json")));
        $castsInsert = array();
        foreach ($castsData as $item) {
            $itemData = [
                'name' => $item->name,
                'image' => $item->image_path
            ];
            array_push($castsInsert, $itemData);
        }
        Cast::insert($castsInsert);


        $directorsData = json_decode(file_get_contents(database_path("/data/directors.json")));
        $directorsInsert = array();
        foreach ($directorsData as $item) {
            $itemData = [
                'name' => $item->firstName . " " . $item->lastName,
                'image' => ""
            ];
            array_push($directorsInsert, $itemData);
        }
        Director::insert($directorsInsert);

        $moviesData = json_decode(file_get_contents(database_path("/data/movies.json")));
        $moviesInsert = array();
        foreach ($moviesData as $item) {
            $findGenre = Genre::where('name', explode(',', $item->Genre)[0])
                ->orWhere('name', "Others")->first();

            $itemData = [
                'genres_id' => $findGenre ? $findGenre->id : null,
                'types_id' => 1,
                'name' => $item->Title,
                'banner' => $item->Images[0],
                'cover' => $item->Poster,
                'sinopsys' => $item->Plot,
                'release_date' => strtotime($item->Released) ? Carbon::createFromDate($item->Released)->toDateString() : null,
                'imdb_url' => null,
                'country' => explode(",", $item->Country)[0],
                'lenght' => $item->Runtime
            ];
            array_push($moviesInsert, $itemData);
        }
        Movie::insert($moviesInsert);

        User::create([
            'name' => "John Doe",
            'email' => "johndoe@email.com",
            'email_verified_at' => Carbon::now()->toDateTimeString(),
            'password' => Hash::make("10203040"),
            'image' => "https://media.istockphoto.com/id/1152603187/photo/african-mature-man-with-spectacles.jpg",
            'level' => "admin"
        ],
        [
            'name' => "Jane Doe",
            'email' => "janedoe@email.com",
            'email_verified_at' => Carbon::now()->toDateTimeString(),
            'password' => Hash::make("10203040"),
            'image' => "https://www.shutterstock.com/image-photo/portrait-young-smiling-woman-looking-600w-1865153395.jpg",
            'level' => "user"
        ]);
    }
}
