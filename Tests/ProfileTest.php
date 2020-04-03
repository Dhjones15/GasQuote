<?php
use PHPUnit\Framework\TestCase;
include('PHPUnit\tests\profile.model.php');

class ProfileTest extends TestCase
{
	## UNIT TESTS on CreateUser##
	##Add Client info for nonexistant username
	public function testMissingClientInfo(){
	$user= new ModelUser();
	$data=  array(
 						"username" => 'bob404',
 						"client_name" => 'bob billy',
						 "address1" => '404 lane',
						"address2" => '', 
					    "city" => 'Houston',
						"state" => 'TX',
						"zip" => '77777',
						);
	$response= $user->mdlCreateUser('client_info',$data);
	$this->assertSame($response,'error');
	}
	##Add Client info for User with preexisting client info
	public function testPresetClientInfo(){
	$user= new ModelUser();
	$data=  array(
 						"username" => 'bob',
 						"client_name" => 'bob billy',
						 "address1" => '404 lane',
						"address2" => '', 
					    "city" => 'Houston',
						"state" => 'TX',
						"zip" => '77777',
						);
	$response= $user->mdlCreateUser('client_info',$data);
	$this->assertSame($response,'error');
	}
	
	##Add Client info as intended to new client without info.
	public function testCorrectClientInfo(){
	$user= new ModelUser();
	$data=  array(
 						"username" => 'bob123',
 						"client_name" => 'bob billy',
						 "address1" => '404 lane',
						"address2" => '', 
					    "city" => 'Houston',
						"state" => 'TX',
						"zip" => '77777',
						);
	$response= $user->mdlCreateUser('client_info',$data);
	$this->assertSame($response,'ok');
	}
	
	##UNIT TESTS ON ShowUsers ##
	
	##Show client info on User with Client info.
	public function testGetClientInfo(){
	$user= new ModelUser();
	$response= $user->modShowUsers('bob');
	$this->assertSame($response['client_name'],'bob mike');
	}
	##Show client info on User with no client info.
	public function testGetWrongClientInfo(){
	$user= new ModelUser();
	$response= $user->modShowUsers('sally');
	$this->assertSame($response,false);
	}
	
}
