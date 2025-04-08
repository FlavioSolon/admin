<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Contato Geral - Nutricandies</title>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Mulish', sans-serif;
            background-color: #f3ca85; /* sec */
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #1a1a1a; /* Tom escuro da logo */
            padding: 20px;
            text-align: center;
        }
        .header img {
            max-width: 200px;
        }
        .content {
            padding: 20px;
            color: #888a8d; /* cuar */
        }
        .content h1 {
            color: #90295a; /* primaria */
            font-size: 24px;
            margin-bottom: 10px;
        }
        .content p {
            font-size: 16px;
            line-height: 1.5;
            margin: 10px 0;
        }
        .details {
            background-color: #f37931; /* ter */
            color: #ffffff;
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
        }
        .details p {
            margin: 5px 0;
        }
        .button {
            display: inline-block;
            padding: 12px 24px;
            background-color: #90295a; /* primaria */
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
            font-weight: bold;
        }
        .footer {
            background-color: #888a8d; /* cuar */
            color: #ffffff;
            text-align: center;
            padding: 10px;
            font-size: 12px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <img src="{{ asset('logo/logo_nutricandies.png') }}" alt="Nutricandies Logo">
    </div>
    <div class="content">
        <h1>Olá, Equipe de Contato!</h1>
        <p>Recebemos um novo contato geral através do sistema da Nutricandies. Confira os detalhes abaixo e tome as providências necessárias.</p>

        <div class="details">
            <p><strong>Nome do Solicitante:</strong> {{ $data['name'] }}</p>
            <p><strong>E-mail para Contato:</strong> {{ $data['email'] }}</p>
            <p><strong>Setor:</strong> {{ \App\Enums\ContactSector::from($data['sector'])->name }}</p>
            <p><strong>Motivo do Contato:</strong> {{ \App\Enums\ContactReason::from($data['reason'])->name }}</p>
            <p><strong>Mensagem:</strong> {{ $data['message'] }}</p>
        </div>

        <p>Por favor, analise a solicitação e entre em contato com o remetente, se necessário. Agradecemos pela atenção!</p>
        <a href="https://nutricandies.com/admin" class="button">Acessar o Sistema</a>
    </div>
    <div class="footer">
        <p>© 2025 Nutricandies. Todos os direitos reservados.</p>
    </div>
</div>
</body>
</html>
