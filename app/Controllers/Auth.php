<?php namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController {
    public function login() {
        return view('login');
    }

    public function loginSubmit() {
        $userModel = new UserModel();
        $user = $userModel->where('username', $this->request->getPost('username'))->first();

        if ($user && password_verify($this->request->getPost('password'), $user['password'])) {
            session()->set([
                'user_id' => $user['id'],
                'username' => $user['username'],
                'isLoggedIn' => true,
                'user_level' => $user['user_level']
            ]);
            return redirect()->to('/');
        } else {
            return redirect()->back()->with('error', 'Invalid login credentials');
        }
    }

    public function logout() {
        session()->destroy();
        return redirect()->to('/');
    }
}