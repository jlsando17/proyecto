<?php
require_once 'usuario.entidad.php';
require_once 'usuario.modelo.php';

// Logica
$alm = new usuario();
$model = new usuarioModelo();

if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {
        case 'actualizar':
            $alm->__SET('PKNUsuario',              $_REQUEST['PKNUsuario']);
            $alm->__SET('PrimerNombreUsu',          $_REQUEST['PrimerNombreUsu']);
            $alm->__SET('SegundoNombreUsu',        $_REQUEST['SegundoNombreUsu']);
            $alm->__SET('PrimerApellidoUsu',            $_REQUEST['PrimerApellidoUsu']);
            $alm->__SET('SegundoApellidoUsu', $_REQUEST['SegundoApellidoUsu']);
            $alm->__SET('DireccionUsu', $_REQUEST['DireccionUsu']);
            $alm->__SET('TelefonoUsu',        $_REQUEST['TelefonoUsu']);
            $alm->__SET('CelularUsu',            $_REQUEST['CelularUsu']);
            $alm->__SET('EmailUsu', $_REQUEST['EmailUsu']);
            $alm->__SET('FechaNacimientoUsu', $_REQUEST['FechaNacimientoUsu']);
            $alm->__SET('PassUsu',        $_REQUEST['PassUsu']);
            $alm->__SET('TipoDocumento_idTipoDocumento',            $_REQUEST['TipoDocumento_idTipoDocumento']);
            $alm->__SET('Rol_idRol', $_REQUEST['Rol_idRol']);
            $alm->__SET('Ciudad_idCiudad', $_REQUEST['Ciudad_idCiudad']);

            $model->Actualizar($alm);
            header('Location: modificar.php');
            break;

        case 'registrar':
            $alm->__SET('PKNUsuario',              $_REQUEST['PKNUsuario']);
            $alm->__SET('PrimerNombreUsu',          $_REQUEST['PrimerNombreUsu']);
            $alm->__SET('SegundoNombreUsu',        $_REQUEST['SegundoNombreUsu']);
            $alm->__SET('PrimerApellidoUsu',            $_REQUEST['PrimerApellidoUsu']);
            $alm->__SET('SegundoApellidoUsu',           $_REQUEST['SegundoApellidoUsu']);
            $alm->__SET('DireccionUsu',                 $_REQUEST['DireccionUsu']);
            $alm->__SET('TelefonoUsu',                   $_REQUEST['TelefonoUsu']);
            $alm->__SET('CelularUsu',                   $_REQUEST['CelularUsu']);
            $alm->__SET('EmailUsu',                     $_REQUEST['EmailUsu']);
            $alm->__SET('FechaNacimientoUsu',          $_REQUEST['FechaNacimientoUsu']);
            $alm->__SET('PassUsu',                      $_REQUEST['PassUsu']);
            $alm->__SET('TipoDocumento_idTipoDocumento',            $_REQUEST['TipoDocumento_idTipoDocumento']);
            $alm->__SET('Rol_idRol',                         $_REQUEST['Rol_idRol']);
            $alm->__SET('Ciudad_idCiudad',                   $_REQUEST['Ciudad_idCiudad']);
            

            $model->Registrar($alm);
            header('Location: mensaje1.php');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['PKNUsuario']);
            header('Location: mensaje3.php');
            break;

        case 'editar':
            $alm = $model->Obtener($_REQUEST['PKNUsuario']);
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
                
                <form action="?action=<?php echo $alm->PKNUsuario > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" >
                    <input type="hidden" name="PKNUsuario" value="<?php echo $alm->__GET('PKNUsuario'); ?>" />
                    
                    <table >
                        <tr>
                            <th >Identificacion</th>
                            <td><input type="text" name="PKNUsuario" value="<?php echo $alm->__GET('PKNUsuario'); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >Nombre1</th>
                            <td><input type="text" name="PrimerNombreUsu" value="<?php echo $alm->__GET('PrimerNombreUsu'); ?>"  /></td>
                        </tr>

                        <tr>
                            <th >Nombre2</th>
                            <td><input type="text" name="SegundoNombreUsu" value="<?php echo $alm->__GET('SegundoNombreUsu'); ?>"  /></td>
                        </tr>
                                                <tr>
                            <th >Apellido1</th>
                            <td><input type="text" name="PrimerApellidoUsu" value="<?php echo $alm->__GET('PrimerApellidoUsu'); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >Apellido2</th>
                            <td><input type="text" name="SegundoApellidoUsu" value="<?php echo $alm->__GET('SegundoApellidoUsu'); ?>"  /></td>
                        </tr>

                        <tr>
                            <th >Direccion</th>
                            <td><input type="text" name="DireccionUsu" value="<?php echo $alm->__GET('DireccionUsu'); ?>"  /></td>
                        </tr>
                        <th >Telefono</th>
                            <td><input type="text" name="TelefonoUsu" value="<?php echo $alm->__GET('TelefonoUsu'); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >Celular</th>
                            <td><input type="text" name="CelularUsu" value="<?php echo $alm->__GET('CelularUsu'); ?>"  /></td>
                        </tr>

                        <tr>
                            <th >Email</th>
                            <td><input type="text" name="EmailUsu" value="<?php echo $alm->__GET('EmailUsu'); ?>"  /></td>

                           </tr>
                        <tr>
                            <th >Fecha de nacimiento</th>
                            <td><input type="text" name="FechaNacimientoUsu" value="<?php echo $alm->__GET('FechaNacimientoUsu'); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >Password</th>
                            <td><input type="text" name="PassUsu" value="<?php echo $alm->__GET('PassUsu'); ?>"  /></td>
                        </tr>

                        <tr>
                            <th >Tipo de documento</th>
                            <td><input type="text" name="TipoDocumento_idTipoDocumento" value="<?php echo $alm->__GET('TipoDocumento_idTipoDocumento'); ?>"  /></td>
                        </tr>
                        <tr>
                         <th >Rol</th>
                            <td><input type="text" name="Rol_idRol" value="<?php echo $alm->__GET('Rol_idRol'); ?>"  /></td>
                        </tr>

                        <tr>
                            <th >Cod Ciudad</th>
                            <td><input type="text" name="Ciudad_idCiudad" value="<?php echo $alm->__GET('Ciudad_idCiudad'); ?>"  /></td>
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
                            <th >Identificacion</th>
                            <th >Nombre1</th>
                            <th >Nombre2</th>
                            <th >Apellido1</th>
                            <th >Apellido2</th>
                            <th >Direccion</th>
                            <th >Telefono</th>
                            <th >Celular</th>
                            <th >Email</th>
                            <th >Fecha de nacimiento</th>
                            <th >Password</th>
                            <th >Tipo de documento</th>
                            <th >Rol</th>
                            <th > Cod Ciudad</th>
                            <th ></th>
                            
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('PKNUsuario'); ?></td>
                            <td><?php echo $r->__GET('PrimerNombreUsu'); ?></td>
                            <td><?php echo $r->__GET('SegundoNombreUsu'); ?></td>
                            <td><?php echo $r->__GET('PrimerApellidoUsu'); ?></td>
                            <td><?php echo $r->__GET('SegundoApellidoUsu'); ?></td>
                            <td><?php echo $r->__GET('DireccionUsu'); ?></td>
                            <td><?php echo $r->__GET('TelefonoUsu'); ?></td>
                            <td><?php echo $r->__GET('CelularUsu'); ?></td>
                            <td><?php echo $r->__GET('EmailUsu'); ?></td>
                            <td><?php echo $r->__GET('FechaNacimientoUsu'); ?></td>
                            <td><?php echo $r->__GET('PassUsu'); ?></td>
                            <td><?php echo $r->__GET('TipoDocumento_idTipoDocumento'); ?></td>                           
                            <td><?php echo $r->__GET('Rol_idRol'); ?></td>
                            <td><?php echo $r->__GET('Ciudad_idCiudad'); ?></td>                  
                            <td>
                                <a href="?action=editar&PKNUsuario=<?php echo $r->PKNUsuario; ?>">Editar</a>
                            </td>
                            <td>
                                <a href="?action=eliminar&PKNUsuario=<?php echo $r->PKNUsuario; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              
            </div>
        </div>

    </body>
</html>