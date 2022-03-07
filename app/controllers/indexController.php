




































public function addAction()
    {
        // call to view
            // set the layout (template) of the view
            $this->view->setLayout('addFormLayout');
            // render the view using the proper view script
            $this->view->render('/task/add.phtml');
    }