@extends('admin/layouts/app')


@section('header')
<a href="{{route('supports.index') }}" class="px-5 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg gap-x-2 sm:w-auto dark:hover:bg-gray-800 dark:bg-gray-900 hover:bg-gray-100 dark:text-gray-200 dark:border-gray-700 mb-4">Voltar para as dúvidas</a>

<h1 class="text-lg text-black-500 mt-4">Nova Dúvida</h1>
@endsection

@section('content')


@section('title', 'Criar Novo Tópico')

<form action="{{ route('supports.store') }}" method="POST">
    @include('admin.supports.partials.form');
</form>

@endsection