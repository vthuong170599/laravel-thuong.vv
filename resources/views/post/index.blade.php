@extends('master')
@section('content')
<div class="container">
    <a href="{{route('post.create')}}" class="btn btn-success">add</a>
    @if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tin</th>
                <th>Loại</th>
                <th>Ngày public</th>
                <th>Public</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Post as $post)
            <tr>
                <td scope="row">{{$loop->iteration}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->getAllPost->name}}</td>
                <td>{{$post->created_at}}</td>
                <td>{{$post->public == 0 ? 'an':'hien'}}</td>
                <td>
                    <a href="{{route('post.update',$post->id)}}" class="btn btn-success">edit</a>
                    <form action="{{ route('post.delete',$post->id) }}" method="post">
                        <input class="btn btn-default" type="submit" value="Delete"  class="btn btn-danger"/>
                        {!! method_field('delete') !!}
                        {!! csrf_field() !!}
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection