<?php
    class File {
        protected String $bytes;
        protected String $path;
        //MySQL MEDIUMBLOB = 16.78 MB - 16777215 bytes
        protected int $MaxSize = 16777215;

        function __construct($string){
            if(!preg_match("/(\w|\/|\\|_)+.\w+/",$string)){
                $this->bytes = $string;
                return;
            }
            $this->path = $string;
            $bytes = file_get_contents($this->path);
            if(strlen($bytes) <= $this->MaxSize) $this->bytes = $bytes;
        }
        public function getBytes() : String {
            return $this->bytes;
        }
        public function getHash($algo = "sha256") : String {
            return hash($algo,$this->getBytes());
        }
        public function getMimeType() : String {
            return mime_content_type($this->getPath());
        }
        public function getName() : String {
            return basename($this->getPath());
        }
        public function getExtension() : String {
            $fileName = explode(".",$this->getName());
            return end($fileName);
        }
        public function getPath() : String {
            return $this->path;
        }
        public function isValid() : bool {
            return ($this->bytes && $this->path);
        }
        public function setPath($path) : void {
            $this->path = $path;
        }
        function getSize() : int {
            return strlen($this->bytes);
        }
        function getSizeKB(): float {
            return $this->getSize() / 1000;
        }
        function getSizeMB(): float {
            return $this->getSizeKB() / 1000;
        }
        function getSizeGB(): float {
            return $this->getSizeMB() / 1000;
        }
        function __toString(){
            return $this->getBytes();
        }
    }
?>