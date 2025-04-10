<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subject }}</title>
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
            background-color: #1a1a1a;
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
        .message-box {
            background-color: #f37931; /* ter */
            color: #ffffff;
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
        }
        .message-box p {
            margin: 5px 0;
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
        <h1>Olá, {{ $notifiable->name }}!</h1>
        <p>Recebemos sua solicitação e estamos respondendo com as informações abaixo. Agradecemos pelo seu contato!</p>

        <div class="message-box">
            <p>{{ $message }}</p>
        </div>

        <p>Se precisar de mais informações ou tiver outras dúvidas, não hesite em nos contatar novamente.</p>
    </div>
    <div class="footer">
        <p>© 2025 Nutricandies. Todos os direitos reservados.</p>
    </div>
</div>
</body>
</html>
