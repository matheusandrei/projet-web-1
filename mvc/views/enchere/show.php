{% include 'layouts/header.php' with {'title': 'timbre'} %}

<section class="fiche-du-produit">
    <div class="container-img">
        <img src="{{base}}/images/{{image}}" alt="" class="img-principale" />
    </div>

    <div class="description">
        <h1>{{ timbre.titre }}</h1>
        <ul>
            <li>Identifiant #<span>{{ timbre.id }}</span></li>
            <li>
                Date de création
                <i class="fa-solid fa-calendar-days fa-sm"> {{ timbre.date_creation }}</i>
            </li>
            <li>Couleur <i class="fa-solid fa-palette fa-sm"></i> {{ timbre.couleur }}</li>
            <li>Pays d'origine <span>{{ timbre.pays }}</span></li>
            <li>Condition <span>{{ timbre.etat }}</span></li>
            <li>Dimensions <span>{{ timbre.dimensions }}</span></li>
            <li>Description <span>{{ timbre.description }}</span></li>
            <li>Offre actuelle {{ enchere['prix'] }} </li>

            <li></li>
        </ul>
        <hr />
        <p>Date de debut {{enchere['date_debut']}}
        <p>
        <p>Date de fin {{enchere['date_fin']}}
        <p>
        <form method="post" action="{{ base }}/mise/store">

            <label for="prix_mise">Placez une mise
                <input type="number" name="prix_mise" min="{{enchere.prix}}" placeholder="{{enchere.prix}}" />
            </label>
            <button type="submit" class="ajouter-panier">Miser</button>
            <input type="hidden" name="date_heure" value="<?php echo date('Y-m-d H:i:s'); ?>">
            <input type="hidden" name="stampee_utilisateur_id" value="{{session.user_id}}">
            <input type="hidden" name="stampee_enchere_id" value="{{ enchere['id'] }}">
            <input type="hidden" name="timbre_id" value="{{ timbre.id }}">
        </form>
        <hr />
        <h3>Certifié : <span>{{ timbre.certifie }}</span></h3>
        <h3>Categorie : <span>{{ timbre.categorie }}</span></h3>
        <h3>Partager : <i class=" fa-solid fa-share"></i></h3>
    </div>
</section>



{% include 'layouts/footer.php' %}