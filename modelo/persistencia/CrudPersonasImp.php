<?php

    $ruta = $_SERVER["DOCUMENT_ROOT"] . "crudphp/";

    require_once "ICrudBd.php";
    require_once $ruta . "modelo/entidades/Personas.php";
    require_once $ruta . "utilidades/bd/ConexionBdMySQLImp.php";

    class CrudPersonasImp implements ICrudBd{

        public function consultarPorId($documento)
        {
            $sql = "SELECT * FROM persona WHERE documento = '$documento'";

            $conBd = ConexionBDMYSQLImp::getInstance();

            $conBd->conectar();

            $resultado = $conBd->consultar($sql);

            $filas = $resultado ->fetch_all(MYSQLI_BOTH);

            if (count($filas) > 0){

                return $this-> cargarUsuario($filas[0]);
            }else{
                throw new Exception("El usuarios con CC: $documento No existe");
            }
        }

        public function consultarTodo()
        {
            $sql = "SELECT * FROM  persona";
            $conBd = ConexionBDMYSQLImp::getInstance();
            $conBd->conectar();

            $resultado = $conBd->consultar($sql);
            $filas = $resultado ->fetch_all(MYSQLI_BOTH);

            $lista_usuarios = array();

            if($resultado->num_rows > 0){

                foreach($filas as $i => $fila){

                    $u = $this->cargarUsuario($fila);
                    $lista_usuarios[] = $u;
                }
            }

            if(count($lista_usuarios) > 0){
                return $lista_usuarios;

            }else{
                throw new Exception("No existen Usuarios en el sistema");
            }

        }


        public function insertar ($usuario)
        {
            $sql = "INSERT INTO persona VALUE ('" . $usuario->getHuella() ."'
            ,'" . $usuario->getDocumento() . "'
            ,'" . $usuario->getNombres() . "'
            ,'" . $usuario->getApellidos() . "'
            ,'" . $usuario->getEmail() . "')";

            $conBd = ConexionBDMYSQLImp::getInstance();
            $conBd->conectar();

            $conBd->transaccion($sql);
        }

        public function eliminarPorId($documento)
        {
            $sql = "DELETE FROM persona WHERE documento = '$documento'";

            $conBd = ConexionBDMYSQLImp::getInstance();
            $conBd->conectar();

            $conBd->transaccion($sql);
        }

        public function modificar ($objeto)
        {
            
            $sql = "UPDATE persona SET nombres = '" .$objeto->getNombres() ."',
            apellidos = '" .$objeto->getApellidos() ."',
            email = '" .$objeto->getEmail() . "' WHERE documento = '" .$objeto->getDocumento ."'";

            $conBd = ConexionBDMYSQLImp::getInstance();
            $conBd->conectar();

            $conBd->transaccion($sql);
        }

        public function contar()
        {
            $sql = "SELECT count(documento) as total FROM persona";

            $conBd = ConexionBDMYSQLImp::getInstance();
            $conBd ->conectar;

            $resultado = $conBd->consultar($sql);
            $filas = $resultado->fetch_all(MYSQLI_BOTH);
            
            if(count($filas) > 0){
                return $filas[0]['total'];
            }else{
                throw new Exception("Consulta Vacia");
            }
        }

        public function cargarUsuario($fila){

            $u = new Personas($fila[0], documento: $fila[1],nombres: $fila["nombre"],apellidos: $fila["apellidos"], email: $fila["email"]);
            
            return $u;
        }
    }

?>