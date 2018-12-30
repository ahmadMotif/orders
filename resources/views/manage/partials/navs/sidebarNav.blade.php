<div class="sidebar-sticky py-3 text-center">
  <ul class="nav flex-column ">
    <li class="nav-item">
      <a class="nav-link active" href="#">
        <span data-feather="home"></span>
        Dashboard <span class="sr-only">(current)</span>
      </a>
    </li>
    @role(['superadministrator', 'administrator'])
    <li class="nav-item">
      <a class="nav-link" href="{{ route('employees.index') }}">
        <span data-feather="users"></span>
        Employees management
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('customers.index') }}">
        <span data-feather="users"></span>
        Customers management
      </a>
    </li>
    @endrole
    <li class="nav-item">
      <a class="nav-link" href="{{ route('customers-orders.index') }}">
        <span data-feather="file"></span>
        Customers Orders
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">
        <span data-feather="shopping-cart"></span>
        Products
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">
        <span data-feather="bar-chart-2"></span>
        Reports
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">
        <span data-feather="layers"></span>
        Integrations
      </a>
    </li>
  </ul>

  <h5 class="sidebar-heading d-flex justify-content-center align-items-center px-3 mt-4 mb-1 text-muted font-weight-bold">
    <span>Saved reports</span>
    <a class="d-flex align-items-center text-muted" href="#">
      <span data-feather="plus-circle"></span>
    </a>
  </h5>
  <ul class="nav flex-column mb-2">
    <li class="nav-item">
      <a class="nav-link" href="#">
        <span data-feather="file-text"></span>
        Current month
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">
        <span data-feather="file-text"></span>
        Last quarter
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">
        <span data-feather="file-text"></span>
        Social engagement
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">
        <span data-feather="file-text"></span>
        Year-end sale
      </a>
    </li>
  </ul>
</div>
