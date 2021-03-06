<div class="col-md-12">
    <div class="form-group required col-md-6" id="form-branch_id-error">
        {!! Form::label("branch_id","Branch Name",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::select("branch_id",$branch_info, null,["class"=>"form-control required","id"=>"branch_id"]) !!}
            <span id="branch_id-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-branch_product_id-error">
        {!! Form::label("branch_product_id","Product for Branch",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::select("branch_product_id",$branch_product_info, null,["class"=>"form-control required","id"=>"branch_product_id"]) !!}
            <span id="branch_product_id-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-quantity-error">
        {!! Form::label("quantity","Quantity",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("quantity",null,["class"=>"form-control required","id"=>"quantity"]) !!}
            <span id="quantity-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-unit-error">
        {!! Form::label("unit","Description",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("unit",null,["class"=>"form-control required","id"=>"unit"]) !!}
            <span id="unit-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-date-error">
        {!! Form::label("date","Date",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("date",null,["class"=>"form-control required","id"=>"date"]) !!}
            <span id="date-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-cost-error">
        {!! Form::label("cost","Cost",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("cost",null,["class"=>"form-control required","id"=>"cost"]) !!}
            <span id="cost-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-sell_price-error">
        {!! Form::label("sell_price","Sell Price",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("sell_price",null,["class"=>"form-control required","id"=>"sell_price"]) !!}
            <span id="sell_price-error" class="help-block"></span>
        </div>
    </div>
    </div>
   
<div class="form-group">
    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('category/list')" class="btn btn-danger"><i
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
                        index = $(this).attr('quantity');
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
</script>