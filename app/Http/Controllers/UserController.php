<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Repository\UserRepository;
use App\Repository\EmployeeRepository;
use Auth;

class UserController extends Controller
{
    protected $_user;
    protected $_employee;
    protected $_getUser;

    /**
     * Constructor
     */
    public function __construct(UserRepository $user, EmployeeRepository $employee)
    {
        $this->_user = $user;
        $this->_employee = $employee;
    }

    /**
     * Get information about authenticated user
     */
    public function getUser()
    {
        return $this->_user->show(Auth::user()->user_id);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_log = $this->getUser();
        $user = $this->_user->getPaginate(20);
        return view('user.index', ['user_log' => $user_log, "user" => $user]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employee = $this->_employee->getPaginate(20);
        $user_log = $this->getUser();
        
        return view('user.create', ['user_log' => $user_log, 'employee' => $employee]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $this->_user->store($request->all());
        return view('user.store', ['user_log' => $this->getUser()]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('user.show', ['user_log' => $this->getUser(), 'user' => $this->_user->show($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('user.edit', ['user_log' => $this->getUser(), 'user' => $this->_user->show($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->_user->update($request->all(), $id);
        return view('user.update', ['user_log' => $this->getUser()]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->_user->delete($id);
        return view('user.delete', ['user_log' => $this->getUser()]);
    }
}
