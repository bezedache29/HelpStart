<h1>Bonjour {{ $help_request->student->user->full_name }}</h1>
<p>Vous avez reçus une réponse à votre demande d'entraide {{ $help_request->title }}</p>

<p>La réponse de {{ $answer->user->full_name }}</p>
<p>{{ $answer->content }}</p>