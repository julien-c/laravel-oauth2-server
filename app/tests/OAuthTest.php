<?php

use Guzzle\Http\Client;


class OAuthTest extends TestCase
{

	public function testGetTokenFromClientCredentials()
	{
		$client = new Client(Config::get('app.url'));
		
		$request = $client->post('oauth/token', null, array(
			'grant_type' => 'client_credentials'
		))->setAuth('testclient', 'testpass');
		
		$response = $request->send();
		
		$this->assertEquals(200, $response->getStatusCode());
		$this->assertArrayHasKey('access_token', $response->json());
		$this->assertArrayHasKey('token_type', $response->json());
	}
	
	
	public function testGetTokenFromUserCredentials()
	{
		$client = new Client(Config::get('app.url'));
		
		$request = $client->post('oauth/token', null, array(
			'grant_type' => 'password',
			'username' => 'bshaffer',
			'password' => 'brent123',
		))->setAuth('testclient', 'testpass');
		
		$response = $request->send();
		
		$this->assertEquals(200, $response->getStatusCode());
		$this->assertArrayHasKey('access_token', $response->json());
		$this->assertArrayHasKey('token_type', $response->json());
	}

}
