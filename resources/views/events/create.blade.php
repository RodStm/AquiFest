@extends('layouts.main')

@section('title', 'Criar Festival')

@section('content')

    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Crie o seu Festival</h1>
        <form id="create-event" action="/events" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="image">Imagem do Festival:</label>
                <input type="file" id="image" name="image" class="from-control-file">
            </div>
            <div class="form-group">
                <label for="title">Festivais:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Nome do Festival">
            </div>
            <div class="form-group">
                <label for="date">Data do Festival:</label>
                <input type="date" class="form-control" id="date" name="date">
            </div>
            <div class="form-group">
                <label for="title">Cidade:</label>

                <input type="text" class="form-control" id="city" name="city" placeholder="Local do Festival">
            </div>
            <div class="form-group">
                <label for="title">O Evento é privado?</label>
                <select name="private" id="private" class="form-control">
                    <option value="0">Não</option>
                    <option value="1">Sim</option>
                </select>
            </div>
            <div class="form-group">
                <label for="title">Descrição:</label>
                <textarea name="description" id="description" class="form-control" placeholder="O que vai acontecer no Festival?"></textarea>
            </div>
            <div class="form-group">
                <label for="title">Adicione itens de infraestrutura</label>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Cadeiras"> Cadeiras
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Palco"> Palco
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Cerveja Grátis"> Cerveja Grátis
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Comida de Graça"> Comida de Graça
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Brindes"> Brindes
                </div>
            </div>
            <input type="submit" class="btn btn-primary" value="Criar Festival">
        </form>
    </div>

    <style>
        .ui-autocomplete {
            max-height: 100px;
            overflow-y: auto;
            /* prevent horizontal scrollbar */
            overflow-x: hidden;
        }

        /* IE 6 doesn't support max-height
       * we use height instead, but this forces the menu to always be this tall
       */
        * html .ui-autocomplete {
            height: 100px;
        }
    </style>

    <script type="text/javascript">
        $('#city').autocomplete({
            minLength: 1,
            autoFocus: true,
            delay: 300,
            appendTo: '#create-event',
            source: function(request, response) {
                $.ajax({
                    url: `/api/city/${request.term}`,
                    dataType: 'json',
                    type: 'get',
                    success: function(data) {
                        const {
                            cities
                        } = data ?? {}
                        if (cities?.length > 0) {
                            response($.map(cities, function(city, key) {
                                return {
                                    label: city.name,
                                    value: city.name
                                };
                            }));
                        }
                    }
                })
            }
        });
    </script>

@endsection
