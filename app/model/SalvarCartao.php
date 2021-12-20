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
                 return ("Dados salvos");
             }catch(PDOException $e){
                 return ('Ocorreu o seguinte erro: ' . $e->getMessage());
             }
        
            }
    }
    
    
    $sal = new SalvarCartao();
    echo ($sal->salvar($_POST['tipo'], $_POST['title'], $_POST['mensagem'], $_POST['assinatura'], $_POST['email'], $_POST['email']));
    
?>

