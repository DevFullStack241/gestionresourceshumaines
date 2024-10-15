Dear <b>{{ $responsable->name }}</b><br>
<p>
    Vous recevez cet e-mail car vous avez demande a réinitialiser votre mot de passe sur {{ get_settings()->site_name }}
</p>
<p>
    Veuillez utiliser le lien ci-dessous pour le réinitialiser.
    <a href="{{ $actionLink }}" target="_blank">{{ $actionLink }}</a><br>
</p>
<p>
    Ce lien de réinitialisation du mot de passe n'est valable que pour les 15 prochaines minutes.
</p>
<p>
    Si vous rencontrez des problemes avec le lien ci-dessus, copiez-le et collez-le dans votre navigateur Web.
</p>
<p>
    NB: SI VOUS N'AVEZ PAS DEMANDe DE REMPLACEMENT DE MOT DE PASSE, VEUILLEZ IGNORER CET E-MAIL
</p><br>
----------------------------------------------
<p>
    Cet email a ete envoye automatiquement par {{ get_settings()->site_name }}. Ne reponds pas a ça.
</p>
