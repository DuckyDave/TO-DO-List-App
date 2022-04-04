<?php

/**
 * A model to handle all operations over a database
 */

class Task extends Model
{

    protected $_ddh = null;
    protected $_table = "";

    public function __construct() {

        parent::__construct();

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

		$statement = $this->_dbh->prepare($sql);
		$statement->execute(array());
		
		while ($row = $statement->fetch(PDO::FETCH_OBJ))
		{
			$_taskList[] = $row;
		}
		
		return $_taskList;
	}

    public function fetchOne($id)
	{
		parent::fetchOne($id);
	}

	/**
	 * Saves the current data to the database. If an key named "id" is given,
	 * an update will be issued.
	 * @param array $data the data to save
	 * @return int the id the data was saved under
	 */
	public function save($data = array())
	{
		parent::save($data = array());
	}

	/**
	 * Deletes a single entry
	 * @param int $id the id of the entry to delete
	 * @return boolean true if all went well, else false.
	 */
	public function delete($id)
	{
		parent::delete($id);
	}
}

?>