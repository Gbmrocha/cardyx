<?php

    class SalvarCartao{
        
         function salvar ($tipo, $titulo, $menssagem, $assinatura, $emailRemetente, $emailDestinatario){
             
            $data = [
                 'tipo' => $tipo,
                 'titulo' => $titulo,
                 'menssagem' => $menssagem,
                 'assinatura' => $assinatura,
                 'emailRemetente' => $emailRemetente,
                 'emailDestinatario' => $emailDestinatario 
             ];
            
             try{
                 include("../config/bdConecte.php");
                 $pdo = new PDO($DBTYPE.':host='.$DBHOST.';dbname='.$DBNOME, $DBUSUARIO, $DBSENHA);
                 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                 $sql = "INSERT INTO Cartao (tipo, titulo, menssagem, assinatura, email_remetente, email_destinatario) VALUES (:tipo, :titulo, :menssagem, :assinatura, :emailRemetente, :emailDestinatario)";
                 $pdo -> prepare($sql)->execute($data);
             }catch(PDOException $e){
                 echo 'Error: ' . $e->getMessage();
             }
        
            }
    }

    $sal = new SalvarCartao();
    $sal->salvar('Tipo2', 'Feliz natal', 'Para todos um feliz natal', 'Francisco Santana Cardoso', 'teste@teste.com', 'casa@casa.com');

?>