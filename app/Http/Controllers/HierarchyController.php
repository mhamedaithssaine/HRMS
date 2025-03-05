<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;

class HierarchyController extends Controller
{
    
    public function hierarchy()
    {
    
        $employees = User::with('roles')->get();    

        $groupedEmployees = [];
        
        foreach ($employees as $employee) {
            if ($employee->roles) {
                foreach ($employee->roles as $role) {
                    $groupedEmployees[$role->name][] = $employee;
                }
            }
        }
        
        return view('hierarchy.index', compact('groupedEmployees'));
    }
}
