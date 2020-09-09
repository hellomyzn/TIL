<?php
namespace App\MyClasses;

class PowerMyservice implements MyServiceInterface{

    private $id = -1;
    private $msg = 'no id...';
    private $data = ['Konithiwa', 'Yokoso', 'Sayonara'];

    function __construct(){
        $this->setId(rand(0, count($this->data)));

    }

    public function setId($id)
    {
        if ($id >= 0 && $id < count($this->data)){
            $this->id = $id;
            $this->msg = "You like ". $id . "'s" . $this->data[$id] . "right?";
        }
    }

    public function say()
    {
        return $this->msg;
    }

    public function data(int $id)
    {
        return $this->data[$id];
    }

    public function alldata()
    {
        return $this->data;
    }
}
