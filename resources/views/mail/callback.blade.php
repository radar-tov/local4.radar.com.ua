<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Заказ обратного звонка</title>
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
            <h3>Заказ обратного звонка.</h3>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <p>Имя: {{ $name }}</p>
            <p>Номер телефона: {{ $phone }}</p>
            <p>Время отправления: {{ date("Y-m-d h:i:s") }}</p>
            <p>IP: {{ isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '' }}</p>
            <p>Браузер: {{ isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : ''}}</p>
            <p>Referer: {{ isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '' }}</p>
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
