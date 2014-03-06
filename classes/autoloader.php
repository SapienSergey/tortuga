<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 04.03.14
 * Time: 14:13
 */
require_once 'defines.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/modules/Twig/Autoloader.php';
require_once 'BaseController.php';
$redirect = explode('/',$_SERVER["REDIRECT_URL"]);
if ($redirect[1] == null) {
    require_once 'Site/Main.php';
} else {
    require_once $redirect[1].'.php';
}
$base = new classes\BaseController($redirect[1],$redirect[2]);
echo $base->execute();