<?php

require_once "db.class.php";

class Usuario extends database {

function consultar($usuario=NULL)
	{
		//conexion a la base de datos
		$this->conectar();		
		$query = $this->consulta("SELECT * FROM usuario WHERE usuario='$usuario' or id_usuario='$usuario';");
 	    $this->disconnect();					
		if($this->numero_de_filas($query) > 0) // existe -> datos correctos
		{		
				//se llenan los datos en un array
				while ( $tsArray = $this->fetch_assoc($query) ) 
					$data[] = $tsArray;			
		
				return $data;
		}else
		{	
			return '';
		}			
	}
		function registar($usuario=NULL,$clave=NULL)
	{
		//conexion a la base de datos
		$this->conectar();		
		$query = $this->consulta("insert into usuario (usuario,clave)values ('$usuario','$clave');");
 	    $this->disconnect();					
					
	}
	function modificar($usuario=NULL,$clave=NULL,$id_usuario=NULL)
	{
		//conexion a la base de datos
		$this->conectar();		
		$query = $this->consulta("update usuario set usuario='$usuario',clave='$clave' where id_usuario='$id_usuario';");
 	    $this->disconnect();					
					
	}
function eliminar($id_usuario=NULL)
	{
		//conexion a la base de datos
		$this->conectar();		
		$query = $this->consulta("delete from usuario  where id_usuario='$id_usuario';");
 	    $this->disconnect();					
					
	}
	function getLogin($usuario=NULL,$clave=NULL)
	{
		//conexion a la base de datos
		$this->conectar();		
		$query = $this->consulta("SELECT clave FROM usuario WHERE usuario='$usuario' limit 1;");
 	    $this->disconnect();					
		if($this->numero_de_filas($query) > 0) // existe -> datos correctos
		{		
				//se llenan los datos en un array
				while ( $tsArray = $this->fetch_assoc($query) ) {
					$data[] = $tsArray;	
					if ($tsArray['clave']!=$clave) {
							return '';
							}		
					}

				return $data;
		}else
		{	
			return '';
		}			
	}
	
}

?>