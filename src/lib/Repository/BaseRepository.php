<?php

declare(strict_types=1);

abstract class BaseRepository
{
	private readonly string $connectionUrl = "mysql:host=$servername;dbname=$dbName";
	private readonly string $username = "root";
	private readonly string $password = "coffee987";

	private string $tableName = "";
	private PDO $pdo;

	public function __construct(string $tableName)
	{
		$this->tableName = $tableName;
	}

	protected function getConnection(): string
	{
		if (null === $this->pdo) {
			try {
				$this->pdo = new PDO($this->connectionUrl, $this->username, $this->password);
				$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				return $this->pdo;
			} catch (PDOException $e) {
				header(500);
				error_log("Unable to connect to database");
				die();
			}
		}
	}

	protected function getTableName(): string
	{
		return $this->tableName;
	}
}
