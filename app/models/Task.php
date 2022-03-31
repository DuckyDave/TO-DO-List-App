<?php

/**
 * A model to handle all operations over a database
 */

class Task {

    protected $_database = null;
    private $_table = "";
	private $_taskList;

    public function __construct() {

         // parses the settings file
		$settings = parse_ini_file(ROOT_PATH . '/config/settings.ini', true);
		
        // starts the connection to the database
		$this->_database = new PDO(
			sprintf(
				"%s:host=%s;dbname=%s",
				$settings['database']['driver'],
				$settings['database']['host'],
				$settings['database']['dbname']
			),
			$settings['database']['user'],
			$settings['database']['password'],
			array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
		);

		$this->init();

    }

	public function init()
	{
		$this->_setTable('task');
	}

	/**
	 * Sets the database table the model is using
	 * @param string $table the table the model is using
	 */
	protected function _setTable($table)
	{
		$this->_table = $table;
	}

	public function fetchAll()
	{
		$sql = 'select * from ' . $this->_table;

		$statement = $this->_database->prepare($sql);
		$statement->execute(array());
		
		while ($row = $statement->fetch(PDO::FETCH_OBJ))
		{
			$this->_taskList[] = $row;
		}
		
		return $this->_taskList;
	}

    public function fetchOne(int $id)
	{
		$sql = 'select * from ' . $this->_table;
		$sql .= ' where id = ?';
		
		$statement = $this->_database->prepare($sql);
		$statement->execute(array($id));

		$row = $statement->fetch(PDO::FETCH_ASSOC);
		
		return $row;
	}

	/**
	 * Saves the current data to the database. If an key named "id" is given,
	 * an update will be issued.
	 * @param array $data the data to save
	 * @return int the id the data was saved under
	 */
	public function save($data = array())
	{
		$sql = '';
		
		$values = array();
		
		if (array_key_exists('id', $data)) {
			$sql = 'update ' . $this->_table . ' set ';
			
			$first = true;
			foreach($data as $key => $value) {
				if ($key != 'id') {
					$sql .= ($first == false ? ',' : '') . ' ' . $key . ' = ?';
					
					$values[] = $value;
					
					$first = false;
				}
			}
			
			// adds the id as well
			$values[] = $data['id'];
			
			$sql .= ' where id = ?';// . $data['id'];
			
			$statement = $this->_database->prepare($sql);

			print_r($values);
			return $statement->execute($values);
		}
		else {
			$keys = array_keys($data);
			
			$sql = 'insert into ' . $this->_table . '(';
			$sql .= implode(',', $keys);
			$sql .= ')';
			$sql .= ' values (';
			
			$dataValues = array_values($data);
			$first = true;
			foreach($dataValues as $value) {
				$sql .= ($first == false ? ',?' : '?');
				
				$values[] = $value;
				
				$first = false;
			}
			
			$sql .= ')';
			
			$statement = $this->_database->prepare($sql);

			if ($statement->execute($values)) {
				return $this->_database->lastInsertId();
			}
		}
		
		return false;
	}

	/**
	 * Deletes a single entry
	 * @param int $id the id of the entry to delete
	 * @return boolean true if all went well, else false.
	 */
	public function delete($id)
	{
		$sql = 'delete from ' .$this->_table . ' where id = ?';
		$statement = $this->_database->prepare($sql);
		return $statement->execute(array($id));
	}
}

?>