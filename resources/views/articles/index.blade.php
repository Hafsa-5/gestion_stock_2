@extends('adminlte::page')

@section('title', 'Liste des Articles')

@section('content_header')
    <div class="header my-4 d-flex justify-content-between">
        <h4 class="">Liste des Articles</h4>
        <a href="/articles/create" class="d-block btn btn-success">nouveau Article</a>
    </div>
@stop

@section('content')
    @include('components.messages_alert')

    <div class="section_table">
        <div class="">

            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prix unitaire</th>
                    <th>Quantité en stock</th>
                    <th>Fournisseur</th>
                    <th>Date de Demande</th>
                    <th>Nom & Prénom du demandeur</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($articles as $article)
                    <tr class="align-middle">
                        <td>{{$article->nom}}</td>
                        <td>{{$article->prix_unitaire}}</td>
                        <td>{{$article->quantite_stock}}</td>
                        <td>{{$article->contrat->fournisseur->nom}}</td>
                        <td>{{$article->contrat->date_demande}}</td>
                        <td>{{$article->demande->agent->nom}} {{$article->demande->agent->prenom}}</td>
                        <td>
                            <a href="/articles/{{$article->id}}/afficher" class="text-info me-1"><i class="far fa-fw fa-eye"></i></a>
                            <a href="/articles/{{$article->id}}/edit" class="text-warning me-1"><i class="fas fa-fw fa-pencil-alt"></i></a>
                            <form id="deleteForm{{$article->id}}" class="d-inline-block" action="/articles/{{$article->id}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input type="hidden" name="id" value="{{$article->id}}">
                                <button class="border-0 text-danger bg-transparent p-0"  onclick="confirmDelete(event, {{$article->id}})"><i class="fas fa-fw fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center pt-3">
                {{ $articles->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

@stop

@section('js')
    <script>
        function confirmDelete(event, articleId) {
            event.preventDefault();

            if (confirm('Êtes-vous sûr(e) de vouloir supprimer cet enregistrement?')) {
                document.getElementById('deleteForm'+articleId).submit();
            }
        }
    </script>
@stop



