@extends('layouts.app')

@section('content')
<div class="container">
    <div class="">
        <div class="">
            <div class="card">
                <div class="card-header">Links</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <h3><a href="{{route('parts.index')}}">See All Parts</a></h3>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection