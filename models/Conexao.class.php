<?php
abstract class Conexao
{
	public function __construct(protected $db = null)
	{
		$parametros = "mysql:host=" . $_ENV['DB_HOST'] .  ";dbname=" . $_ENV['DB_NAME'] . ";charset=utf8mb4";

		$this->db = new PDO($parametros, $_ENV['DB_USER'], $_ENV['DB_PASS']);
	}
}
