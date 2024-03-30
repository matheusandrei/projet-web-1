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
        <label>Prix Courant
            <input type="text" name="prix_courant" value="{{ enchere.prix_courant }}">
        </label>
        <label>Date de Début
            <input type="date" name="date_debut" value="{{ enchere.date_debut }}">
        </label>
        <label>Date de Fin
            <input type="date" name="date_fin" value="{{ enchere.date_fin }}">
        </label>
        <label>Actif
            <select name="actif">
                <option value="1" {% if enchere.actif == 1 %} selected {% endif %}>Oui</option>
                <option value="0" {% if enchere.actif == 0 %} selected {% endif %}>Non</option>
            </select>
        </label>
        <label>Coup de Cœur
            <select name="coup_de_coeur">
                <option value="1" {% if enchere.coup_de_coeur == 1 %} selected {% endif %}>Oui</option>
                <option value="0" {% if enchere.coup_de_coeur == 0 %} selected {% endif %}>Non</option>
            </select>
        </label>
        <label>Timbre
            <select name="stampee_timbre_id">
                <!-- Opções de Timbre podem ser preenchidas dinamicamente dependendo da sua lógica -->
                <!-- Exemplo: -->
                <!-- {% for timbre in timbres %}
                <option value="{{ timbre.id }}">{{ timbre.titre }}</option>
                {% endfor %} -->
            </select>
        </label>
        <!-- Restante dos campos, como imagens, podem ser adicionados aqui -->
        <input type="submit" class="btn" value="Ajouter">
    </form>
</div>

{{ include('layouts/footer.php') }}