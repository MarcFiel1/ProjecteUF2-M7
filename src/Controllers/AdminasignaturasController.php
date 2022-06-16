<?php

    namespace App\Controllers;

    use App\Controller;
    use App\Registry;
    use App\Request;
    use App\Session;
    use App\Database\Connection;

    if(!isset($_SESSION)){session_start();} 

class AdminasignaturasController extends Controller {

    public function __construct(Request $request,Session $session){
        parent::__construct($request,$session);
    } 
    
    public function index()
    {

        return view('adminasignaturas');
    }


    public function createAsignatura(){
        $name_asignatura= filter_input(INPUT_POST,'name_asignatura');
        $name_curso= filter_input(INPUT_POST,'name_curso');
        $name_profesor= filter_input(INPUT_POST,'name_profesor');
        if (empty($name_asignatura)==false){

            $bbdd=Registry::get('database');
            $sql="INSERT INTO asignaturas(nombre_asignatura,codigo_curso,id_profesor) VALUES(?,?,?)";
            $stmt = $bbdd->query($sql);
            $stmt->execute([$name_asignatura,$name_curso,$name_profesor]);
            //acordarse de poner algun return
            echo "Asignatura Creada.
            <br>
            <a href='/adminasignaturas'>Volver a Asignaturas</a>";

        } else {
            echo "Falta rellenar el campo.
            <br>
            <a href='/adminasignaturas'>Volver a Asignaturas</a>";
        }
        

    }

    public function editAsignatura(){
        $name_asignatura= filter_input(INPUT_POST,'name_asignatura');
        $name_asignaturaModificado = filter_input(INPUT_POST, 'name_asignaturaModificado');
        $name_curso= filter_input(INPUT_POST,'name_curso');
        if ($name_asignatura!= null && empty($name_asignatura)==false && empty($name_asignaturaModificado)==false){

            $bbdd=Registry::get('database');
            $sql="UPDATE asignaturas SET nombre_asignatura=?, codigo_curso=? WHERE codigo_asignatura=?";
            $stmt = $bbdd->query($sql);
            $stmt->execute([$name_asignaturaModificado, $name_curso, $name_asignatura]);
            //acordarse de poner algun return
            echo "Asignatura Editada.
            <br>
            <a href='/adminasignaturas'>Volver a Asignaturas</a>";

         } else {
           echo "Falta rellenar el campo.
            <br>
            <a href='/adminasignaturas'>Volver a Asignaturas</a>";
        }
    }

    public function eliminarAsignatura(){
        $name_asignatura_eliminar = filter_input(INPUT_POST, 'name_asignatura_eliminar');
        if (empty($name_asignatura_eliminar)==false){

            $bbdd=Registry::get('database');
            $sql="DELETE FROM asignaturas WHERE codigo_asignatura=$name_asignatura_eliminar;";
            $stmt = $bbdd->query($sql);
            $stmt->execute();
            //acordarse de poner algun return
            echo "Asignatura Eliminada.
            <br>
            <a href='/adminasignaturas'>Volver a Asignaturas</a>";

        } else {
            echo "Falta rellenar el campo.
            <br>
            <a href='/adminasignaturas'>Volver a Asignaturas</a>";
        }
    }

}