@if (Auth::guest())
@else
    <h1 class="page-header">Product List
        <div class="pull-right">
            <a href="javascript:ajaxLoad('product/create')" class="btn btn-primary pull-right"><i
                        class="glyphicon glyphicon-plus-sign"></i>New</a>
        </div>
    </h1>
    <div class="col-sm-7 form-group">
        <div class="input-group">
            <input class="form-control" id="search" value="{{ Session::get('product_search') }}"
                   onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('product/list')}}?ok=1&search='+this.value)"
                   placeholder="Search..."
                   type="text">

            <div class="input-group-btn">
                <button type="button" class="btn btn-default"
                        onclick="ajaxLoad('{{url('product/list')}}?ok=1&search='+$('#search').val())"><i
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
                <a href="javascript:ajaxLoad('product/list?field=category_id&sort={{Session::get("product_sort")=="asc"?"desc":"asc"}}')">
                    Category Name
                </a>
                <i style="font-size: 12px"
                   class="glyphicon  {{ Session::get('product_field')=='category_id'?(Session::get('product_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </th>
            <th>
                <a href="javascript:ajaxLoad('product/list?field=name&sort={{Session::get("product_sort")=="asc"?"desc":"asc"}}')">
                    Product Name 
                </a>
                <i style="font-size: 12px"
                   class="glyphicon  {{ Session::get('product_field')=='name'?(Session::get('product_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </th>
            <th>
                <a href="javascript:ajaxLoad('product/list?field=company_name&sort={{Session::get("product_sort")=="asc"?"desc":"asc"}}')">
                    Company Name
                </a>
                <i style="font-size: 12px"
                   class="glyphicon  {{ Session::get('product_field')=='company_name'?(Session::get('product_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </th>

            <th>
                <a href="javascript:ajaxLoad('product/list?field=details&sort={{Session::get("product_sort")=="asc"?"desc":"asc"}}')">
                    Details
                </a>
                <i style="font-size: 12px"
                   class="glyphicon  {{ Session::get('product_field')=='details'?(Session::get('product_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </th>
            <th>
                <a href="javascript:ajaxLoad('product/list?field=cost_buy&sort={{Session::get("product_sort")=="asc"?"desc":"asc"}}')">
                   Buying Cost
                </a>
                <i style="font-size: 12px"
                   class="glyphicon  {{ Session::get('product_field')=='cost_buy'?(Session::get('product_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </th>
            <th>
                <a href="javascript:ajaxLoad('product/list?field=cost_sale&sort={{Session::get("product_sort")=="asc"?"desc":"asc"}}')">
                    Selling Cost
                </a>
                <i style="font-size: 12px"
                   class="glyphicon  {{ Session::get('product_field')=='cost_sale'?(Session::get('product_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
                </i>
            </th>
            
            <th width="140px">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 1;?>
        @foreach($products as $key=>$product)
            <tr>
                <td align="center">{{$i++}}</td>
                <td>{{$product->category_id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->company_name}}</td>
                <td>{{$product->details}}</td>
                <td>{{$product->cost_buy}}</td>
                <td>{{$product->cost_sale}}</td>
               
                <td style="text-align: center">
                    <a class="btn btn-primary btn-xs" title="Edit"
                    href="javascript:ajaxLoad('product/update/{{$product->id}}')">
                    <i class="glyphicon glyphicon-edit"></i> update </a>
                    <a class="btn btn-danger btn-xs" title="Delete"
                    href="javascript:if(confirm('Are you sure want to delete?')) ajaxLoad('product/delete/{{$product->id}}')">
                    <i class="glyphicon glyphicon-trash"></i> delete
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="pull-right">{!! str_replace('/?','?',$products->render()) !!}</div>
    <div class="row">
        <i class="col-sm-12">
            Total: {{$products->total()}} records
        </i>
    </div>
    <script>
        $('.pagination a').on('click', function (event) {
            event.preventDefault();
            ajaxLoad($(this).attr('href'));
        });
    </script>
@endif