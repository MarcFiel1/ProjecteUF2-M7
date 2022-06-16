<?php

namespace App\Controllers;

use App\Controller;
use App\Registry;
use App\Request;
use App\Session;
use App\Database\Connection;

class TaskController extends Controller
{

    public function __construct(Request $request, Session $session)
    {
        parent::__construct($request, $session);
    }

    public function index()
    {
        return view('task');
    }


    public function createTask()
    {
        $nametask = filter_input(INPUT_POST, 'name_task');
        $descriptiontask = filter_input(INPUT_POST, 'description_task');
        $user_task = $_SESSION["username"];
        $id_list = filter_input(INPUT_POST, 'seleccionarlista');
        if (empty($nametask) == false || empty($descriptiontask) == false) {
            $sql = "INSERT INTO tareas(nametask,descriptiontask,id_list,user_task) VALUES(?,?,?,?)";
            $bbdd = Registry::get('database');
            $stmt = $bbdd->query($sql);
            $stmt->execute([$nametask, $descriptiontask, $id_list, $user_task]);
            echo "Tarea añadida correctamente. 
            <br>
            <a href='/task'>Volver a Tareas</a>";
        } else {
            echo "Falta rellenar el campo.
            <br>
            <a href='/task'>Volver a Tareas</a>";
        }
    }

    public function edit()
    {
    }


    public function delete()
    {

            $tarea_id=filter_input(INPUT_POST, 'idTaskDelete');
            $bbdd = Registry::get('database');
            $sql = "DELETE FROM tareas WHERE id=?";
            $stmt = $bbdd->query($sql);
            $stmt->execute([$tarea_id]);
            //acordarse de poner algun return
            echo "Tarea Eliminada.
            <br>
            <a href='/dashboard'>Volver a Dashboard</a>";
    }
}
