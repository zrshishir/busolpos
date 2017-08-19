@if(Auth::guest())
@else
<h1 class="page-header">Money Receipt List for Saving
    <div class="pull-right">
        <a href="javascript:ajaxLoad('savingsmoneyreceipt/create')" class="btn btn-primary pull-right"><i
                    class="glyphicon glyphicon-plus-sign"></i> New</a>
    </div>
</h1>
<div class="col-sm-7 form-group">
    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('savingsmoneyreceipt_search') }}"
               onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('savingsmoneyreceipt/list')}}?ok=1&search='+this.value)"
               placeholder="Search..."
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('{{url('savingsmoneyreceipt/list')}}?ok=1&search='+$('#search').val())"><i
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
            <a href="javascript:ajaxLoad('savingsmoneyreceipt/list?field=name&sort={{Session::get("savingsmoneyreceipt")=="asc"?"desc":"asc"}}')">
                name
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('savingsmoneyreceipt_field')=='name'?(Session::get('savingsmoneyreceipt_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('savingsmoneyreceipt/list?field=savingsmoneyreceiptCode&sort={{Session::get("savingsmoneyreceipt")=="asc"?"desc":"asc"}}')">
                Member Id
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('savingsmoneyreceipt_field')=='savingsmoneyreceiptCode'?(Session::get('savingsmoneyreceipt_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('savingsmoneyreceipt/list?field=unitprice&sort={{Session::get("savingsmoneyreceipt_sort")=="asc"?"desc":"asc"}}')">
                Form Price
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('savingsmoneyreceipt_field')=='unitprice'?(Session::get('savingsmoneyreceipt_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th width="140px">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
    @foreach($savingsmoneyreceipts as $key=>$savingsmoneyreceipt)
        <tr>
            <td align="center">{{$i++}}</td>
            <td>{{$savingsmoneyreceipt->CSMId}}</td>
            <td>{{$savingsmoneyreceipt->name}}</td>
            <td>{{$savingsmoneyreceipt->saving_amount}}</td>
           <!--  <td align="right">$ {{$loanapplicationmoneyreceipt->unitprice}}</td>
            <td align="right">$ {{$loanapplicationmoneyreceipt->unitprice}}</td> -->
            <td style="text-align: center">
                <a class="btn btn-primary btn-xs" title="Edit"
                   href="javascript:ajaxLoad('savingsmoneyreceipt/update/{{$savingsmoneyreceipt->id}}')">
                    <i class="glyphicon glyphicon-edit"></i> Edit</a>
                <a class="btn btn-danger btn-xs" title="Delete"
                   href="javascript:if(confirm('Are you sure want to delete?')) ajaxLoad('savingsmoneyreceipt/delete/{{$savingsmoneyreceipt->id}}')">
                    <i class="glyphicon glyphicon-trash"></i> Delete
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$savingsmoneyreceipts->render()) !!}</div>
<div class="row">
    <i class="col-sm-12">
        Total: {{$savingsmoneyreceipts->total()}} records
    </i>
</div>
@endif
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'));
    });
</script>