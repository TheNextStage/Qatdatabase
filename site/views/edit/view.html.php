<?php
/*
 * @package    Qatdatabase
 * @copyright  Copyright (C) 2015 - 2017 cprojects.org. All rights reserved.
 * @license    GNU General Public License version 3 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die ('Restricted access');

class QatDatabaseViewEdit extends JViewLegacy {
	public function display($tpl = null) {
		$this->item = $this->get('Item');
		
		$jinput = JFactory::getApplication()->input;
		$id = $jinput->get('id', '', 'INT');
		if($id !== '') {
			echo $id;
		}
		
		if(count($errors = $this->get('Errors'))) {
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}
		
		parent::display($tpl);
	}
}