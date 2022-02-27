@extends("layouts.master")

@section("contenu")

<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h5 class="border-bottom pt-5 pb-3 mb-0">Liste des etudiants inscrits</h5>

    <div class="mt-4">
        <div class="d-flex justify-content-between mb-2">
            {{ $etudiants->links() }}
            <div><a href="{{ route('etudiant.create') }}" class="btn btn-primary">Ajouter un nouvel etudiant</a></div>
        </div>
        
        @if(session()->has("successDelete"))
        <div class="alert alert-success">
            <h3> {{ session()->get('successDelete') }}</h3>
        </div>
        @endif
        <table class="table table-bordered table-hover table-condensed">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Classe</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach($etudiants as $etudiant)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{ $etudiant->nom }}</td>
                    <td>{{ $etudiant->prenom }}</td>
                    <td>{{ $etudiant->classe->libelle }}</td>
                    <td>
                        <a href="{{ route('etudiant.edit', ['etudiant'=>$etudiant->id])}}" 
                        class="btn btn-info">Editer</a>
                        <a href="#" class="btn btn-danger" onclick="if(confirm('Voulez-vous supprimer cet étudiant?')){document.getElementById('form-{{$etudiant->id}}').submit() }">Supprimer</a>

                        <form id="form-{{$etudiant->id}}" action=" {{ route('etudiant.supprimer', ['etudiant'=>$etudiant->id]) }} " method="post">
                        @csrf
                        <input type="hidden" name="_method" value="delete">
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </ta ble>

    </div>

</div>

@endsection