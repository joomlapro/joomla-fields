<?php
/**
 * @package		Hello
 * @subpackage	com_hello
 * @copyright	Copyright (C) AtomTech, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('JPATH_BASE') or die;

JFormHelper::loadFieldClass('list');

/**
 * Form Field State class.
 *
 * @package		Hello
 * @subpackage	com_hello
 * @since		2.5
 */
class JFormFieldState extends JFormFieldList
{
	/**
	 * The field type.
	 *
	 * @var		string
	 */
	protected $type = 'State';

	/**
	 * Method to get the field options.
	 *
	 * @return	array	The field option objects.
	 * @since	2.5
	 */
	public function getOptions()
	{
		// Initialize variables.
		$options = array();

		$db		= JFactory::getDbo();
		$query	= $db->getQuery(true);

		$query->select('a.prefix AS value, a.name AS text');
		$query->from('#__hello_state AS a');
		$query->order('a.name ASC');

		// Get the options.
		$db->setQuery($query);

		$options = $db->loadObjectList();

		// Check for a database error.
		if ($db->getErrorNum()) {
			JError::raiseWarning(500, $db->getErrorMsg());
		}

		// Merge any additional options in the XML definition.
		$options = array_merge(parent::getOptions(), $options);

		return $options;
	}
}
