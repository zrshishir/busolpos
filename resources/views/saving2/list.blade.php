<h1 class="page-header">Saving2 List
    <div class="pull-right">
        <a href="javascript:ajaxLoad('saving2/create')" class="btn btn-primary pull-right"><i
                    class="glyphicon glyphicon-plus-sign"></i> New</a>
    </div>
</h1>
<div class="col-sm-7 form-group">
    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('saving2_search') }}"
               onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('saving2/list')}}?ok=1&search='+this.value)"
               placeholder="Search..."
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('{{url('saving2/list')}}?ok=1&search='+$('#search').val())"><i
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
            <a href="javascript:ajaxLoad('saving2/list?field=member_name&sort={{Session::get("saving2_sort")=="asc"?"desc":"asc"}}')">
                Name
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('saving2_field')=='member_name'?(Session::get('saving2_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('saving2/list?field=member_id&sort={{Session::get("saving2_sort")=="asc"?"desc":"asc"}}')">
                Member Id
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('saving2_field')=='member_id'?(Session::get('saving2_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('saving2/list?field=saving2_number&sort={{Session::get("saving2_sort")=="asc"?"desc":"asc"}}')">
                No of Saving2s
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('saving2_field')=='saving2_number'?(Session::get('saving2_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('saving2/list?field=saving2_amount&sort={{Session::get("saving2_sort")=="asc"?"desc":"asc"}}')">
                Saving2 Amount 
            </a>
            <i style="font-size: 12px"
               class="glyphicon  {{ Session::get('saving2_field')=='saving2_amount'?(Session::get('saving2_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
            </i>
        </th>
        <th width="140px">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1;?>
    @foreach($saving2s as $key=>$saving2)
        <tr>
            <td align="center">{{$i++}}</td>
            <td>{{$saving2->member_name}}</td>
            <td>{{$saving2->member_id}}</td>
            <td>{{$saving2->saving2_number}}</td>
            <td align="right"><!-- $  -->{{$saving2->saving2_amount}}</td>
            <td style="text-align: center">
                <a class="btn btn-primary btn-xs" title="Edit"
                   href="javascript:ajaxLoad('saving2/update/{{$saving2->id}}')">
                    <i class="glyphicon glyphicon-edit"></i> Edit</a>
                <a class="btn btn-danger btn-xs" title="Delete"
                   href="javascript:if(confirm('Are you sure want to delete?')) ajaxLoad('saving2/delete/{{$saving2->id}}')">
                    <i class="glyphicon glyphicon-trash"></i> Delete
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$saving2s->render()) !!}</div>
<div class="row">
    <i class="col-sm-12">
        Total: {{$saving2s->total()}} records
    </i>
</div>
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'));
    });
</script>