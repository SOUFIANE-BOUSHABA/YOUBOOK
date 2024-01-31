@extends('app')

@section('content')
<div class="mb-3">
    <input type="text" class="form-control" placeholder="Rechercher des livres...">
</div>

<div class="d-flex">

    <div class="row row-cols-1 row-cols-md-4 g-4">
        @foreach ($books as $book)
                <a href="{{route('details.book',$book->id)}}" style="text-decoration: none; color:black">
                    <div class="col">
                        <div class="card">
                            <img src="https://via.placeholder.com/150" class="card-img-top" alt="Livre 1">
                            <div class="card-body">
                                <h5 class="card-title">{{$book->titre}}</h5>
                                <p class="card-text">{{$book->auteur}}</p>
                            </div>
                        </div>
                    </div>
                </a>
        @endforeach
        <div style="display: flex">
            @include('backOffice.pagination', ['paginator' => $books])
        </div>

       
    </div>
</div>

@endsection
