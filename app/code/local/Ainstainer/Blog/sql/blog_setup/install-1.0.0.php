<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 25.11.16
 * Time: 17:58
 */

$installer = $this;
$installer->startSetup();


$table_post = $installer->getConnection()
    ->newTable('ain_blog_post')
    ->addColumn('post_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity' => true,
        'unsigned' => true,
        'nullable' => false,
        'primary' => true
    ))
    ->addColumn('title', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
        'nullable' => false
    ))
    ->addColumn('slug', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
      'nullable' => false
    ))
    ->addColumn('short_descr', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
        'nullable' => false
    ))
    ->addColumn('content', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable' => false
    ))
    ->addColumn('published', Varien_Db_Ddl_Table::TYPE_TINYINT, null, array(
        'nullable' => false
    ))
    ->addColumn('create_at', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(
        'nullable' => false
    ))
    ->addColumn('update_at', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(
        'nullable' => false
    ));

$table_category = $installer->getConnection()
    ->newTable('ain_blog_category')
    ->addColumn('category_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity' => true,
        'unsigned' => true,
        'nullable' => false,
        'primary' => true
    ))
    ->addColumn('name', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
        'nullable' => false
    ))
    ->addColumn('post_ids', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'nullable' => false
    ))
    ->addColumn('descr', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable' => false
    ))
    ->addColumn('image', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
        'nullable' => false
    ));

$table_relations = $installer->getConnection()
    ->newTable('ain_blog_relations')
    ->addColumn('category_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'unsigned' => true,
        'nullable' => false
    ))
    ->addColumn('post_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'unsigned' => true,
        'nullable' => false
    ))
    ->addColumn('position', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'nullable' => false
    ));

$installer->getConnection()->createTable($table_post);
$installer->getConnection()->createTable($table_category);
$installer->getConnection()->createTable($table_relations);
$installer->endSetup();