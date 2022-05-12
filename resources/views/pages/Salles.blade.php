@include('includes.header')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Listes des Salles</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Acceuil</a></li>
              <li class="breadcrumb-item active">Salle</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
{{-- add new employee modal start --}}
<div class="modal fade" id="addSalleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter Payement</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST" id="add_Salle_form" >
        @csrf
        <div class="modal-body p-4 bg-light">
          <div class="row">
            <div class="col-lg">
                <label for="nom_salle">Nom de Salle</label>
                <input type="text" name="nom_salle" class="form-control" placeholder="Nom de salle" required>
            </div>
            <div class="col-lg">
                <label for="numero_salle">N° de Salle</label>
                <input type="text" name="numero_salle" class="form-control" placeholder="N° de Salle" required>
            </div>
          </div>
          <div class="row">
            <div class="col-lg">
                <label for="type_salle">Type de Salle</label>
                <input type="text" name="type_salle" class="form-control" placeholder="Nom de salle" required>
            </div>
            <div class="col-lg">
                <label for="type_salle">Batiment</label>
                <select name="batiment_id" class="select2" multiple="multiple" data-placeholder="Choisir formation" style="width: 100%;">
                @foreach( $Batiments as $Batiment)
                    <option value="{{$Batiment->id}}" > {{$Batiment->ville}}</option>
                @endforeach                
                </select>             </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          <button type="submit" id="add_Payement_btn" class="btn btn-primary">Sauvegarder</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- add new employee modal end --}}

{{-- edit employee modal start --}}

<div class="modal fade" id="editSalleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Matiere</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ Route('Salle.update') }}" method="POST" id="edit_Salle_form" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" id="id">
        <div class="modal-body p-4 bg-light">
          <div class="row">
            <div class="col-lg">
                <label for="nom_salle">Nom de Salle</label>
                <input type="text" name="nom_salle" id="nom_salle" class="form-control" placeholder="Nom de salle" required>
            </div>
            <div class="col-lg">
                <label for="numero_salle">N° de Salle</label>
                <input type="text" name="numero_salle" id="numero_salle" class="form-control" placeholder="N° de Salle" required>
            </div>
          </div>
          <div class="row">
            <div class="col-lg">
                <label for="type_salle">Type de Salle</label>
                <input type="text" name="type_salle" id="type_salle" class="form-control" placeholder="Nom de salle" required>
            </div>
            <div class="col-lg">
                <label for="type_salle">Batiment</label>
                <select name="batiment_id" id="batiment_id" class="select2" multiple="multiple" data-placeholder="Choisir formation" style="width: 100%;">
                @foreach( $Batiments as $Batiment)
                    <option value="{{$Batiment->id}}" > {{$Batiment->ville}}</option>
                @endforeach                
                </select>             </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          <button type="submit" id="edit_Salle_btn" class="btn btn-success">Sauvegarder </button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- edit employee modal end --}}

{{-- Delete matiere Modal--}}
<div class="modal fade" id="deleteSallemodal" tabindex="-1" aria-labelledby="exampleModalLabel"
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
          <form action="#" method="POST" id="delete_Salle_form" enctype="multipart/form-data">
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
            <h3 class="text-light">Salles</h3>
            <button class="btn btn-light " data-bs-toggle="modal" data-bs-target="#addSalleModal" ><i
                class="bi-plus-circle me-2"></i></button>
          </div>
          <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nom Salle</th>
                    <th>Numero Salle</th>
                    <th>Type Salle</th>
                    <th>Batiment</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($Salles as $Salle)
                  <tr>
                    <td>{{$Salle->nom_salle}}</td>
                    <td>{{$Salle->numero_salle}}</td>
                    <td>{{$Salle->type_salle}}</td>
                    <td>{{$Salle->Batiment->ville}}</</td>
                    <td>
                      <a href="#" onclick="EditSalle({{$Salle->id}})"  class="text-success mx-1"><i class="bi-pencil-square h4"></i> </a>
                      <a href="#" onclick="DeleteSalle({{$Salle->id}})" class="text-danger mx-1"><i class="bi-trash h4"></i></a>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Nom Salle</th>
                    <th>Numero Salle</th>
                    <th>Type Salle</th>
                    <th>Batiment</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
      </div>
    </div>


    <script>
      function EditSalle(id){
        $('#editSalleModal').modal('toggle');
        $.get('/Salle/' + id, function(salle){
          $('#nom_salle').val(salle.nom_salle);
          $('#numero_salle').val(salle.numero_salle);
          $('#type_salle').val(salle.type_salle);
          $('#batiment_id').val(salle.batiment_id);
          $('#id').val(salle.id);
        });
      }

      function DeleteSalle(id){
        $('#deleteSallemodal').modal('toggle');
        $('#delete_Salle_form').attr('action', "/Salle/" + id);
      }

        //Ajouter nouveau employee
        $("#add_Salle_form").submit(function(e){
            e.preventDefault();
            const fd = new FormData(this);
            $("#add_Salle_btn").text("Sauvgarder ....!");
            $.ajax({
                url: '{{ route('Salle.store') }}',
                method: 'post',
                data: fd,
                cache: false,
                processData: false,
                contentType: false,
                success:function(res){
                    if(res.status == 200){
                        Swal.fire(
                            'Enregistrer!',
                            'Salle ajouter avec succès',
                            'success'
                        )
                    }
                    $("#add_Salle_btn").text('Ajouter Parent');
                    $("#add_Salle_form")[0].reset();
                    $("#addSalleModal").modal('hide');   
                },
                error:function(res){
                    console.log(res.responseText);
                }
            });
        });
        
    </script>
@include('includes.footer')