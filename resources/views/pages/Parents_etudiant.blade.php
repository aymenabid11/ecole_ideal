@include('includes.header')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Contact Parents Etudiant</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Acceuil</a></li>
              <li class="breadcrumb-item active">Parent Etudiant</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
{{-- add new employee modal start --}}
<div class="modal fade" id="addParentEtudiantModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter Parent Etudiant</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST" id="add_Parent_Etudiant_form" >
        @csrf
        <div class="modal-body p-4 bg-light">
          <div class="row">
            <div class="col-lg">
              <label for="nom">Nom</label>
              <input type="text" name="nom" class="form-control" placeholder="Nom de parent" required>
            </div>
            <div class="col-lg">
              <label for="prenom">Prenom</label>
              <input type="text" name="prenom" class="form-control" placeholder="Prenom parent" required>
            </div>
          </div>
          <div class="row">
            <div class="col-lg">
              <label for="numero_telephone">Numero de Telephone</label>
              <input type="number" name="numero_telephone" class="form-control" placeholder="numero parent" required>
            </div>
            <div class="col-lg">
                <label for="etudiant_id">Parents de  </label>
                <select name="etudiant_id"  class="select2" multiple="multiple" data-placeholder="Choisir etudiant" style="width: 100%;">
                @foreach( $Etudiants as $Etudiant)
                    <option value="{{$Etudiant->id}}" > {{$Etudiant->nom}} {{$Etudiant->prenom}}</option>
                @endforeach                
                </select> 
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          <button type="submit" id="add_ParentEtudiant_btn" class="btn btn-primary">Sauvegarder</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- add new employee modal end --}}

{{-- edit employee modal start --}}

<div class="modal fade" id="editParentEtudiantModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Parent Etudiant</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ Route('Parent_Etudiant.update') }}" method="POST" id="edit_Parent_Etudiant_form" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" id="id">
        <div class="modal-body p-4 bg-light">
        <div class="row">
            <div class="col-lg">
              <label for="nom">Nom</label>
              <input type="text" name="nom" id="nom" class="form-control" placeholder="Nom de parent" required>
            </div>
            <div class="col-lg">
              <label for="prenom">Prenom</label>
              <input type="text" name="prenom" id="prenom" class="form-control" placeholder="Prenom parent" required>
            </div>
          </div>
          <div class="row">
            <div class="col-lg">
              <label for="numero_telephone">Numero de Telephone</label>
              <input type="number" name="numero_telephone" id="numero_telephone" class="form-control" placeholder="numero parent" required>
            </div>
            <div class="col-lg">
                <label for="etudiant_id">Parents de  </label>
                <select name="etudiant_id" id="etudiant_id"  class="select2" multiple="multiple" data-placeholder="Choisir etudiant" style="width: 100%;">
                @foreach( $Etudiants as $Etudiant)
                    <option value="{{$Etudiant->id}}" > {{$Etudiant->nom}} {{$Etudiant->prenom}}</option>
                @endforeach                
                </select> 
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          <button type="submit" id="edit_parent_Etudiant_btn" class="btn btn-success">Sauvegarder </button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- edit employee modal end --}}

{{-- Delete Etudiant Modal--}}
<div class="modal fade" id="deleteparentetudiantmodal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Supprimer </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body p-4 bg-light">
          <p>Voulez vous Vriament Supprimer cette parent !</p>
          <small class="font-weight-bold" style="color:#ebd200">
           <i class="bi-trash h4"></i>
            cette action ne peut pas etre annule !
          </small>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          <form action="#" method="POST" id="delete_Parent_Etudiant_form" enctype="multipart/form-data">
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
            <h3 class="text-light">Etudiants</h3>
            <button class="btn btn-light " data-bs-toggle="modal" data-bs-target="#addParentEtudiantModal" ><i
                class="bi-plus-circle me-2"></i></button>
          </div>
          <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nom Parents</th>
                    <th>Nom etudiant</th>
                    <th>Numero de Telephone</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($Parents as $Parent)
                  <tr>
                    <td>{{$Parent->nom}}  {{$Parent->prenom}}</td>
                    <td>{{$Parent->Etudiant->nom}} {{$Parent->Etudiant->prenom}}</td>
                    <td>{{$Parent->numero_telephone}}</td>
                    <td>
                      <a href="#" onclick="EditParentEtudiant({{$Parent->id}})"  class="text-success mx-1"><i class="bi-pencil-square h4"></i> </a>
                      <a href="#" onclick="DeleteParentEtudiant({{$Parent->id}})"   class="text-danger mx-1"><i class="bi-trash h4"></i></a>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Nom Parents</th>
                    <th>Nom etudiant</th>
                    <th>Numero de Telephone</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
      </div>
    </div>


    <script>
      function EditParentEtudiant(id){
        $('#editParentEtudiantModal').modal('toggle');
        $.get('/Parent_Etudiant/' + id, function(parent_etudiant){
          $('#nom').val(parent_etudiant.nom);
          $('#prenom').val(parent_etudiant.prenom);
          $('#numero_telephone').val(parent_etudiant.numero_telephone);
          $('#etudiant_id ').val(parent_etudiant.etudiant_id );
          $('#id').val(parent_etudiant.id);
        });
      }
      function DeleteParentEtudiant(id){
        $('#deleteparentetudiantmodal').modal('toggle');
        $('#delete_Parent_Etudiant_form').attr('action', "/Parent_Etudiant/" + id);
      }

        //Ajouter nouveau employee
        $("#add_Parent_Etudiant_form").submit(function(e){
            e.preventDefault();
            const fd = new FormData(this);
            $("#add_ParentEtudiant_btn").text("Sauvgarder ....!");
            $.ajax({
                url: '{{ route('Parent_Etudiant.store') }}',
                method: 'post',
                data: fd,
                cache: false,
                processData: false,
                contentType: false,
                success:function(res){
                    if(res.status == 200){
                        Swal.fire(
                            'Enregistrer!',
                            'Parent ajouter avec succès',
                            'success'
                        )
                    }
                    $("#add_ParentEtudiant_btn").text('Ajouter Parent');
                    $("#add_Parent_Etudiant_form")[0].reset();
                    $("#addParentEtudiantModal").modal('hide');   
                },
                error:function(res){
                    console.log(res.responseText);
                }
            });
        });
        
    </script>
@include('includes.footer')