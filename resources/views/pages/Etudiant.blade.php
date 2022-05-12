@include('includes.header')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Etudiant</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Acceuil</a></li>
              <li class="breadcrumb-item active">Etudiant</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
{{-- add new Etudiant modal start --}}
<div class="modal fade" id="addEtudiantModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter Etudiant</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ Route('Etudiant.store') }}" method="POST" id="add_Etudiant_form" >
        @csrf
        <div class="modal-body p-4 bg-light">
          <div class="row">
            <div class="col-lg">
              <label for="nom">Nom</label>
              <input type="text" name="nom" class="form-control" placeholder="Nom Etudiant" required>
            </div>
            <div class="col-lg">
              <label for="prenom">Prenom</label>
              <input type="text" name="prenom" class="form-control" placeholder="Prenom Etudiant" required>
            </div>
          </div>
          <div class="row">
            <div class="col-lg">
              <label for="date_naissance">Date de Naissance</label>
              <input type="Date" name="date_naissance" class="form-control" placeholder="date_naissance" required>
            </div>
            <div class="col-lg">
                <label for="niveau_scolaire">Niveau Scolaire</label>
                <select name="niveau_scolaire"  class="select2" multiple="multiple" data-placeholder="Niveau Scolaire" style="width: 100%;">
                    <option > Choisir ..... </option>
                    <option value="7eme année" > 7éme année </option>
                    <option value="8eme année" > 8éme année </option>
                    <option value="9eme année" > 9éme année </option>
                    <option value="1ere année" > 1ére année </option>
                    <option value="9eme année" > 2éme année </option>
                    <option value="9eme année" > 3éme année </option>
                    <option value="Bac" > Bac </option>
                    <option value="Bac+1" > Bac+1 </option>
                    <option value="Bac+2" > Bac+2 </option>
                    <option value="Bac+3" > Bac+3 </option>
                </select>  
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
          <div class="row">
            <div class="col-lg">
                <label for="formation_id">Formation</label>
                <select name="formation_id"  class="select2" multiple="multiple" data-placeholder="Choisir Formation" style="width: 100%;">
                @foreach( $Formations as $formation)
                    <option value="{{$formation->id}}" > {{$formation->nom_formation}}</option>
                @endforeach
                </select>  
            </div>
            <div class="col-lg">
                <label for="batiment_id">Centre de </label>
                <select name="batiment_id"  class="select2" multiple="multiple" data-placeholder="Choisir Batiment" style="width: 100%;">
                @foreach( $Batiments as $batiment)
                    <option value="{{$batiment->id}}" > {{$batiment->ville}}</option>
                @endforeach                
                </select> 
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          <button type="submit" id="add_Etudiant_btn" class="btn btn-primary">Sauvegarder</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- add new Etudiant modal end --}}

{{-- edit Etudiant modal start --}}

<div class="modal fade" id="editEtudiantModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Etudiant</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ Route('Etudiant.update') }}" method="POST" id="edit_Etudiant_form" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" id="id">
        <div class="modal-body p-4 bg-light">
        <input type="hidden" name="code" id="code">
        <div class="row">
            <div class="col-lg">
              <label for="nom">Nom</label>
              <input type="text" name="nom" id="nom"  class="form-control" placeholder="Nom Etudiant" required>
            </div>
            <div class="col-lg">
              <label for="prenom">Prenom</label>
              <input type="text" name="prenom" id="prenom" class="form-control" placeholder="Prenom Etudiant" required>
            </div>
          </div>
          <div class="row">
            <div class="col-lg">
              <label for="date_naissance">Date de Naissance</label>
              <input type="Date" name="date_naissance" id="date_naissance" class="form-control" placeholder="date_naissance" required>
            </div>
            <div class="col-lg">
                <label for="niveau_scolaire">Niveau Scolaire</label>
                <select name="niveau_scolaire" id="niveau_scolaire"  class="select2" multiple="multiple" data-placeholder="Niveau Scolaire" style="width: 100%;">
                    <option > Choisir ..... </option>
                    <option value="7eme année" > 7éme année </option>
                    <option value="8eme année" > 8éme année </option>
                    <option value="9eme année" > 9éme année </option>
                    <option value="1ere année" > 1ére année </option>
                    <option value="9eme année" > 2éme année </option>
                    <option value="9eme année" > 3éme année </option>
                    <option value="Bac" > Bac </option>
                    <option value="Bac+1" > Bac+1 </option>
                    <option value="Bac+2" > Bac+2 </option>
                    <option value="Bac+3" > Bac+3 </option>
                </select>  
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
          <div class="row">
            <div class="col-lg">
                <label for="formation_id">Formation</label>
                <select name="formation_id" id="formation_id"  class="select2" multiple="multiple" data-placeholder="Choisir Formation" style="width: 100%;">
                @foreach( $Formations as $formation)
                    <option value="{{$formation->id}}" > {{$formation->nom_formation}}</option>
                @endforeach
                </select>  
            </div>
            <div class="col-lg">
                <label for="batiment_id">Centre de </label>
                <select name="batiment_id" id="batiment_id" class="select2" multiple="multiple" data-placeholder="Choisir Batiment" style="width: 100%;">
                @foreach( $Batiments as $batiment)
                    <option value="{{$batiment->id}}" > {{$batiment->ville}}</option>
                @endforeach                
                </select> 
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          <button type="submit" id="edit_Etudiant_btn" class="btn btn-success">Sauvegarder </button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- edit Etudiant modal end --}}

{{-- Delete Etudiant Modal--}}
<div class="modal fade" id="deleteetudiantmodal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body p-4 bg-light">
          <p>Voulez vous Vriament Supprimer cette Etudiant !
          <small class="font-weight-bold" style="color:#ebd200">
           <i class="bi-trash h4"></i>
            cette action ne peut pas etre annule !
          </small>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          <form action="#" method="POST" id="delete_Etudiant_form" enctype="multipart/form-data">
          @csrf
          @method('DELETE')
            <button type="submit"  class="btn btn-danger">Supprimer </button>
          </form>
        </div>
      
    </div>
  </div>
</div>
{{-- End Delete Etudiant Modal--}}

<body class="bg-light">
  <div class="container">
    <div class="row my-5">
      <div class="col-lg-12">
        <div class="card shadow">
          <div class="card-header bg-danger d-flex justify-content-between align-items-center">
            <h3 class="text-light">Liste Etudiants</h3>
            <button class="btn btn-light " data-bs-toggle="modal" data-bs-target="#addEtudiantModal" ><i
                class="bi-plus-circle me-2"></i></button>
          </div>
          <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nom</th>
                    <th>Numero de Telephone</th>
                    <th>Formation</th>
                    <th>Batiment</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($Etudiants as $Etudiant)
                  <tr>
                    <td><a href="#DEtudiantModal{{$Etudiant->id}}" data-bs-toggle="modal">{{$Etudiant->nom}}  {{$Etudiant->prenom}}</a></td>
                    <div class="modal fade" id="DEtudiantModal{{$Etudiant->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Detaille Etudiant</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body p-4 bg-light">
                                    <div class="card-body">
                                      <h4 class="text-info"> Detaille Etudiant</h4>
                                      <div class="callout callout-info">
                                        <dl class="row">
                                          <dt class="col-sm-4">Nom</dt>
                                          <dd class="col-sm-8">{{$Etudiant->nom}} {{$Etudiant->prenom}}</dd>
                                          <dt class="col-sm-4">N° Telephone</dt>
                                          <dd class="col-sm-8">{{$Etudiant->numero_telephone}}</dd>
                                          <dt class="col-sm-4">Date Naissance</dt>
                                          <dd class="col-sm-8">{{$Etudiant->date_naissance}}</dd>
                                          <dt class="col-sm-4">Niveau Scolaire</dt>
                                          <dd class="col-sm-8">{{$Etudiant->niveau_scolaire}}</dd>
                                          <dt class="col-sm-4">Adresse</dt>
                                          <dd class="col-sm-8">{{$Etudiant->adresse}}</dd>
                                          <dt class="col-sm-4">Ville</dt>
                                          <dd class="col-sm-8">{{$Etudiant->ville}}, {{$Etudiant->code_postale}}</dd>
                                          <dt class="col-sm-4">Formation</dt>
                                          <dd class="col-sm-8">{{$Etudiant->Formation->nom_formation}}</dd>
                                          <dt class="col-sm-4">Inscrire à </dt>
                                          <dd class="col-sm-8">{{$Etudiant->Batiment->ville}}</dd>     
                                        </dl>
                                      </div>
                                      <h4 class="text-info"> Contact Parents</h4>
                                      <div class="callout callout-info">
                                      @foreach($Parents as $Parent)
                                        <dl class="row">
                                          <dt class="col-sm-4">Nom</dt>
                                          <dd class="col-sm-8">{{$Parent->nom}} {{$Parent->prenom}}</dd>   
                                        </dl>
                                        @endforeach
                                      </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <td>{{$Etudiant->numero_telephone}}</td>
                    <td>{{$Etudiant->Formation->nom_formation}}</td>
                    <td> {{$Etudiant->Batiment->ville}}</td>
                    <td>
                      <a href="#" onclick="EditEtudiant({{$Etudiant->id}})"  class="text-success mx-1"><i class="bi-pencil-square h4"></i> </a>
                      <a href="#" onclick="DeleteEtudiant({{$Etudiant->id}})"   class="text-danger mx-1"><i class="bi-trash h4"></i></a>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Nom</th>
                    <th>Numero de Telephone</th>
                    <th>Formation</th>
                    <th>Batiment</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
      </div>
    </div>


    <script>
      function EditEtudiant(id){
        $('#editEtudiantModal').modal('toggle');
        $.get('/Etudiant/' + id, function(etudiant){
          $('#nom').val(etudiant.nom);
          $('#prenom').val(etudiant.prenom);
          $('#date_naissance').val(etudiant.date_naissance);
          $('#niveau_scolaire').val(etudiant.niveau_scolaire);
          $('#numero_telephone').val(etudiant.numero_telephone);
          $('#adresse').val(etudiant.adresse);
          $('#ville').val(etudiant.ville);
          $('#code_postale').val(etudiant.code_postale);
          $('#formation_id').val(etudiant.formation_id);
          $('#batiment_id').val(etudiant.batiment_id);
          $('#code').val(etudiant.code);
          $('#id').val(etudiant.id);
        });
      }
      function DeleteEtudiant(id){
        $('#deleteetudiantmodal').modal('toggle');
        $('#delete_Etudiant_form').attr('action', "/Etudiant/" + id);
      }

        
    </script>
@include('includes.footer')