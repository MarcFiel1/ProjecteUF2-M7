<?php

namespace App\Controllers;

use App\Controller;
use App\Registry;
use App\Request;
use App\Session;
use App\Database\Connection;

if (!isset($_SESSION)) {
    session_start();
}

class AdminusuariosController extends Controller
{

    public function __construct(Request $request, Session $session)
    {
        parent::__construct($request, $session);
    }

    public function index()
    {

        return view('adminusuarios');
    }


    public function createUsuario()
    {
        $name = filter_input(INPUT_POST, 'name');
        $username = filter_input(INPUT_POST, 'username');
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        $password2 = filter_input(INPUT_POST, 'password2');
        $role = filter_input(INPUT_POST, 'role');

        //si las dos password son iguales
        //encriptar contraseña
        if ($password == $password2) {

            //si hay algún campo vacío que nos redirija a register
            if (empty($name) || empty($username) || empty($email) || empty($password) || empty($password2) || empty($role)) {
                echo "Te faltan campos por rellenar.";
            } else {

                $hash = password_hash($password, PASSWORD_BCRYPT);
                $sql = "INSERT INTO usuarios(name, username, email, password, rol) VALUES(?,?,?,?,?)";

                $bbdd = Registry::get('database');
                $stmt = $bbdd->query($sql);
                $stmt->execute([$name, $username, $email, $hash, $role]);


                if ($role == 'Alumno') {
                    $sql = "INSERT INTO estudiantes(id_estudiante,codigo_curso) VALUES(?,?)";
                    $bbdd = Registry::get('database');
                    $stmt = $bbdd->query($sql);
                    $stmt->execute([$username, null]);
                }

                if ($role == 'Profesor') {
                    $sql = "INSERT INTO profesores(id_profesor,id_usuario) VALUES(?,?)";
                    $bbdd = Registry::get('database');
                    $stmt = $bbdd->query($sql);

                    $stmt->execute([$username, $username]);
                }
                echo "Usuario Creado.
                    <br>
                    <a href='/adminusuarios'>Volver a Usuarios</a>";
            }
        } else {
            echo "Las contraseñas no coinciden.";
        }
    }

    // public function editUsuario()
    // {
    //     $name_usuario = filter_input(INPUT_POST, 'name_usuario');
    //     $name_rol = filter_input(INPUT_POST, 'name_rol');
    //     if ($name_usuario != null && empty($name_usuario) == false && empty($name_rol) == false) {

    //         $bbdd = Registry::get('database');
    //         $sql = "UPDATE usuarios SET rol='$name_rol' WHERE username='$name_usuario'";
    //         $stmt = $bbdd->query($sql);
    //         $stmt->execute();

    //         echo "Usuario Editado.
    //         <br>
    //         <a href='/adminusuarios'>Volver a Usuarios</a>";
    //     } else {
    //         echo "Falta rellenar el campo.
    //         <br>
    //         <a href='/adminusuarios'>Volver a Usuarios</a>";
    //     }
    // }

    public function eliminarUsuario()
    {
        $name_usuario_eliminar = filter_input(INPUT_POST, 'name_usuario_eliminar');
        if (empty($name_usuario_eliminar) == false) {

            $bbdd = Registry::get('database');
            $sql = "DELETE FROM tareas WHERE user_task='$name_usuario_eliminar';";
            $sql .= "DELETE FROM listas WHERE user_list='$name_usuario_eliminar';";
            $sql .= "DELETE FROM asignaturas WHERE id_profesor='$name_usuario_eliminar';";
            $sql .= "DELETE FROM profesores WHERE id_usuario='$name_usuario_eliminar';";
            $sql .= "DELETE FROM estudiantes WHERE id_estudiante='$name_usuario_eliminar';";
            $sql .= "DELETE FROM usuarios WHERE username='$name_usuario_eliminar';";

            $stmt = $bbdd->query($sql);
            $stmt->execute();
            //acordarse de poner algun return
            echo "Usuario Eliminado.
                    <br>
                    <a href='/adminusuarios'>Volver a Usuarios</a>";
        } else {
            echo "Falta rellenar el campo.
                    <br>
                    <a href='/adminusuarios'>Volver a Usuarios</a>";
        }
    }

    // $bbdd = Registry::get('database');
    //         $sql="DELETE FROM tareas WHERE user_task='$name_usuario_eliminar';";
    //         $sql.="DELETE FROM listas WHERE user_list='$name_usuario_eliminar';";
    //         $sql.="DELETE FROM profesores WHERE id_usuario='$name_usuario_eliminar';";
    //         $sql.= "DELETE FROM estudiantes WHERE id_estudiante='$name_usuario_eliminar';";
    //         $sql.="DELETE FROM usuarios WHERE username='$name_usuario_eliminar';";

    public function asignAlumnosCursos()
    {
        $name_curso = filter_input(INPUT_POST, 'name_curso');
        $name_alumno = filter_input(INPUT_POST, 'name_alumno');
        if ($name_curso != null && empty($name_curso) == false && empty($name_alumno) == false) {

            $bbdd = Registry::get('database');
            $sql = "UPDATE estudiantes SET codigo_curso=? WHERE id_estudiante=?";
            $stmt = $bbdd->query($sql);
            $stmt->execute([$name_curso, $name_alumno]);
            //acordarse de poner algun return
            echo "Asignación Alumno-Curso realizada.
            <br>
            <a href='/adminusuarios'>Volver a Usuarios</a>";
        } else {
            echo "Falta rellenar el campo.
           <br>
           <a href='/adminusuarios'>Volver a Usuarios</a>";
        }
    }

    public function asignProfeAsignatura()
    {
        $name_asignatura = filter_input(INPUT_POST, 'name_asignatura');
        $name_profesor = filter_input(INPUT_POST, 'name_profesor');
        if ($name_asignatura != null && empty($name_asignatura) == false && empty($name_profesor) == false) {

            $bbdd = Registry::get('database');
            $sql = "UPDATE asignaturas SET id_profesor=? WHERE codigo_asignatura=?";
            $stmt = $bbdd->query($sql);
            $stmt->execute([$name_profesor, $name_asignatura]);
            //acordarse de poner algun return
            echo "Asignación Profe-Asignatura realizada.
            <br>
            <a href='/adminusuarios'>Volver a Usuarios</a>";
        } else {
            echo "Falta rellenar el campo.
           <br>
           <a href='/adminusuarios'>Volver a Usuarios</a>";
        }
    }
}
