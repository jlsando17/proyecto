<?php

class usuario
{
    private $PKNUsuario;
    private $PrimerNombreUsu;
    private $SegundoNombreUsu;
    private $PrimerApellidoUsu;
    private $SegundoApellidoUsu;
    private $DireccionUsu;
    private $TelefonoUsu;
    private $CelularUsu;
    private $EmailUsu;
    private $FechaNacimientoUsu;
    private $PassUsu;
    private $TipoDocumento_idTipoDocumento;
    private $Rol_idRol;
    private $Ciudad_idCiudad;
   


    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}

?>
