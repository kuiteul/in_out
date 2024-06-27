<?php

namespace App\Repository;

use App\Models\PresenceModel;


class PresenceRepository
{
    protected $_presence;

    /**
     * Constructor
     */
    public function __construct(PresenceModel $presence)
    {
        $this->_presence = $presence;
    }

    /**
     * Save information in the database
     */
    public function save(PresenceModel $presence, Array $array)
    {
        $presence['user_id'] = $array['user-id'];
        $presence['employee_id'] = $array['employee-id'];
        $presence->save();
    }

    /**
     * Get information from controller to store
     */
    public function store(Array $array)
    {
        $presence = new $this->_presence;

        $this->save($presence, $array);
    }

    /**
     * Display all presence
     */
    public function getPaginate(int $number)
    {
        return $this->_presence->join('employees', 'employees.employee_id', 'presence.employee_id')
                                ->join('services', 'services.service_id', 'employees.service_id')
                                ->paginate($number);
    }

    /**
     * search presence by service_id
     */
    public function searchPresence(string $service_id)
    {
        return $this->_presence->join('employees', 'employees.employee_id', 'presence.employee_id')
                                ->where('employees.service_id', $service_id)
                                ->get();
    }

    /**
     * Delete user
     */
    public function delete(string $employee_id)
    {
        $this->_presence->where('employee_id', $employee_id)->delete();
    }
}