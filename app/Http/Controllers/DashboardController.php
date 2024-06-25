<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\UserRepository;
use Auth;

class DashboardController extends Controller
{
    protected $_user;

    public function __construct(UserRepository $user)
    {
        $this->_user = $user;
    }

    public function index() {
        $user_id = Auth::user()->user_id;
        return view('dashboard', ['user_log' => $this->_user->show($user_id)]);
    }
}
