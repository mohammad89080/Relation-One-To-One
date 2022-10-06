@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="jumbotron bg-primary bg-gradient ">
                    <h1 class="display-4 ">Update Post</h1>
                    <a href=" {{route('posts')}}" class="btn btn-success">All Posts</a>
                </div>
            </div>

        </div>

        <div class="row">
            @if(count($errors)>0)
                @foreach($errors->all() as $item )
                    <div class="alert alert-info" role="alert">
                        <li>{{$item}}</li>
                    </div>

                @endforeach
            @endif
            <div class="col">
                <form action="{{route('post.update',['id'=>$post->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{--                    @method("POST")--}}
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Title</label>
                        <input type="text" name="title" value="{{$post->title}}" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Photo</label>
                        <input type="file" name="photo" class="form-control " >
                    </div>


                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Contnet</label>
                        <textarea class="form-control"  name="content" id="exampleFormControlTextarea1" rows="3">{{$post->content}}</textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit"  class="btn btn-success ">Update </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
