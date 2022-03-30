<?php

namespace App\Models;

use CodeIgniter\Model;



class DisputeModel extends Model
{
    protected $table = 'dispute';
	protected $primaryKey = 'id';
    protected $useAutoIncreament = true;
	
	protected $allowedFields = ['id','title', 'start_date', 'status']; // Letting the code know what to update
	
	// This function returns news items from the db
	
	public function getDispute($id = false)
	{
    if ($id === false) {
        return $this->findAll();
    }

    return $this->where(['id' => $id])->first();
	}