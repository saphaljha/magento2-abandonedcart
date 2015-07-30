<?php
/**
 * Author: info@ebizmarts.com
 * Date: 7/14/15
 * Time: 10:18 PM
 * File: Yesnovariation.php
 * Module: magento2-abandonedcart
 */
namespace Ebizmarts\AbandonedCart\Model\System\Config;

class Yesnovariation
{
    /**
     * @var \Ebizmarts\AbandonedCart\Helper\Data
     */
    protected $_helper;
    /**
     * @param \Ebizmarts\AbandonedCart\Helper\Data $helper
     */
    public function __construct(
        \Ebizmarts\AbandonedCart\Helper\Data $helper
    )
    {
        $this->_helper = $helper;
    }
    public function toOptionArray()
    {
//        $code = Mage::getSingleton('adminhtml/config_data')->getStore();
//        $storeId = Mage::getModel('core/store')->load($code)->getId();
        $storeId = null;
        $hasCoupon = $this->_helper->getConfig(\Ebizmarts\AbandonedCart\Model\Config::SEND_COUPON);
        if ($hasCoupon) {
            $active = -$this->_helper->getConfig(\Ebizmarts\AbandonedCart\Model\Config::MAXTIMES);
        } else {
            $active = $this->_helper->getConfig(\Ebizmarts\AbandonedCart\Model\Config::MAXTIMES);
        }
        $options = array(
            array('value' => 0, 'label' => __('No')),
            array('value' => ($active+($hasCoupon ? -1 :1)), 'label' => __('Yes'))
        );
        return $options;
    }

}