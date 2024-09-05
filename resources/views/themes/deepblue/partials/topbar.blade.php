<!-- TOPBAR -->
<section id="topbar">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="topbar-content d-flex align-items-center justify-content-between justify-content-md-end">
                    <div class="language-wrapper">
                        <div class="control-plugin">
                            <div class="language"
                                 data-input-name="country3"
                                 data-selected-country="{{app()->getLocale() ? : 'US'}}"
                                 data-button-size="btn-sm"
                                 data-button-type="btn-info"
                                 data-scrollable="true"
                                 data-scrollable-height="250px"
                                 data-countries='{{$languages}}'>
                            </div>
                        </div>
                    </div>

                    <div class="login-signup d-md-none">
                        <a href="javascript:void(0)">@lang('Login')</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /TOPBAR -->
