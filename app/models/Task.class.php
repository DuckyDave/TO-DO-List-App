<?php

/**
 * A model to handle all operations over a JSON file containing a list of tasks to do
 */

class Task {

    protected $_source = null;

    private $task = "";

    public function __construct() {

         // parses the settings file
		$settings = parse_ini_file(ROOT_PATH . '/config/settings.ini', true);
	
        // set the source (JSON file)
        $this->_source = ROOT_PATH . '/' . $settings['JSON']['source'];

        // get the contents of the file
        $this->task = file_get_contents($this->_source);
    }

    public function getAll() {
        // get all the tasks, and its details, as a JSON
        $result = json_decode($this->task);
        return $result;
    }
    
    public function addOne() {
        /* if 'save' request is set */
        if(isset($_POST['save'])){
            //open the json file
            $data = file_get_contents($this->_source);
            $data = json_decode($data);
    
            //data in out POST
            $input = array(
                'id' => $_POST['id'],
                'taskName' => $_POST['taskName'],
                'start' => $_POST['start'],
                'end' => $_POST['end'],
                'state' => $_POST['state'],
                'userFirstName' => $_POST['userFirstName'],
                'userFamilyName' => $_POST['userLastName']
            );
    
            //append the input to our array
            $data[] = $input;
            //encode back to json
            $data = json_encode($data, JSON_PRETTY_PRINT);
            file_put_contents($this->_source, $data);
    
            header('location: index.php');
        }

    }

    public function updateOne() {
        if(isset($_POST['update'])){
            //set the updated values
            $input = array(
                'task_id' => $_POST['task_id'],
                'task_name' => $_POST['task_name'],
                'date_time_start' => $_POST['date_time_start'],
                'date_time_end' => $_POST['date_time_end'],
                'state' => $_POST['state'],
                'user.first_name' => $_POST['user_first_name'],
                'user.family_name' => $_POST['user_family_name']
            );
     
            //update the selected index
            $data_array[$index] = $input;
     
            //encode back to json
            $data = json_encode($data_array, JSON_PRETTY_PRINT);
            file_put_contents($this->_source, $data);
     
            header('location: index.php');
        }
    }

    public function deleteOne() {
        if(!isset($_POST['delete'])) {
            //get the index
            $index = $_GET['id'];
        
            //fetch data from json
            $data = file_get_contents($this->_source);
            $data = json_decode($data);
        
            //delete the row with the index
            unset($data[$index]);
        
            //encode back to json
            $data = json_encode($data, JSON_PRETTY_PRINT);
            file_put_contents($this->_source, $data);
        
            header('location: index');
        }
        
    }
   
}

?>