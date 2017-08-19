<h2 class="page-header">Edit Category</h2>
{!! Form::model($category,["id"=>"frm","class"=>"form-horizontal"]) !!}
@include("category._form")
{!! Form::close() !!}