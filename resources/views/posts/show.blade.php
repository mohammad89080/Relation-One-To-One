@extends('layouts.app')

@section('content')
    <style>
        .style{
            background-color:#EEE;
            font-size: 15px;
        }
    </style>
    <div class="container">


                <div class="row">
                    <div class="col">
                        <div class="card ml-10" style="width: 45rem; ">
                            <img src=" {{URL::asset($post->photo)}}" class="card-img-top" alt="">
                            <div class="card-body">
                                <h1 class="card-title">{{$post->title}}</h1>
                                <p class="card-text fs-1.8">{{$post->content}}</p>
                                <p class="style f">Created_at: {{$post->created_at->diffForHumans()}}</p>
                                <p class="style" >Updated_at: {{$post->updated_at->diffForHumans()}}</p>
                                <a href="{{route('posts')}}" class="btn btn-success">All Posts</a>
                            </div>
                        </div>
                    </div>
                </div>


    </div>


@endsection
