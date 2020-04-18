<?php

	abstract class Modelo {

		private static $db_host ="localhost";
		private static $db_user = "root";
		private static $db_pass = "";
		private static $db_name = "sakila";

		private $conexion;

		protected $query;
		protected $rows = array();

		# metodos abstractos
		abstract protected function consultar();
		abstract protected function crear();
		abstract protected function editar();
		abstract protected function eliminar();
		abstract protected function listar();	

		# conectar con la bd
		private function abrir_conexion() {
			$this->conexion = 
			new mysqli(self::$db_host, self::$db_user, self::$db_pass, self::$db_name);
		}

		# cerrar conexion con la bd
		private function cerrar_conexion() {
			$this->conexion->close();
		}
		
		# Ejecutar un INSERT, DELETE o UPDATE
		protected function ejecutar_query_simple() {			
			try {

				$this->abrir_conexion();

		        $this->conexion->query($this->query) 
		        or die( mysqli_errno( $this->conexion )." : ".mysqli_error( $this->conexion ).". Query=".$this->query );
				
				$resultado = $this->conexion->affected_rows;
				
				$this->cerrar_conexion();
				
				return $resultado;

		    } catch(Exception $e) {

		        echo "Error! : " . $e->getMessage();
		        
		        return false;

		    }
			
		}
		
		# crear array con lo resultados de una consulta
		protected function obtener_resultados_query() {
			try {

				$this->abrir_conexion();

				$result = $this->conexion->query($this->query) 
				or die( mysqli_errno( $this->conexion )." : ".mysqli_error( $this->conexion )." | Query=".$this->query );

				while ($fila = $result->fetch_assoc()){

					$this->rows[] = array_map('utf8_encode',$fila);

				}

				$result->close();
				$this->cerrar_conexion();

			} catch(Exception $e) {

		        echo "Error! : " . $e->getMessage();
		        
		        return false;

		    }

		}

		# crear array con lo resultados de una consulta
		protected function query_retorna_id() {			
			try {

				$this->abrir_conexion();

		        $this->conexion->query($this->query) 
		        or die( mysqli_errno( $this->conexion )." : ".mysqli_error( $this->conexion ).". Query=".$this->query );
				
				$resultado = $this->conexion->insert_id;
				
				$this->cerrar_conexion();
				
				return $resultado;

		    } catch(Exception $e) {

		        echo "Error! : " . $e->getMessage();
		        
		        return false;

		    }
			
		}
		
	}

?>