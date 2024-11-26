@extends('shared.layout')

@section('content')

  <div class="col-lg-10">
    <h3>Meus Eventos <a href="/user/events/create" class="btn btn-primary btn-sm">Novo Evento</a></h3>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope ="col">Capa</th>
          <th scope="col">Título</th>
          <th scope="col">Início</th>
          <th scope="col">Fim</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($events as $event)
        <tr>
          <th scope="row">{{ $event->id }}</th>
          <td><img src="{{ url('storage/app/public/cover/') . '/' . $event->cover }}" /></td>
          <td>{{ $event->title }}</td>
          <td>{{ $event->start }}</td>
          <td>{{ $event->end }}</td>
          <td>
            <form action="/user/events/destroy/{{ $event->id }}" method="POST">
              <a href="/user/events/edit/{{ $event->id }}" class="btn btn-primary btn-sm">Atualizar</a>
              
              @csrf
              @method('DELETE')

              <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Remover</button>
            </form>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>

@endsection