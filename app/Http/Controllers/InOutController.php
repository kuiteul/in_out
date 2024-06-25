<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\selectEmployeeRequest;
use App\Repository\InOutRepository;
use App\Repository\UserRepository;
use App\Repository\ServiceRepository;
use Auth;

class InOutController extends Controller
{
    protected $_user;
    protected $_in_out;
    protected $_service;

    public function __construct(InOutRepository $in_out, UserRepository $user, ServiceRepository $service)
    {
        $this->_user = $user;
        $this->_in_out = $in_out;
        $this->_service = $service;
    }

    /**
     * Display presence of a day
     */
    public function index()
    {
        return view('entry.daysStatus', [
            'user_log' => $this->_user->show(Auth::user()->user_id),
            'presence' => $this->_in_out->getPresence(20),
            'service' => $this->_service->getPaginate(20)
        ]);
    }

    /**
     * 
     */
    public function entry()
    {
        $user_log = $this->_user->show(Auth::user()->user_id);
        return view('entry.create', [
            'user_log' => $user_log,
            'service' => $this->_service->getPaginate(20)
        ]);
    }

    /**
     * 
     */
    public function selectEmployee(selectEmployeeRequest $request)
    {
        $employee = $this->_in_out->selectEmployee($request['service-id']);
        return view('entry.selectEmployee', [
            'user_log' => $this->_user->show(Auth::user()->user_id),
            'employee' => $employee,
            'presence' => $this->_in_out->getPresence()
        ]);
    }

    /**
     * 
     */
    public function validate(Request $request)
    {
        $this->_in_out->store($request->all());
        return view('entry.dayStatus', [
            'user_log' => $this->_user->show(Auth::user()->user_id),
            'presence' => $this->_in_out->getPresence(20),
            'service' => $this->_service->getPaginate(20)
        ]);
    }
}
