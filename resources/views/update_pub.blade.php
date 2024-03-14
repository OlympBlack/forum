@include('../layouts/header')

 
    <section class="team section-padding">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <h2 class="mb-5">Modifez votre <span>Publications</span></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <form action="" method="post">
                        @csrf
                        <input type="text" name="titre" :value="old('titre', $publication->titre)" id="" class="form-control">
                        <textarea name="description" id="" :value="old('description', $publication->description)" class="form-control" cols="30" rows="10"></textarea>
                        <input type="submit" value="modifier">
                    </form>
                </div>
            </div>
        </div>
    </section>

        


@include('layouts/footer')