@if (Auth::guest())
@else
    <h1 class="page-header">Post Offices
        <div class="pull-right">
            <a href="javascript:ajaxLoad('postoffice/create')" class="btn btn-primary pull-right"><i
                        class="glyphicon glyphicon-plus-sign"></i>New</a>
        </div>
    </h1>
    <div class="col-sm-7 form-group">
        <div class="input-group">
            <input class="form-control" id="search" value="{{ Session::get('postoffice_search') }}"
                   onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('postoffice/list')}}?ok=1&search='+this.value)"
                   placeholder="Search..."
                   type="text">

            <div class="input-group-btn">
                <button type="button" class="btn btn-default"
                        onclick="ajaxLoad('{{url('postoffice/list')}}?ok=1&search='+$('#search').val())"><i
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
                <a href="javascript:ajaxLoad('postoffice/list?field=PostofficeName&sort={{Session::get("postoffice_sort")=="asc"?"desc":"asc"}}')">
                    Post Office 
                </a>
                <i style="font-size: 12px"
                   class="glyphicon  {{ Session::get('postoffice_field')=='PostofficeName'?(Session::get('postoffice_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </th>
            <th>
                <a href="javascript:ajaxLoad('postoffice/list?field=ThanaName&sort={{Session::get("postoffice_sort")=="asc"?"desc":"asc"}}')">
                    Pollice Station
                </a>
                <i style="font-size: 12px"
                   class="glyphicon  {{ Session::get('postoffice_field')=='ThanaName'?(Session::get('postoffice_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </th>
            <th>
                <a href="javascript:ajaxLoad('postoffice/list?field=DistrictId&sort={{Session::get("postoffice_sort")=="asc"?"desc":"asc"}}')">
                    District
                </a>
                <i style="font-size: 12px"
                   class="glyphicon  {{ Session::get('postoffice_field')=='DistrictId'?(Session::get('postoffice_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </th>
            <th>
                <a href="javascript:ajaxLoad('postoffice/list?field=DivisionId&sort={{Session::get("postoffice_sort")=="asc"?"desc":"asc"}}')">
                    Division
                </a>
                <i style="font-size: 12px"
                   class="glyphicon  {{ Session::get('postoffice_field')=='DivisionId'?(Session::get('postoffice_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </th>
            <th width="140px">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 1;
        $j = 0;
        ?>

        @foreach($postoffices as $key=>$postoffice)
            <tr>
                <td align="center">{{$i++}}</td>
                <td>{{$postoffice->PostofficeName}}</td>
                <td>{{$thana_data[$j++]->ThanaName}}</td>
                <td>{{$postoffice->DistrictId}}</td>
                <td>{{$postoffice->DivisionId}}</td>
                <td style="text-align: center">
                    {{--<a class="btn btn-primary btn-xs" title="Edit"--}}
                    {{--href="javascript:ajaxLoad('postoffice/update/{{$postoffice->id}}')">--}}
                    {{--<i class="glyphicon glyphicon-edit"></i> আপডেট</a>--}}
                    {{--<a class="btn btn-danger btn-xs" title="Delete"--}}
                    {{--href="javascript:if(confirm('Are you sure want to delete?')) ajaxLoad('postoffice/delete/{{$postoffice->id}}')">--}}
                    {{--<i class="glyphicon glyphicon-trash"></i> ডিলিট--}}
                    {{--</a>--}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="pull-right">{!! str_replace('/?','?',$postoffices->render()) !!}</div>
    <div class="row">
        <i class="col-sm-12">
            Total: {{$postoffices->total()}} records
        </i>
    </div>
    <script>
        $('.pagination a').on('click', function (event) {
            event.preventDefault();
            ajaxLoad($(this).attr('href'));
        });
    </script>
@endif