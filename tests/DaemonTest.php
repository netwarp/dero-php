<?php

use PHPUnit\Framework\TestCase;
use DeroPHP\Daemon;


final class DaemonTest extends TestCase 
{
	public function testGetblockcount() 
	{
	    $gate = $this->createMock('Daemon');
	    dd($gate);
	}
}