<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Сообщение из формы обратной связи</title>
    <style>
        body{
            background-color: #ede9e9;
        }
        .tab {
            width: 100%;
        }
    </style>
</head>
<body>
<table class="tab" border="1" cellpadding="10">
    <tr>
        <td width="33%">
            <a href="https://radar.com.ua/">
                <img src="https://radar.com.ua/frontend/images/logo.png">
            </a>
        </td>
        <td align="center">
            <h3>Сообщение из формы обратной связи.</h3>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <p>Имя: {{ $name }}</p>
            <p>Email: {{ $email }}</p>
            <p>Номер телефона: {{ $phone }}</p>
            <p>Комментарий: {{ $comment }}</p>
            <p>Время отправления: {{ date("Y-m-d h:i:s") }}</p>
        </td>
    </tr>
    <tr>
        <td colspan="2" align="center">
            <p>(063)881-83-83&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                (095)881-83-83&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                (068)881-83-83&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="mailto:8818383@gmail.com">8818383@gmail.com</a></p>
        </td>
    </tr>
</table>
</body>
</html>
