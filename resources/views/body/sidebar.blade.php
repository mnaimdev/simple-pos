<div class="left side-menu">

    <div class="slimscroll-menu" id="remove-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu" class="mt-5">

            <ul class="metismenu mt-5" id="side-menu">

                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="fi-air-play"></i>
                        <span> Dashboard </span>
                    </a>
                </li>


                <li>
                    <a href="javascript: void(0);"><i class="fa-solid fa-person"></i><span> Employee Manage </span>
                        <span class="menu-arrow"></span></a>
                    <ul class="nav-second-level" aria-expanded="false">

                        <li><a href="{{ route('employee') }}">Employee</a></li>

                    </ul>
                </li>


                <li>
                    <a href="javascript: void(0);"><i class="fi-layers"></i> <span> Employee Salary </span> <span
                            class="menu-arrow"></span></a>
                    <ul class="nav-second-level" aria-expanded="false">


                        <li><a href="{{ route('advance.salary') }}">Advance Salary</a></li>

                        <li><a href="{{ route('pay.salary') }}">Pay Salary</a></li>

                        <li><a href="{{ route('month.salary') }}">Last Month Salary</a></li>


                    </ul>
                </li>




                <li>
                    <a href="javascript: void(0);"><i class="fa-solid fa-cart-shopping"></i></i> <span> Customer Manage
                        </span> <span class="menu-arrow"></span></a>
                    <ul class="nav-second-level" aria-expanded="false">


                        <li><a href="{{ route('customer') }}">Customer</a></li>

                    </ul>
                </li>




                <li>
                    <a href="javascript: void(0);"><i class="fa-solid fa-car"></i><span> Supplier Manage
                        </span> <span class="menu-arrow"></span></a>
                    <ul class="nav-second-level" aria-expanded="false">


                        <li><a href="{{ route('supplier') }}">Supplier</a></li>


                    </ul>
                </li>


                <li>
                    <a href="javascript: void(0);"><i class="fa-solid fa-calendar-days"></i><span> Employee
                            Attendence </span> <span class="menu-arrow"></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('attendence') }}">Attendence</a></li>
                    </ul>
                </li>




                <li>
                    <a href="javascript: void(0);"><i class="fa-solid fa-calendar-days"></i>
                        <span> Category Manage
                        </span> <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('category') }}">Category</a></li>
                    </ul>
                </li>




                <li>
                    <a href="javascript: void(0);"><i class="fa-solid fa-calendar-days"></i>
                        <span> Product Manage
                        </span> <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">


                        <li><a href="{{ route('product') }}">Product</a></li>

                        <li><a href="{{ route('product.import') }}">Import Product</a></li>

                    </ul>
                </li>



                <li>
                    <a href="javascript: void(0);"><i class="fa-solid fa-calendar-days"></i>
                        <span> Manage Expense
                        </span> <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">


                        <li><a href="{{ route('expense') }}">Expense</a></li>

                        <li><a href="{{ route('expense.month') }}">Monthly Expense</a></li>

                        <li><a href="{{ route('expense.year') }}">Yearly Expense</a></li>
                    </ul>
                </li>



                <li>
                    <a href="javascript: void(0);"><i class="fa-solid fa-calendar-days"></i>
                        <span> Roles & Permissions
                        </span> <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('permission') }}">Permissions</a></li>
                        <li><a href="{{ route('role') }}">Roles</a></li>
                        <li><a href="{{ route('add.role.permission') }}">Add Role in Permission</a></li>
                        <li><a href="{{ route('role.permission') }}">Permission Under Role</a></li>
                    </ul>
                </li>




                <li>
                    <a href="javascript: void(0);"><i class="fa-solid fa-calendar-days"></i>
                        <span> Assign Role
                        </span> <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('admin') }}">All User</a></li>
                    </ul>
                </li>


                <li>
                    <a href="javascript: void(0);"><i class="fa-solid fa-calendar-days"></i>
                        <span> Branch Manage
                        </span> <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('branch') }}">All Branch</a></li>

                        <li><a href="{{ route('branch.one') }}">Kamrangirchar Branch</a></li>
                        <li><a href="{{ route('branch.two') }}">Dhanmondi Branch</a></li>
                        <li><a href="{{ route('branch.three') }}">Banasree Branch</a></li>



                        <li>
                            <a href="javascript:void(0);"><i class="fi-marquee-plus"></i><span
                                    class="badge badge-success pull-right">Hot</span> <span> POS Manage </span></a>
                            <ul class="nav-second-level" aria-expanded="false">


                                <li><a href="{{ route('pos') }}">POS</a></li>

                                <li><a href="{{ route('pending.order') }}">Pending Orders</a></li>

                                <li><a href="{{ route('complete.order') }}">Complete Orders</a></li>

                            </ul>
                        </li>

                    </ul>



                </li>



            </ul>

        </div>
        <!-- Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
