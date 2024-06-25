<?php

namespace App\Repository;

use App\Models\InOutModel;
use App\Models\EmployeeModel;
use Carbon\Carbon;

class InOutRepository
{
    protected $_in_out;
    protected $_employee;

    public function __construct(InOutModel $in_out, EmployeeModel $employee)
    {
        $this->_in_out = $in_out;
        $this->_employee = $employee;
    }

    public function save(InOutModel $in_out, Array $input)
    {
        if(empty($input['date-in']))
            $in_out['date_in'] = date('Y-m-d');
        else
            $in_out['date_in'] = $input['date-in'];
        //
        if(empty($input['hour-in']))
            $in_out['hour_in'] = Carbon::now()->timezone('Africa/Douala')->format('H:i:s');
        else
            $in_out['hour_in'] = $input['hour_in'];
        //
        $in_out['employee_id'] = $input['employee-id'];
        $in_out['user_id'] = $input['user-id'];
        $in_out['created_at'] = Carbon::now()->timezone('Africa/Douala')->format('Y-m-d H:i:s');
        $in_out->save();
    }

    public function store(Array $array)
    {
        $in_out = new $this->_in_out;

        $this->save($in_out, $array);
    }

    public function getPresence()
    {
        return $this->_in_out->join('employees', 'employees.employee_id', 'in_out.employee_id')
                                ->join('services', 'services.service_id', 'employees.service_id')
                                ->where('date_in', now())
                                ->paginate(20);
    }

    /**
     * Select employee
     */
    public function selectEmployee(string $service_id)
    {
        return $this->_employee->where('service_id', $service_id)->get();
    }

    /**
     * Get user presence
     */
    
}