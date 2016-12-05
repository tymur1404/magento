<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 30.11.16
 * Time: 11:15
 */

class Ainstainer_Blog_Model_Resource_Category extends  Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('blog/category', 'category_id');
    }


    public function createNewRelations($category_id, $post_ids){

        $db_write = Mage::getSingleton('core/resource')->getConnection('core_write');
        $readConnection = Mage::getSingleton('core/resource')->getConnection('core_read');

        $query = 'SELECT category_id FROM `' . $this->getTable('blog/relations')  . '` 
                                WHERE category_id='.$category_id;
        $results = $readConnection->fetchAll($query);
        
        if(!empty($results)) {
            $sql = 'DELETE FROM `' . $this->getTable('blog/relations') . '` 
                                WHERE category_id=' . $category_id;
        }
        $db_write->query($sql);

        foreach($post_ids as $post_id) {
            $sql = 'INSERT INTO `' . $this->getTable('blog/relations') . '`
                (`category_id`, `post_id`)
                VALUES (' . $category_id . ',' . $post_id . ')';
            $db_write->query($sql);
        }

    }
}