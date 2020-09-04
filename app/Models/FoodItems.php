<?php namespace App\Models;

use CodeIgniter\Model;

class FoodItems extends Model
{
    protected $table = "food";

    public function saveUser($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function getFoodItem(){
        return $this->findAll();
    }

    public function getRestaurant($email){
        $query = $this->db->table('users')->where('email',$email)->get()->getRowArray();
        return $query;
    }
}