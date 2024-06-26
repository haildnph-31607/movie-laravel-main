@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Quản lý danh mục</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                       @if(!isset($category))
                        {!! Form::open(['route' => 'category.store', 'method' => 'POST']) !!}
                        @else
                        {!! Form::open(['route' => ['category.update',$category->id], 'method' => 'PUT']) !!}
                        @endif
                        <div class="form-group mb-3">
                            {!! Form::label('title', 'Status', []) !!}
                            {!! Form::select('status', ['1' => 'Hiển Thị', '0' => 'Không'], isset($category) ? $category->status : '', ['class' => 'form-select']) !!}
                        </div>


                        <div class="form-group mb-3">
                            {!! Form::label('title', 'Title', []) !!}
                            {!! Form::text('title', isset($category) ? $category->title : '', ['class' => 'form-control ', 'placeholder' => 'Nhập Title....', 'id' => 'slug','oninput'=>'ChangeToSlug()']) !!}
                        </div>

                        <div class="form-group mb-3">
                            {!! Form::label('slug', 'Slug', []) !!}
                            {!! Form::text('slug', isset($category) ? $category->slug : '', ['class' => 'form-control ', 'placeholder' => 'Nhập Slug....', 'id' => 'convert_slug']) !!}
                        </div>
                        <div class="form-group mb-3">
                            {!! Form::label('title', 'Description', []) !!}
                            {!! Form::textarea(
                                'description',
                                isset($category) ? $category->description : '',
                                $attributes = ['placeholder' => 'Nhập Description....', 'class' => 'form-control ', 'id' => 'description'],
                            ) !!}
                        </div>

                     @if(isset($category))
                     {!! Form::submit('Sửa', ['class' => 'btn btn-outline-success']) !!}
                     <a href="{{route('category.create')}}" class="btn btn-outline-primary">Quay Lại Thêm</a>

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
                        <tbody id="order_position">
                            @foreach ($list as $item)
                                <tr id='{{$item->id}}'>
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
                                            'route' => ['category.destroy', $item->id],
                                            'onsubmit' => 'return confirm("Bạn muốn xoá ?")',
                                        ]) !!}
                                        {!! Form::submit('Xoá', ['class' => 'btn btn-danger delete' , 'id'=>'btnDel']) !!}
                                        {!! Form::close() !!}
                                        <a href="{{route('category.edit',$item->id)}}" class="btn btn-warning">Sửa</a>
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


