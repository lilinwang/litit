<?php
class account_model extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	//获取余额
	function getbalance($user_id)
	{
		$sql = "SELECT balance FROM Account where user_id = ?";
		$query = $this->db->query($sql, array($user_id));
		return $query->result_array();
	}

	//购买股票
	function buystock($account_id, $stock_id, $price, $count)
	{
		//插入deal表 type deal类型   0 买入  1 卖出
		$sql = "INSERT INTO deal(account_id, stock_id, time, price, count, type) VALUES(?, ?, now(), ?, ?, 0)";
		$this->db->query($sql, array($user_id, $music_id, $price, $count));

		//更新stockholder
		$sql = "UPDATE stockholder SET count = count + ? where user_id = ? and stock_id = ?";
		$this->db->query($sql, $array($count, $user_id, $stock_id));

		//更新account
		$sql = "UPDATE account SET balance = balance - ? where user_id = ?";
		$this->db->query($sql, $array($price*$count, $user_id));
	}

	//卖出股票
	function sellstock($user_id, $stock_id, $price, $count)
	{
		//更新stockholder
		$sql = "UPDATE stockholder SET count = count - ? where user_id = ? and stock_id = ?";
		$this->db->query($sql, $array($count, $user_id, $stock_id));

		//更新account
		$sql = "UPDATE account SET balance = balance + ? where user_id = ?";
		$this->db->query($sql, $array($price*$count, $user_id));

		//插入deal表 type deal类型   0 买入  1 卖出
		$sql = "INSERT INTO deal(account_id, stock_id, time, price, count, type) VALUES(?, ?, now(), ?, ?, 1)";
		$this->db->query($sql, array($user_id, $music_id, $price, $count));
	}

	//显示用户购买的所有股票
	function displaystock($user_id)
	{
		$sql = "SELECT stockholder.count, musician.name, musician.portaitdir FROM litit.stockholder
				left join stock
				on stock.stock_id = stockholder.stock_id
				left join musician
				on stock.musician_id = musician.musician_id
				where stockholder.user_id = ？";
		$query = $this->db->query($sql, array($user_id));
		return $query->result_array();
	}

	//显示用户帐户信息
	function displayaccount($user_id)
	{
		$sql = "SELECT * FROM account WHERE user_id = ?";
		$query = $this->db->query($sql, array($user_id));
		return $query->result_array();
	}
}
?>