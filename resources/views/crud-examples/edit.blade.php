@extends('layouts.app')

@section('title', 'Edit Crud Example')

@section('content')
  <main class="main-content bgc-grey-100">
    <div id="mainContent">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
              <h4 class="c-grey-900 mB-20">Edit Crud Example</h4>
              <form action="{{ route('crud-examples.update', $crudExample->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                  <label for="name">Name</label>
                  <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $crudExample->name) }}" required>
                  @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group mb-3">
                  <label for="position">Position</label>
                  <input type="text" name="position" id="position" class="form-control @error('position') is-invalid @enderror" value="{{ old('position', $crudExample->position) }}" required>
                  @error('position')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group mb-3">
                  <label for="office">Office</label>
                  <input type="text" name="office" id="office" class="form-control @error('office') is-invalid @enderror" value="{{ old('office', $crudExample->office) }}" required>
                  @error('office')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group mb-3">
                  <label for="age">Age</label>
                  <input type="number" name="age" id="age" class="form-control @error('age') is-invalid @enderror" value="{{ old('age', $crudExample->age) }}" required>
                  @error('age')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group mb-3">
                  <label for="salary">Salary</label>
                  <input type="number" step="any" name="salary" id="salary" class="form-control @error('salary') is-invalid @enderror" value="{{ old('salary', $crudExample->salary) }}" required>
                  @error('salary')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="text-right">
                  <a href="{{ route('crud-examples.index') }}" class="btn btn-secondary">Cancel</a>
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection
