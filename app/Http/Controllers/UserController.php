<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Liste de toutes les photos
    function index()
    {
        $photos = Photo::all();

        return view("index", [
            "photos" => $photos
        ]);
    }

    // Formulaire d'ajout
    function ajouter_photo()
    {
        return view("ajouter_photo");
    }

    // Submit du formulaire d'ajout
    function ajouter_photo_submit()
    {
        // === Début upload ===
        $dossier = "uploads/";
        $extensions = ["png", "avif", "jpg", "jpeg", "gif", "webp"];
        $image_url = null;

        // Upload s'est bien passé
        if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
            
            // Récupère l'extension de l'image
            $infos_image = getimagesize($_FILES['image']['tmp_name']);
            $extension = explode("/", $infos_image["mime"])[1];

            // Si l'extension est valide
            if (in_array($extension, $extensions)) {
                $nom_rnd = time() . "_" . rand(1000, 9999);
                $image_url = $dossier . $nom_rnd . "." . $extension;
                move_uploaded_file($_FILES['image']['tmp_name'], $image_url);
            }
        }
        // === Fin upload ===

        $photo = new Photo();
        $photo->titre = $_POST["titre"];
        $photo->url = $image_url;
        $photo->save();

        return redirect("/");
    }

    // Formulaire de modification
    function modifier_photo()
    {
        $id = $_GET["id"];
        $photo = Photo::find($id);

        return view("modifier_photo", [
            "photo" => $photo,
        ]);
    }

    // Submit du form de modification
    function modifier_photo_submit()
    {
        // === Début upload ===
        $dossier = "uploads/";
        $extensions = ["png", "avif", "jpg", "jpeg", "gif", "webp"];
        $image_url = null;

        // Upload s'est bien passé
        if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
            
            // Récupère l'extension de l'image
            $infos_image = getimagesize($_FILES['image']['tmp_name']);
            $extension = explode("/", $infos_image["mime"])[1];

            // Si l'extension est valide
            if (in_array($extension, $extensions)) {
                $nom_rnd = time() . "_" . rand(1000, 9999);
                $image_url = $dossier . $nom_rnd . "." . $extension;
                move_uploaded_file($_FILES['image']['tmp_name'], $image_url);
            }
        }
        // === Fin upload ===

        $id = $_POST["id"];
        $photo = Photo::find($id);

        // Mise à jour du titre
        $photo->titre = $_POST["titre"];

        // Mise à jour de l'image S'IL Y EN A UNE NOUVELLE
        if ($image_url != null) {
            $photo->url = $image_url;
        }

        $photo->save();

        return redirect("/");
    }

    // Suppression
    function supprimer_photo() {
        $id = $_GET["id"];
        $photo = Photo::find($id);

        // Supprimer l'image (si elle existe)
        if ($photo->url != null) {
            unlink($photo->url);
        }

        // Supprime l'entrée dans la BDD
        Photo::destroy($id);

        return redirect("/");
    }

}
