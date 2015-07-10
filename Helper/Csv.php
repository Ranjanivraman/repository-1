<?php
/**
 * Created by PhpStorm.
 * User: Ranjani.venkataraman
 * Date: 02/06/2015
 * Time: 12:03
 */
class Prettylittlething_Specialsubscription_Helper_Csv extends Mage_Core_Helper_Abstract
{
    /**
     * Contains current collection
     * @var string
     */

    protected $_list = null;

    public function __construct()
    {
        $collection = Mage::getModel('prettylittlething_specialsubscription/Specialsubscription')->getCollection();

        $this->setList($collection);
    }
    /**
     * Sets current collection
     * @param $query
     */

    public function setList($collection)
    {
        $this->_list = $collection;
    }

    /**
     * Returns indexes of the fetched array as headers for CSV
     * @param array $items
     * @return array
     */
    protected function _getCsvHeaders($items)
    {
        $items = current($items);
        $headers = array_keys($items->getData());

        return $headers;
    }
    /**
     * Generates CSV file with product's list according to the collection in the $this->_list
     * @return array
     */
    public function generateCollectionList($filename)
    {
        if (!is_null($this->_list)) {
            $items = $this->_list->getItems();
            if (count($items) > 0) {

                $io = new Varien_Io_File();
                $path = Mage::getBaseDir('var') . DS . 'export' . DS . 'specialsubscription';
                $name = $filename;
                 //   $name=md5(microtime());
                $file = $path . DS . $name . '.csv';
                $io->setAllowCreateFolders(true);
                $io->open(array('path' => $path));
                $io->streamOpen($file, 'w+');
                $io->streamLock(true);

                $io->streamWriteCsv($this->_getCsvHeaders($items));
                foreach ($items as $item) {
                    $io->streamWriteCsv($item->getData());
                }

            /*    return array(
                    'type'  => 'filename',
                    'value' => $file,
                    'rm'    => false // can delete file after use
                );*/

                return $file;
            }
        }
    }
}