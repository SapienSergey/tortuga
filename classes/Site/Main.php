<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 06.03.14
 * Time: 11:07
 */
namespace Site;
use classes\BaseController;

class Site_Main extends BaseController {
    public function action_index()
    {
        $data = array('name'=>'test');
        return $data;
    }
} 