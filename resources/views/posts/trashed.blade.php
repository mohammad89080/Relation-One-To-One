@extends('layouts.app')

@section('content')
    <style>

    </style>
    <div class="container">
        <div class="row">
            <div class="col">

            </div> <div class="jumbotron bg-primary bg-gradient ">
                <h1 class="display-4 ">Trashed Posts</h1>
                <a href=" {{route('posts')}}" class="btn btn-dark">All Posts</a>

            </div>

        </div>
        <div class="row">
            @if($posts->count()>0)
                <div class="col">
                    <table class="table table-dark">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tilte</th>
                            <th scope="col">User</th>
                            <th scope="col">Date</th>
                            <th scope="col">Photo</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i=0;
                        @endphp
                        @foreach($posts as $item)
                            <tr>
                                <th scope="row">{{++$i}}</th>
                                <td>{{$item->title}}</td>
                                <td>{{$item->user->name}}</td>
                                <td>{{$item->created_at->diffForHumans()}}</td>
                                {{--                                {{URL::asset($item->photo)}}--}}
                                <td><img src="{{URL::asset($item->photo)}}" alt="{{$item->photo}}" class="img-thumbnail" width="100" height="100"></td>
                                <td><a href="{{route('post.restore',['id' => $item->id])}}" class="text-white btn btn-danger" >Trash restore  &nbsp;<i class="fas fa-undo"></i></a>&nbsp;&nbsp;&nbsp;

                                    <a href="{{route('post.hdelete',['id'=> $item->id])}}" class=" text-white btn btn-danger ">Hard Delete &nbsp;<i class="fas fa-1x fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>

        </div>
        @else
            <div class="col">
                <div class="alert fa-2x alert-danger" role="alert">
                   Empty Trash
                </div>
            </div>
        @endif

    </div>

@endsection
