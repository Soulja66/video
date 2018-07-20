<?php

namespace app\admins\controller;
use think\Controller;
use think\Request;
use Util\data\Sysdb;

class BaseAdmin extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->_admin = session('admin');
        if(!$this->_admin){
            header('Location:/admins.php/admins/Account/login');
            exit;
        }
        $this->db = new Sysdb;
    }
}