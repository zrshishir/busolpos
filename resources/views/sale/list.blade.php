<h1 class="page-header">Purchage List
    <div class="pull-right">
        <a href="javascript:ajaxLoad('sale/create')" class="btn btn-primary pull-right"><i
                    class="glyphicon glyphicon-plus-sign"></i> New</a>
    </div>
</h1>
<div class="col-sm-7 form-group">
    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('sale_search') }}"
               onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('sale/list')}}?ok=1&search='+this.value)"
               placeholder="Search..."
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('{{url('sale/list')}}?ok=1&search='+$('#search').val())"><i
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
            <a href="javascript:ajaxLoad('sale/list?field=branch_id&sort={{Session::get("sale_sort")=="asc"?"desc":"asc"}}')">
                Branch Name
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('sale_field')=='branch_id'?(Session::get('sale_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('sale/list?field=branch_product_id&sort={{Session::get("sale_sort")=="asc"?"desc":"asc"}}')">
                Product for Branch
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('sale_field')=='branch_product_id'?(Session::get('sale_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('sale/list?field=quantity&sort={{Session::get("sale_sort")=="asc"?"desc":"asc"}}')">
               Quantity
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('sale_field')=='quantity'?(Session::get('sale_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('sale/list?field=unit&sort={{Session::get("sale_sort")=="asc"?"desc":"asc"}}')">
                Unit
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('sale_field')=='unit'?(Session::get('sale_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('sale/list?field=date&sort={{Session::get("sale_sort")=="asc"?"desc":"asc"}}')">
                Date
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('sale_field')=='date'?(Session::get('sale_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('sale/list?field=cost&sort={{Session::get("sale_sort")=="asc"?"desc":"asc"}}')">
                Cost
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('sale_field')=='cost'?(Session::get('sale_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('sale/list?field=sell_price&sort={{Session::get("sale_sort")=="asc"?"desc":"asc"}}')">
                Sell Price
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('sale_field')=='sell_price'?(Session::get('sale_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
       
        <th width="140px">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
    @foreach($sales as $key=>$sale)
        <tr>
            <td align="center">{{$i++}}</td>
            <td>{{$sale->branch_id}}</td>
            <td>{{$sale->branch_product_id}}</td>
            <td>{{$sale->quantity}}</td>
            <td>{{$sale->unit}}</td>
            <td>{{$sale->date}}</td>
            <td>{{$sale->cost}}</td>
            <td>{{$sale->sell_price}}</td>
            <td style="text-align: center">
                <a class="btn btn-primary btn-xs" title="Edit"
                 href="javascript:ajaxLoad('sale/update/{{$sale->id}}')">
                <i class="glyphicon glyphicon-edit"></i> Edit</a>
                <a class="btn btn-danger btn-xs" title="Delete"
                href="javascript:if(confirm('Are you sure want to delete?')) ajaxLoad('sale/delete/{{$sale->id}}')">
                <i class="glyphicon glyphicon-trash"></i> Delete
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$sales->render()) !!}</div>
<div class="row">
    <i class="col-sm-12">
        Total: {{$sales->total()}} records
    </i>
</div>
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'));
    });
</script>