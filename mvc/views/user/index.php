{{ include('layouts/header.php', {title: 'User'})}}
<div>
    <h1>Bienvenue {{user.nom}}</h1>

    <h2>Liste d'utilisateurs</h2>
    {% for user in user %}


    <div>

        <div>
            <p><a href="{{ base }}/client/show?id={{ client.id }}">{{ user.name }}</a></p>
            <p>{{ user.username }}</p>
        </div>
        {% endfor %}
    </div>
</div>
<div>
    <a href="{{ base }}/user/create" class="btn">User Create</a>
</div>
{% include('layouts/footer.php') %}