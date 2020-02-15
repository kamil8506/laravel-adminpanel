@extends('frontend.layouts.app')

@section('content')
<div class="page-banner-area bg-img-3 pt-95 pb-90">
	<div class="container">
		<div class="row">
			<div class="page-banner-content col-12 text-center">
				<h2>{{ trans('navs.frontend.user.account') }}</h2>
				<p>Pocket Law is the best Law Firm. We solve your problems  tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam</p>
			</div>
		</div>
	</div>
</div>
<div class="make-an-appoinment-area mt-30 mb-30">
	<div class="row">
		<div class="col-12">
			<!--Section Title Start-->
			<div class="section-title text-center mb-40">
				<img src="../img/icon/icon1.png" alt="">
				<h4>Account Details</h4>
			</div>
			<!--Section Title End-->
		</div>
	</div>
	<div class="container">
		<div class="row">
	<div class="col-12 ml-auto mr-auto">
    <div class="row">

        <div class="col-xs-12">

            <div class="panel panel-default">
                <div class="panel-heading"></div>

                <div class="panel-body">

                    <div role="tabpanel">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active" id="li-profile">
                                <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab" class="tabs">{{ trans('navs.frontend.user.profile') }}</a>
                            </li>

                            <li role="presentation" id="li-edit">
                                <a href="#edit" aria-controls="edit" role="tab" data-toggle="tab" class="tabs">{{ trans('labels.frontend.user.profile.update_information') }}</a>
                            </li>

                            @if ($logged_in_user->canChangePassword())
                                <li role="presentation" id="li-password">
                                    <a href="#password" aria-controls="password" role="tab" data-toggle="tab" class="tabs">{{ trans('navs.frontend.user.change_password') }}</a>
                                </li>
                            @endif
                        </ul>

                        <div class="tab-content">

                            <div role="tabpanel" class="tab-pane mt-30 active" id="profile">
                                @include('frontend.user.account.tabs.profile')
                            </div><!--tab panel profile-->

                            <div role="tabpanel" class="tab-pane mt-30" id="edit">
                                @include('frontend.user.account.tabs.edit')
                            </div><!--tab panel profile-->

                            @if ($logged_in_user->canChangePassword())
                                <div role="tabpanel" class="tab-pane mt-30" id="password">
                                    @include('frontend.user.account.tabs.change-password')
                                </div><!--tab panel change password-->
                            @endif

                            @include('frontend.user.account.upload-photo-modal')

                        </div><!--tab content-->

                    </div><!--tab panel-->

                </div><!--panel body-->

            </div><!-- panel -->

        </div><!-- col-xs-12 -->

    </div><!-- row -->
				</div>
		</div>
	</div>
</div>
@endsection

@section('after-scripts')

<script type="text/javascript">
    $(document).ready(function() {

        // To Use Select2
        Backend.Select2.init();

        if($.session.get("tab") == "edit")
        {
            $("#li-password").removeClass("active");
            $("#li-profile").removeClass("active");
            $("#li-edit").addClass("active");

            $("#profile").removeClass("active");
            $("#password").removeClass("active");
            $("#edit").addClass("active");
        }
        else if($.session.get("tab") == "password")
        {
            $("#li-password").addClass("active");
            $("#li-profile").removeClass("active");
            $("#li-edit").removeClass("active");

            $("#profile").removeClass("active");
            $("#password").addClass("active");
            $("#edit").removeClass("active");
        }

        $(".tabs").click(function() {
            var tab = $(this).attr("aria-controls");
            $.session.set("tab", tab);
        });
    });
</script>
@endsection