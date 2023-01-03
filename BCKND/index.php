<?php include ('cabecera.php');?>

<div id="app" 
     class="news-container">
     
    <div class="news">

        <?php
        if(isset($_SESSION['user_id'])){
            echo "<h3>Hola de nuevo, ", $_SESSION['name'], "!</h3>";
        }    
        if(isset($_COOKIE['today_likes'])){
            $cookie = json_decode($_COOKIE["today_likes"]);
            $likes = $cookie ->likes;
            echo "<p>Las cookies nos dicen que llevas  ", $likes, " likes las últmas 24 horas!</p>";
        };?>

    <h1>Últimas nocitias</h1> 
        <div v-for="article in lastNews">

            <h4> {{ article.title }} </h4>

            <p> Fecha de publicación : {{ article.dataTime }} </p>

            <p> {{ article.content }} </p>

            <p  class="far fa-heart"
                style="float: right;"
                @click="like(article);">
                {{ article.likes }}</p>                       
            <p> Autor : {{ article.author }} </p>  
        </div>             
    </div>
</div>

<?php include ('footer.php');?>

