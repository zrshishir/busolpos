@if (Auth::guest())
@else
    <h1 class="page-header">Pollice Stations
        <div class="pull-right">
            <a href="javascript:ajaxLoad('thana/create')" class="btn btn-primary pull-right"><i
                        class="glyphicon glyphicon-plus-sign"></i>New</a>
        </div>
    </h1>
    <div class="col-sm-7 form-group">
        <div class="input-group">
            <input class="form-control" id="search" value="{{ Session::get('thana_search') }}"
                   onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('thana/list')}}?ok=1&search='+this.value)"
                   placeholder="Search..."
                   type="text">

            <div class="input-group-btn">
                <button type="button" class="btn btn-default"
                        onclick="ajaxLoad('{{url('thana/list')}}?ok=1&search='+$('#search').val())"><i
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
                <a href="javascript:ajaxLoad('thana/list?field=ThanaName&sort={{Session::get("thana_sort")=="asc"?"desc":"asc"}}')">
                    Pollice Station 
                </a>
                <i style="font-size: 12px"
                   class="glyphicon  {{ Session::get('thana_field')=='ThanaName'?(Session::get('thana_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </th>
            <th>
                <a href="javascript:ajaxLoad('thana/list?field=ThanaNameBangla&sort={{Session::get("thana_sort")=="asc"?"desc":"asc"}}')">
                    Name in Bangla
                </a>
                <i style="font-size: 12px"
                   class="glyphicon  {{ Session::get('thana_field')=='ThanaNameBangla'?(Session::get('thana_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </th>
            <th>
                <a href="javascript:ajaxLoad('thana/list?field=DistrictName&sort={{Session::get("thana_sort")=="asc"?"desc":"asc"}}')">
                    District
                </a>
                <i style="font-size: 12px"
                   class="glyphicon  {{ Session::get('thana_field')=='DistrictName'?(Session::get('thana_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </th>
            <th width="140px">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 1;
        $k = 0;
        ?>
        @foreach($ThanaInfo as $key=>$thana)
            <tr>
                <td align="center">{{$i++}}</td>
                <td>{{$thana->ThanaName}}</td>
                <td>{{$thana->ThanaNameBangla}}</td>
                <td>{{$thana->DistrictName}}</td>
                {{--<td>{{$thana->DistrictId}}</td>--}}
                <td style="text-align: center">
                <a class="btn btn-primary btn-xs" title="Edit"
                href="javascript:ajaxLoad('thana/update/{{$thana->id}}')">
                <i class="glyphicon glyphicon-edit"></i> update</a>
                <a class="btn btn-danger btn-xs" title="Delete"
                href="javascript:if(confirm('Are you sure want to delete?')) ajaxLoad('thana/delete/{{$thana->id}}')">
                <i class="glyphicon glyphicon-trash"></i> delete
                </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="pull-right">{!! str_replace('/?','?',$thanas->render()) !!}</div>
    <div class="row">
        <i class="col-sm-12">
            Total: {{$thanas->total()}} records
        </i>
    </div>
    <script>
        $('.pagination a').on('click', function (event) {
            event.preventDefault();
            ajaxLoad($(this).attr('href'));
        });
    </script>
@endif