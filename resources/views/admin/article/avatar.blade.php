@extends('layouts/admin')
@section('content')


    <header class="profile-header">
        <img id="user-avatar" src="https://wt-prj.oss.aliyuncs.com/0d06af79c49d4e08abb1ab3f7ab6e860/772c684b-10a4-43cf-8eec-dda9e28a5a23.png">
        <div id="validation-errors"></div>
        <div class="avatar-upload" id="avatar-upload">
        {!! Form::open( [ 'url' => ['/avatar/upload'], 'method' => 'POST', 'id' => 'upload', 'files' => true ] ) !!}
        <a href="#" class="btn button-change-profile-picture">
            <label for="upload-profile-picture">
                <span id="upload-avatar">更换新头像</span>
                <input name="image" id="image" type="file" class="manual-file-chooser js-manual-file-chooser js-avatar-field">
            </label>
        </a>
        {!! Form::close() !!}


        <div class="span5">
            <div id="output" style="display:none">
            </div>
        </div>

    <script>
        $(document).ready(function() {
            var options = {
                beforeSubmit:  showRequest,
                success:       showResponse,
                dataType: 'json'
            };
            $('#image').on('change', function(){
                $('#upload-avatar').html('正在上传...');
                $('#upload').ajaxForm(options).submit();
            });
        });
        function showRequest() {
            $("#validation-errors").hide().empty();
            $("#output").css('display','none');
            return true;
        }

        function showResponse(response)  {
            if(response.success == false)
            {
                var responseErrors = response.errors;
                $.each(responseErrors, function(index, value)
                {
                    if (value.length != 0)
                    {
                        $("#validation-errors").append('<div class="alert alert-error"><strong>'+ value +'</strong><div>');
                    }
                });
                $("#validation-errors").show();
            } else {

                $('#user-avatar').attr('src',response.avatar);

            }
        }
    </script>


@endsection