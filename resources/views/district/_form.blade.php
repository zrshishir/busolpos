<div class="col-md-12" style="background-color: #F7F7F7">
    <div class="form-group col-md-12" id="form-MemberPresentAddress-error">
        <h3>District Information</h3>               
    </div>
    <div class="form-group required col-md-6" id="form-DivisionId-error">
        {!! Form::label("DivisionId","Division",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::select("DivisionId",$DivisionInfo,null,["class"=>"form-control required","id"=>"focus"]) !!}
        </div>
        <span id="DivisionId-error" class="help-block"></span>
    </div>
    <div class="form-group required col-md-6" id="form-DistrictName-error">
        {!! Form::label("DistrictName","District Name",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("DistrictName",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="DistrictName-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-DistrictNameBangla-error">
        {!! Form::label("DistrictNameBangla","District in Bangla",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("DistrictNameBangla",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="DistrictNameBangla-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-Latitude-error">
        {!! Form::label("Latitude","Latitude",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("Latitude",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="Latitude-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-Longitude-error">
        {!! Form::label("Longitude","Longitude",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("Longitude",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="Longitude-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-Website-error">
        {!! Form::label("Website","Website",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("Website",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="Website-error" class="help-block"></span>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('district/list')" class="btn btn-danger"><i
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