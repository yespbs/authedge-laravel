<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {

	public function run()
	{
		// confirm
		$truncate = $this->command->ask('Truncate users table (y/n)? enter to skip.', 'n');
		
		// check
		if( 'y' == $truncate ){
		// truncate
			\AuthEdge\User::truncate();

			// message
			$this->command->info('Users table truncated!');
		}

		try{
			// create
			$user = \AuthEdge\User::create([  
				'name' => 'Administrator',
	            'email' => 'admin@sologicsolutions.com',
	            'password' => bcrypt('123456')
	        ]);
	       
		}catch (Exception $e){
			\Log::debug( $e->getMessage(), ['context'=>'UserTableSeeder'] );
		}
	}

}
