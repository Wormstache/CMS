@extends('layout.master')
@section('title','Category')
@section('content')
<div class="text-center">
    <button type="submit" class="btn btn-primary categoryButton" data-toggle="modal" data-target="#category">Add a new category</button>
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th  class="col-md-6" scope="col">Category</th>
                        <th class="col-md-3" scope="col"></th>
                        <th class="col-md-3" scope="col"></th>
                    </tr>
                </thead>
                @foreach ($categories as $category)
                <tbody>
                    <tr class="warning">
                        <td class="taskFont col-md-6">{{ $category->name }}</td>
                        <td class="text-right col-md-3">
                            <button class="btn btn-info" data-toggle="modal" data-target="#categoryEdit{{ $category->id }}" href="{{ route('category.edit',$category->id) }}"><i class="fa fa-pencil"></i></button>
                        </td>
                        <td class="text-right col-md-3">
                            <form action="{{ route('category.destroy', $category->id) }}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token()}}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger" onclick=" return confirm('Are you sure?')";><i class="fa fa-trash-o"></i></button>
                            </form>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>
<!-- modal -->
<div class="modal fade" id="category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form name="category" action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input class="form-control" type="text" placeholder="Add Category" name="name">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- modal edit -->
@foreach($categories as $category)
<div class="modal fade" id="categoryEdit{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form name="category" action="{{ route('category.update', $category->id) }}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PATCH">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Category Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input class="form-control" type="text" placeholder="Add Category" name="name" value="{{ $category->name }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>
@endforeach