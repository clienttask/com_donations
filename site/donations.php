<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;

$app = Factory::getApplication();
$dispatcher = $app->bootComponent('com_donations')->getDispatcher($app);
$dispatcher->dispatch();
