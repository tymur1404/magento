<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 25.11.16
 * Time: 17:58
 */

$installer = $this;
$installer->startSetup();


$table_slider = $installer->getConnection()
    ->newTable($this->getTable('slider/slider'))
    ->addColumn('slider_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity' => true,
        'unsigned' => true,
        'nullable' => false,
        'primary' => true
    ))
    ->addColumn('visible', Varien_Db_Ddl_Table::TYPE_TINYINT, null, array(
        'nullable' => false
    ))
    ->addColumn('slide_ids', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
      'nullable' => false
    ));

$table_slide = $installer->getConnection()
    ->newTable($this->getTable('slider/slide'))
    ->addColumn('slide_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity' => true,
        'unsigned' => true,
        'nullable' => false,
        'primary' => true
    ))
    ->addColumn('title', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
        'nullable' => false
    ))
    ->addColumn('visible', Varien_Db_Ddl_Table::TYPE_TINYINT, null, array(
        'nullable' => false
    ))
    ->addColumn('descr', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable' => false
    ))
    ->addColumn('image', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
        'nullable' => false
    ));

$table_relations = $installer->getConnection()
    ->newTable($this->getTable('slider/relations'))
    ->addColumn('slider_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'unsigned' => true,
        'nullable' => false
    ))
    ->addColumn('slide_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'unsigned' => true,
        'nullable' => false
    ));

$installer->getConnection()->createTable($table_slider);
$installer->getConnection()->createTable($table_slide);
$installer->getConnection()->createTable($table_relations);
$installer->endSetup();