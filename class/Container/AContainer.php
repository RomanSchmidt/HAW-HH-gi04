<?php
    /**
     * Created by PhpStorm.
     * User: Roman
     * Date: 17.12.2018
     * Time: 10:07
     */

    namespace Contact\Container;

    use Contact\Container\Element\IElement;

    abstract class AContainer
    {
        protected abstract function getJSONFile(): string;

        private const LIMIT_COMMENT_LIST = 25;

        public function __construct()
        {
            $this->_ensureFiles();
            $this->_init();
        }

        private function _ensureFiles() {
            $myFile = $this->getJSONFile();
            if(!file_exists($myFile)){
                $fh = fopen($myFile, 'w');
                fwrite($fh, '');
                fclose($fh);
            }
        }

        private $_container = [];

        protected abstract function _init();

        public function add(IElement $contact): int
        {
            $index = array_unshift($this->_container, $contact);
            if (sizeof($this->_container) > AContainer::LIMIT_COMMENT_LIST) {
                $this->_container = array_slice($this->_container, 0, AContainer::LIMIT_COMMENT_LIST);
            }
            return $index;
        }

        public function save()
        {
            $newElementsArray = [];

            foreach ($this->_container as $containerElement) {
                array_push($newElementsArray, $containerElement->toJSON());
            }

            $fp = fopen($this->getJSONFile(), 'w');
            fwrite($fp, json_encode($newElementsArray));
            fclose($fp);
        }

        public function getById(int $index): ?IElement
        {
            if (array_key_exists($index, $this->_container)) {
                return $this->_container[$index];
            }
            return null;
        }

        public function getContainer()
        {
            return $this->_container;
        }

        public function removeById(int $index):bool {
            if (array_key_exists($index, $this->_container)) {
                unset($this->_container[$index]);
                return true;
            }
            return false;
        }
    }