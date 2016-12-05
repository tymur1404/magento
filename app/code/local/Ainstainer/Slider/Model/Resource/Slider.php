<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 02.11.16
 * Time: 11:29
 */

class Ainstainer_Slider_Model_Resource_Slider extends  Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('slider/slider', 'slider_id');
    }

    public function createNewRelations($slider_id, $slide_ids){

        $db_write = Mage::getSingleton('core/resource')->getConnection('core_write');
        $readConnection = Mage::getSingleton('core/resource')->getConnection('core_read');

        $query = 'SELECT slider_id FROM `' . $this->getTable('slider/relations')  . '` 
                                WHERE slider_id='.$slider_id;
        $results = $readConnection->fetchAll($query);

        if(!empty($results)) {

            $sql = 'DELETE FROM `' . $this->getTable('slider/relations') . '` 
                                WHERE slider_id=' . $slider_id;
            $db_write->query($sql);
        }

        foreach($slide_ids as $slide_id) {
            $sql = 'INSERT INTO `' . $this->getTable('slider/relations') . '`
                (`slider_id`, `slide_id`)
                VALUES (' . $slider_id . ',' . $slide_id . ')';
            $db_write->query($sql);
        }

    }
}