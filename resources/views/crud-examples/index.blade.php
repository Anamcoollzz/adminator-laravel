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
              <div class="d-flex justify-content-between align-items-center mB-20">
                <h4 class="c-grey-900">Crud Example Data</h4>
                <a href="{{ route('crud-examples.create') }}" class="btn btn-primary">Create New</a>
              </div>
              <div class="table-responsive">
                <table id="dataTable2" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
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
