@extends('layouts.mainlayout')

@section('title','Book List')

@section('content')
    <div class="mt-5">
        @if( session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
    </div>

    <div class="my-5">
        <div class="row">
            @forelse ($books as $item)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                    <div class="card h-100" >
                        <img src=" {{ $item->cover != null ? asset('storage/cover/'.$item->cover) : asset('images/no cover.png')}}" class="card-img-top" draggable="false" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$item->book_code}}</h5>
                            <p class="card-text">{{$item->title}}</p>
                            <p class="card-text text-end fw-bold {{$item->status == 'in stock'? 'text-success' : 'text-danger'}}">{{$item->status}}</p>

                            @auth
                            <form action="{{ route('rentbook') }}" method="POST">
                            @csrf
                                <input type="hidden" name="book_id" value="{{ $item->id}}">
                                <button class="btn btn-primary me-3" type="submit">Rent</button>
                            </form>
                            @endauth
                        </div>
                    </div>
                </div>
            @empty
            <h3 class="text-center">Book list is empty</h3>
            @endforelse
        </div>
    </div>
@endsection
