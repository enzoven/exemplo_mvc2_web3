<?php
// As classes Controller são responsáveis por responder os comandos do usuário mostando a View
namespace App\Controller;
use App\Model\ProdutoModel;

class ProdutoController 
{
    
    // O método index será usado para devolver uma View.
    
    public static function index()
    {
      include 'Model/ProdutoModel.php'; 
        $model = new ProdutoModel(); 
        $model->getAllRows(); 
        include 'View/modules/Produto/ListaProdutos.php'; 
     }

// Devolverá o formulário ao usuário
  
    public static function form()
    {
        include 'Model/ProdutoModel.php';
        $model = new ProdutoModel();

        if(isset($_GET['id'])) 
            $model = $model->getById( (int) $_GET['id']);
            
      
        include 'View/modules/Produto/FormProduto.php'; 
     }
  //Preencherá uma Model para que as informações sejam enviadas para o banco de dados para serem salvas.

    public static function save()
    {
       include 'Model/ProdutoModel.php';
        // incluirá as informações do arquivo Model.

        // Abaixo cada propriedade do objeto será postada com os dados informados pelo usuário no formulário 
       $model = new ProdutoModel();

       $model->id =  $_POST['id'];
       $model->nome = $_POST['nome'];
       $model->descricao = $_POST['descricao'];
       $model->marca = $_POST['marca'];
       $model->valor = $_POST['valor'];
       $model->save(); // Chamará o método save da Model.


       header("Location: /produto"); // Redirecionará o usuário para outra rota.
    }


    public static function delete()
    {
        include 'Model/ProdutoModel.php'; 

        $model = new ProdutoModel();

        $model->delete( (int) $_GET['id'] ); 
        header("Location: /produto"); 
      }
}