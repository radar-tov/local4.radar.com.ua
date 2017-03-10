<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>{{ $data['subject'] }}</title>
</head>
<body>
<h1>{{ $data['subject'] }}</h1>
<h2>Имя:</h2>
<p>{{ $data['name'] }}</p>
<h2>Email:</h2>
<p>{{ $data['email'] }}</p>
<h2>Телефон:</h2>
<p>{{ $data['phone'] }}</p>
<h3>Коментарий</h3>
<text>{{ $data['comment'] }}</text>
{{print_r($data)}}
</body>
</html>