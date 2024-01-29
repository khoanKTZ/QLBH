@extends('layout.layout')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>CATEGORIES</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('categories.add') }}" class='btn btn-primary float-end'>Thêm mới</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if (Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
                @endif
                <table class='table table-bordered'>
                    <thead>
                        <tr>
                            <th class="text-center">STT</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Tool</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $item)
                            <tr>
                                <td class="text-center">{{ ++$i }}</td>
                                <td class="text-center">{{ $item->name }}</td>
                                <td class="text-center">
                                    <a href="{{ route('categories.edit', ['id' => $item->id]) }}"
                                        class="btn btn-primary">Sửa</a>
                                    <a href="{{ route('categories.delete', ['id' => $item->id]) }}"
                                        class="btn btn-danger">Xoá</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
