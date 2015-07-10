<?php
/**
 * Created by PhpStorm.
 * User: Ranjani.venkataraman
 * Date: 29/05/2015
 * Time: 17:20
 */
class Prettylittlething_Specialsubscription_Model_Resource_Specialsubscription extends Mage_Core_Model_Resource_Db_Abstract
{
    public function _construct()
    {
        $this->_init('prettylittlething_specialsubscription/Specialsubscription','specialsubscription_id');
    }
	
    public function save($contact)
    {

        $email=$contact['email'];

        $timestamp=Mage::getModel('core/date')->date('Y-m-d H:i:s');


        $table = $this->getMainTable();

        $adapter= $this->_getWriteAdapter()
            ->insert($table,array(
                'specialsubscription_email' => $email,
                'specialsubscription_type' => 'specialsubscription',
                'specialsubscription_timestamp' => $timestamp
            ));

        return $adapter;
    }
}