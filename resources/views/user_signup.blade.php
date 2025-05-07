<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<!-- Mirrored from mis.charitycommission.punjab.gov.pk/UserSignUp.aspx by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Apr 2025 06:09:56 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head><title>
	Authorization to Register :: AJK Charity Commission
    </title><meta name="viewport" content="width=device-width, initial-scale=1.0" /><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><meta http-equiv="X-UA-Compatible" content="IE=edge" /><meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" /><meta name="description" /><meta name="keywords" /><meta name="author" /><meta name="apple-mobile-web-app-capable" content="yes" /><meta name="apple-touch-fullscreen" content="yes" /><meta name="apple-mobile-web-app-status-bar-style" content="default" />
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="App_Themes/app-assets/css/bootstrap.min.css" />
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="App_Themes/app-assets/fonts/icomoon.css" /><link rel="stylesheet" type="text/css" href="App_Themes/app-assets/fonts/flag-icon-css/css/flag-icon.min.css" /><link rel="stylesheet" type="text/css" href="App_Themes/app-assets/vendors/css/sliders/slick/slick.css" /><link rel="stylesheet" type="text/css" href="App_Themes/app-assets/vendors/css/extensions/pace.css" /><link rel="stylesheet" type="text/css" href="App_Themes/app-assets/vendors/css/forms/selects/select2.min.css" />
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" type="text/css" href="App_Themes/app-assets/css/bootstrap-extended.min.css" /><link rel="stylesheet" type="text/css" href="App_Themes/app-assets/css/app.min.css" /><link rel="stylesheet" type="text/css" href="App_Themes/app-assets/css/colors.min.css" /><link rel="stylesheet" type="text/css" href="App_Themes/assets/css/style.css" />
    <!-- END ROBUST CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="App_Themes/assets/css/style.css" /><link rel="stylesheet" type="text/css" href="Styles/StyleLogin.css" />
    <script src="App_Themes/app-assets/js/core/libraries/jquery.min.js" type="text/javascript"></script>
    <link href="Styles/jquery.datetimepicker.min.css" rel="stylesheet" />
    <!-- END Custom CSS-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/5.0.7/inputmask.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <script type="text/javascript">

        function pageLoad() {
            $('.select2').select2();
            $('.datepicker').datetimepicker({
                lang: 'ch',
                timepicker: false,
                yearStart: 1901,
                yearEnd: new Date().getFullYear().toString(),
                format: 'd/m/Y',
                mask: '39/19/9999',
                minDate: new Date(1901, 1 - 1, 1), // yesterday is minimum date
                maxDate: 0,// and tommorow is maximum date calendar
                formatDate: 'd/m/Y'
            });
        }

        function UploadFileAuthorizationEvidence(fileUpload) {
            if (fileUpload.value != '') {
                var allowedExtensions = /(\.(jpg|jpeg|png|pdf))$/i;
                var oFile = fileUpload.files[0];
                if (!allowedExtensions.exec(fileUpload.value)) {
                    alert("Please select File Format: JPG/ JPEG/ PNG/ PDF");
                    fileUpload.value = '';
                    return;
                }
                else if (oFile.size > 1048576) // 1MB.
                {
                    alert("The File Size should be less than 1MB.");
                    fileUpload.value = '';
                    return;
                }
                else {


                    $.ajax({
                        url: 'Handler/UserSignup_Handler.ashx',
                        type: 'POST',
                        data: new FormData($('form')[0]),
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (file) {
                            $("#fileProgress").hide();
                            $("#ContentPlaceHolder1_hfuploadNewAuthorizationEvidence").html("<b>" + file.name + "</b>");
                            $("#ContentPlaceHolder1_hfAuthorizationEvidence").html("");
                            document.getElementById("ContentPlaceHolder1_hrefuploadAuthorizationEvidence").setAttribute('href', file.name);
                            document.getElementById("ContentPlaceHolder1_hrefuploadAuthorizationEvidence").innerHTML = 'View File';
                            $("#ContentPlaceHolder1_hfuploadNewAuthorizationEvidence").show();
                        },
                        xhr: function () {
                            var fileXhr = $.ajaxSettings.xhr();
                            if (fileXhr.upload) {
                                $("#fileProgress").show();
                                fileXhr.upload.addEventListener("progress", function (e) {
                                    if (e.lengthComputable) {
                                        $("#fileProgress").attr({
                                            value: e.loaded,
                                            max: e.total
                                        });
                                    }
                                }, false);
                            }
                            return fileXhr;
                        }
                    });
                    fileUpload.value = '';
                    return;
                }

            }
        }

        function UploadFilePaymentSlip(fileUpload) {
            if (fileUpload.value != '') {

                var allowedExtensions = /(\.(jpg|jpeg|png|pdf))$/i;
                var oFile = fileUpload.files[0];
                if (!allowedExtensions.exec(fileUpload.value)) {
                    alert("Please select File Format: JPG/ JPEG/ PNG/ PDF");
                    fileUpload.value = '';
                    return;
                }
                else if (oFile.size > 1048576) // 1MB.
                {
                    alert("The File Size should be less than 1MB.");
                    fileUpload.value = '';
                    return;
                }
                else {


                    $.ajax({
                        url: 'Handler/UserSignup_Handler.ashx',
                        type: 'POST',
                        data: new FormData($('form')[0]),
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (file) {
                            $("#fileProgress2").hide();
                            $("#ContentPlaceHolder1_hfUploadNewPaymentSlip").html("<b>" + file.name + "</b>");
                            $("#ContentPlaceHolder1_hfUploadPaymentSlip").html("");
                            document.getElementById("ContentPlaceHolder1_hrefuploadPaymentSlip").setAttribute('href', file.name);
                            document.getElementById("ContentPlaceHolder1_hrefuploadPaymentSlip").innerHTML = 'View File';
                            $("#ContentPlaceHolder1_hfUploadNewPaymentSlip").show();

                        },
                        xhr: function () {
                            var fileXhr = $.ajaxSettings.xhr();
                            if (fileXhr.upload) {
                                $("#fileProgress2").show();
                                fileXhr.upload.addEventListener("progress", function (e) {
                                    if (e.lengthComputable) {
                                        $("#fileProgress2").attr({
                                            value: e.loaded,
                                            max: e.total
                                        });
                                    }
                                }, false);
                            }
                            return fileXhr;
                        }
                    });
                    fileUpload.value = '';
                    return;
                }

            }
        }

    </script>
    <style type="text/css">
        body {
            font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif !important;
            font-size: 1rem !important;
            line-height: 1.45 !important;
        }

        .blank-page .content-wrapper .flexbox-container {
            height: auto;
            margin-top: 25px;
            margin-bottom: 25px;
        }

        .card {
            border-radius: 5px !important;
        }

            .card .card-title {
                font-weight: 600;
                letter-spacing: .4px;
            }

        .card-header {
            padding: 10px 15px !important;
            border-bottom: 1px solid #056839 !important;
            color: #FFFFFF !important;
        }


        h4 {
            text-transform: none;
            margin-top: 0;
            font-size: 1.32rem !important;
            font-family: inherit;
            line-height: 1.2;
            color: inherit;
        }

        form .form-group {
            margin-bottom: 1rem !important;
        }

        form .form-actions {
            padding: 12px 15px 12px 0px;
            background: #f5f5f5;
            margin-top: 0px;
        }

        /*select2 select2 select2-container select2-container--default select2-container--below select2-container--open,*/
        .select2-container {
            width: 100% !important;
        }

        .select2-container--default .select2-selection--single {
            border: 1px solid #aaa !important;
            border-radius: 0px !important;
            height: 35px !important;
            padding: 2px !important;
        }


            .select2-container--default .select2-selection--single .select2-selection__rendered {
                color: #000000 !important;
            }

            .select2-container--default.select2-container--open .select2-selection--single,
            .select2-container--default .select2-selection--single:focus, .select2-container--default .select2-selection--single:hover {
                border-color: #66AFE9 !important;
            }

        .select2-container--default .select2-results__option--highlighted[aria-selected] {
            background-color: green !important;
            color:rgb(239, 228, 228) !important;
        }

        .select2-dropdown {
            border: 1px solid #66AFE9 !important;
        }

        .select2-container--default .select2-search--dropdown .select2-search__field {
            border: 1px solid #66AFE9 !important;
        }

        .select2-container--classic .select2-results__options .select2-results__option[aria-selected="true"], .select2-container--default .select2-results__options .select2-results__option[aria-selected="true"] {
            background-color: #228B22 !important;
        }
        input:not([type="radio"]):not([type="checkbox"]):not([type="file"]) {
            height: 35px;
            padding:0px 25px !important;
        }

        .btn-primary, .btn-secondary {
            color: #FFFFFF !important;
        }

            .btn-primary:active, .btn-primary:focus, .btn-primary:active:focus, .btn-primary:active:hover {
                border: 1px solid #056839;
                background-color: #056839;
            }

                .btn-secondary:active, .btn-secondary:focus, .btn-secondary:active:focus, .btn-primary:active:hover {
                    border: 1px solid #056839;
                    background-color: #056839;
                }

        .form-actions a:hover {
            color: #ffffff !important;
        }

        .btn {
            white-space: nowrap;
            border-radius: 0;
            font-size: 14px;
            position: relative;
            background-image: none !important;
            display: inline-block;
            line-height: 1.25;
            text-align: center;
            vertical-align: middle;
            cursor: pointer;
            user-select: none;
            transition: all .2s ease-in-out;
        }

            .btn.focus, .btn:focus, .btn:hover {
                background-image: none !important;
                color: #ffffff;
            }

        .btn-min-width-default {
            min-width: 8.5rem;
        }

        .btn-min-width {
            min-width: 7.5rem;
        }

        .btn.btn-icon-left {
            padding: 0.6rem 0.25rem .6rem 2rem;
        }

        .btn-icon-left > i {
            position: absolute;
            left: 0;
            top: 3px;
            bottom: 0;
            width: 2.45rem;
            line-height: 2.2rem;
            font-size: 1.3em;
            text-align: center;
            border-right: 1px solid rgba(0,0,0,.2);
        }

        .btn.btn-icon-right {
            padding: 0.6rem 2rem .6rem 0.25rem;
        }

            .btn.btn-icon-right > i {
                position: absolute;
                right: 0;
                top: 3px;
                bottom: 0;
                width: 2.45rem;
                line-height: 2.2rem;
                font-size: 1.3em;
                text-align: center;
                border-left: 1px solid rgba(0,0,0,.2);
            }

        @media only screen and (max-width: 760px) {
            .btn-primary {
                min-width: 6.5rem !important;
            }

            .btn-secondary {
                min-width: 7rem !important;
            }
        }

        .alert-info {
            background-color: rgba(52, 211, 235, 0.2) !important;
            border-color: rgba(52, 211, 235, 0.3) !important;
        }

        #ContentPlaceHolder1_rblRelationship label {
            margin-bottom: 0px !important;
            margin-left: 4px !important;
        }

        .modal {
            z-index: 10000;
        }

            .modal .modal-content {
                border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;
                border: 1px solid #006400;
            }

        .modal-dialog {
            max-width: 900px;
            margin-top: 125px !important;
        }

        .modal-header {
            padding: .50rem 1.25rem;
            border-bottom: none;
            background-color: #006400;
            color: #fff;
        }

        .modal-title {
            line-height: inherit;
            color: #fff;
        }

        .close {
            color: #fff;
            opacity: inherit;
        }

            .close:hover {
                color: #fff;
                opacity: inherit;
            }

        .modal-header .close {
            margin-top: 2px;
        }

        .bootstrap-select.btn-group .dropdown-menu, .select2-container .select2-dropdown {
            z-index: 11111;
        }
        .RadGrid_Metro .rgCommandRow a {
            color: #000 !important;
            text-decoration: none;
            font-size: medium;
            font-weight: 600;
        }

        .font-16 {
            font-size: 16px !important;
        }

        .bold {
            font-weight: 700 !important;
        }

        .m-t-38 {
            margin-top: 38px !important;
        }

        .m-t-40 {
            margin-top: 40px !important;
        }

        .m-t-50 {
            margin-top: 50px !important;
        }

        .m-t-58 {
            margin-top: 58px !important;
        }

        .btn.btn-icon-left {
            padding: 0.6rem 0.25rem .6rem 3rem;
        }

        .content-wrapper {
            margin: 95px 0px 0px 0px !important;
        }

        .float-right {
            float: right;
        }
    </style>



    <style>
        .m-t-50 {
            margin-top: 50px;
        }

    </style>


<link href="WebResource7cac.css?d=bZQu9IErOfGRZdP9C3BB5QgjSbKqeaV4Bxcma6dBpba8Uc6m76SBoJQy21V3oSMhSjnPTGCp11qqY6mxYrHfJLeQx7xhJrcHHeKIrygk1zgsza4nYcGxCLIXcX19-_Js0&amp;t=635760710720000000" type="text/css" rel="stylesheet" class="Telerik_stylesheet" /><link href="WebResourcef4a2.css?d=EkHr37SACCjvnXcRDMYA5UEZCGBQ7RkTani35bwNMNgmXQ83llRhD8UmOVL06i2S9p1bHMdw3jkUWalrZo_oPphobiirB8r7HOqyqV15PvczesT-ZHU5JgIVWJU49k5X7iXCdNbhnl0oij98CulLog2&amp;t=635760710720000000" type="text/css" rel="stylesheet" class="Telerik_stylesheet" /></head>
<body data-open="hover" data-menu="horizontal-menu" data-col="1-column" class="horizontal-layout horizontal-menu 1-column bg-full-screen-image blank-page blank-page">
    <form action="{{ route('charity.store') }}" method="POST" enctype="multipart/form-data">@csrf
        <div class="aspNetHidden">
            <input type="hidden" name="__EVENTTARGET" id="__EVENTTARGET" value="" />
            <input type="hidden" name="__EVENTARGUMENT" id="__EVENTARGUMENT" value="" />
            <input type="hidden" name="__LASTFOCUS" id="__LASTFOCUS" value="" />
            <input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="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" />
        </div>
        <nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-dark navbar-border header_BackgroundImage">
            <div class="navbar-wrapper">
                <div class="navbar-header">
                    <ul class="nav navbar-nav">
                        <li class="nav-item"><a href="javascript:void(0);" class="navbar-brand nav-link">
                        <li>
                        <a href="/">
                            <img
                            alt="AJK Charity Commission"
                            src="Images/logo-charity.png"
                            class="brand-logo ps-2"
                            data-expand="Images/logo-charity.png"
                            data-collapse="Images/logo-charity.png"
                            />
                        </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="app-content container center-layout">

    <div class="text-center" id="ContentPlaceHolder1_ModalUpdateProgress1" style="display:none; padding:300px;">

            <div class="row">
                <div class="col-md-12">
                    <img src="Images/loader-01.svg" alt="Loading..." />
                </div>
            </div>
    </div>
    <div id="ContentPlaceHolder1_UpdatePanel1">

            <div class="content-wrapper">
                <div class="content-header row">
                </div>
                <div class="content-body">
                    <section class="flexbox-container">
                        <div class="col-md-10 offset-md-2 col-xs-12 offset-xs-1 box-shadow-2 p-0">
                            <div class="card border-darkgreen">
                                <div class="card-header bg-darkgreen">
                                    <h4 class="card-title" style="color:white;">
                                        Authorization to Register ( <span class="urdu_Title_Font">رجسٹر کرنے کا اختیار</span> )</h4>
                                </div>
                                <div class="card-body">
                                    <div class="card-block">
                                        <div class="row">
                                            @if(Session::has('error'))
                                                <div class="alert alert-danger alert-block">
                                                <button type="button" class="close" data-dismiss="alert">×</button>
                                                    <strong style="color:white;">{{ Session::get('error')}}</strong>
                                                </div>
                                            @endif
                                            @if(Session::has('success'))
                                                <div class="alert alert-success alert-block">
                                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                                        <strong style="color:white;">{{ Session::get('success')}}</strong>
                                                </div>
                                            @endif


                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="label-control">
                                                        Name of the Charity ( <span class="urdu_Font">چیریٹی / خیراتی ادارے کا نام</span> ) <span class="danger">&nbsp;*</span>
                                                    </label>
                                                    <fieldset class="position-relative has-icon-left">
                                                        <input name="charity_name" type="text" maxlength="200" id="ContentPlaceHolder1_txtCharity" class="form-control" placeholder="Name of the Charity" />
                                                        @error('charity_name')
                                                            <div style="color: red;">{{ $message }}</div>
                                                        @enderror
                                                        <div class="form-control-position">
                                                            <i class="icon-file-empty"></i>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label-control">
                                                        Province ( <span class="urdu_Font">صوبہ</span> ) <span class="danger">&nbsp;*</span></label>
                                                    <select name="province" id="province_id" class="form-control select2">
                                                    >
                                                        <option selected disabled>--- Please Select ---</option>
                                                        @foreach ($provinces as $item)
                                                        <option value="{{ $item->id }}">
                                                            {{ $item->name }}
                                                        </option>
                                                        @endforeach
	                                                </select>
                                                </div>
                                                @error('province')
                                                            <div style="color: red;">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label class="label-control">
                                                        Law under which registered ( <span class="urdu_Font">قانون جس کے تحت رجسٹرڈ ہے</span> ) <span class="danger">&nbsp;*</span></label>
                                                    <select name="law_registered"  class="form-control select2">
                                                    <option selected disabled>--- Please Select ---</option>
                                                    @foreach ($law_under_registerations as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->name }}
                                                    </option>
                                                    @endforeach
	                                               </select>

                                                </div>
                                                @error('law_registered')
                                                    <div style="color: red;">{{ $message }}</div>
                                                @enderror
                                            </div>


                                        </div>

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label-control">
                                                        Category: Area of Operations ( <span class="urdu_Font">کیٹیگری: آپریشنز کا علاقہ</span> ) <span class="danger">&nbsp;*</span></label>
                                                    <select name="category_area_operations"  id="category_area_operations" class="form-control select2">
                                                    <option selected disabled>--- Please Select ---</option>

                                                    @foreach ($category_area_operations as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->name }}
                                                    </option>
                                                    @endforeach


                                                </select>
                                            </div>
                                            @error('category_area_operations')
                                                            <div style="color: red;">{{ $message }}</div>
                                            @enderror
                                            </div>


                                        </div>
                                        <div class="row categoryArea" style="display:none;">
                                              <!-- SELECT DISTRICT -->
                                                <div class="col-md-6">
                                                    <div class="form-group">

                                                        <label class="form-label custom-required-label">Districts</label>
                                                        <div class="form-control-wrap">
                                                            <select class="form-control select2" value="{{ old('district_id') }}"
                                                                name="district_id" id="district_id"
                                                                 disabled>
                                                                <option value="default_option" disabled selected>Select Districts</option>
                                                            </select>
                                                        </div>
                                                        @error('district_id')
                                                            <span><small class="text-danger ms-1">{{ $message }}</small></span>
                                                        @enderror
                                                    </div>
                                                </div>


                                                <!-- SELECT TEHSIL -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label custom-required-label">Tehsils</label>
                                                        <div class="form-control-wrap">
                                                            <select id="tehsil_id" class="form-control select2" value="{{ old('tehsil_id') }}"
                                                                name="tehsil_id" disabled>
                                                                <option value="default_option" disabled>Select Tehsil</option>

                                                            </select>
                                                        </div>
                                                        @error('tehsil_id')
                                                            <span><small class="text-danger ms-1">{{ $message }}</small></span>
                                                        @enderror
                                                    </div>
                                                </div>
                                        </div>





                                        <fieldset style="border: 1px solid #aaa; padding: 0px 10px 0px 10px;" class="mb-1">
                                            <legend style="width: 100%; font-size: .94rem;">Details of the person authorized to register on behalf of the Charity  ( <span class="urdu_Font" style="font-size: 1.05rem !important;">چیریٹی/ ادارے کی جانب سے رجسٹر کرنے کے مجاز شخص کی تفصیلات</span> ) </legend>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="label-control">
                                                            Full Name ( <span class="urdu_Font">مکمل نام</span> ) <span class="danger">&nbsp;*</span>
                                                        </label>
                                                        <fieldset class="position-relative has-icon-left">
                                                            <input name="fullname" type="text" maxlength="100" id="ContentPlaceHolder1_txtFullName" class="form-control" placeholder="Name" />

                                                            <div class="form-control-position">
                                                                <i class="icon-head"></i>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    @error('fullname')
                                                    <div style="color: red;">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="label-control" style="margin-bottom: -1px !important;">

                                                            <span class="float-md-left">
                                                                <table id="ContentPlaceHolder1_rblRelationship">
                                                                <tr>
                                                                    <td><input id="ContentPlaceHolder1_rblRelationship_0" type="radio" name="guardian" value="1" /><label for="ContentPlaceHolder1_rblRelationship_0">S/o</label></td><td><input id="ContentPlaceHolder1_rblRelationship_1" type="radio" name="guardian" value="2" /><label for="ContentPlaceHolder1_rblRelationship_1">D/o</label></td><td><input id="ContentPlaceHolder1_rblRelationship_2" type="radio" name="guardian" value="3" /><label for="ContentPlaceHolder1_rblRelationship_2">W/o</label></td>

                                                                </tr>
                                                                @error('guardian')
                                                                <div style="color: red;">{{ $message }}</div>
                                                                @enderror
                                                            </table>
                                                            </span>
                                                            <span class="float-md-left">&nbsp;( <span class="urdu_Font">ولدیت/ زوجیت</span> )</span> <span class="float-md-left danger">&nbsp; *</span>
                                                        </label>
                                                        <fieldset class="position-relative has-icon-left">
                                                            <input name="guardian_name" type="text" maxlength="100" id="ContentPlaceHolder1_txtFatherHusbandName" class="form-control" placeholder="Father&#39;s / Husband&#39;s Name" />
                                                            @error('guardian_name')
                                                            <div style="color: red;">{{ $message }}</div>
                                                            @enderror
                                                            <div class="form-control-position">
                                                                <i class="icon-head"></i>
                                                            </div>
                                                        </fieldset>



                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="label-control">
                                                            CNIC No. ( <span class="urdu_Font">قومی شناختی کارڈ نمبر</span> ) <span class="danger">&nbsp;*
                                                                </span>
                                                        </label>
                                                        <fieldset class="position-relative has-icon-left">
                                                            <!-- 2015.2.826.45 --><span id="ctl00_ContentPlaceHolder1_txtCNICNo_wrapper" class="riSingle RadInput RadInput_Default" style="width:160px;">
                                                                <input type="text" id="cnic" name="cnic" class="form-control" value="{{ old('cnic') }}"  class="riTextBox riEnabled form-control cnic"
                                                                 />
                                                                @error('cnic')
                                                                <div style="color: red;">{{ $message }}</div>
                                                                @enderror
                                                        </span>
                                                            <div class="form-control-position">
                                                                <i class="icon-file-empty"></i>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="label-control">
                                                            Nature of Authorization ( <span class="urdu_Font">اختیار کی نوعیت</span> ) <span class="danger">&nbsp;*</span></label>
                                                        <select name="nature_of_authorization" id="ContentPlaceHolder1_ddlNatureofAuthorization" class="form-control select2">
                                                        <option selected disabled>--- Please Select ---</option>
                                                        @foreach ($nature_authorization as $item)
                                                        <option value="{{ $item->id }}">
                                                            {{ $item->name }}
                                                        </option>
                                                        @endforeach


                                                    </select>
                                                    @error('nature_of_authorization')
                                                            <div style="color: red;">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3" style="padding-right: 0px;">
                                                    <div class="form-group">
                                                        <label class="label-control">
                                                            Network ( <span class="urdu_Font">نیٹ ورک</span> ) <span class="danger">&nbsp;*</span></label>
                                                        <select name="network" class="form-control select2">
                                                        <option selected disabled>--- Select ---</option>
                                                        @foreach ($networks as $item)
                                                        <option value="{{ $item->id }}">
                                                            {{ $item->name }}
                                                        </option>
                                                        @endforeach

                                                    </select>
                                                    @error('network')
                                                            <div style="color: red;">{{ $message }}</div>
                                                    @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="label-control">
                                                            Mobile No. ( <span class="urdu_Font">موبائل نمبر</span> ) <span class="danger">&nbsp;*
                                                                </span></label>
                                                        <fieldset class="position-relative has-icon-left">
                                                            <span id="ctl00_ContentPlaceHolder1_txtMobileNo_wrapper" class="riSingle RadInput RadInput_Default" style="width:160px;">

                                                                <input id="mobile_no" name="mobile_no" type="text" size="12" class="riTextBox riEnabled form-control"  placeholder="____-_______" />
                                                                @error('mobile_no')
                                                                    <div style="color: red;">{{ $message }}</div>
                                                                @enderror

                                                        </span>
                                                            <div class="form-control-position">
                                                                <i class="icon-phone2"></i>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                {{-- <div id="ContentPlaceHolder1_dvMobileSendCode" class="col-md-6">
                                                    <div class="form-group m-t-25">
                                                        <a id="ContentPlaceHolder1_lbtnMobileSendCode" class="lbtn btn-primary btn-min-width" href="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ContentPlaceHolder1$lbtnMobileSendCode&quot;, &quot;&quot;, true, &quot;rfvMobileCodeSend&quot;, &quot;&quot;, false, true))">Get Verification Code ( <span class="urdu_Font">تصدیقی کوڈ حاصل کریں</span> ) </a>
                                                    </div>
                                                </div> --}}

                                                {{-- For Email --}}
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="label-control">
                                                            Email Address ( <span class="urdu_Font">ای میل اڈریس</span> ) <span class="danger">&nbsp;*
                                                                </span>
                                                        </label>
                                                        <fieldset class="position-relative has-icon-left">
                                                            <input name="email" type="text" maxlength="75" id="ContentPlaceHolder1_txtEmailAddress" class="form-control" placeholder="Email Address" />
                                                            @error('email')
                                                            <div style="color: red;">{{ $message }}</div>
                                                            @enderror
                                                            <div class="form-control-position">
                                                                <i class="icon-mail6"></i>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="label-control">
                                                            Email Address ( <span class="urdu_Font">ای میل اڈریس</span> ) <span class="danger">&nbsp;*
                                                                </span>
                                                        </label>
                                                        <fieldset class="position-relative has-icon-left">
                                                            <input name="email" type="text" maxlength="75" id="ContentPlaceHolder1_txtEmailAddress" class="form-control" placeholder="Email Address" />
                                                            @error('email')
                                                            <div style="color: red;">{{ $message }}</div>
                                                            @enderror
                                                            <div class="form-control-position">
                                                                <i class="icon-mail6"></i>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div id="ContentPlaceHolder1_dvEmailSendCode" class="col-md-6">
                                                    <div class="form-group m-t-25">
                                                        <a id="ContentPlaceHolder1_lbtnEmailSendCode" class="lbtn btn-primary btn-min-width" href="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ContentPlaceHolder1$lbtnEmailSendCode&quot;, &quot;&quot;, true, &quot;rfvEmailSend&quot;, &quot;&quot;, false, true))">Get Verification Code ( <span class="urdu_Font">تصدیقی کوڈ حاصل کریں</span> )</a>
                                                    </div>

                                                </div>


                                            </div> --}}

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="alert alert-info alert-dismissable">
                                                        <p class="text-justify">
                                                            Please enter valid Mobile No, and Email Address which must be REGISTERED in the NAME OF APPLICANT to receive Verification Codes via SMS and Email respectively.
                                                        </p>
                                                        <p class="urdu_Font" dir="rtl">
                                                            برائے کرم درست موبائل نمبر اور ای میل ایڈریس درج کریں جو بالترتیب ایس ایم ایس اور ای میل کے ذریعے تصدیقی کوڈز حاصل کرنے کے لئے درخواست دہندہ کے نام پر درج ہونا ضروری ہے۔
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="label-control">
                                                            Authorization Document ( <span class="urdu_Font">اجازتی دستاویز</span> ) <span class="danger">&nbsp;*</span></label>
                                                        <select name="authorization_document" id="ContentPlaceHolder1_ddlAuthorizationDocument" class="form-control select2">
                                                        <option selected disabled>--- Please Select ---</option>
                                                        @foreach ($auth_document_type as $item)
                                                        <option value="{{ $item->id }}">
                                                            {{ $item->name }}
                                                        </option>
                                                        @endforeach

                                                    </select>
                                                    @error('authorization_document')
                                                            <div style="color: red;">{{ $message }}</div>
                                                    @enderror
                                                        <span class="float-left">Download <a href="DownloadFile/PCC-CRP_Authorization_Document_Format_v1_26062020.docx" target="_blank">Authorization Letter Format</a></span>  <span class="float-right" dir="rtl">( <span class="urdu_Font"><a href="DownloadFile/PCC-CRP_Authorization_Document_Format_v1_26062020.docx" class="card-link" target="_blank">اجازت نامے کا فارمیٹ</a> ڈاؤن لوڈ کریں</span> ) </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="control-label">
                                                        Upload Document ( <span class="urdu_Font">دستاویز اپ لوڈ کریں</span> )
                                                    </label>
                                                    <span class="danger">&nbsp;*</span>
                                                    <div class="controls">
                                                        <input type="file" name="document_file"
                                                        id="document_file"
                                                        class="form-control border-primary"  />
                                                        @error('document_file')
                                                            <div style="color: red;">{{ $message }}</div>
                                                        @enderror
                                                        <span class="help-block float-left">(Maximum File Size: 1MB, File Format: JPG/ JPEG/ PNG/ PDF)</span>
                                                        <div id="document_preview" style="margin-top: 10px;"></div>
                                                        <progress class="progress progress-striped progress-light-green" id="fileProgress" style="display: none"></progress>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                </div>
                                            </div>

                                             <div class="row">
                                                <div class="col-md-12">
                                                    <div class="alert alert-info alert-dismissable">
                                                        <p class="text-justify">
                                                            Please take the Authorization Letter print on the Letter Head of the Charity.
                                                        </p>
                                                        <p class="urdu_Font" dir="rtl">
                                                            براہ کرم چیریٹی کے لیٹر ہیڈ پر اجازت نامہ کا پرنٹ لیں۔
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                        </fieldset>

                                        <fieldset style="border: 1px solid #aaa; padding: 0px 10px 0px 10px;" class="mb-1">
                                            <legend style="width: 61%; font-size: 1rem;">Details of deposit of Registration Fee  ( <span class="urdu_Font">رجسٹریشن فیس جمع کروانے کی تفصیلات</span> ) </legend>

                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="label-control">
                                                            Name of the Applicant ( <span class="urdu_Font">صارف کا نام</span> ( <span class="urdu_Font">درخواست دہندہ</span> <span class="danger">&nbsp;*</span></label>
                                                        <input name="applicant_name" type="text" maxlength="100" id="ContentPlaceHolder1_txtNameofTenderer" class="form-control border-primary" />
                                                        @error('applicant_name')
                                                        <div style="color: red;">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="label-control">
                                                            Challan No. ( <span class="urdu_Font">چالان نمبر</span> )<span class="danger">&nbsp;*</span></label>
                                                        <input name="challan_no" type="text" maxlength="30" id="ContentPlaceHolder1_txtChallanNo" class="form-control border-primary" />
                                                        @error('challan_no')
                                                        <div style="color: red;">{{ $message }}</div>
                                                        @enderror

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="label-control">
                                                            Head of Account ( <span class="urdu_Font">اکاؤنٹ ہیڈ</span> )<span class="danger">&nbsp;*</span></label>
                                                        <input name="account_name" type="text" maxlength="100" id="ContentPlaceHolder1_txtHeadAccount" class="form-control border-primary" />
                                                        @error('account_name')
                                                        <div style="color: red;">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">

                                                        <label class="label-control">
                                                            Bank Name ( <span class="urdu_Font">بینک کا نام</span> )<span class="danger">&nbsp;*
                                                        </span></label>

                                                    <select name="bank_name"  class="form-control select2">
                                                        <option selected disabled>--- Please Select ---</option>
                                                        @foreach ($banks as $item)
                                                        <option value="{{ $item->id }}">
                                                            {{ $item->name }}
                                                        </option>
                                                        @endforeach

                                                    </select>
                                                    @error('bank_name')
                                                            <div style="color: red;">{{ $message }}</div>
                                                    @enderror


                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="label-control">
                                                            Branch Name ( <span class="urdu_Font">برانچ کا نام</span> )<span class="danger">&nbsp;*</span></label>
                                                        <input name="bank_branch_name" type="text" maxlength="150" id="ContentPlaceHolder1_txtBranchName" class="form-control border-primary" />
                                                        @error('bank_branch_name')
                                                        <div style="color: red;">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="label-control">
                                                            Branch Code ( <span class="urdu_Font">برانچ کوڈ</span> )<span class="danger">&nbsp;*</span></label>
                                                        <input name="bank_branch_code" type="text" maxlength="5" id="ContentPlaceHolder1_txtBranchCode" class="form-control border-primary" />
                                                        @error('bank_branch_code')
                                                        <div style="color: red;">{{ $message }}</div>
                                                        @enderror

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="label-control">Paid Amount (PKR) ( <span class="urdu_Font">ادا شدہ رقم</span> ( <span class="urdu_Font">پاکستانی روپے میں</span> <span class="danger">*</span></label>
                                                        <input name="amount" type="number" maxlength="5" id="ContentPlaceHolder1_txtAmount" class="form-control border-primary" />
                                                        @error('amount')
                                                        <div style="color: red;">{{ $message }}</div>
                                                        @enderror

                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">

                                                        <label class="label-control">Selected Category Fee ( <span class="urdu_Font">منتخب شدہ کیٹیگری کی فیس </span>&nbsp;) <span class="danger">*</span></label>
                                                        <input name="selected_category_fee" type="number" maxlength="10" id="ContentPlaceHolder1_txtSystemAmount" class="aspNetDisabled form-control border-primary" placeholder="PKR" />


                                                        {{-- <input type="hidden" name="ctl00$ContentPlaceHolder1$CategoryName" id="ContentPlaceHolder1_CategoryName" />
                                                        <input type="hidden" name="ctl00$ContentPlaceHolder1$hfSystemAmount" id="ContentPlaceHolder1_hfSystemAmount" /> --}}
                                                    </div>
                                                    @error('selected_category_fee')
                                                        <div style="color: red;">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label id="ContentPlaceHolder1_labregdate" class="label-control">
                                                            <span id="ContentPlaceHolder1_spanEngregdate">Date of depositing of Fee</span> ( <span id="ContentPlaceHolder1_spanUrduregdate" class="urdu_Font">فیس جمع کروانے کی تاریخ</span> )
                                                        </label>
                                                        <span class="danger">&nbsp;*</span>
                                                        <input name="deposit_date" type="date" id="ContentPlaceHolder1_txtRegistrationDate" class="form-control border-primary datepicker" />
                                                        @error('deposit_date')
                                                        <div style="color: red;">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="control-label">
                                                        Upload Paid Challan Copy ( <span class="urdu_Font">ادا شدہ چالان کی کاپی اپ لوڈ کریں</span> )
                                                    </label>
                                                    <span class="danger">&nbsp;*</span>
                                                    <div class="controls">
                                                        <input type="file"
                                                        id="challan_fee_image"
                                                        name="challan_fee_image" class="form-control border-primary"  />
                                                        @error('challan_fee_image')
                                                        <div style="color: red;">{{ $message }}</div>
                                                    @enderror
                                                        <span class="help-block float-left">(Maximum File Size: 1MB, File Format: JPG/ JPEG/ PNG/ PDF)</span>
                                                        <div id="challan_preview" style="margin-top: 10px;"></div>
                                                        <progress class="progress progress-striped progress-light-green" id="fileProgress2" style="display: none"></progress>
                                                    </div>
                                                </div>
                                            </div>

                                        </fieldset>

                                        <h4 class="form-section">Declaration ( <span class="urdu_Sub_Title_Font">اعلانیہ</span> ) </h4>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label text-justify">
                                                        <input id="ContentPlaceHolder1_chkboxAgree" type="checkbox" name="accept" required /><label for="ContentPlaceHolder1_chkboxAgree">  I, the above named applicant, </label>
                                                        do hereby solemnly, declare that the information provided in the above form is true and correct and nothing has been concealed or mis-stated. I acknowledge and understand that in case of any mis-statement / un-authorized access to any information system is punishable under <a href="DownloadFile/PECA_2016.pdf" target="_blank" class="text-info">Prevention of Electronic Crimes Act, 2016</a> with either description of term not exceeding three years, or fine which may extent to five million rupees, or with both.</label>
                                                </div>
                                                <p class="urdu_Font" dir="rtl">
                                                    میں، مسمی / مسماة حَلفِیَہ بیان/ اقرار کرتا /کرتی ہوں کہ مندرجہ بالا فارم میں فراہم کی گئی تمام معلومات بالکل سچ اور درست ہیں اور کسی بھی بات كو پوشیدہ یا غلط بیان نہیں کیا گیا ہے۔ میں تسلیم کرتا/کرتی ہوں اور سمجھتا/سمجھتی ہوں کہ کسی بھی معلوماتی نظام كو غلط بیان کرنے / تک غیر مجاز رسائی کی صورت میں پریوینشن آف الیکٹرانک کرائم ایکٹ ۲۰۱۶کے تحت سزا دی جاسکتی ہے جس میں اصطلاح کی توثیق تین سال سے زیادہ نہیں ہوسکتی ، یا جرمانہ جو کہ پچاس لاکھ روپے تک ہوسکتاہے یا دونوں ایک ساتھ۔
                                                </p>
                                                @error('accept')
                                                        <div style="color: red;">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                            </div>
                                            <div class="col-md-6 text-right">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions right">
                                        <button type="submit" id="ContentPlaceHolder1_lbtnRegister" class="aspNetDisabled btn btn-icon-left btn-min-width btn-primary m-r-3"><i class="icon-check-square-o"></i>Sign Up ( <span class="urdu_Font">سائن اپ</span> ) </button>
                                        <a id="ContentPlaceHolder1_hrefBack" class="btn btn-icon-left btn-min-width btn-secondary m-r-3" href="UserLogin.html"><i class="icon-arrow-left"></i>Back ( <span class="urdu_Font">پیچھے</span> ) </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

</div>
{{-- Modal Start --}}
    <div class="modal text-xs-left"
    @if(!Session::has('error') || !Session::has('error'))
     id="dvPaymentDetail"
    @endif
     tabindex="-1" data-backdrop="static" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title">
                        <span>Instructions for paying Registration Fee  (  <span class="urdu_Title_Font_White">رجسٹریشن فیس ادا کرنے کے لئے ہدایات
                        </span>&nbsp;) </span>
                    </h5>
                </div>
                <div id="ContentPlaceHolder1_ModalUpdateProgress2" style="display:none;">

                        <div class="row">
                            <div class="col-md-12">
                                <img src="Images/loader-01.svg" alt="Loading..." />
                            </div>
                        </div>

</div>
                <div id="ContentPlaceHolder1_UpdatePanel2">

                        <div class="modal-body">

                            <div class="row">
                                <div class="col-md-12">
                                    <p class="label-control font-16 text-justify">
                                        <i id="ContentPlaceHolder1_i8" class="icon_Button icon-circle-check green"></i>
                                        All NPOs are required to deposit registration fee according to approved schedule.
                                    </p>
                                    <p class="label-control font-16 text-justify urdu_Font mb-1" dir="rtl">
                                        <i id="ContentPlaceHolder1_i9" class="icon_Button icon-circle-check green"></i>
                                        تمام این پی اوز کو دیئے گئے فیس شیڈول کے مطابق اندراج کی فیس جمع کروانی ہوگی۔
                                    </p>
                                </div>
                            </div>

                            <div class="row" id="header-styling">
                                <div class="col-xs-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0">
                                            <thead class="bg-success">
                                                <tr>
                                                    <th style="vertical-align: top; text-align: center;">Category  ( <span class="urdu_Font">قسم</span> )</th>
                                                    <th style="vertical-align: top; text-align: center; width: 410px;">Detail  ( <span class="urdu_Font">تفصیل</span> )</th>
                                                    <th style="vertical-align: top; text-align: center;">Registration Fee (PKR)
                                                        <br>
                                                        ( <span class="urdu_Font">پاکستانی روپے میں</span> ) <span class="urdu_Font">رجسٹریشن فیس</span>
                                                    </th>

                                                </tr>

                                            </thead>

                                            <tbody>
                                                <tr>
                                                    <td class="text-center">Category (<strong>A</strong>) </td>
                                                    <td>Currently operating in the entire Province/ two or more district<br>
                                                        <span class="urdu_Font text-right" style="float: right;">ایسے خیراتی ادارے جن کا دائرہ کار پورے صوبہ پنجاب / دو یا دو سے زائد اضلاع میں ہو</span> </td>
                                                    <td class="text-center"><strong>10,000</strong>
                                                        <br />
                                                        <br />
                                                        Download <a href="DownloadFile/Category_A_Challan_Form_32.pdf" class="card-link" target="_blank">32-A Challan Form</a><br />
                                                        ( <span class="urdu_Font" dir="rtl"><a href="DownloadFile/Category_A_Challan_Form_32.pdf" class="card-link" target="_blank"><span dir="ltr">32-A</span>چالان فارم</a> ڈاؤن لوڈ کریں</span> )

                                                    </td>

                                                </tr>


                                                <tr>
                                                    <td class="text-center">Category (<strong>B</strong>) </td>
                                                    <td>Currently operating within one District (more than one Tehsils of the District)<br>
                                                        <span class="urdu_Font text-right" style="float: right;">ایسے خیراتی ادارے جن کا دائرہ کار ایک ضلع / دو یا دو سے زائد تحصیلوں میں ہو</span>  </td>
                                                    <td class="text-center"><strong>3,000</strong>
                                                        <br />
                                                        <br />
                                                        Download <a href="DownloadFile/Category_B_Challan_Form_32.pdf" class="card-link" target="_blank">32-A Challan Form</a><br />
                                                        ( <span class="urdu_Font" dir="rtl"><a href="DownloadFile/Category_B_Challan_Form_32.pdf" class="card-link" target="_blank"><span dir="ltr">32-A</span>چالان فارم</a> ڈاؤن لوڈ کریں</span> )

                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td class="text-center">Category (<strong>C</strong>) </td>
                                                    <td>Currently operating within one Tehsil of a District<br>
                                                        <span class="urdu_Font text-right" style="float: right;">ایسے خیراتی ادارے جن کا دائرہ کارایک ضلع کی ایک تحصیل میں ہو</span>  </td>
                                                    <td class="text-center"><strong>1,000</strong>
                                                        <br />
                                                        <br />
                                                        Download <a href="DownloadFile/Category_C_Challan_Form_32.pdf" class="card-link" target="_blank">32-A Challan Form</a><br />
                                                        ( <span class="urdu_Font" dir="rtl"><a href="DownloadFile/Category_C_Challan_Form_32.pdf" class="card-link" target="_blank"><span dir="ltr">32-A</span>چالان فارم</a> ڈاؤن لوڈ کریں</span> )

                                                    </td>

                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-12">

                                    <p class="label-control font-16 text-justify mt-3">
                                        <i id="ContentPlaceHolder1_iLocalGovernment" class="icon_Button icon-circle-check green"></i>
                                        The applicable registration fee shall be paid on 32-A Challan Form</a>.
                                    </p>
                                    <p class="label-control font-16 text-justify urdu_Font mb-1" dir="rtl">
                                        <i id="ContentPlaceHolder1_i4" class="icon_Button icon-circle-check green"></i>
                                        قابل اطلاق رجسٹریشن کی فیس
                                      <span dir="ltr">32-A</span>چالان فارم پر ادا کی جائے گی۔ </span>
                                    </p>
                                    <p class="label-control font-16 text-justify">
                                        <i id="ContentPlaceHolder1_i1" class="icon_Button icon-circle-check green"></i>
                                        Moreover, these Challans Form (32-A) are available in all the Branches of designated Banks across the Punjab and can be obtained from the respective Branch at the time of depositing of Fee.
                                    </p>
                                    <p class="label-control font-16 text-justify urdu_Font mb-1" dir="rtl">
                                        <i id="ContentPlaceHolder1_i5" class="icon_Button icon-circle-check green"></i>
                                        مزید یہ کہ یہ چالان فارم<span dir="ltr">(32-A)</span> پنجاب بھر میں نامزد بینکوں کی تمام شاخوں میں دستیاب ہیں اور فیس جمع کروانے کے وقت متعلقہ برانچ سے حاصل کیا جاسکتا ہے۔
                                    </p>
                                    <p class="label-control font-16 text-justify">
                                        <i id="ContentPlaceHolder1_i2" class="icon_Button icon-circle-check green"></i>
                                        The applicable amount shall be deposited in the following Head of Account <strong>"C03878-Fee for Grant / Renewal of Licenses"</strong>.
                                    </p>
                                    <p class="label-control font-16 text-justify urdu_Font mb-1" dir="rtl">
                                        <i id="ContentPlaceHolder1_i6" class="icon_Button icon-circle-check green"></i>
                                        قابل اطلاق رقم مندرجہ ذیل ہیڈ اکاؤنٹ<span dir="ltr" style="letter-spacing: 1.5px !important;"><strong>"C03878-Fee for Grant / Renewal of Licenses"</strong></span>  میں جمع کی جائے گی۔
                                    </p>
                                    <p class="label-control font-16 text-justify">
                                        <i id="ContentPlaceHolder1_i3" class="icon_Button icon-circle-check green"></i>
                                        The applicant is required to fill in following information on the portal after paying the registration Fee.

                                    </p>
                                    <p class="label-control font-16 text-justify urdu_Font mb-1" dir="rtl">
                                        <i id="ContentPlaceHolder1_i7" class="icon_Button icon-circle-check green"></i>
                                        درخواست دہندہ کو رجسٹریشن فیس ادا کرنے کے بعد پورٹل پر درج ذیل معلومات کا اندراج کرنا ہوگا۔
                                       <ul>
                                           <li>Name of the Tenderer (Applicant) ( <span class="urdu_Font">صارف کا نام</span> ( <span class="urdu_Font">درخواست دہندہ</span></li>
                                           <li>Amount (PKR)    ( <span class="urdu_Font">پاکستانی روپے میں</span> ) <span class="urdu_Font">رقم</span></li>
                                           <li>Head of Account  ( <span class="urdu_Font">اکاؤنٹ ہیڈ</span> ) </li>
                                           <li>Name of the Bank in which amount is deposited  ( <span class="urdu_Font">اس بینک کا نام جس میں رقم جمع کرایی گئی ہے</span> )</li>
                                           <li>Bank Branch Name in which amount is deposited  ( <span class="urdu_Font">اس بینک برانچ کا نام جس میں رقم جمع کرایی گئی ہے</span>) </li>
                                           <li>Bank Branch Code  ( <span class="urdu_Font">مذکورہ بینک برانچ کاکوڈ</span> ) </li>
                                           <li>Date of depositing of Fee  ( <span class="urdu_Font">فیس جمع کروانے کی تاریخ</span> )</li>
                                       </ul>
                                    </p>
                                    <p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12" style="text-align: right">

                                    <a id="ContentPlaceHolder1_lbtnClose" class="btn btn-icon-left btn-min-width btn-primary m-r-3" href="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ContentPlaceHolder1$lbtnClose&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, true))"><i class="icon-close2"></i>Close ( <span class="urdu_Font">بند کریں</span> ) </a>

                                </div>
                            </div>
                        </div>


</div>
            </div>
        </div>
    </div>
{{-- Modal end --}}
        </div>
    <footer class="footer navbar-fixed-bottom footer-dark navbar-shadow" style="position: unset !important; background: #006837 !important; color: #ffffff !important; padding: 1em !important;">
            <p class="clearfix text-sm-center mb-0 px-2">
                <span class="float-md-left d-xs-block d-md-inline-block" style="color: #ffffff !important;">&#169; AJK Charity Commission, <a href="https://www.punjab.gov.pk/" target="_blank" style="color: #ffffff !important;">Government of the AJK</a></span>
                <span class="float-md-right d-xs-block d-md-inline-block" style="color: #ffffff !important;">Powered by: <a href="https://www.pitb.gov.pk/" target="_blank" style="color: #ffffff !important;">AJK Information Technology Board</a></span>
            </p>
    </footer>
<script src="App_Themes/app-assets/vendors/js/ui/tether.min.js" type="text/javascript"></script>
<script src="App_Themes/app-assets/js/core/libraries/bootstrap.min.js" type="text/javascript"></script>
<script src="App_Themes/app-assets/vendors/js/forms/select/select2.full.min.js" type="text/javascript"></script>
<script src="Styles/jquery.datetimepicker.full.js" type="text/javascript"></script>
<script type="text/javascript">
   //<![CDATA[
            $('#dvPaymentDetail').modal();$('#dvPaymentDetail').removeAttr('tabindex');Sys.Application.add_init(function() {
                $create(Sys.UI._ModalUpdateProgress, {"associatedUpdatePanelId":"ContentPlaceHolder1_UpdatePanel1","backgroundCssClass":"modalProgressGreyBackground","cancelControlID":null,"displayAfter":0,"dynamicLayout":true}, null, null, $get("ContentPlaceHolder1_ModalUpdateProgress1"));
            });
            Sys.Application.add_init(function() {
                $create(Telerik.Web.UI.RadMaskedTextBox, {"_displayText":"","_focused":false,"_initialMasks":[new Telerik.Web.UI.RadDigitMaskPart(),new Telerik.Web.UI.RadDigitMaskPart(),new Telerik.Web.UI.RadDigitMaskPart(),new Telerik.Web.UI.RadDigitMaskPart(),new Telerik.Web.UI.RadDigitMaskPart(),new Telerik.Web.UI.RadLiteralMaskPart('-'),new Telerik.Web.UI.RadDigitMaskPart(),new Telerik.Web.UI.RadDigitMaskPart(),new Telerik.Web.UI.RadDigitMaskPart(),new Telerik.Web.UI.RadDigitMaskPart(),new Telerik.Web.UI.RadDigitMaskPart(),new Telerik.Web.UI.RadDigitMaskPart(),new Telerik.Web.UI.RadDigitMaskPart(),new Telerik.Web.UI.RadLiteralMaskPart('-'),new Telerik.Web.UI.RadDigitMaskPart()],"_initialValueAsText":"","_postBackEventReferenceScript":"setTimeout(\"__doPostBack(\\\u0027ctl00$ContentPlaceHolder1$txtCNICNo\\\u0027,\\\u0027\\\u0027)\", 0)","_skin":"Default","_validationText":"","clientStateFieldID":"ctl00_ContentPlaceHolder1_txtCNICNo_ClientState","enabled":true,"styles":{HoveredStyle: ["width:160px;", "riTextBox riHover form-control"],InvalidStyle: ["width:160px;", "riTextBox riError form-control"],DisabledStyle: ["width:160px;", "riTextBox riDisabled form-control"],FocusedStyle: ["width:160px;", "riTextBox riFocused form-control"],EmptyMessageStyle: ["width:160px;", "riTextBox riEmpty form-control"],ReadOnlyStyle: ["width:160px;", "riTextBox riRead form-control"],EnabledStyle: ["width:160px;", "riTextBox riEnabled form-control"]}}, null, null, $get("ctl00_ContentPlaceHolder1_txtCNICNo"));
            });
            Sys.Application.add_init(function() {
                $create(Telerik.Web.UI.RadMaskedTextBox, {"_displayText":"","_focused":false,"_initialMasks":[new Telerik.Web.UI.RadDigitMaskPart(),new Telerik.Web.UI.RadDigitMaskPart(),new Telerik.Web.UI.RadDigitMaskPart(),new Telerik.Web.UI.RadDigitMaskPart(),new Telerik.Web.UI.RadLiteralMaskPart('-'),new Telerik.Web.UI.RadDigitMaskPart(),new Telerik.Web.UI.RadDigitMaskPart(),new Telerik.Web.UI.RadDigitMaskPart(),new Telerik.Web.UI.RadDigitMaskPart(),new Telerik.Web.UI.RadDigitMaskPart(),new Telerik.Web.UI.RadDigitMaskPart(),new Telerik.Web.UI.RadDigitMaskPart()],"_initialValueAsText":"","_postBackEventReferenceScript":"setTimeout(\"__doPostBack(\\\u0027ctl00$ContentPlaceHolder1$txtMobileNo\\\u0027,\\\u0027\\\u0027)\", 0)","_skin":"Default","_validationText":"","clientStateFieldID":"ctl00_ContentPlaceHolder1_txtMobileNo_ClientState","enabled":true,"styles":{HoveredStyle: ["width:160px;", "riTextBox riHover form-control"],InvalidStyle: ["width:160px;", "riTextBox riError form-control"],DisabledStyle: ["width:160px;", "riTextBox riDisabled form-control"],FocusedStyle: ["width:160px;", "riTextBox riFocused form-control"],EmptyMessageStyle: ["width:160px;", "riTextBox riEmpty form-control"],ReadOnlyStyle: ["width:160px;", "riTextBox riRead form-control"],EnabledStyle: ["width:160px;", "riTextBox riEnabled form-control"]}}, null, null, $get("ctl00_ContentPlaceHolder1_txtMobileNo"));
            });
            Sys.Application.add_init(function() {
                $create(AjaxControlToolkit.FilteredTextBoxBehavior, {"FilterType":2,"id":"ContentPlaceHolder1_txtChallanNo_FilteredTextBoxExtender"}, null, null, $get("ContentPlaceHolder1_txtChallanNo"));
            });
            Sys.Application.add_init(function() {
                $create(AjaxControlToolkit.FilteredTextBoxBehavior, {"FilterType":2,"id":"ContentPlaceHolder1_txtBranchCode_FilteredTextBoxExtender"}, null, null, $get("ContentPlaceHolder1_txtBranchCode"));
            });
            Sys.Application.add_init(function() {
                $create(AjaxControlToolkit.FilteredTextBoxBehavior, {"FilterType":2,"id":"ContentPlaceHolder1_txtAmount_FilteredTextBoxExtender"}, null, null, $get("ContentPlaceHolder1_txtAmount"));
            });
            Sys.Application.add_init(function() {
                $create(Sys.UI._ModalUpdateProgress, {"associatedUpdatePanelId":"ContentPlaceHolder1_UpdatePanel2","backgroundCssClass":"modalProgressGreyBackground","cancelControlID":null,"displayAfter":0,"dynamicLayout":true}, null, null, $get("ContentPlaceHolder1_ModalUpdateProgress2"));
            });
            //]]>
</script>
<script>
    $(document).ready(function() {
        // for cnic masking
        $('#cnic').mask('00000-0000000-0');
        // for mobile masking
        $('#mobile_no').mask('0000-0000000');

        $('.select2').select2({
            placeholder: "--- Please Select ---",
            allowClear: true // Enables "x" to remove selections
        });

        // get districts
        $('#province_id').on('change', function() {
            var provinceId = $(this).val();
            // alert(provinceId);
            showLoader();
            // return false;
            if (provinceId) {
                $.ajax({
                    url: '/api/get-provincesRecord/' + provinceId, // Adjust to your route
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {

                        $('#district_id').removeAttr('disabled');
                        $('#district_id').empty();
                        $('#tehsil_id').empty();
                        $('#district_id').append('<option value="default_option" disabled selected>Select Districts</option>');
                        $('#tehsil_id').append('<option value="default_option" disabled selected>Select Tehsil</option>');
                        $.each(data, function (key, value) {
                            console.log(data);
                            $('#district_id').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                        hideLoader();
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }

                });
            }

        });

        $('#category_area_operations').on('change',function(){
            var selectedIndex = $(this).prop('selectedIndex'); // 0-based index
            if (selectedIndex == 2) {
            $('.categoryArea').show();
            $('#tehsil_id')
                .attr('multiple', 'multiple')
                .attr('name', 'tehsil_id[]')
                .val(null);
                $('#tehsil_id').select2('destroy').select2({
                    allowClear: true
                });
            } else if(selectedIndex == 3) {
                $('.categoryArea').show();
                $('#tehsil_id')
                    .removeAttr('multiple')
                    .attr('name', 'tehsil_id')
                    .val(null); // optional: clear previous value
                    $('#tehsil_id').select2('destroy').select2({
                    placeholder: "--- Please Select ---",
                        allowClear: false
                    });
            }else{
                $('.categoryArea').hide();
            }
        });

        // get tehsils
        $('#district_id').change(function () {
            var districtId = $(this).val();
            showLoader();
            $.get('/api/get-tehsils/' + districtId, function (data) {
                console.table(data); false;
                // Populate tehsil dropdown
                $('#tehsil_id').removeAttr('disabled');
                $('#tehsil_id').empty();
                // $('#tehsil_id').append('<option value="default_option" disabled selected>Select Tehsil</option>');
                $.each(data, function (key, value) {
                    $('#tehsil_id').append('<option value="' + value.id + '">' + value.name + '</option>');
                });
                hideLoader();
            });
        });

        // For Document
        $('#document_file').on('change', function(e) {
            $('#fileProgress').show();
            const file = e.target.files[0];
            const previewDiv = $('#document_preview');

            if (file) {
                const fileURL = URL.createObjectURL(file);
                const linkHtml = `<a href="${fileURL}" target="_blank" download>Preview or Download Document</a>`;
                previewDiv.html(linkHtml);
            } else {
                previewDiv.empty();
            }
            $('#fileProgress').hide();
        });
        // for challan
        $('#challan_fee_image').on('change', function(e) {
            $('#fileProgress2').show();
            const file = e.target.files[0];
            const previewDiv = $('#challan_preview');

            if (file) {
                const fileURL = URL.createObjectURL(file);
                const linkHtml = `<a href="${fileURL}" target="_blank" download>Preview or Download Challan</a>`;
                previewDiv.html(linkHtml);
            } else {
                previewDiv.empty();
            }
            $('#fileProgress2').hide();
        });
    });

    function showLoader() {
        $('#ContentPlaceHolder1_ModalUpdateProgress1').show();
        $('.card').hide();
    }
    // Function to hide the loader
    function hideLoader() {
        setTimeout(function () {
            $('#ContentPlaceHolder1_ModalUpdateProgress1').hide();
            $('.card').show();
        }, 100);
    }
</script>

</form>

</body>

<!-- Mirrored from mis.charitycommission.punjab.gov.pk/UserSignUp.aspx by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Apr 2025 06:10:14 GMT -->
</html>
