<?php

namespace App\Controller;
use App\Model\ProdutoCategoriaModel;

class ProdutoCategoriaController 
{
    
    public static function index()
    {
      include 'Model/ProdutoCategoriaModel.php'; 
        $model = new ProdutoCategoriaModel(); 
        $model->getAllRows(); 
        include 'View/modules/ProdutoCategoria/ListaProdutoCategoria.php'; 
     }


  
    public static function form()
    {
        include 'Model/ProdutoCategoriaModel.php';
        $model = new ProdutoCategoriaModel();

        if(isset($_GET['id'])) 
            $model = $model->getById( (int) $_GET['id']); 
            
        include 'View/modules/ProdutoCategoria/FormProdutoCategoria.php'; 
     }


    public static function save()
    {
       include 'Model/ProdutoCategoriaModel.php';
       $model = new ProdutoCategoriaModel();

       $model->id =  $_POST['id'];
       $model->descricao = $_POST['descricao'];
       $model->save(); 

       header("Location: /produtocategoria"); 
    }


    public static function delete()
    {
        include 'Model/ProdutoCategoriaModel.php'; 

        $model = new ProdutoCategoriaModel();

        $model->delete( (int) $_GET['id'] ); 
        header("Location: /produtocategoria"); 
      }
}