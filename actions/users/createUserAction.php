<?php
require('../../Database/utilisateur_db.php');

if (isset($_POST['addUser'])) {
    if (
        !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email'])
        && !empty($_POST['password']) && !empty($_POST['profil_id'])
    ) {
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = htmlspecialchars($_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $profil_id = htmlspecialchars($_POST['profil_id']);

        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $allowedExtensions = ['jpg', 'png', 'svg'];
            $fileExtension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);

            if (in_array(strtolower($fileExtension), $allowedExtensions)) {
                $newImage = uploadImage($_FILES['avatar'], $email);
                if ($newImage !== false) {
                    addUser($nom, $prenom, $email, $password, $newImage, $profil_id);
                    $message = "L'utilisateur $prenom $nom a été ajoutée avec succès!";
                    header("Location:users.php?message=" . $message);
                } else {
                    $errorMessage = "Echec upload image";
                }
            } else {
                $errorMessage = "Veuillez télécharger une image au format JPG, PNG ou SVG !";
            }
        } else {
            $errorMessage = "Veuillez saisir un email valide !";
        }
    } else {
        $errorMessage = "Veuillez remplir les champs obligatoires !";
    }
}

function uploadImage($image, $email)
{
    $img_name = $email.substr(0, 5) . random_int(11111, 99999) . $image['name'];
    $img_path = UPLOAD_IMAGES_AVATAR . $img_name;

    if (move_uploaded_file($image['tmp_name'], $img_path)) {
        return $img_name;
    } else return false;
}
