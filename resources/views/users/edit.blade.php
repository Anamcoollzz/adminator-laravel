@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
  <main class="main-content bgc-grey-100">
    <div id="mainContent">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
              <div class="d-flex justify-content-between align-items-center mB-20">
                <h4 class="c-grey-900">Edit User</h4>
                <a href="{{ route('users.index') }}" class="btn btn-secondary">Back to List</a>
              </div>
              <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                  <label for="name">Name</label>
                  <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required>
                  @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group mb-3">
                  <label for="email">Email</label>
                  <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required>
                  @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group mb-3">
                  <label for="password">Password (leave blank to keep current)</label>
                  <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                  @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group mb-3">
                  <label for="role">Role</label>
                  <select name="role" id="role" class="form-select @error('role') is-invalid @enderror" required>
                    <option value="superadmin" {{ old('role', $user->role) == 'superadmin' ? 'selected' : '' }}>Superadmin</option>
                    <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User</option>
                  </select>
                  @error('role')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="text-right">
                  <button type="submit" class="btn btn-primary">Update User</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection
