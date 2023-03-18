@extends('layouts.app')

@section('content')
    <div class="container">
    
            <a class="btn btn-success" href="{{url('/history')}}"> History</a>
         
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <form action="{{ url('/search') }}" enctype="multipart/form-data" method="get">
                        @csrf
                        <div class="input-group rounded">

                            <input type="search" class="form-control rounded" name="query" placeholder="Search"
                                aria-label="Search" aria-describedby="search-addon" />
                            <span class="input-group-text border-0" id="search-addon">
                                <button class="btn btn-success">Search</button>
                            </span>


                        </div>
                    </form>
                  
                </div>
            </div>
             
        </div>
        <div class="row text-center pt-5">
            <div class="col-12">
                @if (!empty($result))
                  <h2 >found :: {{count($result)}} </h2>
                 <div>
                        @foreach ($result as $item)
                             <h3>title:{{$item->title}}</h3>
                             <p>writter: {{$item->writter}}</p>
                        @endforeach
                       
                    </div>   
                @else
                <h2 class="text-danger">not found anything</h2>
                    
                @endif
               
            </div>
        </div>
    </div>
@endsection
