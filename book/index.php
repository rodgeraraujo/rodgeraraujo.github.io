<!DOCTYPE html>
    <html>
        <head>
            <meta charset='utf-8'>
            <title>Livro - por Rogério Araújo</title>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <link rel="stylesheet" type="text/css" href="css/style-sheet.css">

<?php
    session_start();
    /* DECLARE VARIABLES */
    $username = 'leitor';
    $password = '123abc';
    $random1 = 'secret_key1';
    $random2 = 'secret_key2';
    $hash = md5($random1 . $password . $random2);
    $self = $_SERVER['REQUEST_URI'];

    /* USER LOGOUT */
    if(isset($_GET['logout']))
    {
        unset($_SESSION['login']);
    }

    /* USER IS LOGGED IN */
    if (isset($_SESSION['login']) && $_SESSION['login'] == $hash)
    {
        logged_in_msg($username);
    }

    /* FORM HAS BEEN SUBMITTED */
    else if (isset($_POST['submit']))
    {
        if ($_POST['username'] == $username && $_POST['password'] == $password)
        {
            //IF USERNAME AND PASSWORD ARE CORRECT SET THE LOGIN SESSION
            $_SESSION["login"] = $hash;
            header("Location: $_SERVER[PHP_SELF]");
        }
        else
        {
            // DISPLAY FORM WITH ERROR
            display_login_form();
            display_error_msg();
        }
    }

    /* SHOW THE LOGIN FORM */
    else
    {
        display_login_form();
    }


    /* TEMPLATES */
    function display_login_form()
    {
        echo'<center><br><br><br>' .
            '<h2>Faça login!</h2><br>' . 
            '<form action="' . isset($self) . '" method="post">' .
                 '<input type="text" name="username" id="username" placeholder="Username"><br><br>' .
                 '<input type="password" name="password" id="password" placeholder="Password"><br><br>' .
                 '<input class="submit" type="submit" name="submit" value="Entrar">' .
             '</form>' .
             '</center>';
    }
    function logged_in_msg($username)
    {
        echo "
            
                </head>
                <body>
                 <nav id='menu'>
                    <ul>
                        <li><a href='ttp://www.rogeraraujo.pe.hu'>Inicio</a></li>
                        " . '<li><a href="?logout=true">Logout?</a></li>' . "
                    </ul>
                </nav>
                " . 
                    '<center>
                        <div>
                            <h4>Bem-vindo ' . 'Leitor #1' . "</h4>
                            <h2>O Alvorecer dos Reis</h2>
                            <h5> Por <a href='http://www.instagram.com/roogeraraujo'>Rogério Araújo</a></h5>
                        </div>
                    </center>
                 <br>   
                <h3>CAPÍTULO I<br> <hr class='style14'> O REI E SEU EXÉRCITO</h3>
                <br>
                <p>Sobre mais de seis mil cavaleiros, e erguendo uma espada de metal prateado (Nitrird) ao alto de sua cabeça, e gritando – Meus cavaleiros, sigam a bandeira do Rei e não temam por suas vidas! – , enquando a mensagem era passada de companhia a companhia, por oficiais subalternos. – Pois a vitória será nossa. E mesmo que muitos não voltem para seus lares, não desanimem. Usem suas espadas e escudos, pois o dia só acabará quando nosso inimigo não estiver mais de pé. Avante cavaleiros de Enryn.</p>
                <p>E todos gritam, levantando suas espadas, lanças e escudos.</p>
                <p>– Arqueiros, preparar para atacar! – Grita bem alto um almirante, e outro e outro. – Atirem!</p>
                <p>– Avantem! - diz o Rei.<p>
                <p>E eles partem contra seu inimigo. Alguns em montarias (cavalaria) e outros a pé (infantaria), com armaduras rebuscadas e detalhadas, sujas e com aranhoes, mas um unico olhar em seus rostos.</p>       
                <p>Então cavalgaram iam cinco homens com armaduras douradas, e detalhes em verde, eram os comandantes e a frente o guiando estavam seu Rei, e bem atrás uma vasta multidão eram seu exército, todos estavam com seus corações pesados e olhares fundos ao inimigo a frente, mas seu Rei a frente gritava incansavelmente – Não desanimem! Lutem por suas familias, lutem por Eryn! - , abaixando sua espada e em silencio eles moviam-se contra as forças de [...]</p>
                <br>
                <p>Acaba aqui, por enquanto!</p>";
                include 'comment/index.php';
        }
        function display_error_msg()
        {
            echo '<center><h6>Usuário ou senha invalido(s)!</h6></center>';
        }

?>