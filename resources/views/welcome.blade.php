@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <form action="{{url('/search')}}" enctype="multipart/form-data" method="get">
                        @csrf
                        <div class="input-group rounded">

                            <input type="search" class="form-control rounded" name="query" placeholder="Search" aria-label="Search"
                                aria-describedby="search-addon" />
                            <span class="input-group-text border-0" id="search-addon">
                                <button class="btn btn-success">Search</button>
                            </span>


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
