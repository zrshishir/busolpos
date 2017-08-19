<div class="col-md-12">

    <div class="form-group required col-md-6" id="form-DivisionId-error">
        {!! Form::label("DivisionId","Division",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {{--{!! Form::select("DivisionId",$DivisionInfo,null,["class"=>"form-control DivisionId required","id"=>"DivisionId"]) !!}--}}
            <select name="DivisionId" class="DivisionId" id="DivisionId">
                @foreach($DivisionInfo as $zone_data )
                    <option value="{{$zone_data->id}}">{{$zone_data->DivisionName}}</option>
                @endforeach

            </select>
            <span id="DivisionId-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-DistrictId-error">
        {!! Form::label("DistrictId","District",["class"=>"control-label col-md-3"]) !!}
        <div class="DistrictId col-md-6 ">
            <select name="DistrictId" class="DistrictId" id="DistrictId">
                @foreach($DistrictInfo as $Districtdata )
                <option value="{{$Districtdata->id}}">{{$Districtdata->DistrictName}}</option>
                @endforeach
                <option value=""></option>
            </select>
            <span id="DistrictId-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-ThanaName-error">
        {!! Form::label("ThanaName","Pollice Station",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("ThanaName",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="ThanaName-error" class="help-block"></span>
        </div>
    </div>
    <div class="form-group required col-md-6" id="form-ThanaNameBangla-error">
        {!! Form::label("ThanaNameBangla","P.S Name in Bangla",["class"=>"control-label col-md-3"]) !!}
        <div class="col-md-6">
            {!! Form::text("ThanaNameBangla",null,["class"=>"form-control required","id"=>"focus"]) !!}
            <span id="ThanaNameBangla-error" class="help-block"></span>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="col-md-6 col-md-push-3">
        <a href="javascript:ajaxLoad('thana/list')" class="btn btn-danger"><i
                    class="glyphicon glyphicon-backward"></i>
            Back</a>
        {!! Form::button("<i class='glyphicon glyphicon-floppy-disk'></i> Save",["type" => "submit","class"=>"btn
    btn-primary"])!!}
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
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

<script>

    $(document).ready(function () {
        $(document).on('change', '.DivisionId', function () {
            //console.log("yes it is change");

            var op = " ";
            var DivisionId = $(this).val();
            var div = $(this).parent();
            //console.log(DivisionId);
            $('#DistrictId').empty();
            $.ajax({
                type: 'get',
                url: 'getDistrict',
                data: {'id': DivisionId},
                success: function (data) {
                $.each(data, function (index, subcatObj) {
                    $('#DistrictId').append('<option value="'+subcatObj.id+'">'+subcatObj.DistrictName +'</option>')
                });
                },
                error: function () {

                }
            });
            $.ajax(clear);
        });
    });

</script>

{{--<script >--}}

{{--$('#DivisionId').on('change', function(e)--}}
{{--{--}}
{{--console.log(e);--}}
{{--var division_id= e.target.value;--}}
{{--console.log(division_id);--}}
{{--//Ajax;--}}
{{--$.get('/ajax-division?division_id=' + division_id, function (data) {--}}
{{--//success--}}
{{--console.log(data);--}}
{{--});--}}
{{--});--}}

{{--</script>--}}