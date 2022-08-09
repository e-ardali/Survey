<div class="d-none d-md-block">
    <div class="row">
        <div class="col-auto">
            <div class="logo pt-2">
                <a href="{{ url('/') }}" target="_blank">
                    <img class="d-block mx-auto" width="150px" src="{{ asset('assets/images/logo.png') }}">
                </a>
            </div>
        </div>
        <div class="col">
            <div class="row align-items-center">
                <div class="col">
                    <ul class="nav">
                        <li class="text-dark mt-2">سامانه نظرسنجی افق کوروش</li>
                    </ul>
                </div>
                <div class="col-auto">
                    <a class="text-gray" href="{{ route('logout') }}" title="خروج">
                        <i class="mdi mdi-24px mdi-power"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="d-block d-md-none">
    <div class="row align-items-center">
        <div class="col-auto p-0">
            <ul class="nav">
                <li class="nav-item">
                    <a id="side-menu-btn" href="#here" class="nav-link text-gray">
                        <i class="mdi mdi-menu mdi-36px"></i>
                    </a>
                </li>
                @if(isset($notes))
                    @if(count($notes['notes']))
                        <li class="nav-item">
                            <a class="nav-link" href="#here" title="اطلاعیه ها">
                                <i class="mdi mdi-bell-ring-outline mdi-24px top-2"></i>
                                <span class="count">{{ count($notes['notes']) }}</span>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tickets') }}" title="پیام ها">
                            <i class="mdi mdi-email-variant mdi-24px top-2"></i>
                            @if(count($notes['tickets']))
                                <span class="count">{{ count($notes['tickets']) }}</span>
                            @endif
                        </a>
                    </li>
                @endif
            </ul>
        </div>
        <div class="col">
            <a href="<?php url('/') ?>" title="افق کوروش" target="_blank">
                <img class="d-block mx-auto" width="120px" src="{{ asset('assets/images/logo.png') }}">
            </a>
        </div>
        <div class="col-auto">
            <a class="text-gray" href="{{ route('logout') }}" title="خروج">
                <i class="mdi mdi-36px mdi-power"></i>
            </a>
        </div>
    </div>
</div>
