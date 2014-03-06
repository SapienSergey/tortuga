<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 04.03.14
 * Time: 14:03
 */

namespace classes;
use Site\Site_Main;
/**
 * Class BaseController
 * Родительский контроллер
 */
class BaseController {
    public $request;
    public $response;
    public $twig;
    public $BD;
    public function __construct($request, $response)
    {
        $this->request = $request;
        $this->response = $response == null ? 'index' : $response;
        \Twig_Autoloader::register();
        $loader = new \Twig_Loader_Filesystem($_SERVER['DOCUMENT_ROOT'].'/template');
        $twig = new \Twig_Environment($loader, array(
            'debug' => true,
            //'cache' => $_SERVER['DOCUMENT_ROOT'].'/cache',
            /*
            'debug'               => false,
            'charset'             => 'UTF-8',
            'base_template_class' => 'Twig_Template',
            'strict_variables'    => false,
            'autoescape'          => 'html',
            'cache'               => false,
            'auto_reload'         => null,
            'optimizations'       => -1,
            */
        ));
        $this->twig = $twig;
        $this->BD = $this->DB();
    }
    public function execute()
    {
        if ($this->request == null) {
            $controller = new Site_Main($this->request,$this->response);
        } else {
            $txt = $this->request;
            $controller = new $txt($this->request,$this->response);
        }
        $action = 'action_'.$this->response;
        $data = $controller->{$action}();
        return $this->renderView($data);
    }
    protected function renderView($data = null)
    {
        $data = ($data !== null) ? $data : array();
        return $this->twig->render($this->request.'/'.$this->response.'.twig', $data);
    }
    public function DB()
    {
        try {
            $DB = new \PDO('mysql:host=localhost;dbname=yz', 'root', '');
            return $DB;
        } catch (\PDOException $e) {
            return false;
        }
    }
} 