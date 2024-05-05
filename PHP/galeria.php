<?php
include 'conexao.php';

$consulta = "SELECT imagem FROM formulario";
$resultado = mysqli_query($conn, $consulta);

$imagens_base64 = [];

while ($linha = mysqli_fetch_assoc($resultado)) {
    $imagem_blob = $linha['imagem'];
    $imagem_base64 = base64_encode($imagem_blob);
    $imagens_base64[] = $imagem_base64;
}
?>


<!DOCTYPE html>
<html lange="en">
  <head>
    <meta charset="UTF-8">
    <script src="https://aframe.io/releases/1.5.0/aframe.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/c-frame/aframe-extras@7.2.0/dist/aframe-extras.min.js"></script>
    <script src="https://recast-api.donmccurdy.com/aframe-inspector-plugin-recast.js"></script>
    <script src="../JAVASCRIPT/simple-navmesh-constraint.js"></script>
  </head>
  <body>
    <a-scene inspector-plugin-recast>
      
      <!--Nav Mesh-->
      <a-gltf-model gltf-model="#navmesh"
                    position="0 0.1 -15.9"
                    rotation="0 180 0"
                    class ="navmesh"
                    visible="false"></a-gltf-model>

      <a-camera position ="0 2 -5" wasd-controls="acceleration:40;" simple-navmesh-constraint="navmesh:.navmesh;fall:0.5;height:1.65;" look-controls></a-camera>

      
      <a-entity gltf-model="#Galeria" 
                position="0 0 -16" 
                rotation="0 180 0">
      </a-entity> 
      
      <a-assets>
        <a-asset-items id ="Galeria" 
                       src="https://cdn.glitch.global/7fb9656a-4641-4f4b-a7da-c9208d5b3bcc/galeria.glb?v=1707917279891">
        </a-asset-items>
        <a-asset-items id="navmesh"
                       src="https://cdn.glitch.global/7fb9656a-4641-4f4b-a7da-c9208d5b3bcc/navmesh.glb?v=1709901430862">
        </a-asset-items>

        <img id="Quadro1" src="data:image/jpeg;base64,<?php echo $imagens_base64[0]; ?>" alt="Minha Imagem">
        <img id="Quadro2" src="data:image/jpeg;base64,<?php echo $imagens_base64[1]; ?>" alt="Minha Imagem">
        <img id="Quadro3" src="data:image/jpeg;base64,<?php echo $imagens_base64[2]; ?>" alt="Minha Imagem">
        <img id="Quadro4" src="data:image/jpeg;base64,<?php echo $imagens_base64[3]; ?>" alt="Minha Imagem">
        <img id="Quadro5" src="data:image/jpeg;base64,<?php echo $imagens_base64[4]; ?>" alt="Minha Imagem">
        <img id="Quadro6" src="data:image/jpeg;base64,<?php echo $imagens_base64[5]; ?>" alt="Minha Imagem">
        <img id="Quadro7" src="data:image/jpeg;base64,<?php echo $imagens_base64[6]; ?>" alt="Minha Imagem">
        <img id="Quadro8" src="data:image/jpeg;base64,<?php echo $imagens_base64[7]; ?>" alt="Minha Imagem">
        <img id="Quadro9" src="data:image/jpeg;base64,<?php echo $imagens_base64[8]; ?>" alt="Minha Imagem">
        <img id="Quadro10" src="data:image/jpeg;base64,<?php echo $imagens_base64[9]; ?>" alt="Minha Imagem">

        <img id="Logo" 
             src="https://cdn.glitch.global/7fb9656a-4641-4f4b-a7da-c9208d5b3bcc/unioeste.png?v=1708084101429">
      </a-assets>
      
      <a-image src="#Quadro1" 
               position ="-3.137 2.16 -8.675" 
               rotation="0 90 0"
               scale="2 2 2">
      </a-image>
      
      <a-image src="#Quadro2" 
               position ="-3.137 2.16 -12.37" 
               rotation="0 90 0"
               scale="2 2 2">
      </a-image>
      
      <a-image src="#Quadro3" 
               position ="-3.137 2.16 -16.1" 
               rotation="0 90 0"
               scale="2 2 2">
      </a-image>
      
      <a-image src="#Quadro4" 
               position ="-3.137 2.16 -19.9" 
               rotation="0 90 0"
               scale="2 2 2">
      </a-image>
      
      <a-image src="#Quadro5" 
               position ="-3.130 2.16 -23.615" 
               rotation="0 90 0"
               scale="2 2 2">
      </a-image>
      
      <a-image src="#Quadro6" 
               position ="3.127 2.16 -8.675" 
               rotation="0 90 0"
               scale="2 2 2">
      </a-image>
      
      <a-image src="#Quadro7" 
               position ="3.127 2.16 -12.4" 
               rotation="0 90 0"
               scale="2 2 2">
      </a-image>
      
      <a-image src="#Quadro8" 
               position ="3.127 2.16 -16.1" 
               rotation="0 90 0"
               scale="2 2 2">
      </a-image>
      
      <a-image src="#Quadro9" 
               position ="3.127 2.16 -19.9" 
               rotation="0 90 0"
               scale="2 2 2">
      </a-image>
      
      <a-image src="#Quadro10" 
               position ="3.127 2.16 -23.615" 
               rotation="0 90 0"
               scale="2 2 2">
      </a-image>

      <a-image src="#Logo" 
               position ="0 0.8 -6.8" 
               rotation="0 0 0" 
               scale="1 1 1">
      </a-image>
      <a-image src="#Logo" 
               position ="0 2 -27.85" 
               rotation="0 0 0" 
               scale="3 3 3">
      </a-image>

      <a-entity text="font: https://cdn.aframe.io/fonts/mozillavr.fnt; value: ARTE \n EM VR; color: #ffff00; height: 00; align: center;" 
                position ="-0.03 2.1 -6.80" 
                scale="10 10 10">
      </a-entity>
    </a-scene>
  </body>
</html>