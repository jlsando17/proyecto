<?php

class ciudadModelo
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

            $stm = $this->pdo->prepare("SELECT * FROM ciudad");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new ciudad();

                $alm->__SET('idCiudad', $r->idCiudad);
                $alm->__SET('NombreCiudad', $r->NombreCiudad);

               
                $result[] = $alm;
            }

            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Obtener($idCiudad)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("SELECT * FROM ciudad WHERE idCiudad = ?");
                      

            $stm->execute(array($idCiudad));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $alm = new ciudad();

                $alm->__SET('idCiudad', $r->idCiudad);
                $alm->__SET('NombreCiudad', $r->NombreCiudad);


            return $alm;
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Eliminar($idCiudad)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("DELETE FROM ciudad WHERE idCiudad = ?");                      

            $stm->execute(array($idCiudad));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Actualizar(ciudad $data)
    {
        try 
        {
            $sql = "UPDATE ciudad SET 
                        
                        NombreCiudad           = ?
  
                        
                    WHERE idCiudad = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
                    
                    $data->__GET('NombreCiudad'), 

                    $data->__GET('idCiudad')
                    )
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Registrar(ciudad $data)
    {
        try 
        {
        $sql = "INSERT INTO ciudad (idCiudad, NombreCiudad)
                VALUES (?, ?)";

        $this->pdo->prepare($sql)
             ->execute(
            array(
                $data->__GET('idCiudad'), 
				$data->__GET('NombreCiudad'), 

                )
            );
			
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
}

?>