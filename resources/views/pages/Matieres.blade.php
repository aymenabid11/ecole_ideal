@include('includes.header')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Listes des Matieres</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Acceuil</a></li>
              <li class="breadcrumb-item active">Matiere</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
{{-- add new employee modal start --}}
<div class="modal fade" id="addMatiereModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter Matiere</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST" id="add_Matiere_form" >
        @csrf
        <div class="modal-body p-4 bg-light">
          <div class="row">
            <div class="col-lg">
              <label for="nom">Matiere</label>
              <input type="text" name="nom_matiere" class="form-control" placeholder="Matiere" required>
            </div>
            <div class="col-lg">
              <label for="prenom">Coefficient</label>
              <input type="text" name="coef" class="form-control" placeholder="Coefficient" required>
            </div>
          </div>
            <div class="my-2">
                <label for="formation_id">Parents de  </label>
                <select name="formation_id"  class="select2" multiple="multiple" data-placeholder="Choisir formation" style="width: 100%;">
                @foreach( $Formations as $Formation)
                    <option value="{{$Formation->id}}" > {{$Formation->nom_formation}}</option>
                @endforeach                
                </select> 
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          <button type="submit" id="add_Matiere_btn" class="btn btn-primary">Sauvegarder</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- add new employee modal end --}}

{{-- edit employee modal start --}}

<div class="modal fade" id="editMatiereModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Matiere</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ Route('Matiere.update') }}" method="POST" id="edit_Matiere_form" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" id="id">
        <div class="modal-body p-4 bg-light">
          <div class="row">
            <div class="col-lg">
              <label for="nom">Matiere</label>
              <input type="text" name="nom_matiere" id="nom_matiere" class="form-control" placeholder="Matiere" required>
            </div>
            <div class="col-lg">
              <label for="prenom">Coefficient</label>
              <input type="text" name="coef" id="coef" class="form-control" placeholder="Coefficient" required>
            </div>
          </div>
            <div class="my-2">
                <label for="formation_id">Parents de  </label>
                <select name="formation_id" id="formation_id" class="select2" multiple="multiple" data-placeholder="Choisir formation" style="width: 100%;">
                @foreach( $Formations as $Formation)
                    <option value="{{$Formation->id}}" > {{$Formation->nom_formation}}</option>
                @endforeach                
                </select> 
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          <button type="submit" id="edit_Matiere_btn" class="btn btn-success">Sauvegarder </button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- edit employee modal end --}}

{{-- Delete matiere Modal--}}
<div class="modal fade" id="deleteMatieremodal" tabindex="-1" aria-labelledby="exampleModalLabel"
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
          <form action="#" method="POST" id="delete_Matiere_form" enctype="multipart/form-data">
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
            <h3 class="text-light">Matiere</h3>
            <button class="btn btn-light " data-bs-toggle="modal" data-bs-target="#addMatiereModal" ><i
                class="bi-plus-circle me-2"></i></button>
          </div>
          <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Matiere</th>
                    <th>Coefficient</th>
                    <th>Formation</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($Matieres as $Matiere)
                  <tr>
                    <td>{{$Matiere->nom_matiere}} </td>
                    <td>{{$Matiere->coef}}</td>
                    <td>{{$Matiere->Formation->nom_formation}}</td>
                    <td>
                      <a href="#" onclick="EditMatiere({{$Matiere->id}})"  class="text-success mx-1"><i class="bi-pencil-square h4"></i> </a>
                      <a href="#" onclick="DeleteMatiere({{$Matiere->id}})"   class="text-danger mx-1"><i class="bi-trash h4"></i></a>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Matiere</th>
                    <th>Coefficient</th>
                    <th>Formation</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
          </div>
      </div>
    </div>


    <script>
      function EditMatiere(id){
        $('#editMatiereModal').modal('toggle');
        $.get('/Matiere/' + id, function(matiere){
          $('#nom_matiere').val(matiere.nom_matiere);
          $('#coef').val(matiere.coef);
          $('#formation_id').val(matiere.formation_id);
          $('#id').val(matiere.id);
        });
      }
      function DeleteMatiere(id){
        $('#deleteMatieremodal').modal('toggle');
        $('#delete_Matiere_form').attr('action', "/Matiere/" + id);
      }

        //Ajouter nouveau employee
        $("#add_Matiere_form").submit(function(e){
            e.preventDefault();
            const fd = new FormData(this);
            $("#add_Matiere_btn").text("Sauvgarder ....!");
            $.ajax({
                url: '{{ route('Matiere.store') }}',
                method: 'post',
                data: fd,
                cache: false,
                processData: false,
                contentType: false,
                success:function(res){
                    if(res.status == 200){
                        Swal.fire(
                            'Enregistrer!',
                            'Matiere ajouter avec succès',
                            'success'
                        )
                    }
                    $("#add_Matiere_btn").text('Ajouter Parent');
                    $("#add_Matiere_form")[0].reset();
                    $("#addMatiereModal").modal('hide');   
                },
                error:function(res){
                    console.log(res.responseText);
                }
            });
        });
        
    </script>
@include('includes.footer')