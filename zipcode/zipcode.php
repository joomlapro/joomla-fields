<?php
/**
 * @package		Products
 * @subpackage	com_products
 * @copyright	Copyright (C) AtomTech, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

JFormHelper::loadFieldClass('list');

/**
 * Form Field ZipCode class.
 *
 * @package		Products
 * @subpackage	com_products
 * @since		2.5
 */
class JFormFieldZipCode extends JFormFieldText
{
	/**
	 * The field type.
	 *
	 * @var		string
	 */
	protected $type = 'ZipCode';

	/**
	 * Method to get the field input.
	 *
	 * @return	string		The field input.
	 * @since	2.5
	 */
	public function getInput()
	{
		$script = <<<ENDSCRIPT
		function getZip() {
		    var onRequest = function () {
		            document.id('reload').setStyle('display', 'block');
		        };
		    var onComplete = function () {
		            document.id('reload').setStyle('display', 'none');
		        };
		    var onSuccess = function (response) {
		            var responseJSON = JSON.parse(response);
		            document.id('jform_street').value = responseJSON.tipo_logradouro + ', ' + responseJSON.logradouro;
		            document.id('jform_district').value = responseJSON.bairro;
		            document.id('jform_city').value = responseJSON.cidade;
		            document.id('jform_state').value = responseJSON.uf;
		        };
		    var queryString = {
		        'option': 'com_products',
		        'task': 'clients.getzip',
		        'zip': document.id('jform_zip_code').value,
		        'format': 'raw'
		    };
		    var options = {
		        url: 'index.php',
		        method: 'get',
		        update: null,
		        data: queryString,
		        onSuccess: onSuccess,
		        onComplete: onComplete,
		        onRequest: onRequest
		    };
		    var ajaxReq = new Request(options).send();
		};
ENDSCRIPT;
		
		$doc = JFactory::getDocument();
		$doc->addScriptDeclaration($script);
		
		$html = parent::getInput();

		$html .= '<input type="button" onClick="getZip()" value="' . JText::_('JSEARCH_FILTER_SUBMIT') . '" />';
		$html .= '<div id="reload" style="display:none;"><img src="' . JURI::root() . 'media/system/images/mootree_loader.gif" alt="" /></div>';

		return $html;
	}
}
