@foreach ($books as $book)
    <a href="{{ route('details.book', $book->id) }}" style="text-decoration: none; color:black">
        <div class="col">
            <div class="card">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Livre 1">
                <div class="card-body">
                    <h5 class="card-title">{{ $book->titre }}</h5>
                    <p class="card-text">{{ $book->auteur }}</p>
                </div>
            </div>
        </div>
    </a>
@endforeach


