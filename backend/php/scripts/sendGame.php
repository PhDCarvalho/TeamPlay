<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirecionando...</title>
</head>
<body>

<?php
include '../../classes/conn.php';
$logged = false;
session_start();
error_reporting(E_ALL & ~E_NOTICE);
if (isset($_SESSION['username'])) {
    $logged = true;
} 
$games = $_GET['Games'];    

echo $games;

$sql_games = "UPDATE users SET games ='".$games."' WHERE id = ".$_SESSION['id'].";";

$res_games = $conn->query($sql_games);

$_SESSION['usergames'] = $_GET['Games'];   

// header('Location: ../../../public/html/index.php');
header('Location: ../../../public/html/mygames.php');
?>
</body>
</html>


<!-- // function up_imagem($file)
// {
//     $explode = explode(".",$file['name']);
//     // print_r($explode);
//     $maxSize = 2097152;
//     $dir = "../../../public/assets/profile_pics/";
//     if ($file['error'] == 0) {
//         $ext = $explode['1'];
//         if(in_array($ext, array('jpg', 'jpeg', 'gif', 'png'))){
//             if ($file['size'] > $maxSize){
//                 $msg = "Arquivo Enviado muito Grande";
//             } else {
//                 $new_name = md5(time()).".".$ext;
//                 echo "Nome Novo: ".$new_name;
//                 $sent = move_uploaded_file($_FILES['arquivo']['tmp_name'],$dir.$new_name);
//                 if($sent){
//                     $msg = "<strong>Sucesso!</strong> Arquivo enviado corretamente.";
//                     return($new_name);
//                 }else{
//                     $msg = "<strong>Erro!</strong> Falha ao enviar o arquivo.";
//                 }
//             }
//         } else {
//             $msg = "<strong>Erro!</strong> Somente arquivos tipo imagem 'jpg', 'jpeg', 'gif', 'png' são permitidos.";
//         }
//     } else {
//         $msg = "<strong>Atenção!</strong> Você deve enviar um arquivo.";
//     }

// } -->

