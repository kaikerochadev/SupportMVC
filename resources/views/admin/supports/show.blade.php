<h1>Detalhes da dúvida{{ $support->id }}</h1>

<a href="{{route('supports.index') }}">Voltar para as dúvidas</a>

<ul>
    <li>Assunto: {{$support->subject}}</li>
    <li>Status: {{$support->status}}</li>
    <li>Descrição: {{$support->body}}</li>
</ul>