






































    
       
    //guadar dades del formulari
            $data = array(
                'task_description' => $_POST['task_description'],
                'date_time_start' => $_POST['date_time_start'],
                'date_time_end' => $_POST['date_time_end'],
                'task_state' => $_POST['task_state'],
                'user_first_name' => $_POST['user_first_name'],
                'user_last_name' => $_POST['user_last_name']
            );

            
            //instanciar la classe del model
            $task = new Task();
            //invocar el mètode save del model
            $task->save($data = $data);

            header ('Location: index');

            public function updateAction()

        {
            // call to model
            $task = new Task();
            // fetch the data, if any 
            //set the layout (template) of the view
            $this->view->setLayout('updateFormLayout');
            // render the view using the proper view script
            $this->view->render('/task/update.phtml');
        }
        