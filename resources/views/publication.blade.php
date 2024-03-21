@include('layouts/header')
<style>
    .like-btn {
      cursor: pointer;
    }
    .like-btn i {
      transition: transform 0.3s ease-in-out;
    }
    .like-btn.clicked i {
      transform: scale(1.2);
      color: #ff6347;
    }
    /* Style pour le menu contextuel */
    .context-menu {
      display: none;
      position: absolute;
      background-color: #fff;
      border: 1px solid #ccc;
      padding: 5px 10px;
    }
  </style>
 
    <div class="team section-padding">
        <div class="container mt-3">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <h4 class="mb-5">Des <span>Publications</span></h4>
                </div>
                
                <div class="col-lg-3 col-md-6 col-sm-6">

                   <div class="dropdown ">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                       Créer votre publication
                        </button>
                        <form method="post" action="{{ route('publication.store') }}" class="dropdown-menu p-4 border-dark"  >
                            @csrf
                            <div class="mb-3">
                                <label for="exampleDropdownFormEmail2" class="form-label">Titre</label>
                                <input type="text" name="titre" class="form-control border-primary" id="exampleDropdownFormEmail2" placeholder="Titre de votre story">
                            </div>
                            <div class="mb-3">
                                <label for="exampleDropdownFormPassword2" class="form-label">Description</label>
                                <textarea type="file" name="description" class="form-control border-primary" id="exampleDropdownFormPassword2" placeholder="Contenu de votre publication"></textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </form>
                    </div>

                    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Créer une publication</button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Créer ici votre publication</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{ route('publication.store') }}>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Titre:</label>
                                    <input type="text" name="titre" class="form-control" id="recipient-name">
                                </div>
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Message:</label>
                                    <textarea class="form-control" name="description" id="message-text"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn btn-primary">Créer</button>
                                </div>
                            </form>
                        </div>                    
                        </div>
                    </div>
                    </div>-->
                </div>
                <div class="col-lg-5 col-md-6 col-sm-6">
                    <div class=" bg-body-tertiary">
                        <div class="container-fluid">
                            <form action="{{ route('publication.search') }}" method="post" class="d-flex" role="search">
                                @csrf
                                <input class="form-control me-2 border-primary" name="search" type="search" placeholder="Rechercher une publication par son titre" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
                
                
                <div class="">
                @if (session()->has('message'))
                    <div class="alert alert-success" style="text-align:center;">
                        {{ session('message') }}
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger" style="text-align:center;">
                        {{ session('error') }}
                    </div>
                @endif
                </div>
            </div>
  
            <div class="row">
                @foreach ($publications as $publication)
                <div class="col-md-4 mb-4">
                    <div class="card border-primary">
                        <!-- Bouton de trois points -->
                        <button class="btn btn-sm btn-outline-secondary border-primary position-absolute" style="top: 5px; right: 5px;" onclick="showContextMenu(event)">
                        <i class="fas fa-ellipsis-v" style="font-size: 20px;">=</i>
                        </button>
                        <!-- Contenu de la publication -->
                        <div class="card-body">
                        <!-- Titre, contenu, etc. -->
                        <h5 class="card-title">{{$publication->titre}}</h5><hr>
                            <p class="card-text text-dark">{{$publication->description}}</p>
                            <p class="card-text" style="font-size: 17px;"><small class="">Auteur: {{$publication->user->name}}</small></p>
                            <p class="card-text" style="font-size: 17px;"><small class="">Date de Publication: {{$publication->created_at}}</small></p>
                        <div class="form-group"><hr>
                            <label for="comment">Commentaire:</label>
                            <textarea class="form-control" id="comment" rows="3"></textarea>
                        </div>
                        <button class="btn btn-primary like-btn mr-2" onclick="toggleLike(this)">
                            <i class="fas fa-heart"></i> <span>Like</span>
                        </button>
                        <button class="btn btn-success">Commenter</button>

                        <!-- Menu contextuel -->
                        <div class="context-menu position-absolute bg-dark " style="display: none; right: 5px; top: 10%; color: white;">
                            <a href="{{route('publication.destroy', $publication->id)}}" class="delete-item text-light">Supprimer</a><br>
                            <a href="{{route('publication.edit', $publication->id)}}" class="edit-item text-light">Modifier</a>
                        </div>
                    </div>
                </div>
            </div>

                @endforeach
                
                
                    {{ $publications->links('pagination::bootstrap-4') }}
               
     
                   
        </div>

        
</main>
<script>
  function toggleLike(btn) {
    btn.classList.toggle('clicked');
  }

  // Afficher le menu contextuel au clic sur le bouton de trois points
  function showContextMenu(event) {
    event.preventDefault();
    var contextMenu = $(event.target).closest('.card').find('.context-menu');
    contextMenu.toggle();
  }

   //Cacher le menu contextuel lorsque l'utilisateur clique en dehors de la carte ou du menu contextuel
  $(document).on('click', function(event) {
    if (!$(event.target).closest('.card').length && !$(event.target).hasClass('context-menu')) {
      $('.context-menu').hide();
    }
  });
</script>


@include('layouts/footer')