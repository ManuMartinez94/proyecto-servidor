<?php namespace App\Models;
use CodeIgniter\Model;
class animalesModel extends Model {
    protected $table = 'fotos';
    protected $primaryKey = 'id';
    protected $allowedField = ['id','nombre','especie','protectora','imagen','telefono'];

    public function getAll(){
        $query = $this->query("SELECT * FROM fotos");
        return $query->getResult('array');
    }
    public function get($nombre){
        $sql = "SELECT * FROM fotos WHERE nombre=:nombre:";
        $query = $this->query($sql,['nombre'=>$nombre]);
        return $query->getResult('array');
    }
}