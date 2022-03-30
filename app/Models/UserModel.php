<?php

namespace App\Models;

use CodeIgniter\Model;



class UserModel extends Model
{
    protected $table = 'users';
	protected $primaryKey = 'id';
    protected $useAutoIncreament = true;
	
	protected $allowedFields = ['id','fullname', 'dob', 'phone','email','address','post_code','city','country','password','permission']; // Letting the code know what to update
	
	// This function returns news items from the db
	
	public function getUser($id = false)
	{
    if ($id === false) {
        return $this->findAll();
    }

    return $this->where(['id' => $id])->first();
	}