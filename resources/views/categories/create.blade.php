@extends('layout.layout')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Thêm thể loại</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('categories.index') }}" class='btn btn-primary float-end'>Danh sách thể loại</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('categories.add') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <strong>Categories name</strong>
                                <input type="text" name="name" class="form-control" placeholder="enter categories name">
                            </div>
                        </div>
                        <button type='submit' class='btn btn-success mt-2'>Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
