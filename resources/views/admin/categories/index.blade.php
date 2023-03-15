@extends('admin.layout')
@section('content')
@if(Session::has('message'))
<h3>{{ Session::get('message') }}</h3>
@endif
<div class="row">
    
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Basic Table</h4>
                <a  href="{{ route('admin.categories.create') }}" class="creats"> Create New</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Desc</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    
                        @foreach($categoryList as $category)
                        <tr>
                            <td>#</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->email }}</td>
                            <td>
                                <a class="badge badge-warning btn btn-warning" href="{{ route('admin.categories.edit',$category->id) }}">Pending</a>
                            </td>

                            <td>
                                <form action="{{ route('admin.categories.destroy',$category->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-danger" type="submit">Delete</button>
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
@endsection