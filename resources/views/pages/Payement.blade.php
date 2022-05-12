@include('includes.header')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Listes des Payements</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Acceuil</a></li>
              <li class="breadcrumb-item active">Payement</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
{{-- add new employee modal start --}}
<div class="modal fade" id="addPayementModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter Payement</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST" id="add_Payement_form" >
        @csrf
        <div class="modal-body p-4 bg-light">
          <div class="row">
            <div class="col-lg">
                <label for="type_payement">Type Payement</label>
                <select name="type_payement"  class="select2" multiple="multiple" data-placeholder="Type Payement" style="width: 100%;">
                    <option value="Payement Tranche" > Payement Tranche</option>
                    <option value="Frais inscription" > Frais Inscription</option>
                    <option value="Frais Examan" > Frais Examan</option>
                </select> 
            </div>
            <div class="col-lg">
              <label for="num_tranche">Tranche N°</label>
              <select name="num_tranche"  class="select2" multiple="multiple" data-placeholder="Choisir " style="width: 100%;">
                    <option value="12" > Frais Examan final</option>
                    <option value="0" > Frais Inscription</option>
                    <option value="1" > Tranche N°1</option>
                    <option value="2" > Tranche N°2</option>
                    <option value="3" > Tranche N°3</option>
                    <option value="4" > Tranche N°4</option>
                    <option value="5" > Tranche N°5</option>
                    <option value="6" > Tranche N°6</option>
                    <option value="7" > Tranche N°7</option>
                    <option value="8" > Tranche N°8</option>
                    <option value="9" > Tranche N°9</option>
                    <option value="10" > Tranche N°10</option>
                </select> 
            </div>
          </div>
          <div class="row">
            <div class="col-lg">
                <label for="montant">Montant  </label>
                <input type="text" name="montant" class="form-control" placeholder="Coefficient" required>
            </div>
            <div class="col-lg">
                <label for="etudiant_id">Etudiant </label>
                <select name="etudiant_id"  class="select2" multiple="multiple" data-placeholder="Choisir formation" style="width: 100%;">
                @foreach( $Etudiants as $Etudiant)
                    <option value="{{$Etudiant->id}}" > {{$Etudiant->nom}} {{$Etudiant->prenom}}</option>
                @endforeach                
                </select> 
            </div>
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

<div class="modal fade" id="editPayementModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Matiere</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ Route('Payement.update') }}" method="POST" id="edit_Payement_form" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" id="id">
        <div class="modal-body p-4 bg-light">
          <div class="row">
            <div class="col-lg">
                <label for="type_payement">Type Payement</label>
                <select name="type_payement" id="type_payement" class="select2" multiple="multiple" data-placeholder="Type Payement" style="width: 100%;">
                    <option value="Payement Tranche" > Payement Tranche</option>
                    <option value="Frais inscription" > Frais Inscription</option>
                    <option value="Frais Examan" > Frais Examan</option>
                </select> 
            </div>
            <div class="col-lg">
              <label for="num_tranche">Tranche N°</label>
              <select name="num_tranche" id="num_tranche" class="select2" multiple="multiple" data-placeholder="Choisir " style="width: 100%;">
                    <option value="12" > Frais Examan final</option>
                    <option value="0" > Frais Inscription</option>
                    <option value="1" > Tranche N°1</option>
                    <option value="2" > Tranche N°2</option>
                    <option value="3" > Tranche N°3</option>
                    <option value="4" > Tranche N°4</option>
                    <option value="5" > Tranche N°5</option>
                    <option value="6" > Tranche N°6</option>
                    <option value="7" > Tranche N°7</option>
                    <option value="8" > Tranche N°8</option>
                    <option value="9" > Tranche N°9</option>
                    <option value="10" > Tranche N°10</option>
                </select> 
            </div>
          </div>
          <div class="row">
            <div class="col-lg">
                <label for="montant">Montant  </label>
                <input type="text" name="montant" id="montant" class="form-control" placeholder="Coefficient" required>
            </div>
            <div class="col-lg">
                <label for="etudiant_id">Etudiant </label>
                <select name="etudiant_id" id="etudiant_id"    class="select2" multiple="multiple" data-placeholder="Choisir formation" style="width: 100%;">
                @foreach( $Etudiants as $Etudiant)
                    <option value="{{$Etudiant->id}}" > {{$Etudiant->nom}} {{$Etudiant->prenom}}</option>
                @endforeach                
                </select> 
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          <button type="submit" id="edit_Payement_btn" class="btn btn-success">Sauvegarder </button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- edit employee modal end --}}

{{-- Delete matiere Modal--}}
<div class="modal fade" id="deletePayementmodal" tabindex="-1" aria-labelledby="exampleModalLabel"
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
          <form action="#" method="POST" id="delete_Payement_form" enctype="multipart/form-data">
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
            <button class="btn btn-light " data-bs-toggle="modal" data-bs-target="#addPayementModal" ><i
                class="bi-plus-circle me-2"></i></button>
          </div>
          <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Etudiant</th>
                    <th>Type Payement</th>
                    <th>Numero Tranche</th>
                    <th>Montant</th>
                    <th>Date </th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($Payements as $Payement)
                  <tr>
                    <td>{{$Payement->Etudiant->nom}} {{$Payement->Etudiant->prenom}}</td>
                    <td>{{$Payement->type_payement}}</td>
                    <td>
                        @if($Payement->num_tranche == 0)
                            <p>Frais Inscription</p>
                        @elseif($Payement->num_tranche == 12)
                            <p>Frais Examan Final </p>
                        @else
                            {{$Payement->num_tranche}}
                        @endif
                    </td>
                    <td>{{$Payement->montant}}</td>
                    <td>{{$Payement->created_at}}</td>
                    <td>
                      <a href="#" onclick="EditPayement({{$Payement->id}})"  class="text-success mx-1"><i class="bi-pencil-square h4"></i> </a>
                      <a href="Facture{{$Payement->Etudiant->id}}"  class="text-info mx-1"><i class="bi bi-eye-fill h4"></i></a>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Etudiant</th>
                    <th>Type Payement</th>
                    <th>Numero Tranche</th>
                    <th>Montant</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
      </div>
    </div>


    <script>
      function EditPayement(id){
        $('#editPayementModal').modal('toggle');
        $.get('/Payement/' + id, function(payement){
          $('#type_payement').val(payement.type_payement);
          $('#num_tranche').val(payement.num_tranche);
          $('#montant').val(payement.montant);
          $('#etudiant_id').val(payement.etudiant_id);
          $('#id').val(payement.id);
        });
      }
        //Ajouter nouveau employee
        $("#add_Payement_form").submit(function(e){
            e.preventDefault();
            const fd = new FormData(this);
            $("#add_Payement_btn").text("Sauvgarder ....!");
            $.ajax({
                url: '{{ route('Payement.store') }}',
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
                    $("#add_Payement_btn").text('Ajouter Parent');
                    $("#add_Payement_form")[0].reset();
                    $("#addPayementModal").modal('hide');   
                },
                error:function(res){
                    console.log(res.responseText);
                }
            });
        });
        
    </script>
@include('includes.footer')