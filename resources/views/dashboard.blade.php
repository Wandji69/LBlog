@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-14">
            <div class="card">
                <div class="card-header">Dashboard</div>
                    <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <a href="/posts/create" class="btn btn-primary">Create Post</a>
                        <br><h3>Your Blog Post </h3>
                        @if(count($post) > 0)
                            <table class="table table-striped">
                                <tr>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Author</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                                @foreach($post as $post)
                                <tr>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->body}}</td>
                                    <td>{{$post->user->name}}</td>
                                    <td>{{$post->user->created_at}}</td>
                                    <td><a href="/posts/{{$post->id}}/edit" class="btn btn-default pull-left">Edit</a></td>
                                    <td>
                                        {!! Form::open(['action' => ['PostController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right' ]) !!}
                                            {{  Form::hidden('_method', 'DELETE') }}
                                            {{  Form::submit('Delete', ['class' => 'btn btn-danger pull-right']) }}
                                        {!!Form::close()!!}
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        @else
                            <p>You have no Post</p>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
