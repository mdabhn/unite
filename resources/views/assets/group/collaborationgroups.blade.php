@extends('layouts.app')

@section('content')
<div class="card">
    @if (count($collaborationGroups) === 0)
    <div class="card-body text-muted">
        <p class="text-center">You Have not Joined Any Group.. Explore and become a Collaborator
            <span style="display: block" class="mt-2"><a href="{{route('exploreGroup')}}" class="btn btn-dark">Explore
                    Groups</a></span>
        </p>
    </div>
    @else
    <div class="d-flex flex-wrap mx-2 my-2">
        @foreach ($collaborationGroups as $collaborationGroup)
        <div class="card mx-1 my-1">
            <div class="media mx-2 my-2 _media">
                <div class="media-body">
                    <h5 class="mt-0">{{$collaborationGroup->group->name}}</h5>
                    {{$collaborationGroup->group->description}}
                    <div class="text-muted">
                        Group Capacity : {{$collaborationGroup->group->max_member}}
                        <br>
                        Assigned Members : ***
                        ||
                        Joined : {{$collaborationGroup->created_at->diffForHumans()}}
                    </div>
                    <div class="text-muted">
                        Code : {{$collaborationGroup->group->code ? $collaborationGroup->group->code : 'No code Yet'}}
                    </div>
                    <a href="{{route('groupTask', $collaborationGroup->group->id)}}"
                        class="btn btn-dark">Collaborate</a>
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
</style>
@endsection
