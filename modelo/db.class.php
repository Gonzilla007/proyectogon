<?php

class database {

 private $conexion;
  
	public function conectar()
	{
		if(!isset($this->conexion))
		{   				//ip,usuario y contraseña
		  $this->conexion = (mysql_connect("localhost","root","")) or die(mysql_error());
			//base de datos
		  mysql_select_db("almacen",$this->conexion) or die(mysql_error());		  
		}
	}	

	public function consulta($sql)
	{
		  $resultado = mysql_query($sql,$this->conexion);
		  if(!$resultado){
			  echo 'MySQL Error: ' . mysql_error();
			  exit;
		  }
  		return $resultado; 
	}
	
	function numero_de_filas($result){
		if(!is_resource($result)) return false;
		return mysql_num_rows($result);
	}
	
	function fetch_assoc($result){
		if(!is_resource($result)) return false;
			return mysql_fetch_assoc($result);
	}
	
     /* METODO PARA CERRAR LA CONEXION A LA BASE DE DATOS */	
	public function disconnect()
	{
		mysql_close();
	}
	
}
?>
