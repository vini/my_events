@extends('shared.layout')

@section('content')

<div class="col-lg-4">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Login</h3>
      </div>

      <div class="card-body">
      @if(Session::has('error'))
        <div class="alert alert-danger" role="alert">
        {{ Session::get('error') }}
        </div>
      @endif
        <form action="{{ route('login') }}" method="POST">
        @csrf
          <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="email@exemplo.com" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" name="password" class="form-control" id="password" required>
          </div>
          <div class="mb-3">
            <div class="d-grid">
              <button class="btn btn-primary">Entrar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
