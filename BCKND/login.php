<?php include ('cabecera.php');?>

<div  id="app" 
      class="modal-dialog modal-content modal-lg">
  
  <form class="modal-body p-4" 
        action="#" 
        method="post">

    <h1 class="modal-title">Iniciar Sesión</h1>
      
    <label>Email:</label>
    <input  class="form-group form-control"
            type="text" name="name" 
            v-model="logInUser.email"></br>

    <label>Contraseña:</label>
    <input  type="Password" name="pswrd"     
            required class="form-group form-control"
            v-model="logInUser.pswrd"></br> </br> 

    <input  type="submit" value="Entrar"
            class="form-control" @click="login()">

  </form></br>
  <p>Usuarios de ejemplo :</br></br>
    Correo: pablo@pablo.es y verogarcia@rhyta.com</br>
    Contraseña: aiyoeP9OhS</br> </p>
</div>




<?php 

if(isset($_SESSION['user_id'])){
  header('Location: index.php');
}

include ('footer.php');?>