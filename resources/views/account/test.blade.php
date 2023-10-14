<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<style>
    table{
        border-collapse:collapse;
    }
    th, td {
        border:1px solid black;
    }
    body {
        display: flex;
        justify-content:center;
    }

    .register-link{
        display:flex;
        justify-content: end;
    }


</style>
</head>
<body>
    <div>
    <div class=register-link><p><a>>>登録</a></p></div>
    <table>
        <tr>
            <th>　　名前　　</th>
            <th>　　電話番号　　</th>
            <th>　　メールアドレス　　</th>
            <th>　　　　　</th>
        </tr>

            <tr>
                <td>user->name </td>
                <td>membership->email</td>
                <td><a href= "{{ route('logout') }}">logout</a></td>
            </tr>

    </table>
    </div>

</body>
</html>
