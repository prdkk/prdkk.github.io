<?php
include ('cabecera.php');?>


<div id="app" class="modal-dialog modal-content modal-lg">
  
    <form class="modal-body p-4" action="#" method="post">
        <h1 class="modal-title" >Aquí puedes crear un nuevo usuario</h1>
        <div class="form-group">    
            <label>Nombre:</label>
                <input  class="form-control"
                        type="text" name="name" 
                        v-model="newUser.name">
        </div>
        <div class="form-group">
            <label>Contraseña:</label>
                <input  required class=" form-control"
                        type="Password" name="pswrd" 
                        v-model="newUser.pswrd"> 
        </div>
        <div class="form-group">
            <label>Email:</label>              
                <input  required class="form-control"
                        type="text" name="email" 
                        v-model="newUser.email">
        </div>
        <div class="form-group">
            <label>Edad:</label>
                <input  class="form-control" 
                        type="text" name="age" 
                        v-model="newUser.age">
        </div>
        <div class="form-group">
            <label >Fecha de nacimiento:</label>
            
                <input  class="form-control datepicker" 
                        type="date" name="date" 
                        v-model="newUser.date">
        </div>
        <div class="form-group">
            <label>Dirección:</label>
                <input  class="form-control" 
                        type="text" name="address" 
                        v-model="newUser.address">
        </div>

        <div class="form-group"> 
            <label>Código postal:</label>
                <input  class="form-control" 
                        type="text" name="pc" 
                        v-model="newUser.pc">
        </div>

        <div class="form-group">
            <label>Provincia:</label>
            <select class="form-control"
                    type="text" name="province"
                    v-model="newUser.province">
                <option disabled value="">Seleccione un elemento</option>
                <option value='alava'>Álava</option>
                <option value='albacete'>Albacete</option>
                <option value='alicante'>Alicante/Alacant</option>
                <option value='almeria'>Almería</option>
                <option value='asturias'>Asturias</option>
                <option value='avila'>Ávila</option>
                <option value='badajoz'>Badajoz</option>
                <option value='barcelona'>Barcelona</option>
                <option value='burgos'>Burgos</option>
                <option value='caceres'>Cáceres</option>
                <option value='cadiz'>Cádiz</option>
                <option value='cantabria'>Cantabria</option>
                <option value='castellon'>Castellón/Castelló</option>
                <option value='ceuta'>Ceuta</option>
                <option value='ciudadreal'>Ciudad Real</option>
                <option value='cordoba'>Córdoba</option>
                <option value='cuenca'>Cuenca</option>
                <option value='girona'>Girona</option>
                <option value='laspalmas'>Las Palmas</option>
                <option value='granada'>Granada</option>
                <option value='guadalajara'>Guadalajara</option>
                <option value='guipuzcoa'>Guipúzcoa</option>
                <option value='huelva'>Huelva</option>
                <option value='huesca'>Huesca</option>
                <option value='illesbalears'>Illes Balears</option>
                <option value='jaen'>Jaén</option>
                <option value='acoruña'>A Coruña</option>
                <option value='larioja'>La Rioja</option>
                <option value='leon'>León</option>
                <option value='lleida'>Lleida</option>
                <option value='lugo'>Lugo</option>
                <option value='madrid'>Madrid</option>
                <option value='malaga'>Málaga</option>
                <option value='melilla'>Melilla</option>
                <option value='murcia'>Murcia</option>
                <option value='navarra'>Navarra</option>
                <option value='ourense'>Ourense</option>
                <option value='palencia'>Palencia</option>
                <option value='pontevedra'>Pontevedra</option>
                <option value='salamanca'>Salamanca</option>
                <option value='segovia'>Segovia</option>
                <option value='sevilla'>Sevilla</option>
                <option value='soria'>Soria</option>
                <option value='tarragona'>Tarragona</option>
                <option value='santacruztenerife'>Santa Cruz de Tenerife</option>
                <option value='teruel'>Teruel</option>
                <option value='toledo'>Toledo</option>
                <option value='valencia'>Valencia/Valéncia</option>
                <option value='valladolid'>Valladolid</option>
                <option value='vizcaya'>Vizcaya</option>
                <option value='zamora'>Zamora</option>
                <option value='zaragoza'>Zaragoza</option>
            </select>
        </div>

        <div class="form-group">
            <label>Género:</label>
            <select class="form-control"
                    type="text" name="gender"
                    v-model="newUser.gender">   
                <option disabled value="">Seleccione un elemento</option>
                <option value="Femenino" selected>Femenino</option>
                <option value="Masculino">Masculino</option>
            </select></br>
        </div>
        <input  class="form-control" type="submit" 
                value="Enviar" @click="addUser()">
    </form>    
</div>

<?php include ('footer.php');?>