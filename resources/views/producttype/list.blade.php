@if (Auth::guest())
@else
    <h1 class="page-header">Product Type List
        <div class="pull-right">
            <a href="javascript:ajaxLoad('producttype/create')" class="btn btn-primary pull-right"><i
                        class="glyphicon glyphicon-plus-sign"></i>New</a>
        </div>
    </h1>
    <div class="col-sm-7 form-group">
        <div class="input-group">
            <input class="form-control" id="search" value="{{ Session::get('producttype_search') }}"
                   onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('producttype/list')}}?ok=1&search='+this.value)"
                   placeholder="Search..."
                   type="text">

            <div class="input-group-btn">
                <button type="button" class="btn btn-default"
                        onclick="ajaxLoad('{{url('producttype/list')}}?ok=1&search='+$('#search').val())"><i
                            class="glyphicon glyphicon-search"></i>
                </button>
            </div>
        </div>
    </div>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th width="50px" style="text-align: center">ক্রমিক নং</th>
            <th>
                <a href="javascript:ajaxLoad('producttype/list?field=ProducttypeyName&sort={{Session::get("producttype_sort")=="asc"?"desc":"asc"}}')">
                    Product Name
                </a>
                <i style="font-size: 12px"
                   class="glyphicon  {{ Session::get('producttype_field')=='ProducttypeyName'?(Session::get('producttype_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </th>
            <th>
                <a href="javascript:ajaxLoad('producttype/list?field=ProducttypeyCode&sort={{Session::get("producttype_sort")=="asc"?"desc":"asc"}}')">
                    Product Code
                </a>
                <i style="font-size: 12px"
                   class="glyphicon  {{ Session::get('producttype_field')=='ProducttypeyCode'?(Session::get('producttype_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </th>

            <th>
                <a href="javascript:ajaxLoad('producttype/list?field=ProducttypeyCode&sort={{Session::get("producttype_sort")=="asc"?"desc":"asc"}}')">
                    Installment Number
                </a>
                <i style="font-size: 12px"
                   class="glyphicon  {{ Session::get('producttype_field')=='ProducttypeyCode'?(Session::get('producttype_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </th>

            <th>
                <a href="javascript:ajaxLoad('producttype/list?field=ProducttypeyCode&sort={{Session::get("producttype_sort")=="asc"?"desc":"asc"}}')">
                    Interest Rate(%)
                </a>
                <i style="font-size: 12px"
                   class="glyphicon  {{ Session::get('producttype_field')=='ProducttypeyCode'?(Session::get('producttype_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </th>

            <th width="140px">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 1;?>
        @foreach($producttypes as $key=>$producttype)
            <tr>
                <td align="center">{{$i++}}</td>
                <td>{{$producttype->ProducttypeyName}}</td>
                <td>{{$producttype->ProducttypeyCode}}</td>
                <td>{{$producttype->ProductInstallments}}</td>
                <td>{{$producttype->ProductRate}}</td>
                <td style="text-align: center">
                    <a class="btn btn-primary btn-xs" title="Edit"
                    href="javascript:ajaxLoad('producttype/update/{{$producttype->id}}')">
                    <i class="glyphicon glyphicon-edit"></i> update</a>
                    <a class="btn btn-danger btn-xs" title="Delete"
                    href="javascript:if(confirm('Are you sure want to delete?')) ajaxLoad('producttype/delete/{{$producttype->id}}')">
                    <i class="glyphicon glyphicon-trash"></i> delete
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="pull-right">{!! str_replace('/?','?',$producttypes->render()) !!}</div>
    <div class="row">
        <i class="col-sm-12">
            Total: {{$producttypes->total()}} records
        </i>
    </div>
    <script>
        $('.pagination a').on('click', function (event) {
            event.preventDefault();
            ajaxLoad($(this).attr('href'));
        });
    </script>
@endif