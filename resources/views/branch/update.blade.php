<h2 class="page-header">Edit Branch</h2>
{!! Form::model($branch,["id"=>"frm","class"=>"form-horizontal"]) !!}
@include("branch._form")
{!! Form::close() !!}