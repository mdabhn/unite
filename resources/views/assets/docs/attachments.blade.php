@extends('layouts.group')

@section('content')
<div class="card">
    <form action="{{route('attachment', $group->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-header">
            <div class="form-group text-center">
                <label for="file">Upload a <strong>Document / File</strong> </label>
                <input type="file" name="file" id="file" required>
                <button class="btn btn-success" type="submit">Upload</button>
            </div>
        </div>
    </form>
    @if (count($attachments) !== 0)
    <div class="card-body">
        <table class="table">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Uploaded By</th>
                    <th scope="col">Docs</th>
                    <th scope="col">@</th>
                    <th scope="col">Approved</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($attachments as $key => $attachment)
                <tr class="text-center">
                    <td>{{$key + 1}}</td>
                    <td>{{$attachment->user->name}}</td>
                    <td>{{$attachment->attachment}}</td>
                    <td>{{$attachment->created_at->diffForHumans()}}</td>
                    <td><a href="" class="btn btn-sm btn-success">Approve</a></td>
                    <td>
                        <form action="{{route('attachmentDelete', $attachment->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif

</div>
@endsection
@section('css')
<style>

</style>
@endsection
