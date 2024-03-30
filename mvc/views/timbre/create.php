{{ include('layouts/header.php', {title: 'Ajouter un timbre'}) }}

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
    <form method="post" method="post" enctype="multipart/form-data">
        <h2>Ajouter un timbre</h2>
        <label>Titre
            <input type=" text" name="titre" value="{{ timbre.titre }}">
        </label>
        <label>Date
            <input type="date" name="date" value="{{ timbre.date }}">
        </label>
        <label>Couleur
            <input type="text" name="couleur" value="{{ timbre.couleur }}">
        </label>
        <label>Description
            <textarea name="description">{{ timbre.description }}</textarea>
        </label>
        <label>Etat
            <input type="text" name="etat" value="{{ timbre.etat }}">
        </label>
        <label>Pays
            <input type="text" name="pays" value="{{ timbre.pays }}">
        </label>
        <label>Dimensions
            <input type="text" name="dimensions" value="{{ timbre.dimensions }}">
        </label>
        <label>Certifié
            <select name="certifie">
                <option value="1" {% if timbre.certifie == 1 %} selected {% endif %}>Oui</option>
                <option value="0" {% if timbre.certifie == 0 %} selected {% endif %}>Non</option>
            </select>
        </label>
        <label>Catégorie
            <input type="text" name="categorie" value="{{ timbre.categorie }}">
        </label>
        <label>Image Principale:
            <input type="file" name="image_principale">
        </label>
        {% if errors.image_principale is defined %}
        <span class="error">{{ errors.image_principale }}</span>
        {% endif %}

        <label>Images secondaire:
            <input type="file" name="image_secondaire[]" multiple>
        </label>
        <input type="hidden" name="stampee_utilisateur_id" value="{{session.user_id}}">
        <input type="submit" class="btn" value="Ajouter">
    </form>
</div>

{{ include('layouts/footer.php') }}