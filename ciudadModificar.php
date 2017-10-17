<?php
require_once 'ciudad.entidad.php';
require_once 'ciudad.modelo.php';

// Logica
$alm = new ciudad();
$model = new ciudadModelo();

if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {
        case 'actualizar':
            $alm->__SET('idCiudad',              $_REQUEST['idCiudad']);
            $alm->__SET('NombreCiudad',          $_REQUEST['NombreCiudad']);


            $model->Actualizar($alm);
            header('Location: ciudadModificar.php');
            break;

        case 'registrar':
            $alm->__SET('idCiudad',              $_REQUEST['idCiudad']);
            $alm->__SET('NombreCiudad',          $_REQUEST['NombreCiudad']);
            
            

            $model->Registrar($alm);
            header('Location: mensaje1.php');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['idCiudad']);
            header('Location: mensaje3.php');
            break;

        case 'editar':
            $alm = $model->Obtener($_REQUEST['idCiudad']);
            break;
    }
}

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Anexsoft</title>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
    </head>
    <body >

        <div class="pure-g">
            <div class="pure-u-1-12">
                
                <form action="?action=<?php echo $alm->idCiudad > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" >
                    <input type="hidden" name="idCiudad" value="<?php echo $alm->__GET('idCiudad'); ?>" />
                    
                    <table >
                        <tr>
                            <th >Cod Ciudad</th>
                            <td><input type="text" name="idCiudad" value="<?php echo $alm->__GET('idCiudad'); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >Nombre</th>
                            <td><input type="text" name="NombreCiudad" value="<?php echo $alm->__GET('NombreCiudad'); ?>"  /></td>
                        </tr>

                        
                        <tr>
                            <td colspan="2">
                                <button type="submit" class="pure-button pure-button-primary">Guardar</button>
                            </td>
                        </tr>
                    </table>
                </form>

                <table class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
                            <th >Cod Ciudad</th>
                            <th >Nombre</th>
                            
                            <th ></th>
                            
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('idCiudad'); ?></td>
                            <td><?php echo $r->__GET('NombreCiudad'); ?></td>
                            <td>
                                <a href="?action=editar&idCiudad=<?php echo $r->idCiudad; ?>">Editar</a>
                            </td>
                            <td>
                                <a href="?action=eliminar&idCiudad=<?php echo $r->idCiudad; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              
            </div>
        </div>

    </body>
</html>