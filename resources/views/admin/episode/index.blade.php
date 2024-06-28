@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Quản lý tập phim</div>
                    <a class="btn btn-outline-success w-25 m-lg-2" href="{{ route('episode.create') }}">Thêm Phim</a>
                    <table class="table table-responsive" id="TableData">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Episode</th>
                                <th scope="col" class="hide-col-sm">Image</th>
                                <th scope="col" class="hide-col-sm">Link</th>
                                <th scope="col">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $item)
                                <tr id="{{ $item->id }}">
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->movie->title }}</td>
                                    <td>{{ $item->episode }}</td>
                                    <td>{{ $item->movie->image }}</td>
                                    <td>{!! $item->link !!}</td>
                                    <td>
                                        {!! Form::open([
                                            'method' => 'DELETE',
                                            'route' => ['episode.destroy', $item->id],
                                            'onsubmit' => 'return confirm("Bạn muốn xoá ?")',
                                        ]) !!}
                                        {!! Form::submit('Xoá', ['class' => 'btn btn-danger delete', 'id' => 'btnDel']) !!}
                                        {!! Form::close() !!}
                                        <a href="{{ route('episode.edit', $item->id) }}" class="btn btn-warning">Sửa</a>
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
@section('css')
    <style>
        @media (max-width: 768px) {

            /* Ẩn cột trên màn hình nhỏ */
            .hide-col-sm {
                display: none;
            }
        }

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
