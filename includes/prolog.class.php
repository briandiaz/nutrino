<?php
class Prolog
{
	public $archivo;
	public $consulta;
	public function __construct($archivo,$consulta)
	{
		$this->archivo = $archivo;
		$this->consulta = $consulta;
	}
	public function Consulta()
	{
		$cmd = "C:\\PROGRA~1\\swipl\\bin\\swipl.exe -f C:\\xampp\\htdocs\\nutrino\\".$this->archivo." -g ".$this->consulta.",halt";
		exec($cmd,$resultado);
		return $resultado;
	}
}
?>