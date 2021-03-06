<?php
/*
 * @package    Qatdatabase
 * @copyright  Copyright (C) 2015 - 2017 cprojects.org. All rights reserved.
 * @license    GNU General Public License version 3 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die ('Restricted access');

jimport('joomla.database.table');

class QatDatabaseTableLayout extends JTable {
	function __construct(&$db) {
		parent::__construct('#__qatdatabase_fields_ordering', 'id', $db);
	}
}