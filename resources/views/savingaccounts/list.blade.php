@if (Auth::guest())
@else
    <h1 class="page-header">Saving Accounts
        <div class="pull-right">
            <a href="javascript:ajaxLoad('savingaccounts/create')" class="btn btn-primary pull-right"><i
                        class="glyphicon glyphicon-plus-sign"></i>New</a>
        </div>
    </h1>
    <div class="col-sm-7 form-group">
        <div class="input-group">
            <input class="form-control" id="search" value="{{ Session::get('savingaccounts_search') }}"
                   onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('savingaccounts/list')}}?ok=1&search='+this.value)"
                   placeholder="Search..."
                   type="text">

            <div class="input-group-btn">
                <button type="button" class="btn btn-default"
                        onclick="ajaxLoad('{{url('savingaccounts/list')}}?ok=1&search='+$('#search').val())"><i
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
                <a href="javascript:ajaxLoad('savingaccounts/list?field=AccountCode&sort={{Session::get("savingaccounts_sort")=="asc"?"desc":"asc"}}')">
                    Account Code
                </a>
                <i style="font-size: 12px"
                   class="glyphicon  {{ Session::get('savingaccounts_field')=='AccountCode'?(Session::get('savingaccounts_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </th>
            <th>
                <a href="javascript:ajaxLoad('savingaccounts/list?field=AccountType&sort={{Session::get("savingaccounts_sort")=="asc"?"desc":"asc"}}')">
                    Name
                </a>
                <i style="font-size: 12px"
                   class="glyphicon  {{ Session::get('savingaccounts_field')=='AccountType'?(Session::get('savingaccounts_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </th>
            <th width="140px">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 1;?>
        @foreach($savingaccountss as $key=>$savingaccounts)
            <tr>
                <td align="center">{{$i++}}</td>
                <td>{{$savingaccounts->AccountCode}}</td>
                <td>{{$savingaccounts->AccountType}}</td>
                <td style="text-align: center">
                    <a class="btn btn-primary btn-xs" title="Edit"
                    href="javascript:ajaxLoad('savingaccounts/update/{{$savingaccounts->id}}')">
                    <i class="glyphicon glyphicon-edit"></i> edit</a>
                    <a class="btn btn-danger btn-xs" title="Delete"
                    href="javascript:if(confirm('Are you sure want to delete?')) ajaxLoad('savingaccounts/delete/{{$savingaccounts->id}}')">
                    <i class="glyphicon glyphicon-trash"></i> delete
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="pull-right">{!! str_replace('/?','?',$savingaccountss->render()) !!}</div>
    <div class="row">
        <i class="col-sm-12">
            Total: {{$savingaccountss->total()}} records
        </i>
    </div>
    <script>
        $('.pagination a').on('click', function (event) {
            event.preventDefault();
            ajaxLoad($(this).attr('href'));
        });
    </script>
@endif