@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Reviews</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{url()->previous()}}" class="btn btn-dark">
                            Back
                        </a>
                    </li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Reviews List
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sr #</th>
                                    <th>Product</th>
                                    <th>User</th>
                                    <th>Rating</th>
                                    <th>Coment</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reviews as $review)
                                <tr>
                                    <td>{{$review->id}}</td>
                                    <td>{{$review->product->title}}</td>
                                    <td>{{$review->user->name}}</td>
                                    <td>{{$review->rating}}</td>
                                    <td>{{$review->comment}}</td>
                                    @if ($review->is_approved == 0)

                                    <td>
                                        <form action="{{route('approveReview',$review->id)}}" method="POST"> @csrf
                                            <button type="submit" class="btn btn-primary btn-xs"
                                                onclick="alert('Are You Sure ?')">CLICK TO
                                                APPROVE</button>
                                        </form>
                                    </td>
                                    @else
                                    <td>
                                        @if ($review->is_approved == 1)
                                        <span class="badge badge-success">Approved</span>
                                        @else
                                        <span class="badge badge-danger">Not Approved</span>
                                        @endif
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection

@section('scripts')
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
        "ordering":false
      });
    });
</script>
@endsection