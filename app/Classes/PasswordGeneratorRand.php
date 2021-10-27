<?php

namespace App\Classes;


class PasswordGeneratorRand 
{
    public static function generatePassword($qtyCaraceters = 10){
        //  * Gera senhas aleatórias
        //  *
        //  * @param int $qtyCaraceters quantidade de caracteres na senha, por padrão 8
        //  * @return String 
        //  */
            //Letras minúsculas embaralhadas
            $smallLetters = str_shuffle('mknzjergswtcuhdpxboliyfqav');
        
            //Letras maiúsculas embaralhadas
            $capitalLetters = str_shuffle('DSGWNPMVQBZUAJFLHOEKYITCXR');
        
            //Números aleatórios
            $numbers = (((date('Ymd') / 12) * 24) + mt_rand(800, 9999));
            $numbers .= 1234567890;
        
            //Caracteres Especiais
            $specialCharacters = str_shuffle('!@#$%*-_');
        
            //Junta tudo
            $characters = $capitalLetters.$smallLetters.$numbers.$specialCharacters;
        
            //Embaralha e pega apenas a quantidade de caracteres informada no parâmetro
            $PasswordRand = substr(str_shuffle($characters), 0, $qtyCaraceters);
        
            //Retorna a senha
            return $PasswordRand;

            //echo generatePassword();//Resultado aleatório com 10 caraceters
            //echo generatePassword(15);//Senha com 15 caraceters

            }
        }
?>