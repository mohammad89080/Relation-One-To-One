@extends('layouts.app')

@section('content')
    @php
    $genderArray=['Male','Female'];
    @endphp
    <div class="container"  style='padding-top:2%'>
        @if(count($errors)>0)
            @foreach($errors->all() as $item)
                <div class="alert alert-danger" role="alert">
                    {{$item}}
                </div>
            @endforeach
        @endif
    <form action="{{route("profile.update")}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleFormControlInput1">Name</label>
            <input type="text" class="form-control" name="name" value="{{$user->name}}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Prevince</label>
            <input type="text" class="form-control" name="province" value="{{$user->profile->province}}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">facebook</label>
            <input type="text" class="form-control" name="facebook" value="{{$user->profile->facebook}}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Gender</label>
            <select class="form-control" name="gender" >
                @foreach($genderArray as $item)
                <option  value="{{$item}}" {{($user->profile->gender==$item)? 'selected' : ''}}>{{$item}}</option>

                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Bio</label>
            <textarea class="form-control"  name="bio" rows="3">
                {!! $user->profile->bio !!}
            </textarea>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Password</label>
            <input type="text" class="form-control" name="password">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Confirm password</label>
            <input type="text" class="form-control" name="c_password" >
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
    </div>
@endsection
