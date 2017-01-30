<?php
	$name = $email = $message = "";
	$confirmation = "";
	$errors = [];

	if(!empty($_POST)) {

		$name = filter_var(trim($_POST["name"]), FILTER_SANITIZE_STRING);
		$email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
		$message = filter_var(trim($_POST["message"]), FILTER_SANITIZE_STRING);

		if(empty($name)) {
			$errors["name"] = "Saisis ton nom";
		}
		if(empty($email)) {
			$errors["email"] = "Saisis ton email";
		}
		elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$errors["email"] = "Email invalide";
		}
		if(empty($message)) {
			$errors["message"] = "Un petit message ?";
		}

		if(empty($errors)) {
			$confirmation = "Ton message a bien été envoyé, on te recontacte bientôt !";

			$subject = "Nouveau message de " . $email;
			$contentEmail = "auteur: " . $name . ", email: " . $email . ", contenu :";
			$contentEmail .= $message;
			mail("ddgraphdesign@gmail.com", $subject, $contentEmail);

 		$name = $email = $message = "";

		}
}
?>
