@extends("layouts.master")

@section("contenu")

<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h5 class="border-bottom pt-5 pb-3 mb-0">Edition d'un etudiant</h5>

    <div class="mt-4">

        @if(session()->has("success"))
        <div class="alert alert-success">
            <h3> {{ session()->get('success') }}</h3>
        </div>
        @endif

        @if ($errors->any())

        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif


        <form style="width:65%;" method="post" action="{{ route('etudiant.update', 
        ['etudiant'=>$etudiant->id]) }}">

            @csrf

            <input type="hidden" name="_method" value="put">

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nom de l'étudiant</label>
                <input type="text" class="form-control" placeholder="Enter nom de l'étudiant" name="nom" 
                value="{{ $etudiant->nom }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Prénom de l'étudiant</label>
                <input type="text" class="form-control" placeholder="Enter Prénom de l'étudiant" name="prenom"
                value="{{ $etudiant->prenom }}">
            </div> 

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Classe de l'étudiant</label>
                <select class="form-control" name="classe_id">
                    <option value=""></option>
                    @foreach($classes as $classe)

                    @if($classe->id == $etudiant->classe_id)
                    <option value="{{ $classe->id }}" selected>{{ $classe->libelle }}</option>
                    @else
                    <option value="{{ $classe->id }}">{{ $classe->libelle }}</option>
                    @endif
                    @endforeach

                </select>
            </div>

            <button type="submit" class="btn btn-success">Enregistrer</button>
            <a href="{{ route('etudiant') }}" class="btn btn-danger">Annuler</a>

        </form>

    </div>

</div>

@endsection