<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function authenticate()
    {
        // Handle the login form submission
        // Validate user credentials and perform login logic
    
        // Assuming the login is successful
        // You need to implement the actual login logic and validation here
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
    
        if (($username === 'spongebob' && $password === 'pineapple123') || ($username === 'patrick' && $password === 'rock12345')) {
            // If login is successful, redirect to the homepage
            return redirect()->to(base_url('/welcome_message'));
        } else {
            // If login fails, show an error message and redirect back to the login page
            return redirect()->to(site_url('login'))->with('error', 'Invalid credentials');
        }
    }
}
