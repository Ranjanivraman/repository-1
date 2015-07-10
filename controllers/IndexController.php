<?php
/**
 * Created by PhpStorm.
 * User: Ranjani.venkataraman
 * Date: 29/05/2015
 * Time: 16:58
 */
class Prettylittlething_Specialsubscription_IndexController extends Mage_Core_Controller_Front_Action
{
    public function IndexAction()
    {


        $post = $this->getRequest()->getPost();

        if ($post) {


            try {
                $postObject = new Varien_Object();
                $postObject->setData($post);

                $error = false;

/*
                if (!Zend_Validate::is(trim($post['email']), 'EmailAddress')) {
                    Mage::getSingleton('customer/session')->addError(Mage::helper('contacts')->__('Please enter a valid email address'));
                    $error = true;
                }
*/
                $contact = $postObject;
                $specialsubscription = Mage::getModel('prettylittlething_specialsubscription/Specialsubscription');
                $specialsubscription->savetotable($contact);

                $baseurl=Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB);
                $url=$baseurl."";
                $this->_redirectUrl($url);

                return;

            } catch (Exception $e) {

                $baseurl=Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB);
                $url=$baseurl."";
                $this->_redirectUrl($url);

                return;
            }
            	}
			
			else
				{
				
				$baseurl=Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB);
                $url=$baseurl."";
                $this->_redirectUrl($url);

                return;
				
				}
        }
    

  	 public function ImportAction()
    {
        $filename = 'specialsubscription'; //\var\export\specialsubscription

        try{

            $special_subscription_csv = Mage::helper('prettylittlething_specialsubscription/csv')->generateCollectionList($filename);

                echo "The Subscription CSV file has been created in the path ".$special_subscription_csv;

            return true;

        }catch (Exception $e) {

            Mage::throwException($e->getMessage());

            return false;
        }


     //   $this->_prepareDownloadResponse($filename, $content); //if an backend controller is created

      //  zend_debug::dump($content);
    }
	public function LoadAction()
    {
    	
        $post = $this->getRequest()->getPost();

        if ($post) {

            try {
                $postObject = new Varien_Object();
                $postObject->setData($post);

                $error = false;

/*
                if (!Zend_Validate::is(trim($post['email']), 'EmailAddress')) {
                    Mage::getSingleton('customer/session')->addError(Mage::helper('contacts')->__('Please enter a valid email address'));
                    $error = true;
                }
*/
                $contact = $postObject;

                $email=$contact['email'];

                $timestamp=Mage::getModel('core/date')->date('Y-m-d H:i:s');

                $connection = Mage::getSingleton('core/resource')->getConnection('core_write');

                $connection->beginTransaction();

                $__fields =array(
                    'specialsubscription_email' => $email,
                    'specialsubscription_type' => 'specialsubscription',
                    'specialsubscription_timestamp' => $timestamp
                );


                $connection->insert("Specialsubscription", $__fields);

                $connection->commit();
                
				
                $baseurl=Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB);
                $url=$baseurl."";
                $this->_redirectUrl($url);

                return;

            } catch (Exception $e) {

                $baseurl=Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB);
                $url=$baseurl."";
                $this->_redirectUrl($url);

                return;
            }
            	}
			
			else
				{
				
				$baseurl=Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB);
                $url=$baseurl."";
                $this->_redirectUrl($url);

                return;
				
				}
        }

}