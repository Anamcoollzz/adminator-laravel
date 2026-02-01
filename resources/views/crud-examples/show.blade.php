@extends('layouts.app')

@section('title', 'View Crud Example')

@section('content')
  <main class="main-content bgc-grey-100">
    <div id="mainContent">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
              <div class="d-flex justify-content-between align-items-center mB-20">
                <h4 class="c-grey-900">Crud Example Details</h4>
                <a href="{{ route('crud-examples.index') }}" class="btn btn-secondary">Back to List</a>
              </div>
              <table class="table table-bordered">
                <tr>
                  <th width="30%">Name</th>
                  <td>{{ $crudExample->name }}</td>
                </tr>
                <tr>
                  <th>Position</th>
                  <td>{{ $crudExample->position }}</td>
                </tr>
                <tr>
                  <th>Office</th>
                  <td>{{ $crudExample->office }}</td>
                </tr>
                <tr>
                  <th>Age</th>
                  <td>{{ $crudExample->age }}</td>
                </tr>
                <tr>
                  <th>Salary</th>
                  <td>${{ number_format($crudExample->salary, 0, '.', ',') }}</td>
                </tr>
                <tr>
                  <th>Created At</th>
                  <td>{{ $crudExample->created_at->format('Y-m-d H:i:s') }}</td>
                </tr>
                <tr>
                  <th>Updated At</th>
                  <td>{{ $crudExample->updated_at->format('Y-m-d H:i:s') }}</td>
                </tr>
              </table>
              <div class="text-right mt-3">
                <a href="{{ route('crud-examples.edit', $crudExample->id) }}" class="btn btn-info">Edit</a>
                <form action="{{ route('crud-examples.destroy', $crudExample->id) }}" method="POST" style="display:inline-block">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection
