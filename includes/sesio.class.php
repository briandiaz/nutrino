<?php

class Sesion{
	protected $email;
	protected $contrasena;
	public function __construct($email,$contrasena)
	{
		$this->email = $email;
		$this->contrasena = contrasena;
	}
	public function Verificar()
	{
		$prolog = new Prolog("clientes.pl","cliente(_,".$this->email.",".$this->contrasena.")");
		$ar = $prolog->Consulta();
		$verificado = "false";
		foreach ($ar as $arito) {
			if(strcmp($arito, "true")){
				$verificado = "true";
				break;
			}
		}
		return $verificado;
	}
}
?>