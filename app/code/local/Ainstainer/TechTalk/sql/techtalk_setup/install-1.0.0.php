<?php
/** @var Mage_Core_Model_Resource_Setup $installer
 * Created by PhpStorm.
 * User: timur
 * Date: 02.11.16
 * Time: 13:32
 */
$installer = $this;
$installer->startSetup();
$installer->run("
CREATE TABLE IF NOT EXISTS `{$this->getTable('techtalk/contact')}` (
  `request_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `comment` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  PRIMARY KEY (`request_id`)
)
");

$installer->endSetup();

//$table = $installer->getConnection()
//    ->newTable($this->getTable('techtalk/contact'))
//    ->addColumn('block_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
//        'identity' => true,
//        'unsigned' => true,
//        'nullable' => false,
//        'primary' => true
//    ))
//    ->addColumn('name', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
//        'nullable' => false
//    ))
//    ->addColumn('comments', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
//      'nullable' => false
//    ));
//
//$installer->endSetup();