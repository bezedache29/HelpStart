<div>
    <x-card>
        <h1>
            [{{ $help_request->status_name }}]
            {{ $help_request->title }}
        </h1>

        <div>
            @foreach($help_request->tags as $tag)
                <span class="badge badge-primary">{{ $tag->name }}</span>
            @endforeach
        </div>

        <div>Posté par : {{ $help_request->student->user->full_name }}</div>

        <blockquote class="blockquote">{{ $help_request->content }}</blockquote>

        @foreach($help_request->files as $file)
            <i class="bi bi-paperclip"></i><a href="{{ route('help.file', [$help_request->id, $file->id]) }}">{{ $file->filename }}</a>
            <br>
        @endforeach

        @isset($help_request->availability)
            <p>Mes disponibilités : {{ $help_request->availability }}</p>
        @endisset
        
        <hr>
        <p>Visible par : {{ $help_request->visibility_name }}</p>
{{--             
        <hr>
        <a href="{{ route('help.answer.create', $help_request->id) }}" class="btn btn-primary">Répondre</a> --}}
    </x-card>

    <br />

    <x-card>
        <h1>Réponses</h1>

        <hr>

        <br />

        @forelse ($help_request->answers as $answer)

            <div>Posté par : {{ $answer->user->full_name }}</div>

            <blockquote class="blockquote">{{ $answer->content }}</blockquote>

            <hr>

        @empty

            <blockquote class="blockquote">Pas de réponses</blockquote>

        @endforelse
        
    </x-card>

    <br />

    <x-card>
        <x-card title="Répondre à la demande {{ $help_request->title }}">
            <x-form wire="answerHelp">
                <x-form.textarea field="content" label="Proposer une solution ou écrire un message" rows="15" />
                <x-form.submit label="Répondre" />
            </x-form>
        </x-card>
    </x-card>
</div>
