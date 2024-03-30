<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description"
        content="Explorez Lord Stampee pour l'achat et la vente de timbres rares. Collection unique, histoires à travers images et designs. Idéal pour passionnés et amateurs." />
    <title>{{ title }}</title>
    <link rel="stylesheet" href="{{ asset }}/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="assets/js/main.js" defer></script>
</head>

<body>
    <header>
        <div class="header-container">
            <a href="{{base}}"><img src="{{asset}}/css/img/logos/logoLord 1.png" alt="logos" /></a>
            <form action="/" method="get">
                <label for="recherche" class="sr-only">Rechercher :</label>
                <input type="text" id="recherche" name="recherche" placeholder="Rechercher" />
                <button type="submit" name="recherche" class="search-button">
                    <i class="fa-solid fa-magnifying-glass" role="img" aria-label="icon de recherche"></i>
                </button>
            </form>
            <div class="icon-container">
                <i class="fa-solid fa-cart-shopping"></i>
                <a href="{{ base }}/login"><i class="fa-solid fa-user"></i></a>
            </div>
        </div>
        <nav class="nav-liens">
            <ul>
                <li><i class="fa-solid fa-bars icon-menu"></i></li>
                <li><a href="{{ base }}">Accueil</a></li>
                <li><a href="catalogue.html">Catalogue</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="{{ base }}/user/create/">Devenir Membre</a></li>
                <li><a href="mission.html">À propos</a></li>
                {% if guest %}
                <li><a href="{{ base }}/login">Login</a></li>
                {% else %}
                <li><a href="{{ base }}/timbre/create/">Ajouter un timbre</a></li>
                <li><a href="{{ base }}/enchere/create/">Ajouter une enchere</a></li>
                <li><a href="{{ base }}/logout">Logout</a></li>
                {% endif %}
                <i class="fa-solid fa-bars icon-menu"></i>
            </ul>
        </nav>
    </header>
    <main>










        <!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ title }}</title>
    <link rel="stylesheet" href="{{ asset }}/css/styles.css">
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
        {% endif%} -->