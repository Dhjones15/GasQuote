<?php
use PHPUnit\Framework\TestCase;
include('PHPUnit\tests\quote.model.php');
include('PHPUnit\tests\history.model.php');
require_once "connection.php";
class QuoteHistoryTest extends TestCase
{
	
	##UNIT TESTS ON Quote and History Models##
	
	##Check History of User with No history
	public function testNoHistory(){
	$user= new ModelHistory();
	$return=$user->modShowHistory('bob123');
	$this->assertSame($return,[]);
	}
	##Create History for User with No history
	public function testMakeHistory(){
		$user = new ModelQuote();
		$data = array (	"username1" => 'bob123',
 						"gallons_requested" => '12',
						 "delivery_date" => '2021-05-02',
						"suggested_price" => '123', 
					    "total_due" => '4233'
						);
		$return =$user->mdlCreateQuote('bob123',$data);
		
		$this->assertSame($return,'ok');
	}
	##Check if User now has history
	public function testHasHistory(){
	$user= new ModelHistory();
	$return=$user->modShowHistory('bob123');
	foreach($return as $row)
	{
		
	$this->assertSame($row['amount_due'],'4233');
	}
	}
}