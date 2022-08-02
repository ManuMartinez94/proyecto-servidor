<?php namespace App\Controllers;
use App\Models\animalesModel;
use CodeIgniter\RESTful\ResourceController;

class RestColitas extends ResourceController{
    protected $modelName = 'App\Models\animalesModel';
    protected $format    = 'json';

    public function genericResponse($data,$code){
        if($code==200){
            return $this->respond(array(
                "data" => $data,
                "code" => $code
            ));
        }else{
            return $this->respond(array(
                "msj" => 'Error',
                "code" => $code
            ));
        }
    }
    private function url($segmento){
        if(isset($_SERVER['HTTPS'])){
            $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
        }else{
            $protocol = 'http';
        }
        return $protocol . "://" . $_SERVER['HTTP_HOST'] . $segmento;
    }
    private function map($data){
        $animales = array();
        foreach($data as $row){
            $animal = array(
                "id" => $row['id'],
                "nombre" => $row['nombre'],
                "especie" => $row['especie'],
                "protectora" => $row['protectora'],
                "imagen" => base64_encode($row['imagen']),
                "telefono" => $row['telefono'],
                "url" => $this->url('/restcolitas/show/'.$row['id'])
                   
            );
            array_push($animales, $animal);
        }
        return $animales;
    }
    public function index(){
        $model = new animalesModel;
        $data = $model->getAll();
        $animales = $this->map($data);
        return $this->genericResponse($animales,200);
    }
    public function show($id = null)
    {
    $model = new animalesModel;
    if($id==null){
        $data = $model->getAll();
    }else{
        $data = $model->get($id);
    }
    $animales = $this->map($data);
    return $this->genericResponse($animales, 200);
    }
    
}