<?php

	namespace App;

	class Connection{

		public static function getDb(){

			try {

				$config  = require(ROOTDIRECTORY . "/../config.php");

				if (!isset($config['host'], $config['dbname'], $config['user'], $config['password'])) {
					throw new \Exception("Incomplete database configuration.");
				}

				$conn = new \PDO(
					"mysql:host={$config['host']};dbname={$config['dbname']};charset=utf8",
					$config['user'],
					$config['password'],
					[
						\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
						\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
						\PDO::ATTR_EMULATE_PREPARES => false,
					]
				);

				return $conn;

			} catch (\PDOException $e) {

				error_log("Database connection error: " . $e->getMessage());
				throw new \Exception("Database connection failed.");

			} catch (\Exception $e) {

				error_log("General error: " . $e->getMessage());
				throw $e;

			}

		}

	}

?>