<?php
/**
 *
 * Copyright  FaShop
 * License    http://www.fashop.cn
 * link       http://www.fashop.cn
 * Created by FaShop.
 * User: hanwenbo
 * Date: 2018/1/6
 * Time: 下午8:34
 *
 */

namespace App\Biz\Pay\Notice\Alipay;

use EasySwoole\Pay;
use App\Biz\Pay\Notice\NoticeInterface;

abstract class Notice implements NoticeInterface
{
	protected $data;
	protected $config = [];
	protected $pay;
	protected $order;

	public function __construct( array $config )
	{
		$this->config = $config;
		$this->pay = Pay::alipay( $this->config );
	}

	abstract public function check() : bool;

	abstract public function handle() : bool;

	 public function setData( $data )
	{
		$this->data = $data;
	}

	final public function getConfig() : array
	{
		return $this->config;
	}

	final public function getData()
	{
		return $this->data;
	}
}