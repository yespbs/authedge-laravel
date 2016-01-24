<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

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

        Model::unguard();

        // $this->call(UserTableSeeder::class);

        // enable foreign key check
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // confirm
        $users_roles_seed = $this->command->ask('Seed users table [n]o/[y]es? press enter to skip (default no)', 'n');
        
        // check
        if( 'y' == $users_roles_seed ){
            // user
            $this->call('UserTableSeeder');
        }

        $this->command->info('Database seeding complete!');

        // disable foreign key check
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Model::reguard();
    }
}
