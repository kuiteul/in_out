<?php

namespace App\Repository;

use App\Models\UserModel;

class UserRepository
{
    protected $_user;

    /**
     * Build constructor
     */
    public function __construct(UserModel $user)
    {
        $this->_user = $user;
    }

    /**
     * Saving user into the database
     */
    public function save(UserModel $user, Array $input)
    {
        $user->email = $this->getEmail($input['employee-id']);
        $user->password = bcrypt($input['password']);
        $user->employee_id = $input['employee-id'];
        $user->role = $input['role'];
        $user->save();
    }

    /**
     * Select email
     */
    public function getEmail(string $employee_id)
    {
        $email = "";
        $data = $this->_user->join('employees', 'employees.employee_id', 'users.employee_id')
                                ->where('employees.employee_id', $employee_id)
                                ->get();
        foreach($data as $item)
        {
            $email = $item['email'];
        }
        return $email;
    }

    /**
     * Receive information from UserController to send them to save method
     */
    public function store(Array $array)
    {
        $user = new $this->_user;

        $this->save($user, $array);
    }

    /**
     * List all users into the table users
     */
    public function getPaginate(int $number)
    {
        return $this->_user->join('employees', 'employees.employee_id', 'users.employee_id')->paginate(20);
    }

    /**
     * Show information about a user
     */
    public function show(string $user_id)
    {
        return $this->_user->join('employees', 'employees.employee_id', 'users.employee_id')
                            ->where('users.user_id', $user_id)
                            ->get();
    }

    /**
     * Update user
     */
    public function update(Array $array, string $user_id): bool
    {
        $this->_user->where('user_id', $user_id)->update([
            "email" => $array['email'],
            "role" => $array['password'],
        ]);

        return true;
    }

    /**
     * Delete user
     */
    public function delete(string $user_id): bool
    {
        $this->_user->where('user_id', $user_id)->delete();
        return true;
    }
}