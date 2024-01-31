@extends('backOffice.asside')

@section('content')
    



<main>
  <div class="card shadow-sm">
    <div class="d-flexxx d-flex justify-content-between">
       
        <div>
        <input type="text" id="searchInput" onkeyup="search()" placeholder="rechercher">
        </div>
     
    </div>
  
    <div class="shadow-sm table-responsive p-3 mb-3 bg-body rounded">
        <table class="table align-middle pl-4 mb-4 mt-2 bg-white ">
            <thead class="bg-light">
            <tr>
            
                <th>Name</th>
                <th>titre</th>
                <th>auteur</th>
                <th>Status</th>
                <th>Action</th>
                                
            </tr>
        </thead>
        <tbody id="category">


            @foreach ($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->titre }}</td>
                    <td>{{ $reservation->titre }}</td>
                    <td>{{ $reservation->auteur }}</td>
                    <td>{{ $reservation->statut }}</td>
        
                    <td class="d-flex gap-2">
                        <form action="" method="post" >
                            @csrf @method('DELETE')
                            <button type="submit" name="submit"  class="btn btn-light">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"> <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/> <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/> </svg>
                            </button>
                        </form>
                    </td>
                </tr>

            @endforeach

            @if ($reservations->isEmpty())
                <tr><td>empty</td></tr>
            @endif
         
           
         
        </tbody>
      </table>

      <div style="display: flex;justify-content:space-between">
        <div style="color: rgb(74, 74, 248)">
            afficher {{$reservations->firstItem()}} a {{$reservations->lastItem()}} in {{$reservations->total()}} reservation
        </div>
        <div style="display: flex">
            @include('backOffice.pagination', ['paginator' => $reservations])
        </div>
    </div>
    </div>
  </div>



</main>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script>
  function toggleAside() {
    var aside = document.getElementById("myAside");
    var righttt = document.getElementById("right");
    var rightttBtn = document.getElementById("rightBtn");
    var leftBtn = document.getElementById("leftBtn");
    var links = document.querySelectorAll(".link");

    if (aside.style.width === "5%") {
      aside.style.width = "17%";
      righttt.style.width="83%";
      leftBtn.style.display="block";
      rightttBtn.style.display="none";
      links.forEach(function (link) {
            link.style.display = "block";
        });
    
    } else {
      aside.style.width = "5%";
      righttt.style.width="95%";
      leftBtn.style.display="none";
      rightttBtn.style.display="block";
   
        links.forEach(function (link) {
            link.style.display = "none";
        });
    }
  }
  
 


    //     function search() {
               
    //            let input = document.getElementById("searchInput").value;
    //            let url = `?uri=category/search&search=${encodeURIComponent(input)}`;

    //            let xml = new XMLHttpRequest();
    //            xml.onreadystatechange = function () {
    //                if (this.readyState == 4 && this.status == 200) {
    //                    document.getElementById("category").innerHTML = xml.responseText;
    //                }
    //            };
    //            xml.open("GET", url, true);
    //            xml.send();
         
    //    }
</script>
</body>
</html>
@endsection