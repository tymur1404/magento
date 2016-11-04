<?php
/** @var Mage_Core_Model_Resource_Setup $installer
 * Created by PhpStorm.
 * User: timur
 * Date: 02.11.16
 * Time: 13:32
 */
$installer = $this;
$installer->startSetup();


$table = $installer->getConnection()
    ->newTable($this->getTable('techtalk/contact'))
    ->addColumn('request_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity' => true,
        'unsigned' => true,
        'nullable' => false,
        'primary' => true
    ))
    ->addColumn('name', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
        'nullable' => false
    ))
    ->addColumn('comment', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
      'nullable' => false
    ));
$installer->getConnection()->createTable($table);
$installer->endSetup();
