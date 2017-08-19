<h2 class="page-header">Edit Sale</h2>
{!! Form::model($sale,["id"=>"frm","class"=>"form-horizontal"]) !!}
@include("sale._form")
{!! Form::close() !!}