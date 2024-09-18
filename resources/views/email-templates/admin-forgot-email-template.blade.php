<p>Dear {{ $admin->name }}</p>
<p>
    Nous avons reçu une demande de réinitialisation du mot de passe du compte Planify RH associé à {{ $admin->email }}.
    Vous pouvez réinitialiser votre mot de passe en cliquant sur le bouton ci-dessous:
    <br>
    <a href="{{ $actionLink }}" target="_blank"
        style="color:#fff;border-color:#22bc66;border-style:solid;border-width:5px 10px;background-color:#22bc66;display:inline-block;text-decoration:none;border-radius:3px;box-shadow:0 2px 3px rgba(0,0,0,0.16);-webkit-text-size-adjust:none;box-sizing:border-box;">Réinitialiser
        le mot de passe</a>
    <br>
    <b>NB:</b> Ce lien sera valide dans 15 minutes
    <br>
    Si vous n'avez pas demandé de réinitialisation de mot de passe, veuillez ignorer cet e-mail.
</p>
