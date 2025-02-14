<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inexistente</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        .container {
            text-align: center;
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }

        h1 {
            font-size: 3em;
            color: #FF6347;
        }

        p {
            font-size: 1.2em;
            color: #555;
        }

        .button {
            display: inline-block;
            padding: 15px 30px;
            font-size: 1.1em;
            color: #fff;
            background-color: #007BFF;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 20px;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #0056b3;
        }

        .footer {
            position: fixed;
            bottom: 10px;
            width: 100%;
            text-align: center;
            font-size: 0.8em;
            color: #aaa;
        }

    </style>
</head>
<body>

    <div class="container">
        <h1>Opa, algo deu errado!</h1>
        <p>Infelizmente, a página que você está procurando não existe. Por favor, volte a <a href="<?php echo BASE_URL;?>">página inicial.</a></p>
        <a href="/" class="button">Voltar à página inicial</a>
    </div>

    <div class="footer">
        <p>&copy; Your business name. Todos os direitos reservados.</p>
    </div>

</body>
</html>
