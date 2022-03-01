<?php

/**
 * Base controller for the application.
 * Add general things in this controller.
 */
class ApplicationController extends Controller 
{
	public function __construct()
    {
        require_once ROOT_PATH . '/app/models/Task.class.php';
        
    } 


	public function indexAction()
    {
        // call to model
        // start the connection to the database
        $task = new Task();
        // fetch the data, if any
        $data['taskList'] = $task->fetchAll();
        // call to view
        // set the data for the view
        $this->view->data = $data['taskList'];
        //set the layout (template) of the view
        $this->view->setLayout('indexLayout'); //arribem a views/scripts/application/index.phtml";
        
       
    } 

    public function addAction()
    {
            // call to view
            // set the layout (template) of the view
            $this->view->setLayout('addFormLayout');
            // render the view using the proper view script
            $this->view->render('/task/add.phtml');
    }

    // public function saveAction(){
	// 		//guadar dades del formulari
    //     $description = $_POST['description'];
    //     $start = $_POST['start'];
    //     $end = $_POST['end'];
    //     $state = $_POST['state'];
    //     $userFirstName = $_POST['userFirstName'];
    //     $userLastName = $_POST['userLastName'];
    //     //instanciar la classe del mode
    //     $save = new Task();
    //     //invocar el mètode save del model
    //     $save -> save ($data = array())

    //     //carregar el llistat de les tasques amb el mètode index de la 
    //     //classe Application controler


        

    // }
        public function updateAction()
        {
        // call to view
        // set the layout (template) of the view
        $this->view->setLayout('updateFormLayout');
        // render the view using the proper view script
        $this->view->render('/task/update.phtml');
        

        }


        public function deleteAction()
        {
    // call to view
        // set the layout (template) of the view
        $this->view->setLayout('deleteFormLayout');
        // render the view using the proper view script
        $this->view->render('/task/delete.phtml');
        // call to model
        // start the connection to the database
        $task = new Task();


        $task->delete($id); 
       
        // redirect to 'index page'
        header ('location: index');
    

        }
}
