<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use App\Repository\EmployeeRepository;
use App\Repository\ServiceRepository;
use App\Repository\UserRepository;
use Auth;

class EmployeeController extends Controller
{
    protected $_employee;
    protected $_service;
    protected $_user;

    /**
     * Employee constructor
     */
    public function __construct(EmployeeRepository $employee, ServiceRepository $service,
                                    UserRepository $user)
    {
        $this->_employee = $employee;
        $this->_service = $service;
        $this->_user = $user;
    }
    /**
     * Get user authenticated information
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
        $employee = $this->_employee->getPaginate(20);
        
        return view('employee.index', ['user_log' => $this->getUser(), 'employee' => $employee]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $service = $this->_service->getPaginate(20);
        return view('employee.create', ['user_log' => $this->getUser(), 'service' => $service]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {
        $employee = $this->_employee->store($request->all());
        return view('employee.store', ['user_log' => $this->getUser(), 'employee' => $employee]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = $this->_employee->show($id);
        return view('employee.show', ['user_log' => $this->getUser(), 'employee' => $employee]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('employee.edit', [
            'user_log' => $this->getUser(), 
            'employee' => $this->_employee->show($id),
            'service' => $this->_service->getPaginate(20)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request, string $id)
    {
        $employee = $this->_employee->update($request->all(), $id);
        return view('employee.update', ['user_log' => $this->getUser(), 'employee' => $employee]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = $this->_employee->delete($id);
        return view('employee.delete', ['user_log' => $this->getUser(), 'employee' => $employee]);
    }

}
