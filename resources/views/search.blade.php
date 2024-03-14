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
 
    <section class="team section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <h2 class="mb-5">Resultat de votre <span>Recherche</span></h2>
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
                @foreach ($searchResults as $searchResult)
                <div class="col-md-4 mb-4">
                    <div class="card border-primary">
                        <!-- Bouton de trois points -->
                        <button class="btn btn-sm btn-outline-secondary border-primary position-absolute" style="top: 5px; right: 5px;" onclick="showContextMenu(event)">
                        <i class="fas fa-ellipsis-v" style="font-size: 20px;">=</i>
                        </button>
                        <!-- Contenu de la publication -->
                        <div class="card-body">
                        <!-- Titre, contenu, etc. -->
                        <h5 class="card-title">{{$searchResult->titre}}</h5><hr>
                            <p class="card-text text-dark">{{$searchResult->description}}</p>
                            <p class="card-text" style="font-size: 17px;"><small class="">Auteur: {{$searchResult->user->name}}</small></p>
                            <p class="card-text" style="font-size: 17px;"><small class="">Date de Publication: {{$searchResult->created_at}}</small></p>
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
                            <a href="{{route('publication.destroy', $searchResult->id)}}" class="delete-item text-light">Supprimer</a><br>
                            <a href="{{route('publication.edit', $searchResult->id)}}" class="edit-item text-light">Modifier</a>
                        </div>
                    </div>
                </div>
            </div>

                @endforeach
               <a href="{{route('publication.index')}}">Visiter toutes les autres publications</a>
                   
        </section>

        
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