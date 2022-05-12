@include('includes.header')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Formation</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Acceuil</a></li>
              <li class="breadcrumb-item active">Formation</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
{{-- add new employee modal start --}}
<div class="modal fade" id="addFormationModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter Formation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST" id="add_formation_form" >
        @csrf
        <div class="modal-body p-4 bg-light">
            <div class="my-2">
            <label for="nom_formation">Nom de Formation</label>
            <input type="text" name="nom_formation" class="form-control" placeholder="Nom de Formation" required>
          </div>
          <div class="row">
            <div class="col-lg">
              <label for="frais_inscription">Frais inscription</label>
              <input type="text" name="frais_inscription" class="form-control" placeholder="Frais inscription" required>
            </div>
            <div class="col-lg">
              <label for="frais_examan_final">Frais Examan Final</label>
              <input type="text" name="frais_examan_final" class="form-control" placeholder="Frais Examan Final" required>
            </div>
          </div>
          <div class="my-2">
            <label for="frais_formation">Frais de Formation</label>
            <input type="text" name="frais_formation" class="form-control" placeholder="Frais de formation" required>
          </div>
          <div class="my-2">
            <label for="duree_formation">Duree de formation</label>
            <select  name="duree_formation" class="select2" multiple="multiple" data-placeholder="Choisir Duree" style="width: 100%;">
                <option > Choisir ..... </option>
                <option value="06"> 06 Mois </option>
                <option value="07"> 07 Mois </option>
                <option value="08"> 08 Mois </option>
                <option value="09"> 09 Mois </option>
                <option value="10"> 10 Mois </option>
                <option value="11"> 11 Mois </option>
                <option value="12"> 12 Mois </option>
            </select>  
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          <button type="submit" id="add_Formation_btn" class="btn btn-primary">Sauvegarder</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- add new employee modal end --}}

{{-- edit employee modal start --}}
<div class="modal fade" id="editFormationModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Employee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST" id="edit_Formation_form" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="Formation_id" id="Formation_id">
        <div class="modal-body p-4 bg-light">
            <div class="my-2">
            <label for="nom_formation">Nom de Formation</label>
            <input type="text" name="nom_formation" id="nom_formation" class="form-control" placeholder="Nom de Formation" required>
          </div>
          <div class="row">
            <div class="col-lg">
              <label for="frais_inscription">Frais inscription</label>
              <input type="text" name="frais_inscription" id="frais_inscription" class="form-control" placeholder="Frais inscription" required>
            </div>
            <div class="col-lg">
              <label for="frais_examan_final">Frais Examan Final</label>
              <input type="text" name="frais_examan_final" id="frais_examan_final" class="form-control" placeholder="Frais Examan Final" required>
            </div>
          </div>
          <div class="my-2">
            <label for="frais_formation">Frais de Formation</label>
            <input type="text" name="frais_formation" id="frais_formation" class="form-control" placeholder="Frais de formation" required>
          </div>
          <div class="my-2">
            <label for="duree_formation">Duree de formation</label>
            <select  name="duree_formation" id="select2" class="select2" multiple="multiple" data-placeholder="Choisir Duree" style="width: 100%;">
                <option > Choisir ..... </option>
                <option value="06"> 06 Mois </option>
                <option value="07"> 07 Mois </option>
                <option value="08"> 08 Mois </option>
                <option value="09"> 09 Mois </option>
                <option value="10"> 10 Mois </option>
                <option value="11"> 11 Mois </option>
                <option value="12"> 12 Mois </option>
            </select>  
          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          <button type="submit" id="edit_formation_btn" class="btn btn-success">Sauvegarder </button>
        </div>
      </form>

    </div>
  </div>
</div>
{{-- edit employee modal end --}}

<body class="bg-light">
  <div class="container">
    <div class="row my-5">
      <div class="col-lg-12">
        <div class="card shadow">
          <div class="card-header bg-danger d-flex justify-content-between align-items-center">
            <h3 class="text-light">Formation</h3>
            <button class="btn btn-light " data-bs-toggle="modal" data-bs-target="#addFormationModal" ><i
                class="bi-plus-circle me-2"></i></button>
          </div>
          <div class="card-body" id="show_all_Formations">
            <h1 class="text-center text-secondary my-5">Loading...</h1>
          </div>
        </div>
      </div>
    </div>


    <script>
        fetchAllFormations();
        //select employee
        function fetchAllFormations(){
            $.ajax({
            url: '{{ route('Formation.fetchAll')}}',
            method: 'get',
            success: function(res){
                $("#show_all_Formations").html(res);
                $("table").DataTable({
                    order: [0, 'desc']
                });
            }
            });
        }
            //delete employee 
        $(document).on('click', '.deleteIcon', function(e){
        e.preventDefault();
        let id = $(this).attr('id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
            $.ajax({
                url: '{{ route('Formation.destroy')}}',
                method: 'post',
                data: {
                id: id,
                _token: '{{ csrf_token() }}'
                },
                success:function(res){
                    Swal.fire(
                        'Supprimer!',
                        'Le Formation a ete supprimer avec succes !',
                        'Succès'
                    )
                    fetchAllFormations();
                },
                error:function(res){
                    console.log(res.responseText);
                }
            });
            }
        })
        });

        //update employee 
        $("#edit_Formation_form").submit(function(e){
            e.preventDefault();
            const fd = new FormData(this);
            $("#edit_formation_btn").text('Mise a jour .......!');
            $.ajax({
                url: '{{ route('Formation.update')}}',
                method: 'post',
                data: fd,
                cache: false,
                processData: false,
                contentType: false,
                success:function(res){
                    if(res.status == 200){
                        Swal.fire(
                            'Mise A jour!',
                            'Formation mise à jour avec succès!',
                            'Succès'
                        )
                        fetchAllFormations();
                    }
                    $("#edit_formation_btn").text('Mise A jour Formation');
                    $("#edit_Formation_form")[0].reset();
                    $("#editFormationModal").modal('hide');
                },
                error:function(res){
                    console.log(res.responseText);
                }
            });
        })

        //edit employee
        $(document).on('click', '.editIcon', function(e){
            e.preventDefault();
            let id = $(this).attr('id');
            $.ajax({
                url: '{{ route('Formation.edit')}}',
                method: 'get',
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(res){
                    $("#nom_formation").val(res.nom_formation);
                    $("#frais_inscription").val(res.frais_inscription);
                    $("#frais_examan_final").val(res.frais_examan_final);
                    $("#frais_formation").val(res.frais_formation);
                    $("#select2").val(res.duree_formation);
                    $("#Formation_id").val(res.id);
                }
            });
        });
        //Ajouter nouveau employee
        $("#add_formation_form").submit(function(e){
            e.preventDefault();
            const fd = new FormData(this);
            $("#add_Formation_btn").text("Sauvgarder ....!");
            $.ajax({
                url: '{{ route('Formation.store') }}',
                method: 'post',
                data: fd,
                cache: false,
                processData: false,
                contentType: false,
                success:function(res){
                    if(res.status == 200){
                        Swal.fire(
                            'Enregistrer!',
                            'Formation ajouter avec succès',
                            'success'
                        )
                        fetchAllFormations();
                    }
                    $("#add_Formation_btn").text('Ajouter Formation');
                    $("#add_formation_form")[0].reset();
                    $("#addFormationModal").modal('hide');
                    
                    
                },
                error:function(res){
                    console.log(res.responseText);
                }
            });
        });
    </script>
@include('includes.footer')