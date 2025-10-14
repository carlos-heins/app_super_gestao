@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Adicionar Produto</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width:30%; margin-left:auto; margin-right:auto;">
                <form method="post" action="{{route('produto.store')}}">
                    @csrf
                    <input type="text" name="nome" placeholder="Nome" value="" class= "borda-preta">
                    <input type="text" name="descricao" placeholder="Descrição" value="" class="borda-preta">
                    <input type="text" name="peso" placeholder="Peso" value="" class="borda-preta">

                    <select name="unidade_id" placeholder="Unidade de medida" id="">
                        <option value=""> Selecione a unidade de medida</option>
                        @foreach ($unidades as $unidade)
                            <option value="{{$unidade->id}}"> {{$unidade->descricao}}</option>
                        @endforeach
                    </select>

                    <button type="submit" class="borda-preta">Adicionar</button>
                </form>
            </div>
        </div>
    </div>

@endsection
