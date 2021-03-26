@extends('master')

@section('title')
    <title>Halaman Blog</title>
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Blog Page</h1>
    </div>
    <div class="section-body">
        <h2 class="section-title">
            Blog Page
        </h2>
        <div class="row">
          @if(Session::get('success'))
              <div class="alert alert-success alert-dismissiblefade show" role="alert" id="gone">
                  <strong> {{ Session::get('success') }} </strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
          @endif
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{route('blogpost.create')}}" class="btn btn-lg btn-success">Add</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-stripped">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th>Title Blog</th>
                                        <th>Category</th>
                                        <th>Description</th>
                                        <th>Images</th>
                                        <th>Tools</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($blogpost as $bp)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{ $bp->title }}</td>
                                            <td>{{ $bp->description }}</td>
                                            <td>{{ $bp->category_id }}</td>
                                            <td>{{ $bp->featured_image_url }}</td>
                                            <td></td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Tidak Ada Data</td>
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
