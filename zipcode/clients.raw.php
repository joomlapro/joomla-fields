<?php
/**
 * @package		Hello
 * @subpackage	com_hello
 * @copyright	Copyright (C) AtomTech, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controlleradmin');

/**
 * Hello list controller class.
 *
 * @package		Hello
 * @subpackage	com_hello
 * @since		2.5
 */
class HelloControllerHello extends JControllerAdmin
{
	/**
	 * Constructor.
	 *
	 * @param	array An optional associative array of configuration settings.
	 * @see		JController
	 * @since	2.5
	 */
	public function __construct($config = array())
	{
		parent::__construct($config);

		$this->registerTask('getzip', 'getZipCode');
	}

	/**
	 * Get zip code.
	 * 
	 * @since 2.5
	 */
	public function getZipCode()
	{
		// Initialise variables.
		$zip = JRequest::getVar('zip');
		$request = 'http://republicavirtual.com.br/web_cep.php?cep=' . $zip . '&formato=json';
		$json = file_get_contents($request);
		
		if (!$json) {
			$json = "{'resultado':'0','resultado_txt':'Não Identificado','uf':'??','cidade':'Não Identificada','bairro':'Não Identificado','tipo_logradouro':'Não Idenficado','logradouro':'Não Identificado'}";
		}
		
		echo $json;
	}
}
