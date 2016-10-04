<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!-- Bootstrap e terceiros-->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="site/assets/css/snackbar.css" rel="stylesheet">

    <!-- css customizado -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/color.css" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="assets/font/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <title>Formulário de Pré-Seleção</title>
    <link rel="stylesheet" type="text/css" href="site/questionario/assets/css/geral.css"/>
</head>

<body>
    <div class="geral">

        <img src="site/questionario/assets/img/logo.png"/>

        <h1>Question&aacute;rio de pré-seleção para o cargo de vendedor</h1>

        {!! Form::open(['route' => 'site.questionario.store', 'method' => 'post', 'id' => 'gravarQuestionario']) !!}

            <label>Nome Completo:</label>

            <input type="text" name="name" id="name" class="input-text" /><br/>

            <label>E-mail:</label>

            <input type="email" name="email" id="email" class="input-text" /><br/>

            <label>Já trabalhou com vendas de tecnologia? Se sim, quanto tempo e o que vendia?</label>

            <textarea class="input-textarea" name="pergunta1" id="pergunta1" rows="10"></textarea>

            <label>Defina com as suas palavras o que é um software.</label>

            <textarea class="input-textarea" name="pergunta2" id="pergunta2" rows="10"></textarea>

            <label>Defina com as suas palavras o que é um site.</label>

            <textarea class="input-textarea" name="pergunta3" id="pergunta3" rows="10"></textarea>

            <label>Sabendo que a <span>ROBOTS INFORM&Aacute;TICA E TECNOLOGIA</span> desenvolve sistemas web e aplicativos
                para dispositivos móveis, qual seria sua primeira ação como vendedor?</label>

            <textarea class="input-textarea" name="pergunta4" id="pergunta4" rows="10"></textarea>

            <label>Descreva um estudo de caso simulado em que você conversou com um cliente em potencial, demonstre porque o
                seu possível cliente precisa de um site.</label>

            <textarea class="input-textarea" name="pergunta5" id="pergunta5" rows="10"></textarea>

            <label>Em uma ação de marketing você é responsável por promover um de nossos aplicativos pela cidade, este
                aplicativo teria todos os estabelecimentos da cidade, como se fosse um guia, com critérios de avaliação e
                comentários dos usuários.<br/> Como você promoveria este aplicativo?</label>

            <textarea class="input-textarea" name="pergunta6" id="pergunta6" rows="10"></textarea>

            <input type="submit" class="input-enviar" value="Enviar Respostas"/>

            <div id="snackbar"></div>
        {!! Form::close() !!}

    </div> <!--FIM DA DIV GERAL-->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>
</html>
