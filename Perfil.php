<?php

  //Leo el array
  $data=json_decode(file_get_contents('data.json'),true);

if($_POST){
    $id=count($data['usuarios']);
    $extension = pathinfo($_FILES['foto']['name'],PATHINFO_EXTENSION);
    $nombre_foto ='files/' . $id . '.' . $extension;
    $archivo_foto_tmp = $_FILES['foto']['tmp_name'];
    move_uploaded_file ($archivo_foto_tmp, $nombre_foto);
    //subir la foto al usuario correcto
    $data['usuarios'][$id-1]['foto'] = $nombre_foto;

  //Vuelvo a guardar en json el usuario con la info actualizada
  file_put_contents('data.json',json_encode($data,JSON_PRETTY_PRINT));

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
      <?php if($dato['email']==$_GET['email']) :?>
        <img src="<?=$dato['foto']?>" width=200 height=200 alt="">
        <h2>Bienvenido <?=$dato['nombre']?> <?=$dato['apellido']?> !<br></h2>
        <h4>Tu email:  <?=$dato['email']?><br></h4>
        <form class="" action="Perfil.php?email=<?=$dato['email']?>" method="post" enctype="multipart/form-data">
          <label for='' >Modifica tu foto de perfil:</label><br/>
          <input type='file' name='foto'>
          <br>
          <input type="submit" name="guardar" value="Guardar cambios">
        </form>
      <?php endif; ?>
    <?php endforeach; ?>
  </body>
</html>
