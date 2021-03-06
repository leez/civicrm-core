<?php
/**
+--------------------------------------------------------------------+
| CiviCRM version 4.5                                                |
+--------------------------------------------------------------------+
| Copyright CiviCRM LLC (c) 2004-2014                                |
+--------------------------------------------------------------------+
| This file is a part of CiviCRM.                                    |
|                                                                    |
| CiviCRM is free software; you can copy, modify, and distribute it  |
| under the terms of the GNU Affero General Public License           |
| Version 3, 19 November 2007 and the CiviCRM Licensing Exception.   |
|                                                                    |
| CiviCRM is distributed in the hope that it will be useful, but     |
| WITHOUT ANY WARRANTY; without even the implied warranty of         |
| MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.               |
| See the GNU Affero General Public License for more details.        |
|                                                                    |
| You should have received a copy of the GNU Affero General Public   |
| License and the CiviCRM Licensing Exception along                  |
| with this program; if not, contact CiviCRM LLC                     |
| at info[AT]civicrm[DOT]org. If you have questions about the        |
| GNU Affero General Public License or the licensing of CiviCRM,     |
| see the CiviCRM license FAQ at http://civicrm.org/licensing        |
+--------------------------------------------------------------------+
 */

require_once 'CiviTest/CiviUnitTestCase.php';

class api_v3_ProductTest extends CiviUnitTestCase {
  protected $_apiversion = 3;
  protected $_params;

  protected $_entity = 'Product';
  function get_info() {
    return array(
      'name' => 'Product Tests',
      'description' => 'Test product API',
      'group' => 'CiviCRM API Tests',
    );
  }

  function setUp() {
    $this->_params = array(
      'name' => 'my product',
    );
  }

  function tearDown() {
    $this->quickCleanup(array('civicrm_product'), TRUE);
  }

  function testGetFields() {
    $fields = $this->callAPISuccess($this->_entity, 'getfields', array('action' => 'create'));
    $this->assertArrayHasKey('period_type', $fields['values']);
  }

  function testGetOptions() {
    $options = $this->callAPISuccess($this->_entity, 'getoptions', array('field' => 'period_type'));
    $this->assertArrayHasKey('rolling', $options['values']);
  }
}
