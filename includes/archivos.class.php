<?php
class Archivos{
	protected $args;
	public function __construct($args)
	{
		$this->args = $args;
	}
	public function Crear()
	{
		$nombre_archivos = array(
			0 => "primer_nombre",
			1 => "segundo_nombre",
			2 => "apellido",
			3 => "sexo",
			4 => "fecha_nacimiento",
			5 => "correo",
			6 => "contrasena"
		);
		$i = 0;
		foreach ($this->args as $parametro) {
			$archivo = "C:\\xampp\\htdocs\\nutrino\\archivos\\".$nombre_archivos[$i].".txt";
			$fh = fopen($archivo, 'w') or die("can't open file");
			fwrite($fh, $parametro);
			fclose($fh);
			$i++;
		}
			
	}
}
?>