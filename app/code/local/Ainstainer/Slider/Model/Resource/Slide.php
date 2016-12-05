<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 02.11.16
 * Time: 11:29
 */

class Ainstainer_Slider_Model_Resource_Slide extends  Mage_Core_Model_Resource_Db_Abstract
{

    const VISIBLE = 1;

    protected function _construct()
    {
        $this->_init('slider/slide', 'slide_id');
    }

    public function getMultiselectSlide(){

        $posts = Mage::getModel('slider/slide')->getCollection();

        $arr_posts = array();

        foreach ($posts as $post){
            $arr_posts[$post->getSlide_id()]['value'] = $post->getSlide_id();
            $arr_posts[$post->getSlide_id()]['label'] = $post->getTitle();
        }
        return $arr_posts;


    }

    public function getSliderSlides($slider_id){


        $slider = Mage::getModel('slider/slider')->load($slider_id);

        if($slider->getVisible() == self::VISIBLE) {
            $collection = Mage::getModel('slider/slide')->getCollection();

            $select = $collection->getSelect()->join(
                array('r' => $this->getTable('slider/relations')),
                'main_table.slide_id = r.slide_id',
                array('slide_id')
            )
                ->where("r.slider_id = $slider_id")
                ->where("main_table.visible = " . self::VISIBLE);
            $childrenIds = array();
            $result = $this->_getReadAdapter()->fetchAll($select);
            if(!empty($result)) {
                foreach ($result as $row) {
                    $childrenIds[$row['slide_id']]['slide_id'] = $row['slide_id'];
                    $childrenIds[$row['slide_id']]['title'] = $row['title'];
                    $childrenIds[$row['slide_id']]['image'] = $row['image'];
                    $childrenIds[$row['slide_id']]['descr'] = $row['descr'];
                }
                return $childrenIds;
            }
            return false;
        }

        return false;
    }
}