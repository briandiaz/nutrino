<?php

require('includes/prolog.class.php');
class Sesion{
	protected $email;
	protected $contrasena;
	public function __construct($email,$contrasena)
	{
		$this->email = $email;
		$this->contrasena = $contrasena;
	}
	public function Verificar()
	{
		$prolog = new Prolog("archivos/usuarios.pl","verificar('".$this->email."','".$this->contrasena."')");
		$ar = $prolog->Consulta();
		$verificado = "false";
		foreach ($ar as $arito) {
			if(strcmp($arito, "true") == 0){
				$verificado = "true";
				break;
			}
		}
		return $verificado;
	}
}
?>