@extends('shared.layout')

@section('content')

<div class="col-lg-4">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Novo evento</h3>
        </div>
        <div class="card-body">
            @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
            @endif
            <form action="/user/events/store" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Título</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Título" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Descrição</label>
                    <input type="text" name="description" class="form-control" id="description" placeholder="Digite aqui mais informações sobre o evento" required>
                </div>
                <div class="mb-3">
                    <label for="cover" class="form-label">Capa do evento</label>
                    <input type="file" name="cover" class="form-control" id="cover" placeholder="Foto da capa">
                </div>
                <div class="mb-3">
                    <label for="start" class="form-label">Data início</label>
                    <input type="date" name="start" class="form-control" id="start" required>
                </div>
                <div class="mb-3">
                    <label for="end" class="form-label">Data fim</label>
                    <input type="date" name="end" class="form-control" id="end" required>
                </div>
                <div class="mb-3">
                    <div class="d-grid">
                        <button class="btn btn-primary">Cadastrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>

@endsection