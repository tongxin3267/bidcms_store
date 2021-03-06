<?php
/*
	[Bidcms.com!] (C)2009-2011 Bidcms.com.
	This is NOT a freeware, use is subject to license terms
	$author limengqi
	$Id: userclass.php 2016-03-24 10:42 $
*/
if(!defined('IN_BIDCMS')) {
	exit('Access Denied');
}
class customer_rank_class extends model
{
	public $table='customer_rank';
	public $prefix='http://shop.bidcms.com/wxapp/index.php';
	public $definition=array(
		'primary'=>'id',
		'join'=>'shop_id'
	);
	public function get_cache_shop_id($shop_id){
		global $cache;
		$key='rank:customer:shop:'.$shop_id;
		$list=$cache->get($key);
		if(empty($list)){
			$list=$this->get_page(array('and shop_id=:sid',array(':sid'=>$shop_id)),array('index'=>'id'));
			$cache->set($key,$list);
		}
		return $list;
	}
}
