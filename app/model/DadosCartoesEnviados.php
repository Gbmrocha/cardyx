<?php
    class DadosCartoesEnviados{
        
        function resgatarDados (){
            
            $contTotal = 0;
            $contTipo1 = 0;
            $contTipo2 = 0;
            $contTipo3 = 0;
            $contTipo4 = 0;
            
            try{
                include("../config/bdConecte.php");
                $pdo = new PDO($DBTYPE.':host='.$DBHOST.';dbname='.$DBNOME, $DBUSUARIO, $DBSENHA);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $dados = $pdo->query ("SElECT tipo FROM Cartao;");
            }catch(PDOException $e){
                return ('Ocorreu o seguinte erro: ' . $e->getMessage());
            }

            while($linha = $dados->fetch(PDO::FETCH_ASSOC)){
                $linha['tipo'] === 'Tipo1' ? $contTipo1++ : null;
                $linha['tipo'] === 'Tipo2' ? $contTipo2++ : null;
                $linha['tipo'] === 'Tipo3' ? $contTipo3++ : null;
                $linha['tipo'] === 'Tipo4' ? $contTipo4++ : null;
                $contTotal++;
            }
            
            $arrayRetorno = array (
                "total" => $contTotal,
                "totalTipo1" => $contTipo1,
                "totalTipo2" => $contTipo2,
                "totalTipo3" => $contTipo3,
                "totalTipo4" => $contTipo4
            );

            return($arrayRetorno);
            
        }
        
    }
    $teste = new DadosCartoesEnviados();
    $casa = $teste -> resgatarDados();

    var_dump($casa["total"])
?>