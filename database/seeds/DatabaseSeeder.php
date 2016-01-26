<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserTableSeeder::class);

        factory(App\Tag::class, 7)->create();

        factory(\App\UserApi::class)->create();

        factory(App\User::class, 5)->create()->each(function ($user) {

            $n = 5;

            while ($n--) {

                $user->articles()->save(factory(App\Article::class)->make());
            }
        });

    }
}
