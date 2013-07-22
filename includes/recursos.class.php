<?php
class Recursos
{
    protected $website, $prolog;
    public function __construct($website,$prolog)
    {
        $this->website = $website;
        $this->prolog = $prolog;
    }
    public function MostrarProductos()
    {
        $productos = $this->prolog->Consulta();
        $productos_mostrar = array();
        
        for ($i = 0; $i < sizeof($productos) - 1; $i++) 
        {
            $productos[$i]         = str_replace("tipoalimento(", "", $productos[$i]);
            $productos[$i]         = str_replace(").", "", $productos[$i]);
            $productos_mostrar[$i] = array(
                "nombre" => $this->website->Humanize($productos[$i]),
                "url" => "alimentos.php?tipo=" . $productos[$i],
                "foto" => "img/alimentos/" . $productos[$i] . ".png"
            );
        }
        $i  = 0;
        $bgs = array(
            0 => "rcolor",
            1 => "bcolor",
            2 => "gcolor"
        );
        foreach ($productos_mostrar as $producto) 
        {
            $this->website->MostrarCategorias($producto, $bgs[$i]);
            $i++;
            if ($i % 3 == 0)
            {
                $i = 0;
            }
        }
    }
    public function MostrarTipos()
    {

        $productos = $this->prolog->Consulta();
        
        for ($i = 0; $i < sizeof($productos) - 1; $i++) 
        {
            $productos[$i]         = str_replace("tipoalimento(", "", $productos[$i]);
            $productos[$i]         = str_replace(").", "", $productos[$i]);
        }
      return $productos;
    }
    public function ProductosCarousel()
    {
        $productos = $this->prolog->Consulta();
        $productos_mostrar = array();
        
        for ($i = 0; $i < sizeof($productos) - 1; $i++) 
        {
            $productos[$i]         = str_replace("listarproductos(", "", $productos[$i]);
            $productos[$i]         = str_replace(").", "", $productos[$i]);
            $productos_mostrar[$i] = array(
                "titulo" => $this->website->Humanize($productos[$i]),
                "foto" => "img/alimentos/" . $productos[$i] . ".png"
            );
        }
        $i  = 0;
        $bgs = array(
            0 => "rcolor",
            1 => "bcolor",
            2 => "gcolor"
        );
        foreach ($productos_mostrar as $producto) 
        {
            $this->website->ProductosCarousel($producto);
            $i++;
            if ($i % 3 == 0)
            {
                $i = 0;
            }
        }
    }
}
?>