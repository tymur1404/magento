<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 13.11.16
 * Time: 11:02
 */


class Ainstainer_Slider_Block_Adminhtml_Slider_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('ain_slider_grid');
        $this->setDefaultSort('slider_id');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getResourceModel('slider/slider_collection');

        $this->setCollection($collection);
        parent::_prepareCollection();

        return $this;
    }

    protected function _prepareColumns()
    {
        $helper = Mage::helper('slider');

        $this->addColumn('slider_id', [
            'header' => $helper->__('Request #'),
            'index'  => 'slider_id',
        ]);

        $this->addColumn('visible', [
            'header' => $helper->__('Visible'),
            'type'   => 'text',
            'index'  => 'visible',
            'align' => 'center',
        ]);

        
        $this->addExportType('*/*/exportCsv', $helper->__('CSV'));
        $this->addExportType('*/*/exportExcel', $helper->__('Excel XML'));

        return parent::_prepareColumns();
    }

    /**
     * Row click url
     *
     * @return string
     */
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', ['slider_id' => $row->getId()]);
    }

    public function getGridUrl($params = [])
    {
        return $this->getUrl('*/*/grid', ['_current' => true]);
    }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('visible');
        $this->getMassactionBlock()->setFormFieldName('visible');

        $this->getMassactionBlock()->addItem('visible', array(
            'label'=> Mage::helper('slider')->__('Change visible'),
            'url'  => $this->getUrl('*/*/massStatus', array('_current'=>true)),
            'index' => 'visible',
            'value' => '1',
            'additional' => array(
                'visibility' => array(
                    'name' => 'status',
                    'type' => 'select',
                    'class' => 'required-entry',
                    'label' => Mage::helper('slider')->__('Visible'),
                    'values' => array('Disabled', 'Enabled')
                )
            )
        ));
        return $this;
    }
}