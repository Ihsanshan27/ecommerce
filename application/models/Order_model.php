<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Order_model extends MY_Model
{
	public $table = 'orders';

	public function setTable($table)
	{
		$this->table = $table;
		return $this;
	}
}
