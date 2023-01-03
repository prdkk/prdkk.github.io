<?php

include ('cabecera.php');?>


<div id="app" class="modal-dialog modal-content modal-lg">
    
    <form class="modal-body p-4" action="#" method="post"> 

        <h1 modal-title>Aquí puedes crear una Noticia</h1>

        <label>Título:</label>    
        <input  type="text" name="title" 
                v-model="newArticle.title"
                class="form-group form-control">
        <br>

        <label>Autor:</label> 
        <input  type="text" name="author" 
                v-model="newArticle.author"
                class="form-group form-control">
        <br>

        <label>Contenido:</label>     
        <textarea   type="text" name="content" 
                    v-model="newArticle.content"
                    class="form-group form-control"
                    maxlength="300"
                    style="min-height: 10rem;">
        </textarea>
        <br>

        
        <input  type="submit" value="Enviar" 
                class="form-group form-control"
                @click="addNews()">
</div>

<?php include ('footer.php');?>