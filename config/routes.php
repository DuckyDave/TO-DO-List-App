<?php 

/**
 * Used to define the routes in the system.
 * 
 * A route should be defined with a key matching the URL and an
 * controller#action-to-call method. E.g.:
 * 
 * '/' => 'index#index',
 * '/calendar' => 'calendar#index'
 */

	$routes = array(
		'/index'=> 'Application#index',
		'/add' => 'Application#add',
		'/save'=> 'Application#save',
		'/update'=> 'Application#update',
		'/delete' => 'Application#delete'
	);

