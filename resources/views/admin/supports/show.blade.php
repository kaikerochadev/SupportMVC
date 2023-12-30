@extends('admin/layouts/app')

@section('title', "Detalhes da Dúvida {$support->subject}")

@section('header')
<a href="{{route('supports.index') }}" class="px-5 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg gap-x-2 sm:w-auto dark:hover:bg-gray-800 dark:bg-gray-900 hover:bg-gray-100 dark:text-gray-200 dark:border-gray-700 mb-4">Voltar para as dúvidas</a>

<h1 class="text-lg text-black-500 mt-4">Dúvida: {{ $support->subject }}</h1>
@endsection

@section('content')

<ul>
    <li>Assunto: {{ $support->subject }}</li>
    <li>Status: {{ $support->status }}</li>
    <li>Descrição: {{ $support->body }}</li>
</ul>
<form action="{{ route('supports.destroy', $support->id) }}" method="post">
    @csrf()
    @method('DELETE')
    <button type="submit" class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded mt-4">Deletar</button>
</form>

@endsection