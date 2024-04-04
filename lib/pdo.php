<?php
namespace lib;
defined('EXE') or die('Access');

class PDO {
	private $query;
	private $connection = null;
    private $statement = null;

	private $host;
	private $user;
	private $password;
	private $database;

	public function __construct() {
		$this->host = BD_HOST;
		$this->user = BD_USER;
		$this->password = BD_PASS;
		$this->database = BD_NAME;

		$this->connect();
	}

	private function connect() {
		try {
			$this->connection = new \PDO('mysql:host='.$this->host.';dbname='.$this->database, $this->user, $this->password);
		} catch (\PDOException $e) {
			throw new \PDOException($e->getMessage(), (int)$e->getCode());
		}
	}

	public function prepare($query) {
		$this->statement = $this->connection->prepare($query);
		return $this;
	}

	public function bindValues($values) {
		foreach ($values as $i => $value) {
            $this->statement->bindValue($i+1, $value, \PDO::PARAM_STR);
        }	

		return $this;
	}

	public function execute() {
		$exe = $this->statement->execute();

		if (!$exe) {
			echo $this->statement->errorInfo();
			exit;
		}

		return $this;
	}

	public function fetchAllAssoc() {
		$this->execute();
		return $this->statement->fetchAll(\PDO::FETCH_ASSOC);
	}

	public function fetchAssoc() {
		$this->execute();
		return $this->statement->fetch(\PDO::FETCH_ASSOC);
	}

	public function insertid() {
		return $this->connection->lastInsertId();
	}
}