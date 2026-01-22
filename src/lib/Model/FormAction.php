<?php

declare(strict_types=1);

abstract class FormAction
{
	private string $referrer = '';

	public function __construct()
	{
		if (!isset($_SERVER['REQUEST_METHOD']) || 'POST' !== $_SERVER['REQUEST_METHOD']) {
			http_response_code(405);
			return;
		}

		if (!isset($_POST['_referrer'])) {
			http_response_code(400);
			header("Location: /");
		}

		$this->referrer = $_POST['_referrer'];
	}
	
	protected static function BadRequest(string|array $missing)
	{
		http_response_code(400);
		return json_encode(["Missing" => $missing]);
	}

	protected function Redirect()
	{
		
		header("Location: ". $this->referrer);
	}
}
