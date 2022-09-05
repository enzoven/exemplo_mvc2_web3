<?php
namespace App\DAO;
use App\Model\ProdutoCategoriaModel;
use \PDO;

class ProdutoCategoriaDAO
{
    private $conexao;


    public function __construct()
    {
      $dsn = "mysql:host=localhost:3307;dbname=db_mvc";

        $this->conexao = new PDO($dsn, 'root', 'etecjau');
    }

    public function insert(ProdutoCategoriaModel $model)
    {
           $sql = "INSERT INTO produto_categoria (descricao) VALUES (?) ";

  $stmt = $this->conexao->prepare($sql);


        $stmt->bindValue(1, $model->descricao);
        $stmt->execute();
    }


  
    public function update(ProdutoCategoriaModel $model)
    {
        $sql = "UPDATE produto_categoria SET  descricao=? WHERE id=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->descricao);
        $stmt->bindValue(2, $model->id);
        $stmt->execute();
    }


    public function select()
    {
        $sql = "SELECT * FROM produto_categoria ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);        
    }


   
    public function selectById(int $id)
    {
        include_once 'Model/ProdutoCategoriaModel.php';

        $sql = "SELECT * FROM produto_categoria WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("ProdutoCategoriaModel"); 
    }


   
    public function delete(int $id)
    {
        $sql = "DELETE FROM produto_categoria WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}