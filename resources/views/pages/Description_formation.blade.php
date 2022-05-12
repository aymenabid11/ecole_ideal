@include('includes.header')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detaille Formation</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Acceuil</a></li>
              <li class="breadcrumb-item active">Detaille Formation</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
{{-- add new employee modal start --}}
<div class="modal fade" id="addDescriptionFormationModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Employee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ Route('Detaille.store') }}" method="POST" id="add_Description_form" enctype="multipart/form-data">
        @csrf
        <div class="modal-body p-4 bg-light">
          <div class="my-2">
              <label for="fname">Formation</label>
              <select  name="formation_id" class="select2" multiple="multiple" data-placeholder="Choisir post" style="width: 100%;">
              @foreach($Formations as $Formation)
                <option value="{{$Formation->id}}"> {{$Formation->nom_formation}} </option>
              @endforeach
              </select>  
          </div>
          <div class="my-2">
            <label for="Text_slider">Definition</label>
            <textarea name="Text_slider" class="form-control" rows="3" placeholder="Definition Formation" required="required"></textarea>        
          </div>
          <div class="my-2">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" rows="3" placeholder="Description Formation" required="required"></textarea>        
          </div>
          <div class="my-2">
            <label for="avatar">Image</label>
            <input type="file" name="avatar" class="form-control" placeholder="Image" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          <button type="submit" id="add_Description_btn swalDefaultSuccess" class="btn btn-primary">Sauvegarder</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- add new employee modal end --}}

{{-- edit employee modal start --}}
<div class="modal fade" id="editDescriptionModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Employee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ Route('Detaille.update') }}" method="POST" id="edit_Description_form" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" id="id">
        <input type="hidden" name="emp_avatar" id="emp_avatar">
        <div class="modal-body p-4 bg-light">
          <div class="my-2">
              <label for="fname">Formation</label>
              <select  name="formation_id" id="formation_id" class="select2" multiple="multiple" data-placeholder="Choisir post" style="width: 100%;">
              @foreach($Formations as $Formation)
                <option value="{{$Formation->id}}"> {{$Formation->nom_formation}} </option>
              @endforeach
              </select>  
          </div>
          <div class="my-2">
            <label for="Text_slider">Definition</label>
            <textarea name="Text_slider" id="Text_slider" class="form-control" rows="3" placeholder="Definition Formation" required="required"></textarea>        
          </div>
          <div class="my-2">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="3" placeholder="Description Formation" required="required"></textarea>        
          </div>
          <div class="my-2">
            <label for="avatar">Image</label>
            <input type="file" name="avatar" id="avatar" class="form-control" placeholder="Image" required>
          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          <button type="submit" id="edit_Description_btn" class="btn btn-success">Enregestrer </button>
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
            <h3 class="text-light">Detaille Formation</h3>
            <button class="btn btn-light " data-bs-toggle="modal" data-bs-target="#addDescriptionFormationModal" ><i
                class="bi-plus-circle me-2"></i></button>
          </div>
          <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Images</th>
                    <th>Formation</th>
                    <th>Definition</th>
                    <th>Description</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($Detailles as $Detaille)
                  <tr>
                    <td><img src="storage/images/{{$Detaille->avatar}}" width="50" 
                              class="img-thumbnail rounded-circle"> </td>
                    <td>{{$Detaille->Formation->nom_formation}}</td>
                    <td>{{$Detaille->Text_slider}}</td>
                    <td>{{$Detaille->description}}</td>
                    <td>
                      <a href="#" onclick="EditMatiere({{$Detaille->id}})"  class="text-success mx-1"><i class="bi-pencil-square h4"></i> </a>
                      <a href="#" onclick="DeleteMatiere({{$Detaille->id}})"   class="text-danger mx-1"><i class="bi-trash h4"></i></a>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Images</th>
                    <th>Formation</th>
                    <th>Definition</th>
                    <th>Description</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
          </div>
        </div>
      </div>
    </div>
  

  <script>
        $('.swalDefaultSuccess').click(function() {
          Toast.fire({
            icon: 'success',
            title: 'Sauvegarder avec succes'
          })
        });
  </script>

@include('includes.footer')