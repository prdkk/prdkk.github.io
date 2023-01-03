<?php include ('cabecera.php');?>

<?php include ('funciones_bd.php');?>

<h1>Noticias</h1>
<div id="app">      
  <div id="newsTable" class="row">
  <h1>Todas las noticias</h1>
    <div id="newsTable1" class="col-lg-12">
    <table  class="table table-bordered table-striped">
      <thead>
        <tr class="text-center bg-info text-light">
          <th>ID</th>
          <th>Título</th>
          <th>Contenido</th>
          <th>Autor</th>
          <th>Fecha de Creación</th>
          <th>Likes totales</th>
          <th>Like</th>
          <th>Editar</th>
          <th>Eliminar</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="article in news">
          <th>{{ article.id }}</th>
          <th>{{ article.title }}</th>
          <th>{{ article.content }}</th>
          <th>{{ article.author }}</th>
          <th>{{ article.dataTime}}</th>
          <th>{{ article.likes }}</th>
          <th><i class="far fa-heart" @click="like(article);"></i></th>
          <td><a  href="#" class="text-success" 
                  @click="showEditOverlay=true; selectNews(article);">
                  <i class="fas fa-edit"></i></a></td>
          <td><a  href="#" class="text-danger" 
                  @click="showDeleteOverlay=true; selectNews(article);">
                  <i class="fas fa-trash-alt"></i></a></td>
        </tr> 
      </tbody>
    </table>
    </div>   
  </div>
<!--- Editar noticias --->
<div id="overlay" v-if="showEditOverlay">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title">Editar Noticia</h5>
        <button type="button" class="close" 
                aria-label="Cerrar" @click="showEditOverlay=false;">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <div class="modal-body p-4">
      <form action="#" method="post">
        <div class="form-group">
          <p>Título:</p>
          <input  class="form-control form-control-lg" 
                  v-model="currentArticle.title">
        </div>
        <div class="form-group">
          <p>Autor:</p>
          <input  class="form-control form-control-lg" 
                  v-model="currentArticle.author">
        </div>
        <div class="form-group">
          <p>Contenido:</p>
          <input  class="form-control form-control-lg" 
                  v-model="currentArticle.content">
        </div>
        <div class="form-group">
          <button type="button" class="btn btn-info btn-block btn-lg" 
                  @click="showEditOverlay=false; updateArticle();">Actualizar noticia</button>
        </div>
      </form>
    </div>
    </div>
  </div>
</div>

<!--- Delete News --->
<div id="deleteOverlay" v-if="showDeleteOverlay">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title">Eliminar Noticia</h5>
        <button type="button" class="close" aria-label="Cerrar" @click="showDeleteOverlay=false">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-4">
        <h4> Vas a eliminar </h4>
        <h5 id="h5p" > ¿Estas seguro?</h5>
        <button class="btn btn-danger btn-lg" 
                @click="showDeleteOverlay=false; daleteArticle();">Sí</button>
        <button class="btn btn-danger btn-lg" 
                @click="showDeleteOverlay=false">No</button>

      </div>
    </div>
    </div>
  </div>
</div>

<?php include ('footer.php');?>