<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 25.11.16
 * Time: 17:57
 */

class Ainstainer_Blog_Model_Post extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
        $this->_init('blog/post');
    }

    public function SetTimeCreate_at($id)
    {

        if(empty($this->load($id)->getCreate_at())){
           return Mage::getModel('core/date')->date('Y-m-d H:i:s');
        }else{
            return $this->load($id)->getCreate_at();
        }
    }

    public function getPosts(){
        $result = array();
        $posts = Mage::getModel('blog/post')->getCollection();
        foreach ($posts as $post)
        {
            $result[] = array('value'=>$post->getId(),'label'=>$post->getTitle());
        }
        
        return $result;
        
        
    }
    
}