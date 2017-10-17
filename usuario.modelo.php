<?php

class usuarioModelo
{
    private $pdo;

    public function __CONSTRUCT()
    {
        try
        {
            $this->pdo = new PDO('mysql:host=localhost;dbname=pvpv_final', 'root', '');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);                
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Listar()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM usuario");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new usuario();

                $alm->__SET('PKNUsuario', $r->PKNUsuario);
                $alm->__SET('PrimerNombreUsu', $r->PrimerNombreUsu);
                $alm->__SET('SegundoNombreUsu', $r->SegundoNombreUsu);
                $alm->__SET('PrimerApellidoUsu', $r->PrimerApellidoUsu);
                $alm->__SET('SegundoApellidoUsu', $r->SegundoApellidoUsu);
                $alm->__SET('DireccionUsu', $r->DireccionUsu);
                $alm->__SET('TelefonoUsu', $r->TelefonoUsu);
                $alm->__SET('CelularUsu', $r->CelularUsu);
                $alm->__SET('EmailUsu', $r->EmailUsu);
                $alm->__SET('FechaNacimientoUsu', $r->FechaNacimientoUsu);
                $alm->__SET('PassUsu', $r->PassUsu);
                $alm->__SET('TipoDocumento_idTipoDocumento', $r->TipoDocumento_idTipoDocumento);
                $alm->__SET('Rol_idRol', $r->Rol_idRol);
                $alm->__SET('Ciudad_idCiudad', $r->Ciudad_idCiudad);
               
                $result[] = $alm;
            }

            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Obtener($PKNUsuario)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("SELECT * FROM usuario WHERE PKNUsuario = ?");
                      

            $stm->execute(array($PKNUsuario));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $alm = new usuario();

                $alm->__SET('PKNUsuario', $r->PKNUsuario);
                $alm->__SET('PrimerNombreUsu', $r->PrimerNombreUsu);
                $alm->__SET('SegundoNombreUsu', $r->SegundoNombreUsu);
                $alm->__SET('PrimerApellidoUsu', $r->PrimerApellidoUsu);
                $alm->__SET('SegundoApellidoUsu', $r->SegundoApellidoUsu);
                $alm->__SET('DireccionUsu', $r->DireccionUsu);
                $alm->__SET('TelefonoUsu', $r->TelefonoUsu);
                $alm->__SET('CelularUsu', $r->CelularUsu);
                $alm->__SET('EmailUsu', $r->EmailUsu);
                $alm->__SET('FechaNacimientoUsu', $r->FechaNacimientoUsu);
                $alm->__SET('PassUsu', $r->PassUsu);
                $alm->__SET('TipoDocumento_idTipoDocumento', $r->TipoDocumento_idTipoDocumento);
                $alm->__SET('Rol_idRol', $r->Rol_idRol);
                $alm->__SET('Ciudad_idCiudad', $r->Ciudad_idCiudad);

            return $alm;
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Eliminar($PKNUsuario)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("DELETE FROM usuario WHERE PKNUsuario = ?");                      

            $stm->execute(array($PKNUsuario));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Actualizar(usuario $data)
    {
        try 
        {
            $sql = "UPDATE usuario SET 
                        
                        PrimerNombreUsu           = ?,
                        SegundoNombreUsu            = ?, 
                        PrimerApellidoUsu            = ?,
                        SegundoApellidoUsu          = ?,
                        DireccionUsu               = ?, 
                        TelefonoUsu                = ?,
                        CelularUsu                = ?,
                        EmailUsu                 = ?,
                        FechaNacimientoUsu           = ?, 
                        PassUsu                        = ?,
                        TipoDocumento_idTipoDocumento      = ?,
                        Rol_idRol                       = ?,
                        Ciudad_idCiudad                 = ?
                        
                    WHERE PKNUsuario = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
                    
                    $data->__GET('PrimerNombreUsu'), 
                    $data->__GET('SegundoNombreUsu'),
                    $data->__GET('PrimerApellidoUsu'),
                    $data->__GET('SegundoApellidoUsu'),
                    $data->__GET('DireccionUsu'),
                    $data->__GET('TelefonoUsu'),
                    $data->__GET('CelularUsu'),
                    $data->__GET('EmailUsu'),
                    $data->__GET('FechaNacimientoUsu'),
                    $data->__GET('PassUsu'),
                    $data->__GET('TipoDocumento_idTipoDocumento'),
                    $data->__GET('Rol_idRol'),
                    $data->__GET('Ciudad_idCiudad'),
                    $data->__GET('PKNUsuario')
                    )
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Registrar(usuario $data)
    {
        try 
        {
        $sql = "INSERT INTO usuario (PKNUsuario, PrimerNombreUsu,SegundoNombreUsu,PrimerApellidoUsu,SegundoApellidoUsu,DireccionUsu,TelefonoUsu,CelularUsu,EmailUsu,FechaNacimientoUsu,PassUsu,TipoDocumento_idTipoDocumento,Rol_idRol,Ciudad_idCiudad) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $this->pdo->prepare($sql)
             ->execute(
            array(
                $data->__GET('PKNUsuario'), 
				$data->__GET('PrimerNombreUsu'), 
                $data->__GET('SegundoNombreUsu'), 
                $data->__GET('PrimerApellidoUsu'),
                $data->__GET('SegundoApellidoUsu'),
                $data->__GET('DireccionUsu'),
                $data->__GET('TelefonoUsu'), 
                $data->__GET('CelularUsu'),
                $data->__GET('EmailUsu'),
                $data->__GET('FechaNacimientoUsu'),
                $data->__GET('PassUsu'), 
                $data->__GET('TipoDocumento_idTipoDocumento'),
                $data->__GET('Rol_idRol'),
                $data->__GET('Ciudad_idCiudad'),
                )
            );
			
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
}

?>