@include('includes.header')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Batiment</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Acceuil</a></li>
              <li class="breadcrumb-item active">Batiment</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
{{-- add new employee modal start --}}
<div class="modal fade" id="addBatimentModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter Batiment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST" id="add_Batiment_form" >
        @csrf
        <div class="modal-body p-4 bg-light">
          <div class="my-2">
            <label for="gouvernant">Gouvernant</label>
            <select name="gouvernant"  class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                <option > Choisir ..... </option>
                <option value="Ariana"> Ariana </option>
                <option value="Béja"> Béja </option>
                <option value="Ben Arous"> Ben Arous </option>
                <option value="Bizerte"> Bizerte </option>
                <option value="Gabès"> Gabès </option>
                <option value="Gafsa"> Gafsa </option>
                <option value="Jendouba">  Jendouba </option>
                <option value="Kairouan">  Kairouan </option>
                <option value="Kasserine">  Kasserine </option>
                <option value="Kébili">  Kébili </option>
                <option value="Kef">  Kef </option>
                <option value="Mahdia">  Mahdia </option>
                <option value="Manouba">  Manouba </option>
                <option value="Médenine">  Médenine </option>
                <option value="Monastir">  Monastir </option>
                <option value="Nabeul">  Nabeul </option>
                <option value="Sfax">  Sfax </option>
                <option value="Sidi Bouzid">  Sidi Bouzid </option>
                <option value="Siliana">  Siliana </option>
                <option value="Sousse">  Sousse </option>
                <option value="Tataouine">  Tataouine </option>
                <option value="Tozeur">  Tozeur </option>
                <option value="Tunis">  Tunis </option>
                <option value="Zaghouan">  Zaghouan </option>
            </select>  
          </div>
          <div class="my-2">
            <label for="ville">Ville</label>
            <input type="text" name="ville" class="form-control" placeholder="ville" required>
          </div>
          <div class="my-2">
            <label for="adresse">Adresse</label>
            <input type="text" name="adresse" class="form-control" placeholder="adresse" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          <button type="submit" id="add_Batiment_btn" class="btn btn-primary">Sauvegarder</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- add new employee modal end --}}

{{-- edit employee modal start --}}
<div class="modal fade" id="editBatimentModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Batiment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST" id="edit_Batiment_form" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="Batiment_id" id="Batiment_id">
        <div class="modal-body p-4 bg-light">
          <div class="my-2">
            <label for="gouvernant">Gouvernant</label>
            <select name="gouvernant" id="gouvernant" class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                <option > Choisir ..... </option>
                <option value="Ariana"> Ariana </option>
                <option value="Béja"> Béja </option>
                <option value="Ben Arous"> Ben Arous </option>
                <option value="Bizerte"> Bizerte </option>
                <option value="Gabès"> Gabès </option>
                <option value="Gafsa"> Gafsa </option>
                <option value="Jendouba">  Jendouba </option>
                <option value="Kairouan">  Kairouan </option>
                <option value="Kasserine">  Kasserine </option>
                <option value="Kébili">  Kébili </option>
                <option value="Kef">  Kef </option>
                <option value="Mahdia">  Mahdia </option>
                <option value="Manouba">  Manouba </option>
                <option value="Médenine">  Médenine </option>
                <option value="Monastir">  Monastir </option>
                <option value="Nabeul">  Nabeul </option>
                <option value="Sfax">  Sfax </option>
                <option value="Sidi Bouzid">  Sidi Bouzid </option>
                <option value="Siliana">  Siliana </option>
                <option value="Sousse">  Sousse </option>
                <option value="Tataouine">  Tataouine </option>
                <option value="Tozeur">  Tozeur </option>
                <option value="Tunis">  Tunis </option>
                <option value="Zaghouan">  Zaghouan </option>
            </select>  
          </div>
          <div class="my-2">
            <label for="ville">Ville</label>
            <input type="text" name="ville" id="ville" class="form-control" placeholder="ville" required>
          </div>
          <div class="my-2">
            <label for="adresse">Adresse</label>
            <input type="text" name="adresse" id="adresse" class="form-control" placeholder="adresse" required>
          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          <button type="submit" id="edit_Batiment_btn" class="btn btn-success">Sauvegarder </button>
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
            <h3 class="text-light">Batiment</h3>
            <button class="btn btn-light " data-bs-toggle="modal" data-bs-target="#addBatimentModal" ><i
                class="bi-plus-circle me-2"></i></button>
          </div>
          <div class="card-body" id="show_all_Batiment">
            <h1 class="text-center text-secondary my-5">Loading...</h1>
          </div>
        </div>
      </div>
    </div>


    <script>
        fetchAllBatiments();
        //select employee
        function fetchAllBatiments(){
            $.ajax({
            url: '{{ route('Batiment.fetchAll')}}',
            method: 'get',
            success: function(res){
                $("#show_all_Batiment").html(res);
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
                url: '{{ route('Batiment.destroy')}}',
                method: 'post',
                data: {
                id: id,
                _token: '{{ csrf_token() }}'
                },
                success:function(res){
                    Swal.fire(
                        'Supprimer!',
                        'Le Batiment a ete supprimer avec succes !',
                        'Succès'
                    )
                    fetchAllBatiments();
                },
                error:function(res){
                    console.log(res.responseText);
                }
            });
            }
        })
        });

        //update employee 
        $("#edit_Batiment_form").submit(function(e){
            e.preventDefault();
            const fd = new FormData(this);
            $("#edit_Batiment_btn").text('Mise a jour .......!');
            $.ajax({
                url: '{{ route('Batiment.update')}}',
                method: 'post',
                data: fd,
                cache: false,
                processData: false,
                contentType: false,
                success:function(res){
                    if(res.status == 200){
                        Swal.fire(
                            'Mise A jour!',
                            'Batiment mise à jour avec succès!',
                            'Succès'
                        )
                        fetchAllBatiments();
                    }
                    $("#edit_Batiment_btn").text('Mise A jour Batiment');
                    $("#edit_Batiment_form")[0].reset();
                    $("#editBatimentModal").modal('hide');
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
                url: '{{ route('Batiment.edit')}}',
                method: 'get',
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(res){
                    $("#gouvernant").val(res.gouvernant);
                    $("#ville").val(res.ville);
                    $("#adresse").val(res.adresse);
                    $("#Batiment_id").val(res.id);
                },
                error:function(res){
                    console.log(res.responseText);
                }
            });
        });
        //Ajouter nouveau employee
        $("#add_Batiment_form").submit(function(e){
            e.preventDefault();
            const fd = new FormData(this);
            $("#add_Batiment_btn").text("Sauvgarder ....!");
            $.ajax({
                url: '{{ route('Batiment.store') }}',
                method: 'post',
                data: fd,
                cache: false,
                processData: false,
                contentType: false,
                success:function(res){
                    if(res.status == 200){
                        Swal.fire(
                            'Enregistrer!',
                            'Batiment ajouter avec succès',
                            'success'
                        )
                        fetchAllBatiments();
                    }
                    $("#add_Batiment_btn").text('Ajouter Batiment');
                    $("#add_Batiment_form")[0].reset();
                    $("#addBatimentModal").modal('hide');
                    
                    
                },
                error:function(res){
                    console.log(res.responseText);
                }
            });
        });
    </script>
@include('includes.footer')