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
        //factory(App\Entities\User::class, 10)->create();
        factory(laravelAPI\Entities\Client::class, 10)->create();
        factory(laravelAPI\Entities\Project::class, 10)->create();
        factory(laravelAPI\Entities\ProjectNote::class, 10)->create();
    }
}
