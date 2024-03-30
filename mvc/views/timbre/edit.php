{{ include('layouts/header.php', {title: 'Timbre Edit'}) }}
<div class="container">
    <h2>Timbre Edit</h2>
    <form method="post">
        <label>Titre
            <input type="text" name="titre" value="{{ timbre.titre }}">
        </label>
        {% if errors.titre is defined %}
        <span class="error">{{ errors.titre }}</span>
        {% endif %}
        <label>Date
            <input type="text" name="date" value="{{ timbre.date }}">
        </label>
        {% if errors.date is defined %}
        <span class="error">{{ errors.date }}</span>
        {% endif %}
        <label>Description
            <input type="text" name="description" value="{{ timbre.description }}">
        </label>
        {% if errors.description is defined %}
        <span class="error">{{ errors.description }}</span>
        {% endif %}
        <label>Condition
            <input type="text" name="etat" value="{{ timbre.etat }}">
        </label>
        {% if errors.etat is defined %}
        <span class="error">{{ errors.etat }}</span>
        {% endif %}
        <label>Certifie
            <input type="text" name="certifie" value="{{ timbre.certifie }}">
        </label>
        {% if errors.certifie is defined %}
        <span class="error">{{ errors.certifie }}</span>
        {% endif %}


        <label>Categorie
            <input type="text" name="categorie" value="{{ timbre.categorie }}">
        </label>
        {% if errors.categorie is defined %}
        <span class="error">{{ errors.categorie }}</span>
        {% endif %}

        {% if errors.stampee_enchere_id is defined %}
        <span class="error">{{ errors.stampee_enchere_id }}</span>
        {% endif %}

        <input type="hidden" name="stampee_utilisateur_id" value="{{ timbre.stampee_utilisateur_id }}">



        <input type="submit" class="btn" value="Update">
    </form>
</div>
{{ include('layouts/footer.php') }}