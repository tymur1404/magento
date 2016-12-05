<?php
/** 
 * Created by PhpStorm.
 * User: timur
 * Date: 28.10.16
 * Time: 12:11
 */
class Ainstainer_Slider_Block_View extends Mage_Core_Block_Template
{
    public function getRequestRecord()
    {
        return Mage::getModel('slider/slider')->load(1);
    }
    
    public function getSlider($slider_id){
        
        return Mage::getResourceModel('slider/slide')->getSliderSlides($slider_id);
    }

}