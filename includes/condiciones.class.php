<?php

require ('cliente.class.php');
class Condiciones extends Cliente 
{
	protected $args;
    public function __construct($args) 
    { 
        parent::__construct($args); 
    }
    public function Argumentos()
    {
		$argumentos = "asserta(condiciones_especiales(".$this->args['cedula'].",'".$this->args['primer_nombre']."','".$this->args['segundo_nombre']."','".$this->args['primer_apellido']."','";
		$argumentos .= $this->args['segundo_apellido']."','".$this->args['sexo']."','".$this->args['fecha_nacimiento']."','";
		$argumentos .= $this->args['peso'].",".$this->args['estatura'].",".$this->args['miembros_familia']."))";
		return $argumentos;
    }
	public function Registrar()
	{
		$prolog = new Prolog("prolog/persona.pl",$this->Argumentos());
		return $prolog->Consulta();
	}
}
$args = array(
	"primer_nombre"=>"brian",
	"segundo_nombre"=>"enmanuel",
	"primer_apellido"=>"diaz"
	);
$cond = new Condiciones($args);
echo $cond->Registrar();
?>