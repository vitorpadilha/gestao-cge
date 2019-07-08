<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModeloGenerico extends Model
{
    //protected $id;
    //protected $primaryKey = 'id';
    
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id =$id;
    }
    
}

