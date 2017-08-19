@if (Auth::guest())
@else
    <h1 class="page-header">Wards
        <div class="pull-right">
            <a href="javascript:ajaxLoad('ward/create')" class="btn btn-primary pull-right"><i
                        class="glyphicon glyphicon-plus-sign"></i>New</a>
        </div>
    </h1>
    <div class="col-sm-7 form-group">
        <div class="input-group">
            <input class="form-control" id="search" value="{{ Session::get('ward_search') }}"
                   onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('ward/list')}}?ok=1&search='+this.value)"
                   placeholder="Search..."
                   type="text">

            <div class="input-group-btn">
                <button type="button" class="btn btn-default"
                        onclick="ajaxLoad('{{url('ward/list')}}?ok=1&search='+$('#search').val())"><i
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
                <a href="javascript:ajaxLoad('ward/list?field=WardName&sort={{Session::get("ward_sort")=="asc"?"desc":"asc"}}')">
                    Ward Name
                </a>
                <i style="font-size: 12px"
                   class="glyphicon  {{ Session::get('ward_field')=='WardName'?(Session::get('ward_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </th>
            <th>
                <a href="javascript:ajaxLoad('ward/list?field=UnionName&sort={{Session::get("ward_sort")=="asc"?"desc":"asc"}}')">
                    Union
                </a>
                <i style="font-size: 12px"
                   class="glyphicon  {{ Session::get('ward_field')=='UnionName'?(Session::get('ward_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </th>
            <th>
                <a href="javascript:ajaxLoad('ward/list?field=ThanaId&sort={{Session::get("ward_sort")=="asc"?"desc":"asc"}}')">
                    Pollice Station
                </a>
                <i style="font-size: 12px"
                   class="glyphicon  {{ Session::get('ward_field')=='ThanaId'?(Session::get('ward_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </th>
            <th>
                <a href="javascript:ajaxLoad('ward/list?field=DistrictId&sort={{Session::get("ward_sort")=="asc"?"desc":"asc"}}')">
                    District
                </a>
                <i style="font-size: 12px"
                   class="glyphicon  {{ Session::get('ward_field')=='DistrictId'?(Session::get('ward_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </th>
            <th>
                <a href="javascript:ajaxLoad('ward/list?field=DivisionId&sort={{Session::get("ward_sort")=="asc"?"desc":"asc"}}')">
                    Division
                </a>
                <i style="font-size: 12px"
                   class="glyphicon  {{ Session::get('ward_field')=='DivisionId'?(Session::get('ward_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </th>
            <th width="140px">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 1;
        $j = 0;
        ?>
        @foreach($wards as $key=>$ward)
            <tr>
                <td align="center">{{$i++}}</td>
                <td>{{$ward->WardName}}</td>
                <td>{{$union_data[$j++]->UnionName}}</td>
                <td>{{$ward->ThanaId}}</td>
                <td>{{$ward->DistrictId}}</td>
                <td>{{$ward->DivisionId}}</td>
                <td style="text-align: center">
                    {{--<a class="btn btn-primary btn-xs" title="Edit"--}}
                    {{--href="javascript:ajaxLoad('ward/update/{{$ward->id}}')">--}}
                    {{--<i class="glyphicon glyphicon-edit"></i> আপডেট</a>--}}
                    {{--<a class="btn btn-danger btn-xs" title="Delete"--}}
                    {{--href="javascript:if(confirm('Are you sure want to delete?')) ajaxLoad('ward/delete/{{$ward->id}}')">--}}
                    {{--<i class="glyphicon glyphicon-trash"></i> ডিলিট--}}
                    {{--</a>--}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="pull-right">{!! str_replace('/?','?',$wards->render()) !!}</div>
    <div class="row">
        <i class="col-sm-12">
            Total: {{$wards->total()}} records
        </i>
    </div>
    <script>
        $('.pagination a').on('click', function (event) {
            event.preventDefault();
            ajaxLoad($(this).attr('href'));
        });
    </script>
@endif