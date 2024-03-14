@include('layouts/header')

 
    <section class="team section-padding">
        <div class="container mt-3">
            <h4 class="mb-5"> <span>Discusion</span> instantannée</h4>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Sélectionner un destinataire pour demarrer votre discusion inbox</div>

                        <div class="card-body">
                            <ul class="list-group">
                                @foreach ($users as $user)
                                    <li class="list-group-item">
                                        <a href="{{route('message.show', $user->id)}}">{{ $user->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

@include('layouts/footer')



