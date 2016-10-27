<?php
ini_set('display_errors', 1);
require 'app/bootstrap.php';
require 'app/Mage.php';

Mage::app('admin')->setUseSessionInUrl(false);

umask(0);

//$help = new Ainstainer_TechTalk_Helper_Data();
//$help->sayHello();


echo Mage::getModel('techtalk/techLogic')->sayHello();
echo "<br>";
echo Mage::helper('techtalk')->sayHello();

