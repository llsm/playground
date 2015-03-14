<?php

namespace App\Models;

/**
 * Description of Base
 *
 * @author LLSM
 */
class Base extends \Nette\Object {
	
	protected $connection;
	
	public function __construct(\DibiConnection $connection) {
		$this->connection = $connection;
	}
}
