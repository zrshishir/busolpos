@if (Auth::guest())
@else
    <h1 class="page-header">Months
        <div class="pull-right">
            <a href="javascript:ajaxLoad('month/create')" class="btn btn-primary pull-right"><i
                        class="glyphicon glyphicon-plus-sign"></i>New</a>
        </div>
    </h1>
    <div class="col-sm-7 form-group">
        <div class="input-group">
            <input class="form-control" id="search" value="{{ Session::get('month_search') }}"
                   onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('month/list')}}?ok=1&search='+this.value)"
                   placeholder="Search..."
                   type="text">

            <div class="input-group-btn">
                <button type="button" class="btn btn-default"
                        onclick="ajaxLoad('{{url('month/list')}}?ok=1&search='+$('#search').val())"><i
                            class="glyphicon glyphicon-search"></i>
                </button>
            </div>
        </div>
    </div>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th width="50px" style="text-align: center">Serial No</th>
            <th>
                <a href="javascript:ajaxLoad('month/list?field=MonthName&sort={{Session::get("month_sort")=="asc"?"desc":"asc"}}')">
                    Month Name
                </a>
                <i style="font-size: 12px"
                   class="glyphicon  {{ Session::get('month_field')=='MonthName'?(Session::get('month_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </th>
            <th width="140px">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 1;?>
        @foreach($months as $key=>$month)
            <tr>
                <td align="center">{{$i++}}</td>
                <td>{{$month->MonthName}}</td>
                <td style="text-align: center">
                    <a class="btn btn-primary btn-xs" title="Edit"
                    href="javascript:ajaxLoad('month/update/{{$month->id}}')">
                    <i class="glyphicon glyphicon-edit"></i> edit</a>
                    <a class="btn btn-danger btn-xs" title="Delete"
                    href="javascript:if(confirm('Are you sure want to delete?')) ajaxLoad('month/delete/{{$month->id}}')">
                    <i class="glyphicon glyphicon-trash"></i> delete
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="pull-right">{!! str_replace('/?','?',$months->render()) !!}</div>
    <div class="row">
        <i class="col-sm-12">
            Total: {{$months->total()}} records
        </i>
    </div>
    <script>
        $('.pagination a').on('click', function (event) {
            event.preventDefault();
            ajaxLoad($(this).attr('href'));
        });
    </script>
@endif