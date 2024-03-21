{{ include('layouts/header.php', {title: 'Produit Create'})}}
<h2>Create New Product</h2>
<form action="" method="POST">
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" required><br>

    <label for="description">Description:</label><br>
    <textarea id="description" name="description" rows="4" cols="50"></textarea><br>

    <label for="price">Price:</label><br>
    <input type="number" id="price" name="price" step="0.01" required><br><br>

    <input type="submit" value="Submit">

    {{ include('layouts/footer.php') }}