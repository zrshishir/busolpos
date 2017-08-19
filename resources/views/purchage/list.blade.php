<h1 class="page-header">Purchage List
    <div class="pull-right">
        <a href="javascript:ajaxLoad('purchage/create')" class="btn btn-primary pull-right"><i
                    class="glyphicon glyphicon-plus-sign"></i> New</a>
    </div>
</h1>
<div class="col-sm-7 form-group">
    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('purchage_search') }}"
               onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('purchage/list')}}?ok=1&search='+this.value)"
               placeholder="Search..."
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('{{url('purchage/list')}}?ok=1&search='+$('#search').val())"><i
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
            <a href="javascript:ajaxLoad('purchage/list?field=branch_id&sort={{Session::get("purchage_sort")=="asc"?"desc":"asc"}}')">
                Branch Name
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('purchage_field')=='branch_id'?(Session::get('purchage_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('purchage/list?field=branch_product_id&sort={{Session::get("purchage_sort")=="asc"?"desc":"asc"}}')">
                Product for Branch
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('purchage_field')=='branch_product_id'?(Session::get('purchage_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('purchage/list?field=quantity&sort={{Session::get("purchage_sort")=="asc"?"desc":"asc"}}')">
               Quantity
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('purchage_field')=='quantity'?(Session::get('purchage_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('purchage/list?field=unit&sort={{Session::get("purchage_sort")=="asc"?"desc":"asc"}}')">
                Unit
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('purchage_field')=='unit'?(Session::get('purchage_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('purchage/list?field=date&sort={{Session::get("purchage_sort")=="asc"?"desc":"asc"}}')">
                Date
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('purchage_field')=='date'?(Session::get('purchage_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('purchage/list?field=cost&sort={{Session::get("purchage_sort")=="asc"?"desc":"asc"}}')">
                Cost
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('purchage_field')=='cost'?(Session::get('purchage_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('purchage/list?field=sell_price&sort={{Session::get("purchage_sort")=="asc"?"desc":"asc"}}')">
                Sell Price
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('purchage_field')=='sell_price'?(Session::get('purchage_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
       
        <th width="140px">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
    @foreach($purchages as $key=>$purchage)
        <tr>
            <td align="center">{{$i++}}</td>
            <td>{{$purchage->branch_id}}</td>
            <td>{{$purchage->branch_product_id}}</td>
            <td>{{$purchage->quantity}}</td>
            <td>{{$purchage->unit}}</td>
            <td>{{$purchage->date}}</td>
            <td>{{$purchage->cost}}</td>
            <td>{{$purchage->sell_price}}</td>
            <td style="text-align: center">
                <a class="btn btn-primary btn-xs" title="Edit"
                 href="javascript:ajaxLoad('purchage/update/{{$purchage->id}}')">
                <i class="glyphicon glyphicon-edit"></i> Edit</a>
                <a class="btn btn-danger btn-xs" title="Delete"
                href="javascript:if(confirm('Are you sure want to delete?')) ajaxLoad('purchage/delete/{{$purchage->id}}')">
                <i class="glyphicon glyphicon-trash"></i> Delete
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$purchages->render()) !!}</div>
<div class="row">
    <i class="col-sm-12">
        Total: {{$purchages->total()}} records
    </i>
</div>
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'));
    });
</script>