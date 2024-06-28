@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Quản lý phim</div>
                    <a class="btn btn-outline-success w-25 m-lg-2" href="{{ route('movie.create') }}">Thêm Phim</a>


                    <table class="table table-responsive" id="TableData">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Active/UnActive</th>
                                <th scope="col" class="hide-col-sm">Description</th>
                                <th scope="col" class="hide-col-sm">Slug</th>
                                <th scope="col">Episode</th>

                                <th scope="col">Img</th>
                                <th scope="col">Category</th>
                                <th scope="col">Genre</th>
                                <th scope="col">Solution</th>
                                <th scope="col" class="hide-col-sm">Subtitle</th>
                                <th scope="col">Year</th>
                                <th scope="col" class="hide-col-sm">Duration</th>
                                <th scope="col" class="hide-col-sm">Tag</th>
                                <th scope="col">Session</th>
                                <th scope="col">Country</th>
                                <th scope="col">Option</th>
                            </tr>
                        </thead>
                        <tbody id="order_position" >
                            @foreach ($list as $item)
                                <tr id="{{ $item->id }}">
                                    <td scope="row">{{ $item->id }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>
                                        @if ($item->status)
                                            Hiển Thị
                                        @else
                                            Không hiển thị
                                        @endif
                                    </td>
                                    <td class="hide-col-sm">{{ $item->description }}</td>
                                    <td class="hide-col-sm">{{ $item->slug }}</td>
                                    <td>{{ $item->episode_number }}</td>
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
                                    <td class="hide-col-sm">
                                        @if ($item->subtitle == 0)
                                            Phụ Đề
                                        @else
                                            Thuyết Minh
                                        @endif
                                    </td>
                                    <td>
                                        {!! Form::selectYear('year', 2000, 2024, isset($item->year) ? $item->year : '', [
                                            'class' => 'form-control selectYear',
                                            'id' => $item->id,
                                        ]) !!}
                                    </td>
                                    <td class="hide-col-sm">
                                        {{ $item->movie_duration }}

                                    </td>
                                    <td class="hide-col-sm">
                                        {{ $item->tags }}

                                    </td>
                                    <td>
                                        {!! Form::selectRange('session', 1, 20, isset($item->session) ? $item->session : '', [
                                            'class' => 'form-control SelectedSesssion',
                                            'id' => $item->id,
                                        ]) !!}
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
