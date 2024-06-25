<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ServiceRequest;
use App\Repository\ServiceRepository;
use App\Repository\UserRepository;
use Auth;

class ServiceController extends Controller
{
    protected $_service;
    protected $_user;


    public function __construct(ServiceRepository $service, UserRepository $user)
    {
        $this->_service = $service;
        $this->_user = $user;
    }
    /**
     * Get information from authenticated user
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
        $service = $this->_service->getPaginate(20);
        
        return view('service.index', ['user_log' => $this->getUser(), "service" => $service]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('service.create', ['user_log' => $this->getUser()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceRequest $request)
    {
        $service = $this->_service->store($request->all());
        
        return view('service.store', ['user_log' => $this->getUser(), 'service' => $service]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $service_id)
    {
        $service = $this->_service->show($service_id);
        return view('service.show', ['user_log' => $this->getUser(), 'service' => $service]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $service_id)
    {
        return view('service.edit', ['user_log' => $this->getUser(), 'service' => $this->_service->show($service_id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceRequest $request, string $service_id)
    {
        $service = $this->_service->update($request->all(), $service_id);
        return view('service.update', ['user_log' => $this->getUser(), 'service' => $service]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $service_id)
    {
        $service = $this->_service->delete($service_id);
        return view('service.delete', ['user_log' => $this->getUser(), 'service' => $service]);
    }
}
