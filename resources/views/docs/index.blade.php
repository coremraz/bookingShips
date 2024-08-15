<!DOCTYPE html>
<html>
<head>
    <title>API Documentation</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>
<h1><b>Users and Sellers</b></h1>
<table>
    <thead>
    <tr>
        <th>Method</th>
        <th>Endpoint</th>
        <th>Description</th>
        <th>Required Fields</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>GET</td>
        <td><a href="/api/users">/api/users</a></td>
        <td>Получить всех пользователей</td>
        <td>-</td>
    </tr>
    <tr>
        <td>GET</td>
        <td><a href="/api/users/{id}">/api/users/{id}</a></td>
        <td>Получить пользователя по ID</td>
        <td>id</td>
    </tr>
    <tr>
        <td>GET</td>
        <td><a href="/api/sellers">/api/sellers</a></td>
        <td>Получить всех продавцов</td>
        <td>-</td>
    </tr>
    <tr>
        <td>GET</td>
        <td><a href="/api/sellers/{id}">/api/sellers/{id}</a></td>
        <td>Получить продавцов по ID</td>
        <td>id</td>
    </tr>
    </tbody>
</table>

<h1><b>Авторизация, регистрация</b></h1>
<table>
    <thead>
    <tr>
        <th>Method</th>
        <th>Endpoint</th>
        <th>Description</th>
        <th>Required Fields</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>POST</td>
        <td><a href="api/user/register">/api/user/register</a></td>
        <td>Регистрация нового пользователя</td>
        <td>name, last_name, email, password</td>
    </tr>
    <tr>
        <td>POST</td>
        <td><a href="api/user/login">/api/user/login</a></td>
        <td>Login</td>
        <td>email, password</td>
    </tr>
    <tr>
        <td>POST</td>
        <td><a href="/api/user/logout">/api/user/logout</a></td>
        <td>Logout</td>
        <td>Bearer token выдается при входе</td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td>POST</td>
        <td><a href="api/seller/register">/api/seller/register</a></td>
        <td>Регистрация нового продавца</td>
        <td>name, last_name, email, password</td>
    </tr>
    <tr>
        <td>POST</td>
        <td><a href="api/seller/login">/api/seller/login</a></td>
        <td>Login</td>
        <td>email, password</td>
    </tr>
    <tr>
        <td>POST</td>
        <td><a href="/api/seller/logout">/api/seller/logout</a></td>
        <td>Logout</td>
        <td>Bearer token выдается при входе</td>
    </tr>
    </tbody>
</table>
</body>
</html>
