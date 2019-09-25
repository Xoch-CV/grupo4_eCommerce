<?php
session_start();
  //Leo el array
  $data=json_decode(file_get_contents('data.json'),true);

if($_POST){
    //Modificar nombre de la foto
    $id=$_SESSION['user']['id'];
    $extension = pathinfo($_FILES['foto']['name'],PATHINFO_EXTENSION);
    $nombre_foto ='files/' . $id . '.' . $extension;
    $archivo_foto_tmp = $_FILES['foto']['tmp_name'];
    //Almacenando en directorio local foto
    move_uploaded_file ($archivo_foto_tmp, $nombre_foto);
    //Almancenar la foto en la BD jason en el usuario correcto
    $data['usuarios'][$id-1]['foto'] = $nombre_foto;
    //Vuelvo a guardar en json el usuario con la info actualizada
    file_put_contents('data.json',json_encode($data,JSON_PRETTY_PRINT));
    $_SESSION['user']['foto']=$data['usuarios'][$id-1]['foto'];
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php foreach($data['usuarios'] as $clave => $dato) :?>
      <?php if(isset($_SESSION['user'])) :?>
        <img src="<?=$_SESSION['user']['foto']?>" width=200 height=200 alt="">
        <h2>Bienvenido <?=$_SESSION['user']['nombre']?> <?=$_SESSION['user']['apellido']?> !<br></h2>
        <h4>Tu email:  <?=$_SESSION['user']['email']?><br></h4>
        <form class="" action="Perfil.php?email=<?=$_SESSION['user']['email']?>" method="post" enctype="multipart/form-data">
          <label for='' >Modifica tu foto de perfil:</label><br/>
          <input type='file' name='foto'>
          <br>
          <input type="submit" name="guardar" value="Guardar cambios">
        </form>
      <?php endif; break; ?>
    <?php endforeach; ?>
  </body>
</html>
<!--
