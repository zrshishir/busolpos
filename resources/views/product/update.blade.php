<h2 class="page-header">Update Product</h2>
{!! Form::model($product,["id"=>"frm","class"=>"form-horizontal"]) !!}
@include("product._form")
{!! Form::close() !!}