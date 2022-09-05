<?php
namespace App\Model;
use App\DAO\ProdutoDAO;

class ProdutoModel
{
    // Irá declarar as propriedades de acordo com a tabela do banco de dados
    public $id, $nome, $descricao;
    public $marca, $valor;

    // Armazenará o array obtidos da DAO  com todas as informações obtidas da tabela
    public $rows;

    // Irá chamar a DAO para salvar as informações no banco de dados da model preenchida
    public function save()
    {
        include 'DAO/ProdutoDAO.php';

        $dao = new ProdutoDAO(); 

        if(empty($this->id))
        {
           
            $dao->insert($this);

        } else {

            $dao->update($this);  }        
    }


  
    public function getAllRows()
    {
        // Incluirá o arquivo ProdutoDAO.php
        include 'DAO/ProdutoDAO.php';
        // Instanciará a classe ProdutoDAO 
          $dao = new ProdutoDAO();
// Selecionará  os registros obtidos da getAllRows e guardará na propriedade  $rows
        $this->rows = $dao->select();
    }


// Selecionará as informações pelo id obtidos da DAO   
    public function getById(int $id)
    {
        include 'DAO/ProdutoDAO.php';

        $dao = new ProdutoDAO();

        $obj = $dao->selectById($id);

         return ($obj) ? $obj : new ProdutoModel(); 

    }


   
    public function delete(int $id) // Irá deletar uma DAO que será direcionado para o banco de dados para deletar as informações
    {
        include 'DAO/ProdutoDAO.php'; 

        $dao = new ProdutoDAO();

        $dao->delete($id);
    }
}