<?php

    namespace App\Repository;

    use App\Models\EmployeeModel;

class EmployeeRepository
{
    protected $_employee; // creation of empty attribute

    /**
     * Construction of employee
     */
    public function __construct(EmployeeModel $employee)
    {
        $this->_employee = $employee; // construct employee object
    }

    /**
     * Save information in the database
     */
    public function save(EmployeeModel $employee, Array $input)
    {
        $employee->f_name = $input['first-name'];
        $employee->l_name = $input['last-name'];
        $employee->email = $input['email'];
        $employee->telephone = $input['telephone'];
        $employee->service_id = $input['service-id'];
        $employee->save();
    }

    /**
     * Received information to store from the controller EmployeeController
     */
    public function store(Array $array)
    {
        $employee = new $this->_employee;

        $this->save($employee, $array); //Transmission to the method save.
    }

    /**
     * List all employee present in the database
     */
    public function getPaginate(int $number)
    {
        return $this->_employee->join('services','services.service_id', 'employees.service_id')->paginate($number);
    }

    /**
     * Display information of an employee
     */
    public function show(string $employee_id)
    {
        return $this->_employee->join('services', 'services.service_id', 'employees.service_id')
                                ->where('employee_id', $employee_id)->get();
    }

    /**
     * Update employee information
     */
    public function update(Array $array, string $employee_id)
    {
        
        return $this->_employee->where('employee_id', $employee_id)->update([
            "f_name" => $array['first-name'],
            "l_name" => $array['last-name'],
            "email" => $array['email'],
            "telephone" => $array['telephone'],
            "service_id" => $array['service-id']
        ]);
    }

    /**
     * Delete an employee in the database
     */
    public function delete(string $employee_id)
    {
        return $this->_employee->where('employee_id', $employee_id)->delete();
    }

}