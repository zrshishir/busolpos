<div class="col-md-12" style="background-color: #EAEAEA">
    <h1></h1>
    <div>
        <div class="form-group required col-md-6" id="form-category_id-error">
            {!! Form::label("category_id","Category Type",["class"=>"control-label col-md-3"]) !!}
            <div class="col-md-6">
                {!! Form::select("category_id",$category_info, null,["class"=>"form-control required","id"=>"focus"]) !!}
                <span id="category_id-error" class="help-block"></span>
            </div>
        </div>
        <div class="form-group required col-md-6" id="form-name-error">
            {!! Form::label("name","Product Name",["class"=>"control-label col-md-3"]) !!}
            <div class="col-md-6">
                {!! Form::text("name",null,["class"=>"form-control required","id"=>"name"]) !!}
                <span id="name-error" class="help-block"></span>
            </div>
        </div>    
        <div class="form-group required col-md-6" id="form-company_name-error">
            {!! Form::label("company_name","Company Name",["class"=>"control-label col-md-3"]) !!}
            <div class="col-md-6">
                {!! Form::text("company_name",null,["class"=>"form-control required","id"=>"focus"]) !!}
                <span id="company_name-error" class="help-block"></span>
            </div>
        </div>
        <div class="form-group required col-md-6" id="form-details-error">
            {!! Form::label("details","Details",["class"=>"control-label col-md-3"]) !!}
            <div class="col-md-6">
                {!! Form::text("details",null,["class"=>"form-control required","id"=>"focus"]) !!}
                <span id="details-error" class="help-block"></span>
            </div>
        </div>
        <div class="form-group required col-md-6" id="form-cost_buy-error">
            {!! Form::label("cost_buy","Buying Cost",["class"=>"control-label col-md-3"]) !!}
            <div class="col-md-6">
                {!! Form::text("cost_buy",null,["class"=>"form-control required"]) !!}
                <span id="cost_buy-error" class="help-block"></span>
            </div>
        </div>
        <div class="form-group required col-md-6" id="form-cost_sale-error">
            {!! Form::label("cost_sale","Selling Cost",["class"=>"control-label col-md-3"]) !!}
            <div class="col-md-6">
                {!! Form::text("cost_sale",null,["class"=>"form-control required"]) !!}
                <span id="cost_sale-error" class="help-block"></span>
            </div>
        </div>
   
     </div>       
</div>
<div class="form-group">
    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('product/list')" class="btn btn-danger"><i
                    class="glyphicon glyphicon-backward"></i>
            Back</a>
        {!! Form::button("<i class='glyphicon glyphicon-floppy-disk'></i> Save",["type" => "submit","class"=>"btn
    btn-primary"])!!}
    </div>
</div>
<script>
    $("#frm").submit(function (event) {
        event.preventDefault();
        $('.loading').show();
        var form = $(this);
        var data = new FormData($(this)[0]);
        var url = form.attr("action");
        $.ajax({
            type: "POST",
            url: url,
            data: data,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data.fail) {
                    $('#frm input.required, #frm textarea.required').each(function () {
                        index = $(this).attr('name');
                        if (index in data.errors) {
                            $("#form-" + index + "-error").addClass("has-error");
                            $("#" + index + "-error").html(data.errors[index]);
                        }
                        else {
                            $("#form-" + index + "-error").removeClass("has-error");
                            $("#" + index + "-error").empty();
                        }
                    });
                    $('#focus').focus().select();
                } else {
                    $(".has-error").removeClass("has-error");
                    $(".help-block").empty();
                    $('.loading').hide();
                    ajaxLoad(data.url, data.content);
                }
            },
            error: function (xhr, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
        return false;
    });

    //    $(document).ready(function () {
    //        $(document).on('change', '.ProductType', function () {
    //            //console.log("yes it is change");
    //
    //            var ProductType = $(this).val();
    //            var div = $(this).parent();
    //            //console.log(DivisionId);
    //            $('#ServiceChargeRate').empty();
    //            $('#Duration').empty();
    //            $.ajax({
    //                type: 'get',
    //                url: 'getProductInfo',
    //                data: {'id': ProductType},
    //                success: function (data) {
    //                    $.each(data, function (index, subcatObj) {
    //                        $('#ServiceChargeRate').append('<input type="text" class="form-control" readonly name="ServiceChargeRate" value="'+subcatObj.ProductRate+'">');
    //                        $('#Duration').append('<input type="text" class="form-control" readonly name="Duration" value="'+subcatObj.ProductInstallments+'">')
    //                    });
    //                },
    //                error: function () {
    //
    //                }
    //            });
    //        });
    //    });
</script>