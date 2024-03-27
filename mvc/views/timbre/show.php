{{ include('layouts/header.php', {title: 'timbre'})}}
<div class="container-editer-timbre">
    <h2>timbre</h2>
    <div class="box-editer-timbre">
        <p><span>Titre:</span> {{ timbre.titre }}</p>
        <p><span>Description:</span> {{ timbre.description }}</p>
        <p><span>Pays:</span> {{ timbre.pays }}</p>
        <p><span>Année:</span> {{ timbre.annee }}</p>
        <p><span>Condition:</span> {{ timbre.etat }}</p>
        <p><span>Certifié:</span> {{ timbre.certifie }}</p>
        <p><span>Prix:</span> {{ timbre.prix }}</p>

        <img src="{{base}}/{{image}}">

        <div class="btns-editer-produit">
            <a href="{{base}}/product/edit?id={{product.id}}" class="btn block">Edit</a>
            <form action="{{base}}/product/delete" method="post">
                <input type="hidden" name="id" value="{{ product.id }}">
                <button class="btn block red">Delete</button>
            </form>
        </div>
    </div>
</div>
{{ include('layouts/footer.php') }}