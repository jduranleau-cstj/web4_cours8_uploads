<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <p><a class="btn btn-success" href="photo/ajouter">Formulaire d'ajout</a></p>
            </div>
        </div>
        <div class="row">
            <div class="col d-flex">
                @if(count($photos) == 0)
                    <p>Aucune photo!</p>
                @endif
                @foreach ($photos as $photo)
                    <div class="m-1">
                        @if ($photo->url != null)
                        <img src="{{ asset($photo->url) }}" alt="{{ $photo->titre }}" style="height: 200px;">
                        @endif
                        <p>{{ $photo->titre }}</p>
                        <p>
                            <a class="btn btn-primary" href="photo/modifier?id={{ $photo->id }}">Modifier</a>
                            <a class="btn btn-danger" href="photo/supprimer?id={{ $photo->id }}">Supprimer</a>
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>