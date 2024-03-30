{{ include('layouts/header.php', {title: 'Mes Timbres'}) }}


<div class="container-mes-timbres">
    <h1>Mes Timbres!</h1>
    <table class="table-mes-timbres">

        <tr>
            <th>Titre</th>
            <th>Date</th>
            <th>Couleur</th>
            <th>Description</th>
            <th>Pays</th>
            <th>Dimensions</th>
            <th>Certifié</th>
            <th>Categorie</th>
            <th>Condition</th>
        </tr>

        {% for timbre in timbre%}
        <tr>
            <td><a href="{{ base }}/timbre/show?id={{timbre.id}}">{{ timbre.titre }}</a></td>
            <td>{{ timbre['date'] }}</td>
            <td>{{ timbre['couleur'] }}</td>
            <td>{{ timbre['description'] }}</td>
            <td>{{ timbre['pays'] }}</td>
            <td>{{ timbre['dimensions'] }}</td>
            <td>{{ timbre['certifie'] }}</td>
            <td>{{ timbre['categorie'] }}</td>
            <td>{{ timbre['etat'] }}</td>


        </tr>
        {% endfor %}

    </table>
    <a href="{{BASE}}create" class="btn">Ajouter un nouveau timbre</a>
</div>

{{ include('layouts/footer.php') }}