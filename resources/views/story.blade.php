@include('layouts/header')

 
    <section class="team section-padding">
        <div class="container mt-3">
        <div class="row">
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <h4 class="mb-5">Story des <span>Membres</span></h4>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12 mb-5">
                    <div class="dropdown ">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                       Ajouter votre story
                        </button>
                        <form method="post" action="{{ route('story.store') }}" enctype="multipart/form-data" class="dropdown-menu p-4 border-dark"  >
                            @csrf
                            <div class="mb-3">
                                <label for="exampleDropdownFormEmail2" class="form-label">Titre</label>
                                <input type="text" name="titre" class="form-control border-primary" id="exampleDropdownFormEmail2" placeholder="Titre de votre story">
                            </div>
                            <div class="mb-3">
                                <label for="exampleDropdownFormPassword2" class="form-label">Une image</label>
                                <input type="file" accept="image/*" name="image" class="form-control border-primary" id="exampleDropdownFormPassword2" placeholder="Image">
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Ajouter</button>
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
                </div>

            <div class="row">    
                @if ($storys == null)
                    <p class="alert alert-danger">Pas de story </p>
                @else
                @foreach ($storys as $story) 
                <div class="col-lg-4 mb-4 col-6">
                    <div class="team-thumb d-flex align-items-center">
                        <img src="{{asset('public/images/' . $story->image)}}" alt="image">

                        <div class="team-info">
                            <h5 class="mb-0">{{$story->user->name}}</h5>
                            <strong class="text-muted">{{$story->titre}}</strong>
                            <p>{{$story->created_at}}</p>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn custom-modal-btn" data-bs-toggle="modal" data-bs-target="#don">
                              <i class="bi-plus-circle-fill"></i>
                            </button>

                        </div>
                    </div>
                </div>
                @endforeach
                @endif
                
            </div>
        </div>

    </section>

</main>


    

@include('layouts/footer')