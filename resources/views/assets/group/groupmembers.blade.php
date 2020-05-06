@extends('layouts.group')

@section('content')
<div class="card">
    @if (count($members) === 0)
    <div class="card-body">
        <p class="text-muted text-center">
            No Members Are Assigned
        </p>
    </div>
    @else
    <table class="table">
        <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Member Name</th>
                <th scope="col">Merit</th>
                <th scope="col">Assisments</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($members as $row => $member)
            <tr class="text-center">
                <th>{{$row + 1}}</th>
                <td>{{$member->user->name}}</td>
                <td>100</td>
                <td>
                    <button class="btn btn-sm btn-primary" type="button" data-toggle="collapse"
                        data-target="#details{{$member->id}}" aria-expanded="false" aria-controls="details">
                        Details
                    </button>
                </td>
            </tr>
        </tbody>
        <div class="collapse" id="details{{$member->id}}">
            <div class="card card-body">
                <span> <Strong>Member Name :</Strong> {{$member->user->name}} </span>
                <strong>Activities :</strong>
                <form action="" method="POST">
                    @csrf
                    @method('DELETE')
                    {{-- <button class="btn btn-sm btn-danger float-right">Remove This Member</button> --}}
                </form>
            </div>
        </div>
        @endforeach
    </table>

</div>
@endif
@endsection

@section('css')
<style>

</style>
@endsection

@section('js')
<script>

</script>
@endsection
