@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Quản lý Thể Loại</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                       @if(!isset($genre))
                        {!! Form::open(['route' => 'genre.store', 'method' => 'POST']) !!}
                        @else
                        {!! Form::open(['route' => ['genre.update',$genre->id], 'method' => 'PUT']) !!}
                        @endif
                        <div class="form-group mb-3">
                            {!! Form::label('title', 'Status', []) !!}
                            {!! Form::select('status', ['1' => 'Hiển Thị', '0' => 'Không'], isset($genre) ? $genre->status : '', ['class' => 'form-select']) !!}
                        </div>

                        <div class="form-group mb-3">
                            {!! Form::label('title', 'Title', []) !!}
                            {!! Form::text('title', isset($genre) ? $genre->title : '', ['class' => 'form-control ', 'placeholder' => 'Nhập Title....', 'id' => 'slug' , 'oninput'=>'ChangeToSlug()']) !!}
                        </div>
                        <div class="form-group mb-3">
                            {!! Form::label('slug', 'Slug', []) !!}
                            {!! Form::text('slug', isset($category) ? $category->slug : '', ['class' => 'form-control ', 'placeholder' => 'Nhập Slug....', 'id' => 'convert_slug']) !!}
                        </div>
                        <div class="form-group mb-3">
                            {!! Form::label('title', 'Description', []) !!}
                            {!! Form::textarea(
                                'description',
                                isset($genre) ? $genre->description : '',
                                $attributes = ['placeholder' => 'Nhập Description....', 'class' => 'form-control ', 'id' => 'description'],
                            ) !!}
                        </div>

                     @if(isset($genre))
                     {!! Form::submit('Sửa', ['class' => 'btn btn-outline-success']) !!}
                     <a href="{{route('genre.create')}}" class="btn btn-outline-primary">Quay Lại Thêm</a>

                     @else
                     {!! Form::submit('Thêm', ['class' => 'btn btn-outline-success']) !!}
                     @endif

                        {!! Form::close() !!}
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Status/Active/UnActive</th>
                                <th scope="col">Description</th>
                                <th scope="col">Slug</th>

                                <th scope="col">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $item)
                                <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>{{ $item->title }}</td>
                                    <td>
                                        @if ($item->status)
                                            Hiển Thị
                                        @else
                                            Không hiển thị
                                        @endif
                                    </td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->slug }}</td>

                                    <td>
                                        {!! Form::open([
                                            'method' => 'DELETE',
                                            'route' => ['genre.destroy', $item->id],
                                            'onsubmit' => 'return confirm("Bạn muốn xoá ?")',
                                        ]) !!}
                                        {!! Form::submit('Xoá', ['class' => 'btn btn-danger delete' , 'id'=>'btnDel']) !!}
                                        {!! Form::close() !!}
                                        <a href="{{route('genre.edit',$item->id)}}" class="btn btn-warning">Sửa</a>
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


