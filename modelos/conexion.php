<?php

class Conexion{

	static public function conectar(){

		// Información de la conexión a la base de datos PostgreSQL

		// $link = new PDO(
		// 	"pgsql:host=localhost;dbname=banco_dictador",

		// 	"postgres",

		// 	"2730."
		// );

		$link = new PDO(
			"pgsql:host=localhost;dbname=banco_dictador;options='--search_path=banco'",
			"postgres",
			"2730."
		);

		$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		return $link;

	}

}




