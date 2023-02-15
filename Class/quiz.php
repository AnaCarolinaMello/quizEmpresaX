<?php

require_once "conexao.php";

class Quiz 
{
    public function listar(){

        try{

            $bd = new Conexao();
            $lista = $bd->executeSelect("SELECT* FROM Respostas_candidatos");
            $getWrong = [];
            foreach ($lista as $value) {
                if($value -> V1 == 2){

                    if(!is_null($value -> V2)){

                        $getWrong[] = [$value -> ID, 'A questão 2 foi empreenchida indevidamente, deveria ter sido pulada devido a questão 1'];

                    }elseif(!is_null($value -> V3)){

                        $getWrong[] = [$value -> ID, 'A questão 3 foi empreenchida indevidamente, deveria ter sido pulada devido a questão 1'];

                    }elseif(!is_null($value -> V4)){

                        $getWrong[] = [$value -> ID, 'A questão 4 foi empreenchida indevidamente, deveria ter sido pulada devido a questão 1'];

                    }elseif(!is_null($value -> V5)){

                        $getWrong[] = [$value -> ID, 'A questão 5 foi empreenchida indevidamente, deveria ter sido pulada devido a questão 1'];
                    }
                    elseif(!is_null($value -> V6)){

                        $getWrong[] = [$value -> ID, 'A questão 6 foi empreenchida indevidamente, deveria ter sido pulada devido a questão 1'];
                    }

                }elseif($value -> V1 == 1 and is_null($value -> V2)){

                    $getWrong[] = [$value -> ID, 'A questão 2 foi não foi preenchida, deveria ter sido devido a questão 1'];

                }elseif($value -> V2 == 2){

                    if(!is_null($value -> V3)){

                        $getWrong[] = [$value -> ID, 'A questão 3 foi empreenchida indevidamente, deveria ter sido pulada devido a questão 2'];

                    }elseif(!is_null($value -> V4)){

                        $getWrong[] = [$value -> ID, 'A questão 4 foi empreenchida indevidamente, deveria ter sido pulada devido a questão 2'];

                    }elseif(!is_null($value -> V5)){

                        $getWrong[] = [$value -> ID, 'A questão 5 foi empreenchida indevidamente, deveria ter sido pulada devido a questão 2'];
                    }
                    elseif(!is_null($value -> V6)){

                        $getWrong[] = [$value -> ID, 'A questão 6 foi empreenchida indevidamente, deveria ter sido pulada devido a questão 2'];
                    }

                }elseif($value -> V2 == 1 and is_null($value -> V3)){

                    $getWrong[] = [$value -> ID, 'A questão 3 foi não foi preenchida, deveria ter sido devido a questão 2'];

                }elseif($value -> V3 and is_null($value -> V4)){

                    $getWrong[] = [$value -> ID, 'A questão 4 foi não foi preenchida, deveria ter sido devido a questão 3'];

                }elseif($value -> V4 == 1 and is_null($value -> V5)){

                    $getWrong[] = [$value -> ID, 'A questão 5 foi não foi preenchida, deveria ter sido devido a questão 4'];

                }elseif($value -> V4 == 2 and !is_null($value -> V5)){

                    $getWrong[] = [$value -> ID, 'A questão 5 foi empreenchida indevidamente, deveria ter sido pulada devido a questão 4'];

                }elseif($value -> V5 == 2 or $value -> V5 == 3){

                    if(is_null($value -> V6)){

                        $getWrong[] = [$value -> ID, 'A questão 6 foi não foi preenchida, deveria ter sido devido a questão 5'];

                    }

                }elseif($value -> V5 == 1){

                    if(!is_null($value -> V6)){

                        $getWrong[] = [$value -> ID, 'A questão 6 foi empreenchida indevidamente, deveria ter sido pulada devido a questão 5'];

                    }elseif(!is_null($value -> V7)){

                        $getWrong[] = [$value -> ID, 'A questão 7 foi empreenchida indevidamente, deveria ter sido pulada devido a questão 5'];

                    }

                }elseif($value -> V7 == 1 and is_null($value -> V8)){

                    $getWrong[] = [$value -> ID, 'A questão 8 foi não foi preenchida, deveria ter sido devido a questão 7'];

                }elseif($value -> V7 == 2){

                    if(!is_null($value -> V8)){

                        $getWrong[] = [$value -> ID, 'A questão 8 foi empreenchida indevidamente, deveria ter sido pulada devido a questão 7'];

                    }elseif(!is_null($value -> V9) or !is_null($value -> V10) or !is_null($value -> V11) or !is_null($value -> V13)){

                        $getWrong[] = [$value -> ID, 'A questão 9 foi empreenchida indevidamente, deveria ter sido pulada devido a questão 7'];

                    }

                }elseif($value -> V8 == 1 and is_null($value -> V9) and is_null($value -> V10) and is_null($value -> V11) and is_null($value -> V13)){

                    $getWrong[] = [$value -> ID, 'A questão 9 foi não foi preenchida, deveria ter sido devido a questão 8'];

                }elseif($value -> V8 == 2){

                    if(!is_null($value -> V9) or !is_null($value -> V10) or !is_null($value -> V11) or !is_null($value -> V13)){

                        $getWrong[] = [$value -> ID, 'A questão 9 foi empreenchida indevidamente, deveria ter sido pulada devido a questão 8'];

                    }

                }elseif(is_null($value -> V14)){

                    $getWrong[] = [$value -> ID, 'A questão 10 foi não foi preenchida'];

                }elseif(is_null($value -> V15)){

                    $getWrong[] = [$value -> ID, 'A questão 11 foi não foi preenchida'];

                }elseif(is_null($value -> V16)){

                    $getWrong[] = [$value -> ID, 'A questão 12 foi não foi preenchida'];

                }
            }

            return $getWrong;


        }catch(PDOException $msg){

        	echo "Não foi possível listar os dados ".$msg->getMessage();

        }
    }

    public function getInconsistencie(){

        try{

            $bd = new Conexao();
            $lista = $bd->executeSelect("SELECT* FROM Respostas_candidatos");
            $getInconsistencies = [];
            foreach ($lista as $value) {
                if($value -> V1 == 2){

                    if(!is_null($value -> V2)){

                    }elseif(!is_null($value -> V3)){

                    }elseif(!is_null($value -> V4)){

                    }elseif(!is_null($value -> V5)){
                    }
                    elseif(!is_null($value -> V6)){}

                }elseif($value -> V1 == 1 and is_null($value -> V2)){

                }elseif($value -> V2 == 2){

                    if(!is_null($value -> V3)){

                    }elseif(!is_null($value -> V4)){

                    }elseif(!is_null($value -> V5)){

                    }
                    elseif(!is_null($value -> V6)){}

                }elseif($value -> V2 == 1 and is_null($value -> V3)){

                }elseif($value -> V3 and is_null($value -> V4)){

                }elseif($value -> V4 == 1 and is_null($value -> V5)){

                }elseif($value -> V4 == 2 and !is_null($value -> V5)){

                }elseif($value -> V5 == 2 or $value -> V5 == 3){

                    if(is_null($value -> V6)){

                    }

                }elseif($value -> V5 == 1){

                    if(!is_null($value -> V6)){

                    }elseif(!is_null($value -> V7)){

                    }

                }elseif($value -> V7 == 1 and is_null($value -> V8)){

                }elseif($value -> V7 == 2){

                    if(!is_null($value -> V8)){

                    }elseif(!is_null($value -> V9) or !is_null($value -> V10) or !is_null($value -> V11) or !is_null($value -> V13)){}

                }elseif($value -> V8 == 1 and is_null($value -> V9) and is_null($value -> V10) and is_null($value -> V11) and is_null($value -> V13)){

                }elseif($value -> V8 == 2){

                    if(!is_null($value -> V9) or !is_null($value -> V10) or !is_null($value -> V11) or !is_null($value -> V13)){}

                }elseif(is_null($value -> V14)){

                }elseif(is_null($value -> V15)){

                }elseif(is_null($value -> V16)){

                }elseif($value -> V3 == 3 and $value -> V7 == 2){

                    $getInconsistencies[] = [$value -> ID, 'Se a pessoas tem um smartphone, ela já acessou a internet para logar nele'];

                }elseif($value -> V3 == 1 and $value -> V7 == 2){

                    $getInconsistencies[] = [$value -> ID, 'Se a pessoas baixa aplicativos, ela usa a internet pra isso'];

                }elseif($value -> V3 == 3 and $value -> V8 == 1){

                    $getInconsistencies[] = [$value -> ID, 'Se a pessoas não o que são aplicativos como ela tem conta nesses apps?'];

                }elseif($value -> V3 == 3 and $value -> V4 == 1){

                    $getInconsistencies[] = [$value -> ID, 'Se a pessoas não sabe o que são aplicativos, como ela sabe que a empresa tem um app'];

                }elseif($value -> V8 == 1 and $value -> V9 == 2 and $value -> V10 == 2 and $value -> V11 == 2 and $value -> V12 == 2 and $value -> V13 == 2){

                    $getInconsistencies[] = [$value -> ID, 'Se a pessoas tem conta em uma rede social, como ela não citou nenhuma?'];

                }
            }

            return $getInconsistencies;


        }catch(PDOException $msg){

        	echo "Não foi possível listar os dados ".$msg->getMessage();

        }
    }
}


?>