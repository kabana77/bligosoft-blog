@extends('back.layout.template')

@section('title', 'Users - Admin')

@section('content')
    <!-- content -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Users</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modalCreate">Add User</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
        </div>
      </div>

      @if ($errors->any())    
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
          </ul>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      @if (session('success'))    
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      @if (session('deleted'))    
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          {{ session('deleted') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Created at</th>
              <th scope="col">Updated at</th>
              <th scope="col" class="text-center">Function</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->updated_at }}</td>
                    <td>
                        <div class="text-center">
                            <button class="btn btn-success btn-sm rounded-0" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $user->id }}" >Edit</button>
                            <button class="btn btn-danger btn-sm rounded-0" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $user->id }}">Del</button>
                        </div>
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      
    </main>
    <!-- content -->
    @endsection

  