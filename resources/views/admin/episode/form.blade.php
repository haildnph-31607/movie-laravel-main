@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Quản lý tập phim</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (!isset($episode))
                            {!! Form::open(['route' => 'episode.store', 'method' => 'POST']) !!}
                        @else
                            {!! Form::open(['route' => ['episode.update', $episode->id], 'method' => 'PUT']) !!}
                        @endif

                        <div class="form-group mb-3">
                            {!! Form::label('movie', 'Movie', []) !!}
                            {!! Form::select('movie', ['0' => 'Chọn Phim', ' Phim' => $movie], isset($episode) ? $episode->movie_id : '', [
                                'class' => 'form-select selectMovie',
                            ]) !!}
                        </div>


                        <div class="form-group mb-3">
                            {!! Form::label('link', 'Link', []) !!}
                            {!! Form::text('link', isset($episode) ? $episode->link : '', [
                                'class' => 'form-control ',
                                'placeholder' => 'Nhập Link....',
                            ]) !!}
                        </div>
                        <div class="form-group mb-3">
                            {!! Form::label('Episode', 'Episode', []) !!}
                            <select name="episode" class="form-select" id="movie_id_select">


                            </select>
                        </div>


                        @if (isset($episode))
                            {!! Form::submit('Sửa', ['class' => 'btn btn-outline-success']) !!}
                            <a href="{{ route('category.create') }}" class="btn btn-outline-primary">Quay Lại Thêm</a>
                        @else
                            {!! Form::submit('Thêm', ['class' => 'btn btn-outline-success']) !!}
                        @endif

                        {!! Form::close() !!}
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Movie</th>
                                <th scope="col">Link</th>
                                <th scope="col">Episode</th>
                                <th scope="col">Option</th>
                            </tr>
                        </thead>
                        <tbody >
                            @foreach ($list as $item)
                                <tr >
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>{{ $item->movie->title }}</td>
                                    <td>
                                        {{ $item->link }}
                                    </td>
                                    <td>{{ $item->episode }}</td>


                                    <td>
                                        {!! Form::open([
                                            'method' => 'DELETE',
                                            'route' => ['category.destroy', $item->id],
                                            'onsubmit' => 'return confirm("Bạn muốn xoá ?")',
                                        ]) !!}
                                        {!! Form::submit('Xoá', ['class' => 'btn btn-danger delete', 'id' => 'btnDel']) !!}
                                        {!! Form::close() !!}
                                        <a href="{{ route('category.edit', $item->id) }}" class="btn btn-warning">Sửa</a>
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
