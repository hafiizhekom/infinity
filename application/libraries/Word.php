<?php 
 
require_once dirname(__FILE__) . '/libword/PhpWord.php';
 
class Word extends PHPWord { 
    public function __construct() { 
        parent::__construct(); 
    } 
}