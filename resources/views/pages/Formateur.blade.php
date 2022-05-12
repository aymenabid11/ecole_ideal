@include('includes.header')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Formateur</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Acceuil</a></li>
              <li class="breadcrumb-item active">Formateur</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
{{-- add new Formateur modal start --}}
<div class="modal fade" id="addFormateurModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter Formateur</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ Route('Formateur.store') }}" method="POST" id="add_Formateur_form" >
        @csrf
        <div class="modal-body p-4 bg-light">
          <div class="my-2">
            <label for="CIN">CIN</label>
            <input type="text" name="CIN" class="form-control" placeholder="CIN" required>
          </div>
          <div class="row">
            <div class="col-lg">
              <label for="nom">Nom</label>
              <input type="text" name="nom" class="form-control" placeholder="Nom Formateur" required>
            </div>
            <div class="col-lg">
              <label for="prenom">Prenom</label>
              <input type="text" name="prenom" class="form-control" placeholder="Prenom Formateur" required>
            </div>
          </div>
          <div class="row">
            <div class="col-lg">
              <label for="date_naissance">Date de Naissance</label>
              <input type="Date" name="date_naissance" class="form-control" placeholder="date_naissance" required>
            </div>
            <div class="col-lg">
                <label for="Diplome">Diplome</label>
                <input type="text" name="Diplome" class="form-control" placeholder="Diplome" required>
            </div>
          </div>
          <div class="row">
            <div class="col-lg">
              <label for="numero_telephone">Numero de Telephone</label>
              <input type="number" name="numero_telephone" class="form-control" placeholder="Numero de Telephone" required>
            </div>
            <div class="col-lg">
            <label for="adresse">Adresse</label>
              <input type="text" name="adresse" class="form-control" placeholder="adresse" required>
            </div>
          </div>
          <div class="row">
            <div class="col-lg">
              <label for="ville">Ville</label>
              <input type="text" name="ville" class="form-control" placeholder="Ville" required>
            </div>
            <div class="col-lg">
            <label for="code_postale">Code Postale</label>
              <input type="number" name="code_postale" class="form-control" placeholder="Code Postale" required>
            </div>
          </div>
          <div class="my-2">
            <label for="formation_id">Formation</label>
            <select name="formation_id"  class="select2" multiple="multiple" data-placeholder="Choisir Formation" style="width: 100%;">
            @foreach( $Formations as $formation)
                <option value="{{$formation->id}}" > {{$formation->nom_formation}}</option>
            @endforeach
            </select>  
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          <button type="submit" id="add_Formateur_btn" class="btn btn-primary">Sauvegarder</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- add new Formateur modal end --}}

{{-- edit Formateur modal start --}}

<div class="modal fade" id="editFormateurModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Formateur</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ Route('Formateur.update') }}" method="POST" id="edit_Formateur_form" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" id="id">
        <div class="modal-body p-4 bg-light">
          <div class="my-2">
            <label for="CIN">CIN</label>
            <input type="text" name="CIN" id="CIN" class="form-control" placeholder="CIN" required>
          </div>
          <div class="row">
            <div class="col-lg">
              <label for="nom">Nom</label>
              <input type="text" name="nom" id="nom" class="form-control" placeholder="Nom Formateur" required>
            </div>
            <div class="col-lg">
              <label for="prenom">Prenom</label>
              <input type="text" name="prenom" id="prenom" class="form-control" placeholder="Prenom Formateur" required>
            </div>
          </div>
          <div class="row">
            <div class="col-lg">
              <label for="date_naissance">Date de Naissance</label>
              <input type="Date" name="date_naissance" id="date_naissance" class="form-control" placeholder="date_naissance" required>
            </div>
            <div class="col-lg">
                <label for="Diplome">Diplome</label>
                <input type="text" name="Diplome" id="Diplome" class="form-control" placeholder="Diplome " required>
            </div>
          </div>
          <div class="row">
            <div class="col-lg">
              <label for="numero_telephone">Numero de Telephone</label>
              <input type="number" name="numero_telephone" id="numero_telephone" class="form-control" placeholder="Numero de Telephone" required>
            </div>
            <div class="col-lg">
            <label for="adresse">Adresse</label>
              <input type="text" name="adresse" id="adresse" class="form-control" placeholder="adresse" required>
            </div>
          </div>
          <div class="row">
            <div class="col-lg">
              <label for="ville">Ville</label>
              <input type="text" name="ville" id="ville" class="form-control" placeholder="Ville" required>
            </div>
            <div class="col-lg">
            <label for="code_postale">Code Postale</label>
              <input type="number" name="code_postale" id="code_postale" class="form-control" placeholder="Code Postale" required>
            </div>
          </div>
          <div class="my-2">
            <label for="formation_id">Formation</label>
            <select name="formation_id" id="formation_id"  class="select2" multiple="multiple" data-placeholder="Choisir Formation" style="width: 100%;">
            @foreach( $Formations as $formation)
                <option value="{{$formation->id}}" > {{$formation->nom_formation}}</option>
            @endforeach
            </select>  
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          <button type="submit" id="edit_Formateur_btn" class="btn btn-success">Sauvegarder </button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- edit Formateur modal end --}}

{{-- Delete Formateur Modal--}}
<div class="modal fade" id="deleteFormateurmodal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body p-4 bg-light">
          <p>Voulez vous Vriament Supprimer cette Formateur !
          <small class="font-weight-bold" style="color:#ebd200">
           <i class="bi-trash h4"></i>
            cette action ne peut pas etre annule !
          </small>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          <form action="#" method="POST" id="delete_Formateur_form" enctype="multipart/form-data">
          @csrf
          @method('DELETE')
            <button type="submit"  class="btn btn-danger">Supprimer </button>
          </form>
        </div>
      
    </div>
  </div>
</div>
{{-- End Delete Formateur Modal--}}




<body class="bg-light">
  <div class="container">
    <div class="row my-5">
      <div class="col-lg-12">
        <div class="card shadow">
          <div class="card-header bg-danger d-flex justify-content-between align-items-center">
            <h3 class="text-light">Liste Formateur</h3>
            <button class="btn btn-light " data-bs-toggle="modal" data-bs-target="#addFormateurModal" ><i
                class="bi-plus-circle me-2"></i></button>
          </div>
          <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nom</th>
                    <th>Diplome</th>
                    <th>Numero de Telephone</th>
                    <th>Formation</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($Formateurs as $Formateur)
                  <tr>
                    <td><a href="#DFormateurModal{{$Formateur->id}}" data-bs-toggle="modal" >{{$Formateur->nom}}  {{$Formateur->prenom}}</a></td>
                    <div class="modal fade" id="DFormateurModal{{$Formateur->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Detaille Formateur</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body p-4 bg-light">
                                    <div class="card-body">
                                        <dl class="row">
                                            <dt class="col-sm-4">Nom</dt>
                                            <dd class="col-sm-8">{{$Formateur->nom}} {{$Formateur->prenom}}</dd>
                                            <dt class="col-sm-4">CIN</dt>
                                            <dd class="col-sm-8">{{$Formateur->CIN}}</dd>
                                            <dt class="col-sm-4">Diplome</dt>
                                            <dd class="col-sm-8">{{$Formateur->Diplome}}</dd>
                                            <dt class="col-sm-4">Date Naissance</dt>
                                            <dd class="col-sm-8">{{$Formateur->date_naissance}}</dd>
                                            <dt class="col-sm-4">N° Telephone</dt>
                                            <dd class="col-sm-8">{{$Formateur->numero_telephone}}</dd>
                                            <dt class="col-sm-4">Adresse</dt>
                                            <dd class="col-sm-8">{{$Formateur->adresse}}</dd>
                                            <dt class="col-sm-4">Ville</dt>
                                            <dd class="col-sm-8">{{$Formateur->ville}}, {{$Formateur->code_postale}}</dd>
                                        </dl>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <td>{{$Formateur->Diplome}}</td>
                    <td>{{$Formateur->numero_telephone}}</td>
                    <td>{{$Formateur->Formation->nom_formation}}</td>
                    <td>
                      <a href="#" onclick="EditFormateur({{$Formateur->id}})"  class="text-success mx-1"><i class="bi-pencil-square h4"></i> </a>
                      <a href="#" onclick="DeleteFormateur({{$Formateur->id}})"   class="text-danger mx-1"><i class="bi-trash h4"></i></a>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Nom</th>
                    <th>Diplome</th>
                    <th>Numero de Telephone</th>
                    <th>Formation</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
      </div>
    </div>

    <script>

      function EditFormateur(id){
        $('#editFormateurModal').modal('toggle');
        $.get('/Formateur/' + id, function(formateur){
          $('#CIN').val(formateur.CIN);
          $('#nom').val(formateur.nom);
          $('#prenom').val(formateur.prenom);
          $('#date_naissance').val(formateur.date_naissance);
          $('#Diplome').val(formateur.Diplome);
          $('#numero_telephone').val(formateur.numero_telephone);
          $('#adresse').val(formateur.adresse);
          $('#ville').val(formateur.ville);
          $('#code_postale').val(formateur.code_postale);
          $('#formation_id').val(formateur.formation_id);
          $('#id').val(formateur.id);
        });
      }
      function DeleteFormateur(id){
        $('#deleteFormateurmodal').modal('toggle');
        $('#delete_Formateur_form').attr('action', "/Formateur/" + id);
      }
        
    </script>
@include('includes.footer')