<?php
/**
 * This file is part of Jbh_Notice for Magento.
 *
 * @license Lesser General Public License v3
 * @author Jacques Bodin-Hullin <jacques@bodin-hullin.net>
 * @category Jbh
 * @package Jbh_Notice
 * @copyright Copyright (c) 2012 Jacques Bodin-Hullin (http://github.com/jacquesbh/NoticeForMagento)
 */

/**
 * Notice Block
 * @package Jbh_Notice
 */
class Jbh_Notice_Block_Notice extends Mage_Core_Block_Template
{

// Jacques Bodin-Hullin Tag NEW_CONST

// Jacques Bodin-Hullin Tag NEW_VAR

    /**
     * Prepare the notice data
     * @access protected
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        
        $area = Mage::app()->getStore()->isAdmin() ? "admin" : "frontend";
        $this->addData(array(
            'area' => $area,
            'active' => Mage::getStoreConfig('dev/jbh_notice/' . $area . '_active'),
            'message' => Mage::getStoreConfig('dev/jbh_notice/' . $area . '_message'),
            'fg_color' => Mage::getStoreConfig('dev/jbh_notice/' . $area . '_fg_color'),
            'bg_color' => Mage::getStoreConfig('dev/jbh_notice/' . $area . '_bg_color'),
            'css' => Mage::getStoreConfig('dev/jbh_notice/' . $area . '_css')
        ));
        
        return $this;
    }

    /**
     * To HTML
     * @access protected
     * @return string
     */
    protected function _toHtml()
    {
        if ($this->getArea() == 'admin') {
            $html = <<<HTML
<p id="jbh_notice" style="background-color: {$this->getBgColor()}; color: {$this->getFgColor()}; {$this->getCss()}">
    {$this->getMessage()}
</p>
HTML;
        } else {
            $html = <<<HTML
<p id="jbh_notice" style="background-color: {$this->getBgColor()}; color: {$this->getFgColor()}; {$this->getCss()}">
    {$this->getMessage()}
</p>
HTML;
        }
        
        if ($this->getActive()) {
            return $html;
        }
        return null;
    }

// Jacques Bodin-Hullin Tag NEW_METHOD

}