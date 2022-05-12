@include('includes.header')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employees</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Acceuil</a></li>
              <li class="breadcrumb-item active">Employees</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
{{-- add new employee modal start --}}
<div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Employee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST" id="add_employee_form" enctype="multipart/form-data">
        @csrf
        <div class="modal-body p-4 bg-light">
          <div class="row">
            <div class="col-lg">
              <label for="fname">Nom</label>
              <input type="text" name="nom" class="form-control" placeholder="Nom Employee" required>
            </div>
            <div class="col-lg">
              <label for="lname">Prenom</label>
              <input type="text" name="prenom" class="form-control" placeholder="Prenom Employee" required>
            </div>
          </div>
          <div class="my-2">
            <label for="email">E-mail</label>
            <input type="email" name="email" class="form-control" placeholder="E-mail" required>
          </div>
          <div class="my-2">
            <label for="cin">CIN</label>
            <input type="text" name="cin" class="form-control" placeholder="CIN" required>
          </div>
          <div class="my-2">
            <label for="phone">Telephone</label>
            <input type="tel" name="phone" class="form-control" placeholder="Numero Telephone" required>
          </div>
          <div class="my-2">
            <label for="role">Post</label>
            <select  name="role" class="select2" multiple="multiple" data-placeholder="Choisir post" style="width: 100%;">
                <option > Choisir ..... </option>
                <option value="2"> Administration </option>
                <option value="3"> Formateur </option>
            </select>  
          </div>
          <div class="my-2">
            <label for="avatar">Choisir Image</label>
            <input type="file" name="avatar" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          <button type="submit" id="add_employee_btn" class="btn btn-primary swalDefaultSuccess">Ajouter Employee</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- add new employee modal end --}}

{{-- edit employee modal start --}}
<div class="modal fade" id="editEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Employee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST" id="edit_employee_form" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" id="id">
        <input type="hidden" name="emp_avatar" id="emp_avatar">
        <div class="modal-body p-4 bg-light">
          <div class="row">
            <div class="col-lg">
              <label for="fname">Nom</label>
              <input type="text" name="nom" id="nom" class="form-control" placeholder="Nom Employee" required>
            </div>
            <div class="col-lg">
              <label for="lname">Prenom</label>
              <input type="text" name="prenom" id="prenom" class="form-control" placeholder="Prenom Employee" required>
            </div>
          </div>
          <div class="my-2">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" required>
          </div>
          <div class="my-2">
            <label for="cin">CIN</label>
            <input type="text" name="cin" id="cin" class="form-control" placeholder="CIN" required>
          </div>
          <div class="my-2">
            <label for="phone">Telephone</label>
            <input type="tel" name="phone" id="phone" class="form-control" placeholder="Numero Telephone" required>
          </div>
          <div class="my-2">
            <label for="role">Post</label>
            <select  name="role" id="select2" class="select2" multiple="multiple" data-placeholder="Choisir post" style="width: 100%;">
                <option > Choisir ..... </option>
                <option value="2"> Administration </option>
                <option value="3"> Formateur </option>
            </select>  
          </div>
          <div class="my-2">
            <label for="avatar">Choisir Image</label>
            <input type="file" name="avatar" class="form-control" required>
            <div class="mt-2" id="avatar">

            </div>
          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          <button type="submit" id="edit_employee_btn" class="btn btn-success">Enregestrer </button>
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
            <h3 class="text-light">Employee</h3>
            <button class="btn btn-light " data-bs-toggle="modal" data-bs-target="#addEmployeeModal" ><i
                class="bi-plus-circle me-2"></i></button>
          </div>
          <div class="card-body" id="show_all_employees">
            <h1 class="text-center text-secondary my-5">Loading...</h1>
          </div>
        </div>
      </div>
    </div>
  

  <script>
    fetchAllEmployees();
      
    //select employee
    function fetchAllEmployees(){
        $.ajax({
          url: '{{ route('Employee.fetchAll')}}',
          method: 'get',
          success: function(res){
              $("#show_all_employees").html(res);
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
            url: '{{ route('Employee.destroy')}}',
            method: 'post',
            data: {
              id: id,
              _token: '{{ csrf_token() }}'
            },
            success:function(res){
              Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
              )
              fetchAllEmployees();
            },
            error:function(res){
                  console.log(res.responseText);
              }
          });
        }
    })
    });

    //update employee 
    $("#edit_employee_form").submit(function(e){
        e.preventDefault();
        const fd = new FormData(this);
        $("#edit_employee_btn").text('Mise a jour .......');
        $.ajax({
            url: '{{ route('Employee.update')}}',
            method: 'post',
              data: fd,
              cache: false,
              processData: false,
              contentType: false,
              success:function(res){

                  console.log(res);
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
            url: '{{ route('Employee.edit')}}',
            method: 'get',
            data: {
                id: id,
                _token: '{{ csrf_token() }}'
            },
            success: function(res){
                $("#nom").val(res.nom);
                $("#prenom").val(res.prenom);
                $("#cin").val(res.cin);
                $("#phone").val(res.phone);
                $("#email").val(res.email);
                $("#select2").val(res.role);
                $("#avatar").html('<img src="storage/images/${res.avatar}" width="100"class="img-fluid img-thumbnail"');
                $("#id").val(res.id);
                $("#emp_avatar").val(res.avatar);
            }
        });
    });
      //Ajouter nouveau employee
      $("#add_employee_form").submit(function(e){
          e.preventDefault();
          const fd = new FormData(this);
          $("#add_employee_btn").text("Ajouter ....");
          $.ajax({
              url: '{{ route('Employee.store') }}',
              method: 'post',
              data: fd,
              cache: false,
              processData: false,
              contentType: false,
              success:function(res){
                  if(res.status == 200){
                    $('.swalDefaultSuccess').click(function() {
                      Toast.fire({
                        icon: 'success',
                        title: 'Sauvegarder avec succes'
                      })
                    });
                      fetchAllEmployees();
                  }
                  $("#add_employee_btn").text('Ajouter Employee');
                  $("#add_employee_form")[0].reset();
                  $("#addEmployeeModal").modal('hide');
                  
                  
              },
              error:function(res){
                  console.log(res.responseText);
              }
          });
      });
  </script>

@include('includes.footer')