<?php

    namespace App\Controllers;

    use App\Controller;
    use App\Registry;
    use App\Request;
    use App\Session;
    use App\Database\Connection;

    if(!isset($_SESSION)){session_start();} 

class ListController extends Controller {

    public function __construct(Request $request,Session $session){
        parent::__construct($request,$session);
    } 
    
    public function index()
    {

        return view('list');
    }


    public function createList(){
        $name_list= filter_input(INPUT_POST,'name_list');
        $user_list=$_SESSION["username"];
        if (empty($name_list)==false){

            $bbdd=Registry::get('database');
            $sql="INSERT INTO listas(namelist,user_list) VALUES(?,?)";
            $stmt = $bbdd->query($sql);
            $stmt->execute([$name_list,$user_list]);
            //acordarse de poner algun return
            echo "Lista Creada.
            <br>
            <a href='/list'>Volver a Listas</a>";

        } else {
            echo "Falta rellenar el campo.
            <br>
            <a href='/list'>Volver a Listas</a>";
        }
        

    }
}