<?php
/**
 * Created by PhpStorm.
 * User: timur
 * Date: 02.11.16
 * Time: 13:32
 */
$contacts = array(
    array(
        'name'     => 'Timur',
        'comment'     => 'Mogento it`s an easy',
        'date_add' => '0000-00-00 00:00:00',
        'approved' => 1
    ),
    array(
        'name'     => 'Sveta',
        'comment'     => 'I know just how to spell the word "Mogento"',
        'date_add' => '0000-00-00 00:00:00',
        'approved' => 1
    ),
    array(
        'name'     => 'Vasya',
        'comment'     => 'blah blah blah',
        'date_add' => '0000-00-00 00:00:00',
        'approved' => 0
    ),
);

foreach($contacts as $contact){
    Mage::getModel('techtalk/contact')
->setData($contact)
        ->save();
}