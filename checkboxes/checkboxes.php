<?php
/**
 * @package     Condos
 * @subpackage  com_condos
 * @copyright   Copyright (C) 2012 AtomTech, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('JPATH_BASE') or die;

/**
 * Displays options as a list of check boxes.
 *
 * @package     Condos
 * @subpackage  com_condos
 * @since       2.5
 */
class JFormFieldCheckboxes extends JFormFieldList
{
	/**
	 * The form field type.
	 *
	 * @var     string
	 * @since   2.5
	 */
	protected $type = 'Checkboxes';

	/**
	 * Flag to tell the field to always be in multiple values mode.
	 *
	 * @var     boolean
	 * @since   2.5
	 */
	protected $forceMultiple = true;

	/**
	 * Method to get the field input markup for check boxes.
	 *
	 * @return  string  The field input markup.
	 *
	 * @since   2.5
	 */
	protected function getInput()
	{
		// Initialize variables.
		$html = array();

		// Initialize some field attributes.
		$class = $this->element['class'] ? ' class="checkboxes ' . (string) $this->element['class'] . '"' : ' class="checkboxes"';

		// Start the checkbox field output.
		$html[] = '<fieldset id="' . $this->id . '"' . $class . '>';

		// Get the field options.
		$options = $this->getOptions();

		// Build the checkbox field output.
		$html[] = '<ul>';
		foreach ($options as $i => $option)
		{

			// Initialize some option attributes.
			$checked = (in_array((string) $option->value, (array) $this->value) ? ' checked="checked"' : '');
			$class = !empty($option->class) ? ' class="' . $option->class . '"' : '';
			$disabled = !empty($option->disable) ? ' disabled="disabled"' : '';

			// Initialize some JavaScript option attributes.
			$onclick = !empty($option->onclick) ? ' onclick="' . $option->onclick . '"' : '';

			$html[] = '<li>';
			$html[] = '<input type="checkbox" id="' . $this->id . $i . '" name="' . $this->name . '"' . ' value="'
				. htmlspecialchars($option->value, ENT_COMPAT, 'UTF-8') . '"' . $checked . $class . $onclick . $disabled . '/>';

			$html[] = '<label for="' . $this->id . $i . '"' . $class . '>' . JText::_($option->text) . '</label>';
			$html[] = '</li>';
		}
		$html[] = '</ul>';

		// End the checkbox field output.
		$html[] = '</fieldset>';

		return implode($html);
	}

	/**
	 * Method to get the field options.
	 *
	 * @return  array  The field option objects.
	 *
	 * @since   11.1
	 */
	protected function getOptions()
	{
		// Initialize variables.
		$options = array();

		// Initialiase variables.
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);

		// Prepare query.
		$query->select('a.id AS value, a.name AS text');
		$query->from('#__hello AS a');

		// Inject the query and load the result.
		$db->setQuery($query);
		$options = $db->loadObjectList();

		// Check for errors.
		if ($error = $db->getErrorMsg())
		{
			$this->setError();

			return false;
		}

		// Merge any additional options in the XML definition.
		$options = array_merge(parent::getOptions(), $options);

		return $options;
	}
}
