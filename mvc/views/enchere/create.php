{{ include('layouts/header.php', {title: 'Ajouter une enchère'}) }}

<div class="container">
    {% if errors is defined %}
    <div class="error">
        <ul>
            {% for error in errors %}
            <li>{{ error }}</li>
            {% endfor %}
        </ul>
    </div>
    {% endif %}
    <form method="post" enctype="multipart/form-data">
        <h2>Ajouter une enchère</h2>
        <label>Prix Initial
            <input type="number" name="prix" value="{{ enchere.prix }}">
        </label>
        <label>Date de début
            <input type="datetime-local" name="date_debut">
        </label>
        <label>Date de fin
            <input type="datetime-local" name="date_fin">
        </label>
        <label>Timbre
            <select name="stampee_timbre_id">

                < {% for timbre in timbres %} <option value="{{ timbre.id }}">{{ timbre.titre }}</option>
                    {% endfor %}
            </select>
        </label>
        <input type="hidden" name="coup_de_coeur" value="0">
        <input type="hidden" name="actif" value="1">
        <input type="submit" class="btn" value="Publier l'enchère">

    </form>
</div>

{{ include('layouts/footer.php') }}