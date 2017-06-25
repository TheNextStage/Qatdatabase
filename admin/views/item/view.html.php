<?php
/*
 * @package    Qatdatabase
 * @copyright  Copyright (C) 2015 - 2017 cprojects.org. All rights reserved.
 * @license    GNU General Public License version 3 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die ('Restricted access');

jimport('joomla.application.component.view');

class QatDatabaseViewItem extends JViewLegacy {
	protected $form = null;
	
	public function display($tpl = null) {
		$this->item = $this->get('Item');
		$this->script = $this->get('Script');
		$this->model = $this->getModel();
		
		if(count($errors = $this->get('Errors'))) {
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}
		
		$this->addToolBar();
		parent::display($tpl);
		$this->setDocument();
	}
	
	protected function addToolBar() {
		$input = JFactory::getApplication()->input;
		$input->set('hidemainmenu', true);
		
		$isNew = ($this->item->id == 0);
		
		if($isNew) {
			$title = JText::_('COM_QATDATABASE') . ': ' . JText::_('COM_QATDATABASE_ITEMS') . ' - ' . JText::_('COM_QATDATABASE_ITEM_NEW');
		} else {
			$title = JText::_('COM_QATDATABASE') . ': ' . JText::_('COM_QATDATABASE_ITEMS') . ' - ' . JText::_('COM_QATDATABASE_ITEM_EDIT');
		}
		
		JToolBarHelper::title($title, 'database');
		
		JToolBarHelper::apply('item.apply');
		JToolBarHelper::save('item.save');
		JToolBarHelper::cancel('item.cancel', $isNew ? 'JTOOLBAR_CANCEL':'JTOOLBAR_CLOSE');
	}
	
	protected function setDocument() {
		$document = JFactory::getDocument();
		$document->addScript(JURI::root() . $this->script);
		$document->addScript(JURI::root() . "/administrator/components/com_qatdatabase/views/item/submitbutton.js");
		
		JText::script('COM_QATDATABASE_ERROR_ITEM_FIELD_ERROR');
	}
}
?>
