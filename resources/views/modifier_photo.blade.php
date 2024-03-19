<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form d'ajout</title>
</head>
<body>
    <form action="/photo/modifier-submit" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- ID caché avec le hidden -->
        <input type="hidden" name="id" value="{{ $photo->id }}">
        <input type="text" name="titre" required value="{{ $photo->titre }}">
        <input type="file" name="image">
        
        <input type="submit" value="Modifier">
    </form>
</body>
</html>