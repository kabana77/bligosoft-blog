@extends('back.layout.template')
@push('css')
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
@endpush
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
@endpush

@section('title', 'Articles - Admin')

@section('content')
    <!-- content -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">View <?= $article->title ?></h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group me-2">
                <a href="{{ url('articles') }}" type="button" class="btn btn-sm btn-outline-secondary">Back</a>
              </div>
            </div>
          </div>

        <table class="table table-striped">
            <tbody class="table-group-divider">
                <tr>
                  <th scope="row">Title</th>
                  <td><?= $article->title ?></td>
                </tr>
                <tr>
                  <th scope="row">Category</th>
                  <td><?= $article->category->name ?></td>
                </tr>
                <tr>
                  <th scope="row">Description</th>
                  <td><?= $article->desc ?></td>
                </tr>
                <tr>
                  <th scope="row">Image</th>
                  <td>
                    <img src="{{ asset('storage/back/'.$article->img) }}" width="50%">
                  </td>
                </tr>
                <tr>
                  <th scope="row">Views</th>
                  <td><?= $article->views ?></td>
                </tr>
                <tr>
                  <th scope="row">Status</th>
                  <td><?= $article->status ?></td>
                </tr>
                
              </tbody>
          </table>
    </main>
    
@endsection