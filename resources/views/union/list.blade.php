@if (Auth::guest())
@else
    <h1 class="page-header">Unions
        <div class="pull-right">
            <a href="javascript:ajaxLoad('union/create')" class="btn btn-primary pull-right"><i
                        class="glyphicon glyphicon-plus-sign"></i>New</a>
        </div>
    </h1>
    <div class="col-sm-7 form-group">
        <div class="input-group">
            <input class="form-control" id="search" value="{{ Session::get('union_search') }}"
                   onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('union/list')}}?ok=1&search='+this.value)"
                   placeholder="Search..."
                   type="text">

            <div class="input-group-btn">
                <button type="button" class="btn btn-default"
                        onclick="ajaxLoad('{{url('union/list')}}?ok=1&search='+$('#search').val())"><i
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
                <a href="javascript:ajaxLoad('union/list?field=UnionName&sort={{Session::get("union_sort")=="asc"?"desc":"asc"}}')">
                    Union Name
                </a>
                <i style="font-size: 12px"
                   class="glyphicon  {{ Session::get('union_field')=='UnionName'?(Session::get('union_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </th>
            <th>
                <a href="javascript:ajaxLoad('union/list?field=ThanaName&sort={{Session::get("union_sort")=="asc"?"desc":"asc"}}')">
                    Pollice Station
                </a>
                <i style="font-size: 12px"
                   class="glyphicon  {{ Session::get('union_field')=='ThanaName'?(Session::get('union_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </th>
            <th>
                <a href="javascript:ajaxLoad('union/list?field=DistrictId&sort={{Session::get("union_sort")=="asc"?"desc":"asc"}}')">
                    District
                </a>
                <i style="font-size: 12px"
                   class="glyphicon  {{ Session::get('union_field')=='DistrictId'?(Session::get('union_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </th>
            <th>
                <a href="javascript:ajaxLoad('union/list?field=DivisionId&sort={{Session::get("union_sort")=="asc"?"desc":"asc"}}')">
                    Division
                </a>
                <i style="font-size: 12px"
                   class="glyphicon  {{ Session::get('union_field')=='DivisionId'?(Session::get('union_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </th>


            <th width="140px">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 1;
        $j = 0;
        ?>
        @foreach($UnionInfo as $key=>$union)
            <tr>
                <td align="center">{{$i++}}</td>
                <td>{{$union->UnionName}}</td>
                <td>{{$union->ThanaName}}</td>
                <td>{{$union->DistrictName}}</td>
                <td>{{$union->DivisionName}}</td>
                {{--<td style="text-align: center">--}}
                {{--<a class="btn btn-primary btn-xs" title="Edit"--}}
                {{--href="javascript:ajaxLoad('union/update/{{$union->id}}')">--}}
                {{--<i class="glyphicon glyphicon-edit"></i> আপডেট</a>--}}
                {{--<a class="btn btn-danger btn-xs" title="Delete"--}}
                {{--href="javascript:if(confirm('Are you sure want to delete?')) ajaxLoad('union/delete/{{$union->id}}')">--}}
                {{--<i class="glyphicon glyphicon-trash"></i> ডিলিট--}}
                {{--</a>--}}
                {{--</td>--}}
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="pull-right">{!! str_replace('/?','?',$unions->render()) !!}</div>
    <div class="row">
        <i class="col-sm-12">
            Total: {{$unions->total()}} records
        </i>
    </div>
    <script>
        $('.pagination a').on('click', function (event) {
            event.preventDefault();
            ajaxLoad($(this).attr('href'));
        });
    </script>
@endif