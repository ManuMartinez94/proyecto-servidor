<?php namespace App\Models;
use CodeIgniter\Model;
class animalesModel extends Model {
    protected $allowedField = ['id','nombre','especie','protectora','imagen','telefono'];
    protected $table = 'fotos';

    public function getAnimales($nombre = false){
        if($nombre === false){
            return $this->findAll();
        }
        $query = $this->query("SELECT * FROM fotos WHERE fotos.especie like '%".$nombre."%'");
        return $query->getResult('array');
    }    
}