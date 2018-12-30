<?php

namespace App;

use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    // Employees Roles Scope
    public function scopeEmployeesJobs ($query)
    {
        return $query->whereNotIn('name', ['translator', 'writer', 'user']);
    }

    // Customers Roles Scope
    public function scopeCustomersJobs($query)
    {
        return $query->whereIn('name', ['translator', 'writer', 'user']);
    }
}
