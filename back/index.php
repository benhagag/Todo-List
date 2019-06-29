 <?php
 header("Access-Control-Allow-Origin: *");
 header('Content-Type: application/json');
 header("Access-Control-Allow-Methods: GET, PUT, POST, DELETE");
 header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");

 require 'Todo.php';

 if(isset($_SERVER["REQUEST_URI"])){

    $TodoClass = new Todo();
    $data = (array)json_decode(file_get_contents("php://input"));

    if($_SERVER["REQUEST_METHOD"] == "GET"){

        $allTodo = $TodoClass->alldata();
        print_r(json_encode($allTodo));

    }elseif($_SERVER["REQUEST_METHOD"] == "PUT"){

        $data = (array)$data["dataToSend"];

        if(isset($data["textToupdate"])){
            $updateTodo = $TodoClass->update($data);
            print_r(json_encode($updateTodo));

        }
    }elseif ($_SERVER["REQUEST_METHOD"] == "DELETE") {

        $data = (array)$data["dataToSend"];
        
        if(isset($data["id"])){
            $deleteTodo = $TodoClass->delete($data);
            print_r(json_encode($deleteTodo));
        }

    }


 }

 ?>