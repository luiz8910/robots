<div class="form-group">
    {!! Form::label("servico", "Nome do Serviço:", ["class" => "control-label"]) !!}
    {!! Form::text("nome", null, ["class" => "form-control", "placeholder" => "Nome do Serviço"]) !!}
    {{--<label class="control-label" for="permalink">Nome Do Servi&ccedil;o</label>
    <input type="text" class="form-control" name="**" placeholder="Nome do Servi&ccedil;o" />
    <input type="hidden" name="oldPermalink" value="life">--}}
</div>
{{--<div class="form-group">
    <label>Icone</label>
    <button type="button" name="icon" class="btn btn-default" data-icon="fa-tree" data-iconset="fontawesome" role="iconpicker"></button>
</div>--}}
<div class="form-group ">
    {!! Form::label("descricao", "Descrição:", ["class" => "control-label"]) !!}
    {{--<label class="control-label" for="description">Descri&ccedil;&atilde;o</label>--}}
    {!! Form::textarea("descricao", null, ["class" => "form-control", "placeholder" => "Escreva a descrição do serviço", "id" => "description", "rows" => 5]) !!}
    {{--<textarea class="form-control" id="description" name="description" placeholder="Escreva com a Descri&ccedil;&atilde;o do Servi&ccedil;os" rows="5">

    </textarea>--}}
</div>