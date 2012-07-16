Add model edit
==============

/**
 * Method to get a single record.
 *
 * @param   integer  $pk  The id of the primary key.
 *
 * @return  mixed  Object on success, false on failure.
 *
 * @since   2.5
 */
public function getItem($pk = null)
{
	if ($item = parent::getItem($pk))
	{
		$item->hello = explode(',', $item->hello);
	}

	return $item;
}

Add table
=========

/**
 * Method to store a row in the database from the JTable instance properties.
 * If a primary key value is set the row with that primary key value will be
 * updated with the instance property values.  If no primary key value is set
 * a new row will be inserted into the database with the properties from the
 * JTable instance.
 *
 * @param   boolean  $updateNulls  True to update fields even if they are null. [optional]
 *
 * @return  boolean  True on success.
 *
 * @since   2.5
 */
public function store($updateNulls = false)
{

	// Save cleanings
	if (is_array($this->hello))
	{
		$this->cleanings = implode(',', $this->hello);
	}
	else
	{
		$this->cleanings = implode(',', array());
	}

	return parent::store($updateNulls);
}