<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $prenom = strip_tags(trim($_POST["prenom"]));
    $nom = strip_tags(trim($_POST["nom"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    $recipient = "grandtravauxdegenieciv@gmail.com";
    $subject = "Nouveau message depuis le site GTGC SARL de $prenom $nom";

    $email_content = "Nom: $prenom $nom\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    $email_headers = "From: $prenom $nom <$email>";

    if (mail($recipient, $subject, $email_content, $email_headers)) {
        echo "<script>alert('Votre message a bien été envoyé !'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('Une erreur est survenue, veuillez réessayer.'); window.location.href='index.html';</script>";
    }
} else {
    header("Location: index.html");
}
?>