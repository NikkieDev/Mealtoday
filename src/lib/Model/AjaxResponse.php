<?php

declare(strict_types=1);

abstract class AjaxResponse
{
	public function __construct()
	{
		header("Content-Type: application/json; charset=utf-8");
	}
}
