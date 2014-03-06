<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 06.03.14
 * Time: 11:37
 */

class Admin extends \classes\BaseController {
    public function action_index()
    {
        return array('name'=>'admin');
    }
} 