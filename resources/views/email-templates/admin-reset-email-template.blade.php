<p>Cher {{ $admin->name }}</p>
<br>
<p>
    Votre mot de passe sur le système DeskApp a ete modifie avec succès.
Voici vos nouveaux identifiants de connexion:
    <br>
    <b>ID Connexion: </b>{{ $admin->username }} or {{ $admin->email }}
    <br>
    <b>Mot de passe: </b>{{ $new_password }}
</p>
<br>
Veuillez garder vos identifiants confidentiels. Votre nom d'utilisateur et votre mot de passe sont vos propres identifiants et vous ne devez jamais les partager avec quelqu'un d'autre..
<p>
    DeskApp ne sera pas responsable de toute mauvaise utilisation de votre nom d'utilisateur ou de votre mot de passe.
</p>
<br>
----------------------------------------------
<p>
    Cet email a ete envoye automatiquement par le système DeskApp. Ne repondez pas.
</p>
