@if (Auth::guest())
@else
    <h1 class="page-header">Districts
        <div class="pull-right">
            <a href="javascript:ajaxLoad('district/create')" class="btn btn-primary pull-right"><i
                        class="glyphicon glyphicon-plus-sign"></i>New</a>
        </div>
    </h1>
    <div class="col-sm-7 form-group">
        <div class="input-group">
            <input class="form-control" id="search" value="{{ Session::get('district_search') }}"
                   onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('district/list')}}?ok=1&search='+this.value)"
                   placeholder="Search..."
                   type="text">

            <div class="input-group-btn">
                <button type="button" class="btn btn-default"
                        onclick="ajaxLoad('{{url('district/list')}}?ok=1&search='+$('#search').val())"><i
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
                <a href="javascript:ajaxLoad('district/list?field=DistrictName&sort={{Session::get("district_sort")=="asc"?"desc":"asc"}}')">
                    District
                </a>
                <i style="font-size: 12px"
                   class="glyphicon  {{ Session::get('district_field')=='DistrictName'?(Session::get('district_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </th>
            <th>
                <a href="javascript:ajaxLoad('district/list?field=DistrictNameBangla&sort={{Session::get("district_sort")=="asc"?"desc":"asc"}}')">
                    District in Bangla
                </a>
                <i style="font-size: 12px"
                   class="glyphicon  {{ Session::get('district_field')=='DistrictNameBangla'?(Session::get('district_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </th>

            <th>
                <a href="javascript:ajaxLoad('district/list?field=DivisionName&sort={{Session::get("district_sort")=="asc"?"desc":"asc"}}')">
                    Division
                </a>
                <i style="font-size: 12px"
                   class="glyphicon  {{ Session::get('district_field')=='DivisionName'?(Session::get('district_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </th>
            <th>
                <a href="javascript:ajaxLoad('district/list?field=Website&sort={{Session::get("district_sort")=="asc"?"desc":"asc"}}')">
                    Website
                </a>
                <i style="font-size: 12px"
                   class="glyphicon  {{ Session::get('district_field')=='Website'?(Session::get('district_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </th>
            <th width="140px">Actions</th>
        </tr>

        </thead>
        <tbody>
        <?php $i = 1;
        $j = 0;?>
        @foreach($DistrictInfo as $key=>$district)
            <tr>
                <td align="center">{{$i++}}</td>
                <td>{{$district->DistrictName}}</td>
                <td>{{$district->DistrictNameBangla}}</td>
                <td>{{$district->DivisionName}}</td>
                <td>{{$district->Website}}</td>
                <td style="text-align: center">
                <a class="btn btn-primary btn-xs" title="Edit"
                href="javascript:ajaxLoad('district/update/{{$district->id}}')">
                <i class="glyphicon glyphicon-edit"></i> update</a>
                <a class="btn btn-danger btn-xs" title="Delete"
                href="javascript:if(confirm('Are you sure want to delete?')) ajaxLoad('district/delete/{{$district->id}}')">
                <i class="glyphicon glyphicon-trash"></i> delete
                </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="pull-right">{!! str_replace('/?','?',$districts->render()) !!}</div>
    <div class="row">
        <i class="col-sm-12">
            Total: {{$districts->total()}} records
        </i>
    </div>
    <script>
        $('.pagination a').on('click', function (event) {
            event.preventDefault();
            ajaxLoad($(this).attr('href'));
        });
    </script>
@endif