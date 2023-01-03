<?php 
include ('conexion.php');
$result = array("error"=>false);
$action = "";

if(isset($_GET["action"])){
    $action = $_GET["action"];
}

// Usuarios

if($action == "read"){
    $sql = $mysqli->query("SELECT * FROM usuarios");
    $users = array();
    while($row = $sql->fetch_assoc()){
        array_push($users, $row);
    }
    $result["user"] = $users;
    echo json_encode($result);
}

if($action == "create"){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pswrd = $_POST['pswrd'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $province  = $_POST['province'];
    $date = $_POST['date'];
    $gender = $_POST['gender'];
    $pc = $_POST['pc'];
    $users = array();
    $sql = $mysqli->query("INSERT INTO usuarios (name,email,pswrd,age,address,province,date,gender,pc) 
    VALUES('$name', '$email', '$pswrd', '$age' , '$address', '$province', '$date', '$gender' , '$pc')");
    if($sql){
        $result['message'] = "¡Usuario añadido correctamente!";
        }
        else{
            $result['error'] = true;
            $result['message'] = "Error al añadir el usuario :s ";
        }
    echo json_encode($result); 
}

if($action == "update"){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pswrd = $_POST['pswrd'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $province  = $_POST['province'];
    $date = $_POST['date'];
    $gender = $_POST['gender'];
    $pc = $_POST['pc'];

    $users = array();

    $sql = $mysqli->query("UPDATE usuarios 
    SET name='$name', email='$email', pswrd='$pswrd', age='$age', address='$address', province='$province', date='$date', gender='$gender', pc='$pc'
    WHERE id='$id'");
    
    if($sql){
        $result['message'] = "¡Usuario actualizado correctamente!";
        }
        else{
            $result['error'] = true;
            $result['message'] = "Error al editar el usuario :s ";
        }
}
if($action == "detele"){
    $id = $_POST['id'];
    $users = array();
    $sql = $mysqli->query("DELETE FROM usuarios WHERE id='$id'");
    
    if($sql){
        $result['message'] = "¡Usuario eliminado correctamente!";
        }
        else{
            $result['error'] = true;
            $result['message'] = "Error al eliminar el usuario :s ";
        }
}

//Noticias
if($action == "readNews"){
    $sql = $mysqli->query("SELECT * FROM noticias");
    $news = array();
    while($row = $sql->fetch_assoc()){
        array_push($news, $row);
    }
    $result["article"] = $news;
    echo json_encode($result); 
}

if($action == "readLast"){
    $sql = $mysqli->query("SELECT * 
                            FROM  noticias 
                            ORDER BY DataTime DESC
                            LIMIT 5");
    $news = array();
    while($row = $sql->fetch_assoc()){
        array_push($news, $row);
    }
    $result["article"] = $news;
    echo json_encode($result);
}
if($action == "createArticle"){
    $author = $_POST['author'];    
    $title = $_POST['title'];
    $content = $_POST['content'];

    $news = array();
    $sql = $mysqli->query("INSERT INTO noticias (author, title, content) 
    VALUES('$author', '$title', '$content')");
    if($sql){
        $result['message'] = "¡Usuario añadido correctamente!";
        }
        else{
            $result['error'] = true;
            $result['message'] = "Error al añadir el usuario :s ";
        }
        
    echo json_encode($result); 
}

if($action == "updateArticle"){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author = $_POST['author'];
    $dataTime = $_POST['dataTime'];
    $likes = $_POST['likes'];    

    $news = array();

    $sql = $mysqli->query("UPDATE noticias 
    SET title='$title', content='$content', author='$author', dataTime='$dataTime', likes='$likes'
    WHERE id='$id'");
    
    if($sql){
        $result['message'] = "¡Usuario actualizado correctamente!";
        }
        else{
            $result['error'] = true;
            $result['message'] = "Error al editar el usuario :s ";
        }
        
    echo json_encode($result); 
}
if($action == "deteleArticle"){
    $id = $_POST['id'];
    $news = array();
    $sql = $mysqli->query("DELETE FROM noticias WHERE id='$id'");
    
    if($sql){
        $result['message'] = "¡Usuario eliminado correctamente!";
        }
        else{
            $result['error'] = true;
            $result['message'] = "Error al eliminar el usuario :s ";
        }
}


// Sesiones


if ($action == "login") {    
    session_start();
    $email = $_POST['email'];
    $pswrd = $_POST['pswrd'];
 
    $sql = $mysqli->query("SELECT * FROM usuarios WHERE email='$email' AND pswrd='$pswrd' LIMIT 1");
    
    if(mysqli_num_rows($sql) > 0)
		{
			if($row =mysqli_fetch_assoc($sql))
			{ 
                
				$_SESSION['user_id'] = $row['id'];
                $_SESSION['name'] = $row['name'];                   
			}
		}
		else
		{
			echo json_encode($_SESSION);           
		}
    echo json_encode($result);
    echo json_encode($_SESSION);
    
}

// Likes
if($action == "like"){
    $id = $_POST['id'];
    $news = array();
    $sql = $mysqli->query("UPDATE noticias SET likes=likes+1 WHERE id='$id'");
    
    if($sql){      
                
       
        if($_COOKIE['today_likes'] == NULL){
            
            $expiry = time() + 86400; // 86400 = 1 dia
            $cookieData = (object) array('likes'=> 1, "expiry" => $expiry);
            setcookie('today_likes', json_encode( $cookieData ), $expiry, "/"); 
           
            $result['message'] = "creamos la cokkie";
            echo json_encode($result);
        }
        if(isset($_COOKIE['today_likes'])){
            $cookie = json_decode($_COOKIE["today_likes"]);
            $expiry = $cookie ->expiry;
            $likes = $cookie ->likes;
            $likes++;
            $cookieData = (object) array('likes'=> $likes, "expiry" =>$expiry);
            setcookie('today_likes', json_encode( $cookieData ), $expiry, "/");
            
            $result['message'] = "¡suma 1!";
            echo json_encode($result);
            echo json_encode($likes);
        }
        
        }
        else{
            $result['error'] = true;
            $result['message'] = "Error al sumar :s ";
            echo json_encode($result);
        }
}
    

$mysqli->close();

?>