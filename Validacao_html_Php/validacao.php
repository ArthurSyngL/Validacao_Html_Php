<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST['nome'];

    $endereco = $_POST['endereco'];

    $cep = $_POST['cep'];

    $email = $_POST['email'];

    $telefone = $_POST['telefone'];

    $cpf = $_POST['cpf'];



    $erro = false;

    $mensagem_erro = '';



    // Validar Nome: Não pode ser vazio e só pode aceitar letras

    if (empty($nome) || !preg_match("/^[a-zA-Z\s]+$/", $nome)) {

        $erro = true;

        $mensagem_erro .= "Nome inválido. Deve conter apenas letras e não pode ser vazio.<br>";

    }



    // Validar Endereço: Não pode ser vazio

    if (empty($endereco)) {

        $erro = true;

        $mensagem_erro .= "Endereço não pode ser vazio.<br>";

    }



    // Validar CEP: Não pode ser vazio e deve seguir o formato 'XXXXX-XXX'

    if (empty($cep) || !preg_match("/^\d{5}-\d{3}$/", $cep)) {

        $erro = true;

        $mensagem_erro .= "CEP inválido. Formato correto: XXXXX-XXX.<br>";

    }



    // Validar E-mail: Não pode ser vazio e deve ser um formato válido

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $erro = true;

        $mensagem_erro .= "E-mail inválido. Verifique o formato.<br>";

    }



    // Validar Telefone: Não pode ser vazio e deve seguir o formato '(XX) XXXXX-XXXX'

    if (empty($telefone) || !preg_match("/^\(\d{2}\) \d{5}-\d{4}$/", $telefone)) {

        $erro = true;

        $mensagem_erro .= "Telefone inválido. Formato correto: (XX) XXXXX-XXXX.<br>";

    }



    // Validar CPF: Não pode ser vazio e deve conter apenas números

    if (empty($cpf) || !preg_match("/^\d{11}$/", $cpf)) {

        $erro = true;

        $mensagem_erro .= "CPF inválido. Deve conter apenas números e ter 11 dígitos.<br>";

    }



    // Exibir mensagens de erro ou sucesso

    if ($erro) {

        echo "<div style='color: red;'>" . $mensagem_erro . "</div>";

    } else {

        echo "<div style='color: green;'>Formulário enviado com sucesso!</div>";

    }

}

?>

