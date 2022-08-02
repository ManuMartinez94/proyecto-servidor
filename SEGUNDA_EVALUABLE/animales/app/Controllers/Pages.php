<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\animalesModel;
class Pages extends Controller{
    //Pinta el main que le pasemos por parámetro, y en su defecto el home
    public function view($page = 'home'){
        if(!is_file(APPPATH . '/Views/' . $page . '.php')){
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
        $data['title'] = ucfirst($page);
        echo view('header',$data);
        echo view($page,$data);
        echo view('footer',$data);
    }
    //Pinta en el listado los animales buscados por el nombre
    public function nombre(){
        $nombre = htmlspecialchars($_GET['nombre']);
        $nombre = trim($nombre);
        $nombre = strip_tags($nombre);
        $animales = json_decode( file_get_contents('http://localhost:8081/restcolitas/show/'.$nombre), true );
        $data = [
            'title' => 'Animales',
            'animales' =>$animales['data']
        ];
        echo view('header',$data);
        echo view('listado',$data);
        echo view('footer',$data);
    }
    //Pinta en el listado los animales buscados por su especie
    public function especie(){
        $especie = htmlspecialchars($_GET['nombre']);
        $especie = trim($especie);
        $especie = strip_tags($especie);
        $model = new animalesModel();
        $data = [
            'title' => 'Especie',
            'animales' =>$model->getAnimales($especie)
        ];
        echo view('header',$data);
        echo view('listado',$data);
        echo view('footer',$data);
    }
    //Pinta el formulario 
    public function formulario($tipo){
        $data['tipo'] = $tipo;
        echo view('header',$data);
        echo view('formulario',$data);
        echo view('footer',$data);
    }


}