<div class="col-md-12">
    <div class="form-group required col-md-6" id="form-ProducttypeyName-error">
        {!! Form::label("ProducttypeyName","Product Name",["class"=>"control-label col-md-12"]) !!}
        <div class="col-md-12">
            {!! Form::text("ProducttypeyName",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="ProducttypeyName-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-ProducttypeyCode-error">
        {!! Form::label("ProducttypeyCode","Product Code",["class"=>"control-label col-md-12"]) !!}
        <div class="col-md-12">
            {!! Form::text("ProducttypeyCode",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="ProducttypeyCode-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-ProductRate-error">
        {!! Form::label("ProductRate","Interest Rate",["class"=>"control-label col-md-12"]) !!}
        <div class="col-md-12">
            {!! Form::number("ProductRate",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="ProductRate-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-ProductInstallments-error">
        {!! Form::label("ProductInstallments","Monthly installment No",["class"=>"control-label col-md-12"]) !!}
        <div class="col-md-12">
            {!! Form::number("ProductInstallments",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="ProductInstallments-error" class="help-block"></span>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('producttype/list')" class="btn btn-danger"><i
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
</script>