<?php
require_once './Service.php';
class Service_Secure
{
    protected $class_name    = '';
    protected $authenticated = false;

    

    public function __construct($class_name)
    {
        $this->class_name = $class_name;

    }

    public function AuthHeader($Header)
    {
        if($Header->auth_token == 'foo')
            $this->authenticated = true;

    }

    public function __call($method_name, $arguments)
    {
        if(!method_exists($this->class_name, $method_name))
            throw new Exception('method not found');

        $this->checkAuth();

        return call_user_func_array(array($this->class_name, $method_name), $arguments);

    }

   

    protected function checkAuth()
    {
        if(!$this->authenticated){
			header("http/1.1 403 Forbidden"); exit(); 
		}
    }

}
