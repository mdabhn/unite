@extends('layouts.app')

@section('content')
<div class="card">
    @if (count($groups) === 0)
    <div class="card-body text-muted">
        <p class="text-center">There is no Group Available here. Create One so that other can join</p>
    </div>
    @else
    <div class="d-flex flex-wrap mx-2 my-2">
        @foreach ($groups as $group)
        @if (in_array($group->id, $wasApproved))
        @else
        <div class="card mx-1 my-1">
            <div class="media mx-2 my-2 _media">
                <div class="media-body">
                    <h5 class="mt-0">{{$group->name}} || {{$group->id}} </h5>
                    {{$group->description}}
                    <div class="text-muted">
                        Group Status : <span style="color: green">Abailable</span>
                    </div>
                    <div class="text-muted">
                        Code : {{$group->code ? $group->code : 'Open'}}
                    </div>
                    <div class="">
                        Admin: <a href="#">{{$group->user->name}}</a>
                    </div>
                    @if (in_array($group->id, $inRequest))
                    {{-- <a href="#" class="btn btn-danger float-right ml-1">Cancel
                        The Request</a> --}}
                    <button href="#" class="btn btn-secondary float-right" disabled>Requested </a>
                        @else
                        <a href="/request/{{$group->id}}" class="btn btn-dark float-right">Request to Join</a>
                        @endif
                </div>
            </div>
        </div>
        @endif
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

@section('js')
<script>
    if("<?php echo Session::has("requested") ?>"){
        toastr.success("<?php echo Session::get("requested") ?>", 'Request cancelled');
    }

</script>
@endsection
