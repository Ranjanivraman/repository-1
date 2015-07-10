<?php
/**
 * Created by PhpStorm.
 * User: Ranjani.venkataraman
 * Date: 29/05/2015
 * Time: 17:12
 */
class Prettylittlething_Specialsubscription_Model_Specialsubscription extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('prettylittlething_specialsubscription/Specialsubscription');
    }
    public function savetotable($contact)
    {
    	
    	echo " we are here2";
        $model=Mage::getResourceModel('prettylittlething_specialsubscription/Specialsubscription');
		var_dump($model);
        $count=$model->save($contact);
        return $count;
    }
}
