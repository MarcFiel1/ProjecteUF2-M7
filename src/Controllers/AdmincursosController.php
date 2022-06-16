<?php

    namespace App\Controllers;

    use App\Controller;
    use App\Registry;
    use App\Request;
    use App\Session;
    use App\Database\Connection;

    if(!isset($_SESSION)){session_start();} 

class AdmincursosController extends Controller {

    public function __construct(Request $request,Session $session){
        parent::__construct($request,$session);
    } 
    
    public function index()
    {

        return view('admincursos');
    }


    public function createCurso(){
        $name_curso= filter_input(INPUT_POST,'name_curso');
        if (empty($name_curso)==false){

            $bbdd=Registry::get('database');
            $sql="INSERT INTO cursos(nombre_curso) VALUES(?)";
            $stmt = $bbdd->query($sql);
            $stmt->execute([$name_curso]);
            //acordarse de poner algun return
            echo "Curso Creado.
            <br>
            <a href='/admincursos'>Volver a Cursos</a>";

        } else {
            echo "Falta rellenar el campo.
            <br>
            <a href='/admincursos'>Volver a Cursos</a>";
        }
        

    }

    public function editCurso(){
        $name_curso = filter_input(INPUT_POST, 'name_curso');
        $name_cursoModificado = filter_input(INPUT_POST, 'name_cursoModificado');
        if ($name_curso!= null && empty($name_curso)==false && empty($name_cursoModificado)==false){

            $bbdd=Registry::get('database');
            $sql="UPDATE cursos SET nombre_curso='$name_cursoModificado' WHERE codigo_curso=$name_curso";
            $stmt = $bbdd->query($sql);
            $stmt->execute();
            //acordarse de poner algun return
            echo "Curso Editado.
            <br>
            <a href='/admincursos'>Volver a Cursos</a>";

        } else {
            echo "Falta rellenar el campo.
            <br>
            <a href='/admincursos'>Volver a Cursos</a>";
        }
    }

    public function eliminarCurso(){
        $name_curso_eliminar = filter_input(INPUT_POST, 'name_curso_eliminar');
        if (empty($name_curso_eliminar)==false){

            $bbdd=Registry::get('database');
            $sql="UPDATE estudiantes SET codigo_curso=NULL WHERE codigo_curso=$name_curso_eliminar;";
            $sql.="DELETE FROM asignaturas WHERE codigo_curso=$name_curso_eliminar;";
            $sql.="DELETE FROM cursos WHERE codigo_curso=$name_curso_eliminar;";
            $stmt = $bbdd->query($sql);
            $stmt->execute();
            //acordarse de poner algun return
            echo "Curso Eliminado.
            <br>
            <a href='/admincursos'>Volver a Cursos</a>";

        } else {
            echo "Falta rellenar el campo.
            <br>
            <a href='/admincursos'>Volver a Cursos</a>";
        }
    }

}