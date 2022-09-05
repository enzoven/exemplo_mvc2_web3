<?php
namespace App\Model;
use App\DAO\ProdutoCategoriaDAO;

class ProdutoCategoriaModel
{
    public $id, $descricao;
    public $rows;

    public function save()
    {
        include 'DAO/ProdutoCategoriaDAO.php';

        $dao = new ProdutoCategoriaDAO(); 

        if(empty($this->id))
        {
           
            $dao->insert($this);

        } else {

            $dao->update($this);  }        
    }


   
    public function getAllRows()
    {
        include 'DAO/ProdutoCategoriaDAO.php'; 
          $dao = new ProdutoCategoriaDAO();

        $this->rows = $dao->select();
    }


   
    public function getById(int $id)
    {
        include 'DAO/ProdutoCategoriaDAO.php';

        $dao = new ProdutoCategoriaDAO();

        $obj = $dao->selectById($id);

         return ($obj) ? $obj : new ProdutoCategoriaModel(); 

    }


   
    public function delete(int $id)
    {
        include 'DAO/ProdutoCategoriaDAO.php'; 

        $dao = new ProdutoCategoriaDAO();

        $dao->delete($id);
    }
}