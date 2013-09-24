<?php
class stock_model extends CI_Model{
    function __construct(){
  		parent::__construct();
  	}

	//首页右侧 所有股票最新价格
	function stock_price()
	{
		$sql = "SELECT stockprice_5min.price, stock.stock_id, stock.count, musician.name, musician.portaitdir FROM stockprice_5min 
				LEFT JOIN stock 
				ON stockprice_5min.stock_id = stock.stock_id
				LEFT JOIN musician 
				ON stock.musician_id = musician.musician_id";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	//走势图价格
	function stockchart_by_stockid($stock_id)
	{
		$sql = "SELECT stockprice_day.price, musician.name, musician.portaitdir FROM stockprice_day 
				LEFT JOIN stock
				ON stockprice_day.stock_id = stock.stock_id
				lEFT JOIN musician
				ON stock.musician_id = musician.musician_id
				WHERE stock.stock_id=?";
		$query = $this->db->query($sql, array($stock_id));
		return $query->result_array();
	}

	//查找股票持股数前三的用户
	function find_top3_stockholder($stock_id)
	{
		$sql = "SELECT  DISTINCT stockholder.count, user.name
				FROM    stockholder
				left join user
				on user.user_id=stockholder.user_id
				WHERE   stock_id = ?
				ORDER BY count desc
				LIMIT 3";
		$query = $this->db->query($sql, array($stock_id));
		return $query->result_array();
	}
}
?>