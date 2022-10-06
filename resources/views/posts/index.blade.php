@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">

            </div> <div class="jumbotron bg-primary bg-gradient ">
                <h1 class="display-4 ">All Posts</h1>
                <a href=" {{route('post.create')}}" class="btn btn-dark">Create Post</a>
                <a href=" {{route('posts.trashed')}}" class="btn btn-danger">Trash <i class="fas fa-trash"></i></a>
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
                                <td><img src="{{$item->photo}}" alt="{{$item->photo}}" class="img-thumbnail" width="100" height="100"></td>
                                <td><a href="{{route('post.show',['slug' => $item->slug])}}" class="text-success" ><i class="fas fa-2x fa-eye"></i></a>&nbsp;&nbsp;&nbsp;
                                    <a href="{{route('post.edit',['id'=> $item->id])}}" class="text-primary"><i class="fas fa-2x fa-edit"></i></a>&nbsp;&nbsp;
                                    <a href="{{route('post.destroy',['id'=> $item->id])}}" class=" text-danger"><i class="fas fa-2x fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>

        </div>
            @else
                <div class="col">
            <div class="alert alert-danger" role="alert">
              No Posts
            </div>
                </div>
            @endif

    </div>

@endsection
