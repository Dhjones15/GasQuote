<?php
use PHPUnit\Framework\TestCase;
include('PHPUnit\tests\profile.model.php');

class LoginRegTest extends TestCase
{
	
	## UNIT TESTS on LOGIN and REGISTER##
	##input wrong user bob123
	public function testWrongUser(){
	$user= new ModelUser();
	$return=$user->mdlLogin('login','username','bob123');
	$this->assertSame($return,false);
	}
	
	##correct user bob
	public function testRightUser(){
	$user= new ModelUser();		
	$return=$user->mdlLogin('login','username','bob');
	$this->assertSame($return['username'],'bob');
	}
	##register with user already in database
	public function testregisterUser(){
	$user= new ModelUser();
	$return=$user->mdlRegister('bob','123');
	$this->assertSame($return,'error');
	}
	##add new user to databzse
	public function testregisterNewUser(){
	$user= new ModelUser();
	$return=$user->mdlRegister('bob123','123');
	$this->assertSame($return,'ok');
	}
	##user should now be able to login
	public function testloginNewUser(){
	$user= new ModelUser();
	$return = $user->mdlLogin('login','username','bob123');
	$this->assertSame($return['username'],'bob123');
	}
	
}