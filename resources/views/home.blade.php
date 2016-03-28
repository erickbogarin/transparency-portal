@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Informações da conta 
                    <a class="btn btn-link pull-right" href="<% url('/password/reset') %>">Redefinir sua senha</a>
                </div>

                <div class="panel-body">
                    <form>
                        <div class="form-group">
                            <label for="name">Nome:</label>
                            <input type="text" class="form-control" id="name" disabled value="<%auth()->user()->name%>">
                        </div>
                        <div class="form-group">
                            <label for="email">E-Mail:</label>
                            <input type="email" class="form-control" id="email" disabled value="<%auth()->user()->email%>">
                        </div>
                        @if(auth()->user()->conta == 'ADMIN')
                        <div class="form-group">
                            <label for="conta">Conta:</label>
                            <input type="string" class="form-control" id="conta" disabled value="Administrador">
                        </div>
                        @else
                        <div class="form-group">
                            <label for="conta">Município:</label>
                            <input type="string" class="form-control" id="conta" disabled value="<%auth()->user()->municipio->nome%>">
                        </div>
                        <div class="form-group">
                            <label for="conta">Orgão:</label>
                            <input type="string" class="form-control" id="conta" disabled value="<%auth()->user()->orgao->nome%>">
                        </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
