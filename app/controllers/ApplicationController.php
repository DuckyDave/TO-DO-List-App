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
        //render the view using the proper view script
        //$this->view->render('/task/index.phtml');
       
    } 
}
