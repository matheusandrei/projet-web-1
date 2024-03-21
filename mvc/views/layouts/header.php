<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ title }}</title>
    <link rel="stylesheet" href="{{ asset }}/css/style.css">
</head>
<body>
    <nav>
        <ul>
            {% if session.privilege_id == 1 or session.privilege_id == 2 %}
            <li><a href="{{base}}/produit/create">Ajouter un produit</a></li>
            {% endif %}
            <li><a href="{{base}}/client">Clients</a></li>
            {% if session.privilege_id == 1 %}
                <li><a href="{{base}}/user/index">Users</a></li>
            {% endif %}
            
            {% if guest %}
            <li><a href="{{base}}/login">Login</a></li>
            {% else %}
            <li><a href="{{base}}/logout">Logout</a></li>
            {% endif %}
        </ul>
    </nav>
    <main>
        {% if guest is empty %}
            Hello {{ session.user_name }}!
        {% endif%}
