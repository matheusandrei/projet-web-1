<!-- {{ include('layouts/header.php', {title: 'timbre'})}}

<div class="container-editer-timbre">
    <h2>Enchere</h2>
    <div class="box-editer-timbre">
        <p><span>Titre:</span> {{ timbre.titre }}</p>
        <p><span>Description:</span> {{ timbre.description }}</p>
        <p><span>Pays:</span> {{ timbre.pays }}</p>
        <p><span>Année:</span> {{ timbre.annee }}</p>
        <p><span>Condition:</span> {{ timbre.etat }}</p>
        <p><span>Certifié:</span> {{ timbre.certifie }}</p>
        <p><span>Prix:</span> {{ timbre.prix }}</p>

        <img src="{{base}}/images/{{image}}">

        <div class="btns-editer-timbre">
            <a href="{{base}}/timbre/edit?id={{timbre.id}}" class="btn block">Edit</a>
            <form action="{{base}}/timbre/delete?id={{timbre.id}}" method="get">
                <input type="hidden" name="id" value="{{ timbre.id }}">
                <button class="btn block red">Delete</button>
            </form>
        </div>
    </div>
</div>
{{ include('layouts/footer.php') }} -->


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
            <li>Offres actuelle </li>
        </ul>
        <hr />
        <div class="achat">
            <label for="">Placez une mise <input type="number" name="" id="" /></label>
            <button class="ajouter-panier">Miser</button>
        </div>
        <hr />
        <h3>Certifié : <span>{{ timbre.certifie }}</span></h3>
        <h3>Categorie : <span>{{ timbre.categorie }}</span></h3>
        <h3>Partager : <i class="fa-solid fa-share"></i></h3>
    </div>
</section>

<section class="container-timbres">
    <h1>Enchères actives</h1>
    <div class="carrousel">
        <i class="fa-solid fa-chevron-left fa-2x"></i>
        <div class="carrousel__card">
            <div class="carrousel__title">
                <h2>{{ enchere1.titre }}</h2>
            </div>
            <div class="carrousel__image">
                <img src="{{ base }}/images/{{ enchere1.image }}" alt="" />
            </div>
            <div class="carrousel__prix">Prix: <small>{{ enchere1.prix }}</small></div>
            <div class="hourglass">
                <div class="carrousel__temps">Temps restant: <small>{{ enchere1.temps_restant }}</small></div>
                <i class="fa-regular fa-hourglass-half"></i>
            </div>
        </div>
        <!-- Répétez pour chaque enchère -->
        <i class="fa-solid fa-chevron-right fa-2x"></i>
    </div>
</section>

{% include 'layouts/footer.php' %}