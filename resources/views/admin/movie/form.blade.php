@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Quản lý phim</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (!isset($movie))
                            {!! Form::open(['route' => 'movie.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        @else
                            {!! Form::open(['route' => ['movie.update', $movie->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                        @endif
                        <div class="form-group mb-3">
                            {!! Form::label('title', 'Status', []) !!}
                            {!! Form::select('status', ['1' => 'Hiển Thị', '0' => 'Không'], isset($movie) ? $movie->status : '', [
                                'class' => 'form-select',
                            ]) !!}
                        </div>


                        <div class="form-group mb-3">
                            {!! Form::label('title', 'Title', []) !!}
                            {!! Form::text('title', isset($movie) ? $movie->title : '', [
                                'class' => 'form-control ',
                                'placeholder' => 'Nhập Title....',
                                'id' => 'slug',
                                'oninput' => 'ChangeToSlug()',
                            ]) !!}
                        </div>
                        <div class="form-group mb-3">
                            {!! Form::label('episode', 'Episode', []) !!}
                            {!! Form::text('episode', isset($movie) ? $movie->episode : '', [
                                'class' => 'form-control ',
                                'placeholder' => 'Nhập Episode....',


                            ]) !!}
                        </div>


                        <div class="form-group mb-3">
                            {!! Form::label('duration', 'Movie Duration', []) !!}
                            {!! Form::text('duration', isset($movie) ? $movie->movie_duration : '', [
                                'class' => 'form-control ',
                                'placeholder' => 'Nhập Thời Lượng....',

                            ]) !!}
                        </div>

                        <div class="form-group mb-3">
                            {!! Form::label('slug', 'Slug', []) !!}
                            {!! Form::text('slug', isset($movie) ? $movie->slug : '', [
                                'class' => 'form-control ',
                                'placeholder' => 'Nhập Slug....',
                                'id' => 'convert_slug',
                            ]) !!}
                        </div>
                        <div class="form-group mb-3">
                            {!! Form::label('trailer', 'Trailer', []) !!}
                            {!! Form::text('trailer', isset($movie) ? $movie->trailer : '', [
                                'class' => 'form-control ',
                                'placeholder' => 'Nhập Trailer....',

                            ]) !!}
                        </div>
                        <div class="form-group mb-3">
                            {!! Form::label('title', 'Description', []) !!}
                            {!! Form::textarea(
                                'description',
                                isset($movie) ? $movie->description : '',
                                $attributes = ['placeholder' => 'Nhập Description....', 'class' => 'form-control ', 'id' => 'description'],
                            ) !!}
                        </div>
                        <div class="form-group mb-3">
                            {!! Form::label('tags', 'Tags Phim', []) !!}
                            {!! Form::textarea(
                                'tags',
                                isset($movie) ? $movie->tags : '',
                                $attributes = ['placeholder' => 'Nhập Tags Phím....', 'class' => 'form-control ', 'maxlength'=>100],
                            ) !!}
                        </div>
                        <div class="form-group mb-3">
                            {!! Form::label('category', 'Category', []) !!}
                            {!! Form::select('category_id', $category, isset($movie) ? $movie->category_id : '', ['class' => 'form-select']) !!}
                        </div>
                        <div class="form-group mb-3">
                            {!! Form::label('genre', 'Genre', []) !!}
                            {!! Form::select('genre_id', $genre, isset($movie) ? $movie->genre_id : '', ['class' => 'form-select']) !!}
                        </div>
                        <div class="form-group mb-3">
                            {!! Form::label('Phim HOT', 'Phim HOT', []) !!}
                            {!! Form::select('movie_hot', ['1' => 'Có', '0' => 'Không'], isset($movie) ? $movie->movie_hot : '', [
                                'class' => 'form-select',
                            ]) !!}
                        </div>
                        <div class="form-group mb-3">
                            {!! Form::label('country', 'Country', []) !!}
                            {!! Form::select('country_id', $country, isset($movie) ? $movie->country_id : '', ['class' => 'form-select']) !!}
                        </div>
                        <div class="form-group mb-3">
                            {!! Form::label('Định Dạng', 'Định Dạng', []) !!}
                            {!! Form::select('resolution', ['0' => 'HD', '1' => 'SD','3'=>'Trailer'], isset($movie) ? $movie->resolution : '', [
                                'class' => 'form-select',
                            ]) !!}
                        </div>
                        <div class="form-group mb-3">
                            {!! Form::label('phude', 'Phụ Đề', []) !!}
                            {!! Form::select('phude', ['0' => 'Phụ Đề', '1' => 'Thuyết Minh'], isset($movie) ? $movie->subtitle : '', [
                                'class' => 'form-select',
                            ]) !!}
                        </div>
                        <div class="form-group mb-3">
                            {!! Form::label('Image', 'Image', []) !!}
                            {!! Form::file('image', ['class' => 'form-control']) !!}
                            @if (isset($movie))
                                <img src="{{ asset('/uploads/movie/' . $movie->image) }}" width="100px" alt="loi">
                            @endif
                        </div>


                        @if (isset($movie))
                            {!! Form::submit('Sửa', ['class' => 'btn btn-outline-success']) !!}
                            <a href="{{ route('movie.index') }}" class="btn btn-outline-primary">Quay Lại</a>
                        @else
                            {!! Form::submit('Thêm', ['class' => 'btn btn-outline-success']) !!}
                            <a href="{{ route('movie.index') }}" class="btn btn-outline-primary">Quay Lại</a>

                        @endif

                        {!! Form::close() !!}
                    </div>
                    {{-- <table class="table" id="TableData">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Active/UnActive</th>
                                <th scope="col">Description</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Img</th>
                                <th scope="col">Category</th>
                                <th scope="col">Genre</th>
                                <th scope="col">Solution</th>
                                <th scope="col">Subtitle</th>
                                <th scope="col">Year</th>
                                <th scope="col">Duration</th>



                                <th scope="col">Country</th>

                                <th scope="col">Option</th>
                            </tr>
                        </thead>
                        <tbody id="order_position">
                            @foreach ($list as $item)
                                <tr id="{{$item->id}}">
                                    <td scope="row">{{ $item->id }}</td>
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
                                        <img src="{{ asset('/uploads/movie/' . $item->image) }}" width="100px"
                                            alt="loi">
                                    </td>
                                    <td>
                                        {{ $item->category->title }}
                                    </td>
                                    <td>
                                        {{ $item->genre->title }}
                                    </td>
                                    <td>
                                        @if ($item->solution == 0)
                                            HD
                                        @else
                                            SD
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->subtitle == 0)
                                            Phụ Đề
                                        @else
                                            Thuyết Minh
                                        @endif
                                    </td>
                                    <td>
                                       {!! Form::selectYear('year',2000,2024,isset($item->year) ? $item->year : '', ['class'=>'form-control selectYear','id'=>$item->id]) !!}
                                    </td>
                                     <td>
                                        {{ $item->movie_duration }}

                                     </td>
                                    <td>
                                        {{ $item->country->title }}
                                    </td>
                                    <td>
                                        {!! Form::open([
                                            'method' => 'DELETE',
                                            'route' => ['movie.destroy', $item->id],
                                            'onsubmit' => 'return confirm("Bạn muốn xoá ?")',
                                        ]) !!}
                                        {!! Form::submit('Xoá', ['class' => 'btn btn-danger delete', 'id' => 'btnDel']) !!}
                                        {!! Form::close() !!}
                                        <a href="{{ route('movie.edit', $item->id) }}" class="btn btn-warning">Sửa</a>
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table> --}}
                </div>
            </div>
        </div>

    </div>
@endsection
@section('css')
    <style>
        .dt-length label {
            display: none;
        }

        .dt-input {
            margin-left: 10px;
        }

        .dt-search label {
            display: none;
        }

        /* #dt-search-0{
            margin-right: 10px
        } */
    </style>
@endsection
