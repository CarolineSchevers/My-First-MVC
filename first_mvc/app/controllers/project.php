<?php

class Project extends Controller{
    public function index(){
        

        $list = $this->model->getList();
        $this->view('project/index');
        echo "<div class='listProjectBox'>
                    <ul class='listProject'>";
        foreach($list as $project) {
            echo 
                "<a href='http://mvc.local/first_mvc/public/project/example/". $project['id'] ."'>" . $project['id'] . " - " . $project['title'] . "</a>";
        }
        echo 
        " </ul>
            </div>";   
     }

    public function example($id = ''){
        $projects = $this->model->getProject($id);
       
        $this->view('project/example');
        
        foreach($projects as $example) {
    
            echo 
            "
            <div class='grid'>
                <div class='grid1'>
                    <iframe src=". $example['link'] ."></iframe> 
                </div>
                <div class='grid2'>
                    <h1>" . $example['id'] . " - ". $example['title'] . "</h1>
                    <div class='linkFlex'>
                        <a class='gitLink' href=". $example['link'] . ">Result </a>&nbsp
                         - &nbsp
                        <a href=". $example['code'] . "> Code</a>
                    </div>
                    <p>" . $example['description'] .  "<br>
                     Programming languages: " . $example['language'] . "<br>
                     Made on: " . $example['made'] . "<br>
                     </p>
                </div>
            </div>";
        }
       
        if(isset($_GET['prebtn'])) {
            $id = $id - 1;
            header("Location: http://mvc.local/first_mvc/public/project/example/$id");
            if($id = 1) {
                header("Location: http://mvc.local/first_mvc/public/project/example/$id");
            }
        }
        if(isset($_GET['listbtn'])) {
            header("Location: http://mvc.local/first_mvc/public/project"); 
        }

        $IDS = $this->model-> getID();
        $count = count($IDS);
        
        if(isset($_GET['nextbtn'])) {
            $id = $id + 1;
            header("Location: http://mvc.local/first_mvc/public/project/example/$id");

            if($id > $count) {
                header("Location: http://mvc.local/first_mvc/public/project");
            } 
        }
    }
}