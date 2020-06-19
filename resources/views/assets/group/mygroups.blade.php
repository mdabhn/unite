@extends('layouts.app')

@section('content')
<div class="card _card">
    @if (count($myGroups) === 0)
    <div class="card-body text-muted">
        <p class="text-center">You Have no Active Group of Yours .</p>
    </div>
    @else
    <div class="d-flex flex-wrap mx-2 my-2">
        @foreach ($myGroups as $myGroup)
        <div class="card mx-1 my-1">
            <div class="media mx-2 my-2 _media">
                <div class="media-body">
                    <h5 class="mt-0">{{$myGroup->name}}</h5>
                    {{$myGroup->description}}
                    <div class="text-muted">
                        Group Capacity : {{$myGroup->max_member}}
                        <br>
                        Assigned Members : ***
                        ||
                        Created : {{$myGroup->created_at->diffForHumans()}}
                    </div>
                    <div class="text-muted">
                        Code : {{$myGroup->code}}
                    </div>
                    <a href="{{route('groupTask', $myGroup->id)}}" class="btn btn-dark">Assign Task</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>
@endsection

@section('css')
<style>
    ._media {
        max-width: 370px;
        min-width: 370px;
    }

    ._card {
        min-height: 80vh;
        background-color: transparent;
        border-bottom: none;
        border-right: none;
        border-left: 1 px solid;
    }
</style>
@endsection
