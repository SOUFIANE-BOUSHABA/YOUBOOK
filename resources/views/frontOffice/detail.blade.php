

@extends('app')

@section('content')

<div class="container mt-4">
    <div class="row gap-4">
        <div class="col-md-3">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('stor.reservation')}}" method="post">
                @csrf
                <input type="hidden" name="book_id" value="{{$book->id}}">
                <div class="mb-3">
                    <label for="startDate" class="form-label">Date début</label>
                    <input type="date" class="form-control" id="startDate" name="startDate" >
                </div>
                <div class="mb-3">
                    <label for="endDate" class="form-label">Date fin</label>
                    <input type="date" class="form-control" id="endDate" name="endDate" >
                </div>
                <button type="submit" class="btn btn-primary">Réserver</button>
            </form>
        </div>

        <div class="col-md-6">
            <div class=" border d-flex gap-4">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Livre 1">
                <div class="col-md-8 mt-4">
                    <h5 class="card-title">{{$book->titre}}</h5>
                    <p class="card-text">{{$book->auteur}}</p>
                </div>
            </div>
        </div>
    </div>
</div>


@if (Session::has('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '{{ Session::get("success") }}',
            showConfirmButton: false,
            timer: 1500
        });
    </script>
@endif

@if (Session::has('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: '{{ Session::get("error") }}',
            showConfirmButton: false,
            timer: 1500
        });
    </script>
@endif
@endsection
