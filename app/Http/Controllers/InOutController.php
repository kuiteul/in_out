<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\selectEmployeeRequest;
use App\Repository\InOutRepository;
use App\Repository\UserRepository;
use App\Repository\ServiceRepository;
use App\Repository\PresenceRepository;
use Auth;

class InOutController extends Controller
{
    protected $_user;
    protected $_in_out;
    protected $_service;
    protected $_presence;

    public function __construct(InOutRepository $in_out, UserRepository $user, ServiceRepository $service,
                PresenceRepository $presence)
    {
        $this->_user = $user;
        $this->_in_out = $in_out;
        $this->_service = $service;
        $this->_presence = $presence;
    }

    /**
     * Display presence of a day
     */
    public function index()
    {
        return view('entry.presence', [
            'user_log' => $this->_user->show(Auth::user()->user_id),
            'presence' => $this->_presence->getPaginate(20),
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
        $in_presence = [];
        foreach($this->_presence->getPaginate(100) as $item)
        {
            array_push($in_presence, $item->employee_id);
        }
        return view('entry.selectEmployee', [
            'user_log' => $this->_user->show(Auth::user()->user_id),
            'employee' => $employee,
            'presence' => $this->_presence->getPaginate(20),
            'in_presence' => $in_presence
        ]);
    }

    /**
     * 
     */
    public function validate(Request $request)
    {
        $this->_in_out->store($request->all());
        $this->_presence->store($request->all());
        return view('entry.presence', [
            'user_log' => $this->_user->show(Auth::user()->user_id),
            'presence' => $this->_presence->getPaginate(20),
            'service' => $this->_service->getPaginate(20)
        ]);
    }

    /**
     * Remove entry in presence table and update table in_out
     * by adding hour_out and date_out
     */
    public function remove(Request $request, string $employee_id)
    {
        $this->_presence->delete($employee_id);
        $this->_in_out->update($request->all(), $employee_id);

        return view('entry.presence', [
            'user_log' => $this->_user->show(Auth::user()->user_id),
            'presence' => $this->_presence->getPaginate(20),
            'service' => $this->_service->getPaginate(20)
        ]);
    }

    /**
     * 
     */
    public function daysStatus()
    {
        return view('entry.daysStatus', [
            'user_log' => $this->_user->show(Auth::user()->user_id),
            'presence' => $this->_in_out->getPaginate(100),
            'service' => $this->_service->getPaginate(20)
        ]);
    }

    /**
     * 
     */
    public function late()
    {
        return view('entry.late', [
            'user_log' => $this->_user->show(Auth::user()->user_id),
            'late' => $this->_in_out->late()
        ]);
    }

    public function searchPresence(Request $request)
    {
        return view('entry.searchPresence', [
            'user_log' => $this->_user->show(Auth::user()->user_id),
            'presence' => $this->_presence->searchPresence($request['service-id']),
            'service' => $this->_service->getPaginate(20)
        ]);
    }
}
