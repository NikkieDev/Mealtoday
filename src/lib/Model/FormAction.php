<?php

declare(strict_types=1);

abstract class FormAction
{
	public function __construct()
	{
		if (!isset($_SERVER['REQUEST_METHOD']) || 'POST' !== $_SERVER['REQUEST_METHOD']) {
			http_response_code(405);
			return;
		}
	}
}
