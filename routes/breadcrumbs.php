<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.


use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard'));
});


Breadcrumbs::for('dashboard_admin', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Dashboard_admin', route('dashboard'));
});
// Home > Blog
// Employees

Breadcrumbs::for('employees', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Employees', route('admin.employees.index'));
});

Breadcrumbs::for('employees.create', function (BreadcrumbTrail $trail) {
    $trail->parent('employees');
    $trail->push('Create Employee', route('admin.employees.create'));
});

Breadcrumbs::for('employees.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('employees');
    $trail->push('Employee Editor', route('admin.employees.index'));
});

Breadcrumbs::for('employees.show', function (BreadcrumbTrail $trail) {
    $trail->parent('employees');
    $trail->push('Employee View', route('admin.employees.index'));
});
Breadcrumbs::for('employees.showid', function (BreadcrumbTrail $trail) {
    $trail->parent('employees');
    $trail->push('Employee Identy Card View', route('admin.employees.index'));
});


// Home > Blog > [Category]
Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('blog');
    $trail->push($category->title, route('category', $category));
});

// Assets

Breadcrumbs::for('assets', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Assets Index', route('admin.assets.index'));
});

Breadcrumbs::for('assets.create', function (BreadcrumbTrail $trail) {
    $trail->parent('assets');
    $trail->push('Create Asset', route('admin.assets.index'));
});

Breadcrumbs::for('assets.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('assets');
    $trail->push('Asset Editor', route('admin.assets.index'));
});
Breadcrumbs::for('assets.show', function (BreadcrumbTrail $trail) {
    $trail->parent('assets');
    $trail->push('Asset View', route('admin.assets.index'));
});

// Salary Structure 

Breadcrumbs::for('salary', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Salary Index', route('admin.salary.index'));
});


Breadcrumbs::for('salary.create', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Create Salary', route('admin.salary.create'));
});
Breadcrumbs::for('salary.show', function (BreadcrumbTrail $trail) {
    $trail->parent('salary');
    $trail->push('Salary  View', route('admin.salary.index'));
});

Breadcrumbs::for('salary.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('salary');
    $trail->push('Salary Editor', route('admin.salary.index')); 
});

// Payroll
Breadcrumbs::for('payroll.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Payroll', route('admin.payroll.index')); 
});
 
// Leave 
Breadcrumbs::for('leave', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Leave Index', route('admin.leave.index')); 
});

Breadcrumbs::for('leave.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('leave');
    $trail->push('Leave Editor', route('admin.leave.index')); 
});

Breadcrumbs::for('leave.show', function (BreadcrumbTrail $trail) {
    $trail->parent('leave');
    $trail->push('Leave View', route('admin.leave.index')); 
});

// Attendance 

Breadcrumbs::for('attendance', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Attendance Index', route('admin.attendance.index')); 
});

Breadcrumbs::for('attendance.create', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Attendance Index', route('admin.attendance.index')); 
});

Breadcrumbs::for('attendance.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('attendance');
    $trail->push('Attendance Editor', route('admin.attendance.index')); 
});

Breadcrumbs::for('attendance.show', function (BreadcrumbTrail $trail) {
    $trail->parent('leave');
    $trail->push('Attendance View', route('admin.attendance.index')); 
});

// Tasks 

Breadcrumbs::for('tasks', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Task Index', route('admin.tasks.index')); 
});

Breadcrumbs::for('tasks.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('tasks');
    $trail->push('Tasks Editor', route('admin.tasks.index')); 
});

Breadcrumbs::for('tasks.show', function (BreadcrumbTrail $trail) {
    $trail->parent('tasks');
    $trail->push('Tasks View', route('admin.tasks.index')); 
});

// Projects 

Breadcrumbs::for('projects', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Project Index', route('admin.projects.index')); 
});

Breadcrumbs::for('projects.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('projects');
    $trail->push('Project Editor', route('admin.projects.index')); 
});

Breadcrumbs::for('projects.show', function (BreadcrumbTrail $trail) {
    $trail->parent('projects');
    $trail->push('Project View', route('admin.tasks.index')); 
});

Breadcrumbs::for('projects.create', function (BreadcrumbTrail $trail) {
    $trail->parent('projects');
    $trail->push('Project Create', route('admin.tasks.index')); 
});

// Clients 
Breadcrumbs::for('clients', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Client Index', route('admin.projects.index')); 
});

Breadcrumbs::for('clients.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('clients');
    $trail->push('Client Editor', route('admin.clients.index')); 
});

Breadcrumbs::for('clients.show', function (BreadcrumbTrail $trail) {
    $trail->parent('clients');
    $trail->push('Client View', route('admin.clients.index')); 
});

Breadcrumbs::for('clients.create', function (BreadcrumbTrail $trail) {
    $trail->parent('clients');
    $trail->push('Client Create', route('admin.clients.index')); 
});

// Users 
Breadcrumbs::for('users', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Users Index', route('admin.users.index')); 
});

Breadcrumbs::for('users.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('users');
    $trail->push('Editing User details', route('admin.clients.index')); 
});

Breadcrumbs::for('users.show', function (BreadcrumbTrail $trail) {
    $trail->parent('users');
    $trail->push('User Details', route('admin.users.index')); 
});

Breadcrumbs::for('users.create', function (BreadcrumbTrail $trail) {
    $trail->parent('users');
    $trail->push('Add User', route('admin.users.index')); 
});
