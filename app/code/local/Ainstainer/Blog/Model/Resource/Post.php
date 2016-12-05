<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 25.11.16
 * Time: 17:57
 */

class Ainstainer_Blog_Model_Resource_Post extends  Mage_Core_Model_Resource_Db_Abstract
{
    const PUBLISHED = 1;

    protected function _construct()
    {
        $this->_init('blog/post', 'post_id');
    }

    public function getCategoryPosts(){
        $category_id = Mage::app()->getRequest()->getParam('id');
        $collection = Mage::getModel('blog/post')->getCollection();

       $select = $collection->getSelect()->join(
            array('r' => $this->getTable('blog/relations')),
            'main_table.post_id = r.post_id',
            array('post_id')
        )
            ->where("r.category_id = $category_id")
            ->where("main_table.published = ".self::PUBLISHED);
        $childrenIds = array();
        foreach ($this->_getReadAdapter()->fetchAll($select) as $row) {
            $childrenIds[$row['post_id']]['post_id'] = $row['post_id'];
            $childrenIds[$row['post_id']]['title'] = $row['title'];
        }

        return $childrenIds;
    }

    public function getMultiselectPosts(){

        $posts = Mage::getModel('blog/post')->getCollection();

        $arr_posts = array();

        foreach ($posts as $post){
            $arr_posts[$post->getPost_id()]['value'] = $post->getPost_id();
            $arr_posts[$post->getPost_id()]['label'] = $post->getTitle();
        }
        return $arr_posts;

        
    }

}