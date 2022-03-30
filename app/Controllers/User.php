<?php

namespace App\Controllers;

use App\Models\UserModel;


class User extends BaseController
{
	 
    // Get all news items
	public function index()
	{
	$model = new UserModel();

    $data = [
        'user'  => $model->getUser(),
        'title' => 'Users Details',
    ];
	
	
		
		
    echo view('templates/header', $data);
    echo view('user/overview', $data);
    echo view('templates/footer', $data);
		
	}
	
	// Get one news item
    public function view($id = null)
    {
        $model = model(UserModel::class);

        $data['user'] = $model->getUser($id);
		
		
		echo view('templates/header', ['title' => 'View  item']);
		echo view('templates/navbar');
		echo view('templates/sidebar');
        return view('user/view', $data);
        echo view('templates/footer');
		
		
		
		
    }
	
// Function for creating new news
	public function create()
{
    $model = model(UserModel::class);

    if ($this->request->getMethod() === 'post' && $this->validate([
        'fullname' => 'required|min_length[3]|max_length[255]',
        'email'  => 'email',
    ])) {
        $model->save([
            'fullname' => $this->request->getPost('fullname'),
			'dob' => $this->request->getPost('dob'),
			'phone' => $this->request->getPost('phone'),
            'email'  => $this->request->getPost('email'),
            'address'  => $this->request->getPost('address'),
			'post_code'  => $this->request->getPost('post_code'),
			'city'  => $this->request->getPost('city'),
			'country'  => $this->request->getPost('country'),
			'password'  => $this->request->getPost('password')
			
			
        ]);
		
		
			
        //echo view('news/success'); // once it saves, it opens the success page
		return $this->response->redirect(site_url('/user'));
		}
		else {
        echo view('templates/header', ['title' => 'Create a news item']);
        echo view('user/create');
        echo view('templates/footer');
		}
	}
	
	
	
	public function delete_user($id)
	{
		 $model = new UserModel();
		
		$data['model'] = $model->where('id', $id)->delete($id);
		
        return $this->response->redirect(site_url('/user'));
	}
	
	
	  public function edit($id) {
		 
        $model = new UserModel();
		//$model = $this->find($id);
        $data['user'] = $model->getUser($id);
		
		echo view('templates/header', ['title' => 'Update user information']);
		return view('/user/update', $data);
       //echo view('news/create');
        echo view('templates/footer');
        
		
    } 
	
	
	
	public function update()
	{
		
		 $model = new UserModel();
		
		 $id = $this->request->getVar('id');
		 
		 
		 $data = [
            'title' => $this->request->getPost('title'),
            //'slug'  => url_title($this->request->getPost('title'), '-', true),
            'body'  => $this->request->getPost('body'),
        ];
		
		$model->update($id, $data);
        return $this->response->redirect(site_url('/user'));
		 
		
	}
}
