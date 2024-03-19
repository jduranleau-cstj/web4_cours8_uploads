<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form d'ajout</title>
</head>
<body>
    <form action="/photo/ajouter-submit" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="titre" required>
        <input type="file" name="image">
        <input type="submit" value="Ajouter">
    </form>
</body>
</html>