@extends('layouts.app')

@section('title', 'User Management')

@section('content')
  <main class="main-content bgc-grey-100">
    <div id="mainContent">
      <div class="container-fluid">
        <h4 class="c-grey-900 mT-10 mB-30">User Management</h4>
        <div class="row">
          <div class="col-md-12">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
              <div class="d-flex justify-content-between align-items-center mB-20 fsz-sm">
                <h4 class="c-grey-900">User Data</h4>
                <div class="d-none d-md-block">
                  <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">Create New User</a>
                  <a href="{{ route('users.export') }}" class="btn btn-success btn-sm">Export Excel</a>
                  <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#importModal">
                    Import Excel
                  </button>
                </div>

                <!-- Mobile Dropdown -->
                <div class="dropdown d-md-none">
                  <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="userActionsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    Actions
                  </button>
                  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userActionsDropdown">
                    <li><a class="dropdown-item" href="{{ route('users.create') }}"><i class="ti-plus me-2"></i> Create User</a></li>
                    <li><a class="dropdown-item" href="{{ route('users.export') }}"><i class="ti-export me-2"></i> Export Excel</a></li>
                    <li><button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#importModal"><i class="ti-import me-2"></i> Import Excel</button></li>
                  </ul>
                </div>
              </div>

              @if ($errors->any())
                <div class="alert alert-danger">
                  <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif

              <div class="table-responsive">
                <table id="userTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Created At</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $user)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ ucfirst($user->role) }}</td>
                        <td>{{ $user->created_at->format('Y-m-d H:i') }}</td>
                        <td class="text-nowrap">
                          <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-primary" title="View">
                            <i class="ti-eye"></i>
                          </a>
                          <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-info" title="Edit">
                            <i class="ti-pencil"></i>
                          </a>
                          <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" title="Delete" onclick="return confirm('Are you sure?')">
                              <i class="ti-trash"></i>
                            </button>
                          </form>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Import Modal -->
  <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{ route('users.import') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="importModalLabel">Import Users from Excel</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <p class="text-muted small mb-2">Please use the template below to ensure correct data structure.</p>
              <a href="{{ route('users.template') }}" class="btn btn-primary btn-sm">
                <i class="ti-download me-1"></i> Download Template
              </a>
            </div>
            <div class="form-group text-left">
              <label for="file">Excel File (.xlsx, .xls, .csv)</label>
              <input type="file" name="file" id="file" class="form-control" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Import</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/2.3.7/js/dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/2.3.7/js/dataTables.bootstrap5.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#userTable').DataTable();
    });
  </script>
@endpush

@push('css')
  <link rel="stylesheet" href="https://cdn.datatables.net/2.3.7/css/dataTables.bootstrap5.min.css">
@endpush
