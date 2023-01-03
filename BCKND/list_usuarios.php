<?php include ('cabecera.php');?>

<?php include ('funciones_bd.php');?>


<div id="app"> 
       
  <div id="userTable" class="row">
  <h1>Usuarios Registrados</h1>  
  <div class="col-lg-12">
      <table  class="table table-bordered table-striped">
        <thead>
          <tr class="text-center bg-info text-light">
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Edad</th>
            <th>Fecha de nacimiento</th>
            <th>Dirección</th>
            <th>Código postal</th>
            <th>Provincia</th>
            <th>Género</th>
            <th>Editar</th>
            <th>Eliminar</th>
          </tr>
        </thead>
        <tbody>
          <tr class="text-center" v-for="user in users">
            <td>{{ user.id }}</td>
            <td>{{ user.name }}</td>
            <td>{{ user.email }}</td>
            <td>{{ user.age }}</td>
            <td>{{ user.date }}</td>
            <td>{{ user.address }}</td>
            <td>{{ user.pc }}</td>
            <td>{{ user.province }}</td>
            <td>{{ user.gender }}</td>
            <td><a  href="#" id="editUser" class="text-success" 
                    @click="showEditOverlay=true; selectUser(user);" >
                    <i class="fas fa-edit"></i></a></td>
            <td><a  href="#" id="deleteUser" class="text-danger" 
                    @click="showDeleteOverlay=true;  selectUser(user);">
                    <i class="fas fa-trash-alt"></i></a></td>
          </tr> 
        </tbody>
      </table>
    </div>
  </div>

  <!--- Editar user --->
  <div id="overlay" v-if="showEditOverlay">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Editar Usuario</h5>
          <button type="button" class="close" aria-label="Cerrar" 
                  @click="showEditOverlay=false">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
      
      
      <div class="modal-body p-4">
        <form action="#" method="post">
          <div class="form-group">
            <p>Nombre:</p>
            <input  class="form-control form-control-lg" 
                    v-model="currentUser.name">
          </div>
          <div class="form-group">
            <p>Email:</p>
            <input  class="form-control form-control-lg" 
                    v-model="currentUser.email">
          </div>
          <div class="form-group">
            <p>Contraseña:</p>
            <input  class="form-control form-control-lg" 
                    v-model="currentUser.pswrd">
          </div>
          <div class="form-group">
            <button type="button" class="btn btn-info btn-block btn-lg" 
                    @click="showEditOverlay=false; updateUser();">Actualizar usuario</button>
          </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!--- Delete user --->
  <div id="deleteOverlay" v-if="showDeleteOverlay">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Eliminar Usuario</h5>
          <button type="button" class="close" aria-label="Cerrar" @click="showDeleteOverlay=false">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body p-4">
          <h4> Vas a eliminar a {{ currentUser.name }} </h4>
          <h5 id="h5p" > ¿Estas seguro?</h5>
          <button class="btn btn-danger btn-lg" @click="showDeleteOverlay=false; deleteUser();">Sí</button>
          <button class="btn btn-danger btn-lg" @click="showDeleteOverlay=false">No</button>

        </div>
      </div>
    </div>
  </div>
</div>

<?php include ('footer.php');?>