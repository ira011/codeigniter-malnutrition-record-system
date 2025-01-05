<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
    public function login()
    {
        return view('user/login', [
            'success' => session()->getFlashdata('success'),
            'error' => session()->getFlashdata('error'),
        ]);
    }

    public function authenticate()
    {
        $userModel = new UserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
    
        $user = $userModel->where('username', $username)->first();
    
        if ($user && password_verify($password, $user['password'])) {
            // Set the session with the user's username
            session()->set([
                'id' => $user['id'],
                'username' => $user['username'], // Store username instead of name
                'isLoggedIn' => true,
            ]);
    
            return redirect()->to('/');
        }
    
        return redirect()->back()->with('error', 'Invalid username or password.');
    }
    
    

    public function register()
    {
        helper(['form']);
        return view('user/register', [
            'validation' => session()->getFlashdata('validation')
        ]);
    }

    public function store()
    {
        helper(['form']);

        $rules = [
            'name' => 'required|min_length[3]|max_length[255]',
            'username' => 'required|min_length[4]|is_unique[users.username]',
            'password' => 'required|min_length[6]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $userModel = new UserModel();
        $data = [
            'name' => $this->request->getPost('name'),
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
        ];

        $userModel->save($data);

        return redirect()->to('/login')->with('success', 'Registration successful! Please log in.');
    }

    public function dashboard()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'You must log in to access the dashboard.');
        }

        return view('user/dashboard', [
            'name' => session()->get('name'),
        ]);
    }

    public function logout()
    {
        // Destroy the session
        session()->destroy();

        // Redirect to the home page
        return redirect()->to('/')->with('success', 'You have been logged out.');
    }
}
