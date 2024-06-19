<?php
abstract class Conexao
{
	protected $db;
	public function __construct()
	{
		$parametros = "mysql:host=" . $_ENV['DB_HOST']  . ";port=" . $_ENV['DB_PORT'] . ";dbname=" . $_ENV['DB_NAME'] . ";charset=utf8mb4";

		$this->db = new PDO($parametros, $_ENV['DB_USER'], $_ENV['DB_PASS']);
	}
}
