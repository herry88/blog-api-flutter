@extends('master')

@section('title')
    <title>Category</title>
@endsection
@section('content')
<section class="section">
    @if (Session::get('success'))
                <div class="alert alert-success">
                    <strong>{{ Session::get('success') }}</strong>
                </div>
            @endif
    <div class="section-header">
      <h1>Category</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">
            Category
        </h2>
        <div class="row">
            <div class="col-6 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Category</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('category.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Category Name</label>
                                <input type="text" name="category_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-6 col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Category</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Category</th>
                                        <th>Tools</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($category as $cat)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $cat->name }}</td>
                                            <td>
                                                <a href="#" class="btn btn-outline-warning btn-sm-edit"><i class="fas fa-edit"></i></a>
                                                <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2">Tidak Ada Data</td>
                                        </tr>
                                    @endforelse
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
  </section>
@endsection
