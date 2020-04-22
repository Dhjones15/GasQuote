<?php
use PHPUnit\Framework\TestCase;
include('PHPUnit\tests\quote.controller.php');
include('PHPUnit\tests\profile.controller.php');
include('PHPUnit\tests\profile.model.php');
include('PHPUnit\tests\history.controller.php');
include('PHPUnit\tests\history.model.php');



//require_once "connection.php";
class PricingTests extends TestCase
{
	
	##UNIT TESTS ON Pricing Module##
	##Check Pricing for User with: IN_State,WithHistory,>1000gallons,InSummer
	public function testFirstOptionPricing(){
	$_SESSION = array (	"username" => 'Op1');
	$_POST= array('newGallonRequested'=>'1000',
				'newDeliveryDate'=> new DateTime('June 21 2020'));
				
	$user= new ControllerQuote();
	$return=$user->ctrGetPricing();
	$this->assertSame($return,1.755);
	}
	
	##Check Pricing for User with:Out_State,NoHistory, <1000Gallons,NotSummer
	public function testSecondtOptionPricing(){
	$_SESSION = array (	"username" => 'Op2');
	$_POST= array('newGallonRequested'=>'99',
				'newDeliveryDate'=> '2020-01-15');
				
	$user= new ControllerQuote();
	$return=$user->ctrGetPricing();
	$this->assertSame($return,1.8);
	}
	
	
}