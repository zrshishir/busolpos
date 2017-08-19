<h1 class="page-header">Branch Product List
    <div class="pull-right">
        <a href="javascript:ajaxLoad('branchproduct/create')" class="btn btn-primary pull-right"><i
                    class="glyphicon glyphicon-plus-sign"></i> New</a>
    </div>
</h1>
<div class="col-sm-7 form-group">
    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('branchproduct_search') }}"
               onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('branchproduct/list')}}?ok=1&search='+this.value)"
               placeholder="Search..."
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('{{url('branchproduct/list')}}?ok=1&search='+$('#search').val())"><i
                        class="glyphicon glyphicon-search"></i>
            </button>
        </div>
    </div>
</div>
<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th width="50px" style="text-align: center">No</th>
        <th>
            <a href="javascript:ajaxLoad('branchproduct/list?field=branch_id&sort={{Session::get("branchproduct_sort")=="asc"?"desc":"asc"}}')">
               Branch
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('branchproduct_field')=='branch_id'?(Session::get('branchproduct_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('branchproduct/list?field=product_id&sort={{Session::get("branchproduct_sort")=="asc"?"desc":"asc"}}')">
                Product
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('branchproduct_field')=='quantity'?(Session::get('branchproduct_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
       <th>
            <a href="javascript:ajaxLoad('branchproduct/list?field=quantity&sort={{Session::get("branchproduct_sort")=="asc"?"desc":"asc"}}')">
                Quantity
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('branchproduct_field')=='quantity'?(Session::get('branchproduct_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('branchproduct/list?field=unit&sort={{Session::get("branchproduct_sort")=="asc"?"desc":"asc"}}')">
                Unit
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('branchproduct_field')=='unit'?(Session::get('branchproduct_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th width="140px">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
    @foreach($branchproducts as $key=>$branchproduct)
        <tr>
            <td align="center">{{$i++}}</td>
            <td>{{$branchproduct->branch_id}}</td>
            <td>{{$branchproduct->product_id}}</td>
            <td>{{$branchproduct->quantity}}</td>
            <td>{{$branchproduct->unit}}</td>
            <td style="text-align: center">
                <a class="btn btn-primary btn-xs" title="Edit"
                 href="javascript:ajaxLoad('branchproduct/update/{{$branchproduct->id}}')">
                <i class="glyphicon glyphicon-edit"></i> Edit</a>
                <a class="btn btn-danger btn-xs" title="Delete"
                href="javascript:if(confirm('Are you sure want to delete?')) ajaxLoad('branchproduct/delete/{{$branchproduct->id}}')">
                <i class="glyphicon glyphicon-trash"></i> Delete
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$branchproducts->render()) !!}</div>
<div class="row">
    <i class="col-sm-12">
        Total: {{$branchproducts->total()}} records
    </i>
</div>
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'));
    });
</script>