<?php
/**
 * Created by PhpStorm.
 * User: Ranjani.venkataraman
 * Date: 29/05/2015
 * Time: 16:38
 */ 
/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;

$installer->startSetup();

$installer->run("
 DROP TABLE IF EXISTS {$this->getTable('Specialsubscription')};
CREATE TABLE {$this->getTable('Specialsubscription')} (
  `specialsubscription_id` int(11) unsigned NOT NULL auto_increment COMMENT 'plt_specialsubscription ID',
  `specialsubscription_email` varchar(255) NOT NULL  COMMENT 'plt_specialsubscription Email',
    `specialsubscription_type` varchar(255) NOT NULL  COMMENT 'Promotion type',
  `specialsubscription_timestamp` datetime NULL,
  PRIMARY KEY (`specialsubscription_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `{$installer->getTable('Specialsubscription')}` VALUES (1,'sample@email.com','Testing','2015-07-02 23:12:30');

    ");


$installer->endSetup();