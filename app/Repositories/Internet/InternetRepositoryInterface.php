<?php
namespace App\Repositories\Internet;

use App\Repositories\RepositoryInterface;

interface InternetRepositoryInterface extends RepositoryInterface
{

    public function getAllInternet($id);
    public function getCategoryName($id);
<<<<<<< HEAD
    public function getAll();
=======
    public function all();
    
>>>>>>> 26dcb9067a6dd7ff68dee53454d6cd611988e3f2

}