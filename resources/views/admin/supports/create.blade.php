<h1>Nova Dúvida</h1>

<x-alert/>

<a href="{{route('supports.index') }}">Voltar para as dúvidas</a>

<form action="{{ route('supports.store') }}" method="POST">
    @include('admin.supports.partials.form');
</form>