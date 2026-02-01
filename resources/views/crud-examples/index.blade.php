@extends('layouts.app')

@section('title', 'Crud Example')

@section('content')
  <main class="main-content bgc-grey-100">
    <div id="mainContent">
      <div class="container-fluid">
        <h4 class="c-grey-900 mT-10 mB-30">Crud Example</h4>
        <div class="row">
          <div class="col-md-12">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
              <div class="d-flex justify-content-between align-items-center mB-20 fsz-sm">
                <h4 class="c-grey-900">Crud Example Data</h4>
                <div class="d-none d-md-block">
                  <a href="{{ route('crud-examples.create') }}" class="btn btn-primary btn-sm">Create New</a>
                  <a href="{{ route('crud-examples.export') }}" class="btn btn-success btn-sm">Export Excel</a>
                  <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#importModal">
                    Import Excel
                  </button>
                </div>

                <!-- Mobile Dropdown -->
                <div class="dropdown d-md-none">
                  <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="crudActionsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    Actions
                  </button>
                  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="crudActionsDropdown">
                    <li><a class="dropdown-item" href="{{ route('crud-examples.create') }}"><i class="ti-plus me-2"></i> Create New</a></li>
                    <li><a class="dropdown-item" href="{{ route('crud-examples.export') }}"><i class="ti-export me-2"></i> Export Excel</a></li>
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
                <table id="dataTable2" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Position</th>
                      <th>Office</th>
                      <th>Age</th>
                      <th>Salary</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $item)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->position }}</td>
                        <td>{{ $item->office }}</td>
                        <td>{{ $item->age }}</td>
                        <td>${{ number_format($item->salary, 0, '.', ',') }}</td>
                        <td class="text-nowrap">
                          <a href="{{ route('crud-examples.show', $item->id) }}" class="btn btn-sm btn-primary" title="View">
                            <i class="ti-eye"></i>
                          </a>
                          <a href="{{ route('crud-examples.edit', $item->id) }}" class="btn btn-sm btn-info" title="Edit">
                            <i class="ti-pencil"></i>
                          </a>
                          <form action="{{ route('crud-examples.destroy', $item->id) }}" method="POST" style="display:inline-block">
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
        <form action="{{ route('crud-examples.import') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="importModalLabel">Import Data from Excel</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <p class="text-muted small mb-2">Please use the template below to ensure correct data structure.</p>
              <a href="{{ route('crud-examples.template') }}" class="btn btn-primary btn-sm">
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
      $('#dataTable2').DataTable();
    });
  </script>
@endpush

@push('css')
  <link rel="stylesheet" href="https://cdn.datatables.net/2.3.7/css/dataTables.bootstrap5.min.css">
@endpush
