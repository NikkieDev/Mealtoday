<?php

declare(strict_types=1);

abstract class BaseRepository
{
	private string $servername = 'mealtoday-db';
	private string $dbName = 'mealie_dev';
	private string $connectionUrl;
	private string $username = "root";
	private string $password = "coffee987";

	private string $tableName = "";
	private ?PDO $pdo = null;

	public function __construct(string $tableName)
	{
		$this->tableName = $tableName;
		$this->connectionUrl = "mysql:host=".$this->servername.";dbname=".$this->dbName;
	}

	protected function getConnection(): ?PDO
	{
		if (null === $this->pdo) {
			try {
				$this->pdo = new PDO($this->connectionUrl, $this->username, $this->password);
				$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				return $this->pdo;
			} catch (PDOException $e) {
				echo $e->getMessage();
				http_response_code(500);
				error_log("Unable to connect to database");
				return null;
			}
		}

		return $this->pdo;
	}

	protected function getTableName(): string
	{
		return $this->tableName;
	}
}
