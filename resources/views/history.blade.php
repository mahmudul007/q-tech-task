@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-8">
                @foreach ($variable as $item)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            <h3>{{ $item->keyword }} --found--->   {{$item->total}} --username->   {{$item->user->id}}</h3>
                        </label>
                    </div>
                @endforeach

            </div>
        </div>



    </div>
@endsection
