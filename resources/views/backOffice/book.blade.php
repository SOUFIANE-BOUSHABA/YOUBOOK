@extends('backOffice.asside')

@section('content')
    



<main>
  <div class="card shadow-sm">
    <div class="d-flexxx d-flex justify-content-between">
        <button class="btn btn-dark col-md-1" data-bs-toggle="modal" data-bs-target="#addModal">+</button>
        <div>
           
           {{-- Add Modal  --}}
            <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      ...
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
            </div>


        <input type="text" id="searchInput" onkeyup="search()" placeholder="rechercher">
        </div>
     
    </div>
  
    <div class="shadow-sm table-responsive p-3 mb-3 bg-body rounded">
        <table class="table align-middle pl-4 mb-0 mt-2 bg-white ">
            <thead class="bg-light">
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Auteur</th>
            <th>annee_publication</th>
            <th>Status</th>
            <th>Action</th>
            				
          </tr>
        </thead>
        <tbody id="category">


            @foreach ($books as $book)
            <tr>
                <td><?= $book->id  ?></td>
                <td><?= $book->titre ?></td>
                <td><?= $book->auteur ?></td>
                <td><?= $book->annee_publication ?></td>
                <td><?= $book->statut ?></td>
       
                <td class="d-flex gap-2">
                <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#editModal<?= $book->id  ?>" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16"> <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/> </svg></button>
                
              
                </td>
            </tr>
            @endforeach
           
              



            @if ($books->isEmpty())
                <tr><td>empty</td></tr>
            @endif
         
           
         
        </tbody>
      </table>
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
  
  function confirmDelete() {
            Swal.fire({
                title: 'Êtes-vous sûr(e) ?',
                text: 'Vous ne pourrez pas récupérer cet élément !',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Oui, supprimer !'
            }).then((result) => {
                if (result.isConfirmed) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        }
                    });
                    Toast.fire({
                        icon: "success",
                        title: "Votre élément a été supprimé avec succès"
                    });
                }
            });
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