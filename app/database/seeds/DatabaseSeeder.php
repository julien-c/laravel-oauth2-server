<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('OAuthClientsSeeder');
		$this->call('OAuthUsersSeeder');
	}

}


class OAuthClientsSeeder extends Seeder
{
	public function run()
	{
		DB::table('oauth_clients')->delete();
		
		DB::table('oauth_clients')->insert(array(
			'client_id' => "testclient",
			'client_secret' => "testpass",
			'redirect_uri' => "http://fake/",
		));
	}
}


class OAuthUsersSeeder extends Seeder
{
	public function run()
	{
		DB::table('oauth_users')->delete();
		
		DB::table('oauth_users')->insert(array(
			'username' => "bshaffer",
			'password' => sha1("brent123"),
			'first_name' => "Brent",
			'last_name' => "Shaffer",
		));
	}
}