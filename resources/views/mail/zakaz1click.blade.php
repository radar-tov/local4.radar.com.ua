<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Заказ в 1 клик</title>
    <style>
        .tab {
            width: 100%;
        }
    </style>
</head>
<body>
<table class="tab">
    <tr>
        <td>
            <img src="https://radar.com.ua/frontend/images/logo.png">
        </td>
        <td><h3>Заказ в 1 клик</h3></td>
    </tr>
    <tr>
        <td>
            <p>Id товара:</p>
        </td>
        <td>
            <p>{{ $id }}</p>
        </td>
    </tr>
    <tr>
        <td>
            <p>Название товара:</p>
        </td>
        <td>
            <p>{{ $title }}</p>
        </td>
    </tr>
    <tr>
        <td>
            <p>Номер телефона клиента:</p>
        </td>
        <td>
            <p>{{ $phone }}</p>
        </td>
    </tr>
</table>
</body>
</html>