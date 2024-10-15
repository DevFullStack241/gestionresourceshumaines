<p>Cher {{ $agent->name }}</p><br>
<p>
    Votre mot de passe sur {{ get_settings()->site_name }} a ete modifie avec succes. Voici vos nouveaux identifiants de connexion:
    <br>
    <b>ID de connexion: </b>{{ isset($agent->username) ? $agent->username.' or ' : '' }} {{ $agent->email }}
    <br>
    <b>Mot de passe: </b>{{ $new_password }}
</p>
<br>
Veuillez garder vos identifiants confidentiels. Votre identifiant de connexion et votre mot de passe sont vos propres identifiants et vous ne devez jamais les partager avec quelqu'un d'autre.

<p>
    {{ get_settings()->site_name }} ne sera pas responsable de toute mauvaise utilisation de votre identifiant de connexion ou de votre mot de passe.
</p>
<br>
---------------------------------------
<p>
    Cet email a ete envoye automatiquement par {{ get_settings()->site_name }}. Ne réponds pas à ça.
</p>
