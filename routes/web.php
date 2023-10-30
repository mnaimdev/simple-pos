<?php

use App\Http\Controllers\Backend\AttendenceController;
use App\Http\Controllers\Backend\BranchController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\EmployeeController;
use App\Http\Controllers\Backend\EmployeeSalaryController;
use App\Http\Controllers\Backend\ExpenseController;
use App\Http\Controllers\Backend\PaySalaryController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\POSController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\SupplierController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('auth.login');
})->name('root');

Route::get('/dashboard', function () {
    return view('admin');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


// User
Route::middleware(['auth'])->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::get('/admin/logout',  'admin_logout')->name('admin.logout');
        Route::get('/admin/logout/page',  'admin_logout_page');
        Route::get('/admin/profile',  'admin_profile')->name('admin.profile');
        Route::post('/update/profile/info',  'update_info')->name('update.info');
        Route::post('/update/profile/password',  'update_password')->name('update.password');

        Route::get('/admin', 'admin')->name('admin');
        Route::get('/assign/role', 'assign_role')->name('assign.role');
        Route::post('/assign/role/store', 'assign_role_store')->name('assign.role.store');

        Route::get('/edit/assign/role/{id}', 'edit_assign_role')->name('edit.assign.role');
        Route::post('/update/assign/role', 'update_assign_role')->name('update.assign.role');
        Route::get('/delete/assign/role/{id}', 'delete_assign_role')->name('delete.assign.role');
    });
});


// Employee
Route::middleware(['auth'])->group(function () {
    Route::get('/employee', [EmployeeController::class, 'employee'])->name('employee');
    Route::get('/employee/create', [EmployeeController::class, 'create'])->name('employee.create');
    Route::post('/employee/store', [EmployeeController::class, 'store'])->name('employee.store');
    Route::get('/employee/show/{id}', [EmployeeController::class, 'show'])->name('employee.show');
    Route::get('/employee/edit/{id}', [EmployeeController::class, 'edit'])->name('employee.edit');
    Route::post('/employee/update', [EmployeeController::class, 'update'])->name('employee.update');
    Route::get('/employee/delete/{id}', [EmployeeController::class, 'destroy'])->name('employee.delete');
});



// Customer
Route::middleware(['auth'])->group(function () {
    Route::controller(CustomerController::class)->group(function () {
        Route::get('/customer', 'customer')->name('customer');
        Route::get('/customer/create',  'create')->name('customer.create');
        Route::post('/customer/store',  'store')->name('customer.store');
        Route::get('/customer/show/{id}',  'show')->name('customer.show');
        Route::get('/customer/edit/{id}',  'edit')->name('customer.edit');
        Route::post('/customer/update',  'update')->name('customer.update');
        Route::get('/customer/delete/{id}',  'destroy')->name('customer.delete');
    });
});



// Supplier
Route::middleware(['auth'])->group(function () {
    Route::controller(SupplierController::class)->group(function () {
        Route::get('/supplier', 'supplier')->name('supplier');
        Route::get('/supplier/create',  'create')->name('supplier.create');
        Route::post('/supplier/store',  'store')->name('supplier.store');
        Route::get('/supplier/show/{id}',  'show')->name('supplier.show');
        Route::get('/supplier/edit/{id}',  'edit')->name('supplier.edit');
        Route::post('/supplier/update',  'update')->name('supplier.update');
        Route::get('/supplier/delete/{id}',  'destroy')->name('supplier.delete');
    });
});



// Advance Salary
Route::middleware(['auth'])->group(function () {
    Route::controller(EmployeeSalaryController::class)->group(function () {
        Route::get('/advance/salary', 'salary')->name('advance.salary');
        Route::get('/advance/salary/create',  'create')->name('advance.salary.create');
        Route::post('/advance/salary/store',  'store')->name('advance.salary.store');
        Route::get('/advance/salary/edit/{id}',  'edit')->name('edit.advance.salary');
        Route::post('/advance/salary/update',  'update')->name('advance.salary.update');
        Route::get('/advance/salary/delete/{id}',  'destroy')->name('delete.advance.salary');
    });
});


// Pay Salary
Route::middleware(['auth'])->group(function () {
    Route::controller(PaySalaryController::class)->group(function () {
        Route::get('/pay/salary', 'index')->name('pay.salary');
        Route::get('/pay/now/{id}', 'create')->name('pay.now');
        Route::post('/pay/salary/store', 'store')->name('pay.salary.store');
        Route::get('/last/month/salary/', 'last_month_salary')->name('month.salary');
    });
});



// Attendence
Route::middleware(['auth'])->group(function () {
    Route::controller(AttendenceController::class)->group(function () {
        Route::get('/attendence', 'index')->name('attendence');
        Route::get('/attendence/create', 'create')->name('attendence.create');
        Route::post('/attendence/store', 'store')->name('attendence.store');
        Route::get('/attendence/edit/{date}', 'edit')->name('attendence.edit');
        Route::post('/attendence/update', 'update')->name('attendence.update');
        Route::get('/attendence/view/{date}', 'view')->name('attendence.view');
    });
});


// Category
Route::middleware(['auth'])->group(function () {
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/category', 'index')->name('category');
        Route::get('/category/create', 'create')->name('category.create');
        Route::post('/category/store', 'store')->name('category.store');
        Route::get('/category/edit/{id}', 'edit')->name('category.edit');
        Route::post('/category/update', 'update')->name('category.update');
        Route::get('/category/delete/{id}', 'destroy')->name('category.delete');
    });
});


// Product
Route::middleware(['auth'])->group(function () {
    Route::controller(ProductController::class)->group(function () {
        Route::get('/product', 'index')->name('product');
        Route::get('/product/create', 'create')->name('product.create');
        Route::post('/product/store', 'store')->name('product.store');
        Route::get('/product/edit/{id}', 'edit')->name('product.edit');
        Route::post('/product/update', 'update')->name('product.update');
        Route::get('/product/delete/{id}', 'destroy')->name('product.delete');

        Route::get('/product/inventory/{id}', 'inventory')->name('product.inventory');
        Route::post('/inventory/store', 'inventory_store')->name('inventory.store');

        Route::get('/product/barcode/{id}', 'code')->name('product.barcode');

        Route::get('/product/import', 'import')->name('product.import');
        Route::post('/product/import/store', 'import_store')->name('import.store');

        Route::get('/product/export', 'export')->name('product.export');
    });
});



// Expense
Route::middleware(['auth'])->group(function () {
    Route::controller(ExpenseController::class)->group(function () {
        Route::get('/expense', 'index')->name('expense');
        Route::get('/expense/create', 'create')->name('expense.create');
        Route::post('/expense/store', 'store')->name('expense.store');
        Route::get('/expense/edit/{id}', 'edit')->name('expense.edit');
        Route::post('/expense/update', 'update')->name('expense.update');

        Route::get('/expense/month', 'month')->name('expense.month');
        Route::get('/expense/year', 'year')->name('expense.year');
    });
});


// POS
Route::middleware(['auth'])->group(function () {
    Route::controller(POSController::class)->group(function () {
        Route::get('/pos', 'index')->name('pos');
        Route::post('/cart/store', 'store')->name('cart.store');
        Route::post('/create/invoice', 'invoice')->name('create.invoice');
        Route::post('/order', 'order')->name('order');

        Route::get('/pending/order', 'pending')->name('pending.order');
        Route::get('/complete/order', 'complete')->name('complete.order');

        Route::get('/order/details/{id}', 'details')->name('order.details');
        Route::post('/order/status/update', 'status_update')->name('order.status.update');

        Route::get('/invoice/download/{order_id}', 'download')->name('invoice.download');
    });
});


// Role Manager
Route::middleware(['auth'])->group(function () {
    Route::controller(PermissionController::class)->group(function () {
        Route::get('/permission', 'index')->name('permission');
        Route::get('/permission/create', 'create')->name('permission.create');
        Route::post('/permission/store', 'store')->name('permission.store');
        Route::get('/permission/edit/{id}', 'edit')->name('permission.edit');
        Route::post('/permission/update', 'update')->name('permission.update');
        Route::get('/permission/delete/{id}', 'destroy')->name('permission.delete');

        Route::get('/add/role/permission', 'add_role_permission')->name('add.role.permission');
        Route::post('/role/permission/store', 'role_permission_store')->name('role.permission.store');
    });


    Route::controller(RoleController::class)->group(function () {
        Route::get('/role', 'index')->name('role');
        Route::get('/role/create', 'create')->name('role.create');
        Route::post('/role/store', 'store')->name('role.store');
        Route::get('/role/edit/{id}', 'edit')->name('role.edit');
        Route::post('/role/update', 'update')->name('role.update');
        Route::get('/role/delete/{id}', 'destroy')->name('role.delete');


        Route::get('/role/permission/', 'role_permission')->name('role.permission');
        Route::get('/edit/role/permission/{id}', 'edit_role_permission')->name('edit.role.permission');
        Route::post('/role/permission/update/', 'role_permission_update')->name('role.permission.update');

        Route::get('/delete/role/permission/{id}', 'delete_role_permission')->name('delete.role.permission');
    });
});


// Branch
Route::middleware(['auth'])->group(function () {
    Route::controller(BranchController::class)->group(function () {
        Route::get('/branch', 'index')->name('branch');
        Route::get('/branch/create', 'create')->name('branch.create');
        Route::post('/branch/store', 'store')->name('branch.store');


        Route::get('/branch/one', 'one')->name('branch.one');
        Route::get('/branch/two', 'two')->name('branch.two');
        Route::get('/branch/three', 'three')->name('branch.three');


        Route::post('/branch/employee/store', 'branch_employee_store')->name('branch.employee.store');
    });
});
