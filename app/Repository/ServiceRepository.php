<?php

    namespace App\Repository;

    use App\Models\ServiceModel;

class ServiceRepository
{
    protected $_service;

    public function __construct(ServiceModel $service)
    {
        $this->_service = $service;
    }

    /**
     * Save service into the database
     */
    public function save(ServiceModel $service, Array $input)
    {
        $service->service_name = $input['service-name'];
        $service->service_email = $input['service-email'];
        $service->user_id = $input['user-id'];
        $service->save();
    }

    /**
     * Receive information from the controller to send to the save method.
     */
    public function store(Array $array)
    {
        $service = new $this->_service;

        $service->save($service, $array);
    }

    /**
     * Retrieve all service in the database
     */
    public function getPaginate(int $number)
    {
        return $this->_service->paginate($number);
    }

    /**
     * Retrieve information of a service
     */
    public function show(string $service_id)
    {
        return $this->_service->where('service_id', $service_id)->get();
    }

    /**
     * update a service
     */
    public function update(Array $array, string $service_id)
    {
        $this->_service->where('service_id', $service_id)->update([
            "service_name" => $array['service-name'],
            "service_email" => $array['service-email'],
            "user_id" => $array['user-id']
        ]);
        return true;
    }

    /**
     * delete a service
     */
    public function delete(string $service_id)
    {
        $this->_service->where('service_id', $service_id)->delete();
    }
}