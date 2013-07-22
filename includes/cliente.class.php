<?php
require ('prolog.class.php');
/*
persona(40220779538'brian','enmanuel','diaz','M','07/02/1992',160,5.8,6).
*/
class Cliente extends Persona
{
	protected $args;
	public function __construct($args)
	{
		parrent::__construct($args);
	}
	public function Argumentos()
	{
		$argumentos = "asserta(cliente(".$this->args['cedula'].",'".$this->args['email']."','".$this->args['contrasena']."'))";
		return $argumentos;
	}
	public function Registrar()
	{
		$prolog = new Prolog("persona.pl",$this->Argumentos());
		return $prolog->Consulta();
	}
}
?>