<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品管理システム ログイン/アカウント登録</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            /* align-items: center; */
            height: 80vh;
        }

        h2.title {
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .form-control {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }

        .button-group {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 30px;
            width: 100%;
        }


    </style>
</head>
<body>
    @yield('content')
</body>
</html>
