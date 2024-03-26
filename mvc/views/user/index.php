{{ include('layouts/header.php', {title: 'User'})}}
<div>
    <h1>Bienvenue</h1>

    <div>
        <h2>Liste d'utilisateurs</h2>
        {% for user in user %}


        <div>
            <p><a href="{{ base }}/client/show?id={{ client.id }}">{{ user.name }}</a></p>
            <p>{{ user.username }}</p>
        </div>
        {% endfor %}
    </div>
</div>
<div>
    <a href="{{ base }}/client/create" class="btn">Client Create</a>
</div>
{% include('layouts/footer.php') %}