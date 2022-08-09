<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <title>سامانه نظرسنجی افق کوروش</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link
        href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,500i,600,600i,700,700i&display=swap"
        rel="stylesheet">
    <link href="{{ asset('assets/theme/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link
        href="{{ asset('assets/theme/plugins/webfont/css/materialdesignicons.min.css') }}" media="all"
        rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/theme/plugins/plugins.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/theme/css/style.css?ver=2') }}">

    <!-- Start Alexa Certify Javascript -->
    <script type="text/javascript">
        _atrk_opts = { atrk_acct:"a6yGv1WyR620WR", domain:"okcs.com",dynamic: true};
        (function() { var as = document.createElement('script'); as.type = 'text/javascript'; as.async = true; as.src = "https://certify-js.alexametrics.com/atrk.js"; var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(as, s); })();
    </script>
    <noscript><img src="https://certify.alexametrics.com/atrk.gif?account=a6yGv1WyR620WR" style="display:none" height="1" width="1" alt="" /></noscript>
    <!-- End Alexa Certify Javascript -->

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-104486197-19"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-104486197-19');
    </script>

</head>

<body>

<!-- header -->
<header>
    <div class="text-center pt-1">
        <a href="https://okcs.com">
            <img class="bg-white" width="200px" src="{{ asset('assets/theme/images/logo.png') }}"
                 alt="افق کوروش">
        </a>
    </div>
</header>
<!-- end header -->

<div id="survey">
    <div class="container">
        @if (!request()->get('m') || !request()->get('s'))
            <h1 class="text-center h4 font-weight-bold mb-5 site-title">سامانه نظرسنجی خرید از فروشگاه های افق
                کوروش</h1>
            <p class="text-center">
                لینک نظرسنجی پس از خرید برای شما پیامک خواهد شد
                <br>
                <a href="https://www.okcs.com/">
                    بازگشت به سایت افق کوروش
                </a>
            </p>
        @else
            <div class="col-12 col-md-6 col-lg-7 mx-auto">
                @if(isset($survey))
                    <div class="card border-0 shadow-sm position-relative overflow-hidden">
                        <div class="p-5">
                            <div>
                                @if($survey->point)
                                    <p class="text-center m-0">
                                        امتیاز شما به این شعبه
                                    </p>
                                    <div>
                                        @if($survey->point == 'عالی')
                                            <div class="text-success text-center">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                                     xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="38"
                                                     height="38" x="0" y="0" viewBox="0 0 512 512"
                                                     style="enable-background:new 0 0 512 512" xml:space="preserve"
                                                     class=""><g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                            <g>
                                                                <path
                                                                    d="M256,0C114.615,0,0,114.615,0,256s114.615,256,256,256s256-114.615,256-256S397.385,0,256,0z M256,480    C132.288,480,32,379.712,32,256S132.288,32,256,32s224,100.288,224,224S379.712,480,256,480z"
                                                                    fill="currentColor" data-original="#000000" style=""
                                                                    class=""/>
                                                            </g>
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                            <g>
                                                                <circle cx="176" cy="176" r="32" fill="currentColor"
                                                                        data-original="#000000" style="" class=""/>
                                                            </g>
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                            <g>
                                                                <circle cx="336" cy="176" r="32" fill="currentColor"
                                                                        data-original="#000000" style="" class=""/>
                                                            </g>
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                            <g>
                                                                <path
                                                                    d="M368,256c0,61.856-50.144,112-112,112s-112-50.144-112-112h-32c0,79.529,64.471,144,144,144s144-64.471,144-144H368z"
                                                                    fill="currentColor" data-original="#000000" style=""
                                                                    class=""/>
                                                            </g>
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                    </g></svg>
                                                <p class="text-center">{{ $survey->point }}</p>
                                            </div>
                                        @endif
                                        @if($survey->point == 'خوب')
                                            <div class="text-success text-center">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                                     xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="38"
                                                     height="38" x="0" y="0" viewBox="0 0 295.996 295.996"
                                                     style="enable-background:new 0 0 512 512" xml:space="preserve"><g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M147.998,0C66.392,0,0,66.392,0,147.998s66.392,147.998,147.998,147.998s147.998-66.392,147.998-147.998   S229.605,0,147.998,0z M147.998,279.996c-36.256,0-69.143-14.696-93.022-38.44c-9.536-9.482-17.631-20.41-23.934-32.42   C21.442,190.847,16,170.047,16,147.998C16,75.214,75.214,16,147.998,16c34.523,0,65.987,13.328,89.533,35.102   c12.208,11.288,22.289,24.844,29.558,39.996c8.27,17.239,12.907,36.538,12.907,56.9   C279.996,220.782,220.782,279.996,147.998,279.996z"
                                                                fill="currentColor" data-original="#000000" style=""/>
                                                            <circle cx="99.666" cy="114.998" r="16" fill="currentColor"
                                                                    data-original="#000000" style=""/>
                                                            <circle cx="198.666" cy="114.998" r="16" fill="currentColor"
                                                                    data-original="#000000" style=""/>
                                                            <path
                                                                d="M147.715,229.995c30.954,0,60.619-15.83,77.604-42.113l-13.439-8.684c-15.597,24.135-44.126,37.604-72.693,34.308   c-22.262-2.567-42.849-15.393-55.072-34.308l-13.438,8.684c14.79,22.889,39.716,38.409,66.676,41.519   C140.814,229.8,144.27,229.995,147.715,229.995z"
                                                                fill="currentColor" data-original="#000000" style=""/>
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                    </g></svg>
                                                <p class="text-center">{{ $survey->point }}</p>
                                            </div>
                                        @endif
                                        @if($survey->point == 'متوسط')
                                            <div class="text-warning text-center">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                                     xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="38"
                                                     height="38" x="0" y="0" viewBox="0 0 512 512"
                                                     style="enable-background:new 0 0 512 512" xml:space="preserve"><g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                            <g>
                                                                <g>
                                                                    <path
                                                                        d="M256,0C114.615,0,0,114.615,0,256s114.615,256,256,256s256-114.615,256-256S397.385,0,256,0z M256,480     C132.288,480,32,379.712,32,256S132.288,32,256,32s224,100.288,224,224S379.712,480,256,480z"
                                                                        fill="currentColor" data-original="#000000"
                                                                        style=""/>
                                                                    <circle cx="176" cy="176" r="32" fill="currentColor"
                                                                            data-original="#000000" style=""/>
                                                                    <circle cx="336" cy="176" r="32" fill="currentColor"
                                                                            data-original="#000000" style=""/>
                                                                    <rect x="144" y="304" width="224" height="32"
                                                                          fill="currentColor" data-original="#000000"
                                                                          style=""/>
                                                                </g>
                                                            </g>
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                    </g></svg>
                                                <p class="text-center">{{ $survey->point }}</p>
                                            </div>
                                        @endif
                                        @if($survey->point == 'ضعیف')
                                            <div class="text-danger text-center">
                                                <svg id="sadness" xmlns="http://www.w3.org/2000/svg" width="38"
                                                     height="38" viewBox="0 0 295.996 295.996">
                                                    <g id="Group_7059" data-name="Group 7059">
                                                        <path fill="currentColor" id="Path_26064" data-name="Path 26064"
                                                              class="cls-1"
                                                              d="M148,0C66.392,0,0,66.392,0,148S66.392,296,148,296,296,229.6,296,148,229.6,0,148,0Zm0,280A132.073,132.073,0,0,1,16,148C16,75.214,75.214,16,148,16A132.034,132.034,0,0,1,280,148C280,220.782,220.782,280,148,280Z"/>
                                                        <circle fill="currentColor" id="Ellipse_380"
                                                                data-name="Ellipse 380" class="cls-1" cx="16" cy="16"
                                                                r="16"
                                                                transform="translate(83.666 98.998)"/>
                                                        <circle fill="currentColor" id="Ellipse_381"
                                                                data-name="Ellipse 381" class="cls-1" cx="16" cy="16"
                                                                r="16"
                                                                transform="translate(182.666 98.998)"/>
                                                        <path fill="currentColor" id="Path_26065" data-name="Path 26065"
                                                              class="cls-1"
                                                              d="M147.715,179.2a92.89,92.89,0,0,1,77.6,42.113L211.88,230a76.011,76.011,0,0,0-127.765,0l-13.438-8.684a92.909,92.909,0,0,1,66.676-41.519A90.42,90.42,0,0,1,147.715,179.2Z"
                                                              transform="translate(0 0)"/>
                                                    </g>
                                                </svg>
                                                <p class="text-center">{{ $survey->point }}</p>
                                            </div>
                                        @endif
                                        @if($survey->point == 'خیلی ضعیف')
                                            <div class="text-danger text-center">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                                     xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="38"
                                                     height="38" x="0" y="0" viewBox="0 0 512 512"
                                                     style="enable-background:new 0 0 512 512" xml:space="preserve"><g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                            <g>
                                                                <g>
                                                                    <path
                                                                        d="M256,0C114.615,0,0,114.615,0,256s114.615,256,256,256s256-114.615,256-256S397.385,0,256,0z M256,480     C132.288,480,32,379.712,32,256S132.288,32,256,32s224,100.288,224,224S379.712,480,256,480z"
                                                                        fill="currentColor" data-original="#000000"
                                                                        style=""/>
                                                                    <circle cx="176" cy="176" r="32" fill="currentColor"
                                                                            data-original="#000000" style=""/>
                                                                    <circle cx="336" cy="176" r="32" fill="currentColor"
                                                                            data-original="#000000" style=""/>
                                                                    <path
                                                                        d="M256,240c-79.529,0-144,64.471-144,144h32c0-61.856,50.144-112,112-112s112,50.144,112,112h32     C400,304.471,335.529,240,256,240z"
                                                                        fill="currentColor" data-original="#000000"
                                                                        style=""/>
                                                                </g>
                                                            </g>
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                    </g></svg>
                                                <p class="text-center">{{ $survey->point }}</p>
                                            </div>
                                        @endif

                                    </div>
                                @endif
                            </div>
                            <div>
                                <p class="text-center m-0">
                                    شما در قرعه کشی "نظرسنجی مشتریان" افق کوروش شرکت داده شدید
                                    <br>
                                    هر شب، یک برنده یک میلیون تومانی
                                    از طریق اینستاگرام افق کوروش
                                    <br>
                                    <br>
                                    <a class="btn btn-primary" dir="ltr" target="_blank"
                                       href="https://okcs.ir/surveyinsta">
                                        @okcs.ir
                                    </a>
                                </p>
                            </div>
                            <div class="pt-5">
                                @if(count($strengths))
                                    <h5 class="font-weight-bold text-success text-center mb-3">نقاط قوت از دید شما</h5>
                                    <ul class="m-0 p-0 list-unstyled">
                                        @foreach($strengths as $strength)
                                            <li class="mb-3 survey-index strength active text-center">
                                                {{ $strength->title }}
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                                @if(count($weaknesses))
                                    <h5 class="text-danger font-weight-bold text-center mb-3">نقاط ضعف از دید شما</h5>
                                    <ul class="m-0 p-0 list-unstyled">
                                        @foreach($weaknesses as $weakness)
                                            <li class="mb-3 survey-index weakness active text-center">
                                                {{ $weakness->title }}
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            @if($survey->comment)
                                <p>
                                    <b>دیدگاه شما:</b>
                                    {{ $survey->comment  }}
                                </p>
                            @endif
                        </div>
                        <div id="result" class="shadow">
                            <div class="row justify-content-between">
                                <div class="col text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30.105" height="49.11"
                                         viewBox="0 0 30.105 49.11">
                                        <g id="Group_7052" data-name="Group 7052"
                                           transform="translate(0 49.11) rotate(-90)">
                                            <path id="Path_665" data-name="Path 665"
                                                  d="M8,0,.031,21.441a.76.76,0,0,0,1.427.513.2.2,0,0,1,0-.051Z"
                                                  transform="translate(24.111 10.298) rotate(-43)" fill="#f03"/>
                                            <path id="Path_666" data-name="Path 666"
                                                  d="M11.462,0,.2,10.946A.76.76,0,0,0,1.26,12.034l.051-.056Z"
                                                  transform="translate(15.274 11.549) rotate(-43)" fill="#f03"/>
                                            <path id="Path_667" data-name="Path 667"
                                                  d="M26.793,0,.544,7.7A.757.757,0,1,0,.97,9.15h.041Z"
                                                  transform="translate(0 22.277) rotate(-43)" fill="#f03"/>
                                            <path id="Path_668" data-name="Path 668"
                                                  d="M8.221.872.862,0a.775.775,0,1,0-.174,1.54.513.513,0,0,0,.154,0Z"
                                                  transform="translate(8.788 7.999) rotate(-43)" fill="#f03"/>
                                            <path id="Path_669" data-name="Path 669"
                                                  d="M0,0,2.207,10.464a.761.761,0,0,0,1.488-.318l-.031-.1Z"
                                                  transform="translate(34.465 4.306) rotate(-43)" fill="#f03"/>
                                            <path id="Path_670" data-name="Path 670"
                                                  d="M0,4.293,2.484,2.862,2.722,0l2.13,1.924L7.64,1.267,6.473,3.89,7.961,6.341,5.107,6.028,3.24,8.208,2.648,5.4Z"
                                                  transform="translate(27.791 21.897)" fill="#f03"/>
                                            <path id="Path_671" data-name="Path 671"
                                                  d="M1.112.019,2.957.97,4.792,0,4.45,2.044l1.5,1.445L3.9,3.8,2.985,5.676,2.054,3.813,0,3.537,1.474,2.063Z"
                                                  transform="translate(0.242 18.856) rotate(-43)" fill="#f03"/>
                                            <path id="Path_672" data-name="Path 672"
                                                  d="M0,1.211,1.375,1.16,2.114,0l.472,1.293,1.334.339-1.083.857.082,1.37-1.139-.77L.5,3.6l.38-1.324Z"
                                                  transform="translate(43.61 21.48) rotate(-43)" fill="#f03"/>
                                            <path id="Path_673" data-name="Path 673"
                                                  d="M.6.015l1,.513L2.586,0,2.4,1.108l.811.78L2.1,2.053,1.611,3.069l-.5-1.006L0,1.909l.8-.79Z"
                                                  transform="translate(17.593 12.257) rotate(-43)" fill="#f03"/>
                                            <path id="Path_674" data-name="Path 674"
                                                  d="M.72.584A2.225,2.225,0,1,1,.583,3.73,2.225,2.225,0,0,1,.72.584Z"
                                                  transform="translate(12.526 20.006) rotate(-43)" fill="#f03"/>
                                            <path id="Path_675" data-name="Path 675"
                                                  d="M.715.572A2.175,2.175,0,1,1,0,2.086,2.185,2.185,0,0,1,.715.572Z"
                                                  transform="translate(39.192 17.094) rotate(-43)" fill="#f03"/>
                                            <path id="Path_676" data-name="Path 676"
                                                  d="M.393.316a1.206,1.206,0,1,1-.077,1.7A1.206,1.206,0,0,1,.393.316Z"
                                                  transform="translate(25.646 3.972) rotate(-43)" fill="#f03"/>
                                            <path id="Path_677" data-name="Path 677"
                                                  d="M.551.436A1.68,1.68,0,1,1,.436,2.809,1.68,1.68,0,0,1,.551.436Z"
                                                  transform="translate(5.202 12.267) rotate(-43)" fill="#f03"/>
                                            <path id="Path_678" data-name="Path 678"
                                                  d="M.4.313A1.206,1.206,0,1,1,0,1.152,1.206,1.206,0,0,1,.4.313Z"
                                                  transform="translate(36.881 1.645) rotate(-43)" fill="#f03"/>
                                            <path id="Path_679" data-name="Path 679"
                                                  d="M.392.318A1.2,1.2,0,1,1,0,1.155,1.206,1.206,0,0,1,.392.318Z"
                                                  transform="translate(21.307 27.311) rotate(-43)" fill="#f03"/>
                                        </g>
                                    </svg>
                                </div>
                                <div class="col text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="46.625" height="62.263"
                                         viewBox="0 0 46.625 62.263">
                                        <g id="Group_7056" data-name="Group 7056"
                                           transform="translate(-4887.25 313.158)">
                                            <path id="Path_26051" data-name="Path 26051"
                                                  d="M869.841,1310.088a2.19,2.19,0,0,1,2.729-.941,2.64,2.64,0,0,1,1.743,2.548c.146,2.344.383,4.685.5,7.031a46.48,46.48,0,0,0,1.2,6.689c1.007,5.114,2.266,10.168,3.709,15.177a1.894,1.894,0,0,0,1.327,1.414c3.672,1.332,7.32,2.73,10.987,4.08.428.158.621.317.617.811q-.035,4.9,0,9.8c0,.563-.179.689-.716.688-5.62-.019-11.243-.009-16.865-.011-.866,0-.978-.158-.7-.967.329-.959.618-1.935,1.021-2.861.251-.574.041-.693-.442-.817-.6-.156-1.182-.427-1.787-.568a4.2,4.2,0,0,1-3.154-3.334c-.063-.225-.135-.447-.245-.805-.193.524-.342.943-.5,1.359a3.677,3.677,0,0,1-2.459,2.435c-.8.234-1.574.56-2.377.778-.457.124-.475.319-.32.692.389.94.758,1.887,1.131,2.834.447,1.134.369,1.257-.828,1.257H848.491c-.6,0-1.2-.017-1.8.008-.449.019-.657-.1-.654-.609q.028-4.823,0-9.648c0-.549.237-.76.724-.929,3.985-1.392,7.96-2.82,11.944-4.213a1.271,1.271,0,0,0,.9-.938c1.7-5.539,2.885-11.2,4.188-16.838.931-4.03,1.01-8.12,1.378-12.193a3.761,3.761,0,0,1,.8-2.4C867.108,1308.388,868.643,1308.567,869.841,1310.088Zm-.935,23.167h.006c0-4.05-.016-8.1.016-12.151,0-.67-.26-.727-.791-.634-1.032.183-1.387.941-1.546,1.831q-.8,4.5-1.55,9c-.072.425-.237.731-.694.633-.4-.088-.458-.422-.392-.81.521-3.033,1.009-6.071,1.547-9.1a2.758,2.758,0,0,1,2.879-2.583c.408-.028.541-.174.537-.571-.014-1.541-.011-3.083,0-4.626,0-.422-.157-.739-.588-.759a4.1,4.1,0,0,0-1.861.166.732.732,0,0,0-.486.811,36.914,36.914,0,0,1-.436,6.4c-.416,2.244-1.009,4.453-1.443,6.694a123.365,123.365,0,0,1-3.8,14.75,1.621,1.621,0,0,0-.006,1.2q1.528,3.846,3,7.712c.159.413.345.563.788.4.8-.295,1.611-.558,2.424-.817a2.458,2.458,0,0,0,1.629-1.56,12.363,12.363,0,0,0,.76-4.372C868.922,1340.988,868.906,1337.12,868.906,1333.254Zm1.593.224h-.016q0,5.489,0,10.979a13.565,13.565,0,0,0,.808,4.745,2.593,2.593,0,0,0,1.748,1.753c.775.226,1.542.488,2.3.776.458.176.654.083.821-.4.9-2.586,1.814-5.166,2.771-7.729a2.872,2.872,0,0,0,.022-2.015,127.6,127.6,0,0,1-3.606-14.119c-.607-3.088-1.544-6.118-1.644-9.3-.036-1.174-.146-2.346-.223-3.52-.019-.282,0-.56-.327-.73a2.654,2.654,0,0,0-2.259-.2.474.474,0,0,0-.366.5c0,1.594,0,3.188-.025,4.783,0,.3.08.383.389.409,1.935.168,2.646.708,3.008,2.55.609,3.1,1.117,6.214,1.671,9.322.064.365.053.722-.375.816-.477.105-.634-.232-.7-.634-.02-.129-.057-.254-.083-.383-.562-2.788-1.025-5.594-1.458-8.4a3.5,3.5,0,0,0-.629-1.662,1.429,1.429,0,0,0-1.563-.468c-.527.134-.243.669-.245,1C870.491,1325.532,870.5,1329.506,870.5,1333.479Zm-14.927,22.831c2.562,0,5.125-.024,7.686.016.74.011.8-.312.605-.852-.166-.466-.4-.908-.576-1.37q-2.05-5.227-4.1-10.455c-.154-.391-.364-.581-.9-.384q-5.049,1.852-10.14,3.593c-.733.249-1.056.573-1.042,1.376.044,2.377.033,4.758,0,7.136-.008.689.181.973.931.96C850.552,1356.284,853.063,1356.311,855.572,1356.309Zm28.092,0v.006c2.4,0,4.806-.013,7.21.011.508,0,.681-.141.676-.657q-.031-4,0-7.993a.71.71,0,0,0-.546-.8c-1.566-.554-3.115-1.156-4.67-1.741-1.724-.651-3.446-1.312-5.177-1.949-.384-.141-.829-.293-1.034.3q-.577,1.659-1.161,3.315-.753,2.123-1.519,4.241c-.529,1.464-1.079,2.922-1.591,4.392-.2.587-.055.9.682.891C878.909,1356.287,881.286,1356.311,883.664,1356.311Zm-13.127-43.493a4.834,4.834,0,0,1,2.765.074,5.727,5.727,0,0,0-.166-1.69,1.431,1.431,0,0,0-1.414-1.115,1.181,1.181,0,0,0-1.106,1.2C870.566,1311.771,870.565,1312.262,870.536,1312.818Zm-1.621-1.163c-.006-1.1-.345-1.68-1.034-1.75-.783-.079-1.445.593-1.578,1.6a4.187,4.187,0,0,1-.143.674c-.08.273-.014.588.452.442a3.389,3.389,0,0,1,1.932-.074c.394.108.381-.088.372-.348C868.911,1312.021,868.916,1311.839,868.916,1311.655Z"
                                                  transform="translate(4041.22 -1608.282)" fill="#707070"/>
                                            <path id="Path_26052" data-name="Path 26052"
                                                  d="M1050.023,1254.491a.847.847,0,0,1-.788-1.238c1.128-1.991,2.291-3.964,3.471-5.925a.782.782,0,0,1,1.171-.208.773.773,0,0,1,.306,1.092c-1.146,1.982-2.314,3.951-3.48,5.92A.737.737,0,0,1,1050.023,1254.491Z"
                                                  transform="translate(3869.992 -1556.13)" fill="#707070"/>
                                            <path id="Path_26053" data-name="Path 26053"
                                                  d="M917.63,1253.627a.8.8,0,0,1-.61.861.829.829,0,0,1-1.012-.383l-1.384-2.352c-.621-1.054-1.247-2.1-1.862-3.162-.3-.511-.443-1.033.154-1.439.483-.33.979-.124,1.381.557,1.031,1.748,2.052,3.5,3.079,5.252A1.14,1.14,0,0,1,917.63,1253.627Z"
                                                  transform="translate(3985.178 -1556.173)" fill="#707070"/>
                                            <path id="Path_26054" data-name="Path 26054"
                                                  d="M1067.356,1331.994c-.86.072-1.337-.071-1.417-.742-.086-.729.428-.93,1-.987,2.1-.209,4.2-.4,6.3-.587.567-.052,1,.149,1.065.764a.816.816,0,0,1-.849.982C1071.335,1331.619,1069.209,1331.82,1067.356,1331.994Z"
                                                  transform="translate(3855.825 -1625.872)" fill="#707070"/>
                                            <path id="Path_26055" data-name="Path 26055"
                                                  d="M881.974,1332.04c-2.069-.195-4.139-.381-6.209-.587a.8.8,0,0,1-.778-.968.782.782,0,0,1,.907-.764c1.141.113,2.274.369,3.413.4.849.019,1.67.262,2.518.207a4.76,4.76,0,0,1,.778.008.788.788,0,0,1,.77.824c.011.42-.135.739-.665.781C882.472,1331.953,882.235,1332.1,881.974,1332.04Z"
                                                  transform="translate(4016.813 -1625.91)" fill="#707070"/>
                                            <path id="Path_26056" data-name="Path 26056"
                                                  d="M994.665,1225.841c0,1.045-.006,2.09,0,3.135,0,.614-.227,1.045-.885,1.037s-.866-.452-.863-1.061q.016-3.135,0-6.269c0-.6.18-1.064.847-1.075.708-.011.913.453.9,1.1C994.649,1223.75,994.663,1224.8,994.665,1225.841Z"
                                                  transform="translate(3917.379 -1534.766)" fill="#707070"/>
                                            <path id="Path_26057" data-name="Path 26057"
                                                  d="M944.96,1358.211c0,3.868.016,7.734-.008,11.6a12.332,12.332,0,0,1-.759,4.372,2.468,2.468,0,0,1-1.629,1.56c-.813.26-1.624.523-2.424.818-.443.163-.631.014-.788-.4q-1.478-3.865-3-7.712a1.623,1.623,0,0,1,.006-1.2,123.349,123.349,0,0,0,3.8-14.75c.435-2.241,1.026-4.45,1.443-6.694a36.931,36.931,0,0,0,.436-6.4.732.732,0,0,1,.486-.811,4.1,4.1,0,0,1,1.861-.166c.43.021.59.337.588.76-.008,1.542-.012,3.083,0,4.626,0,.4-.129.543-.537.571a2.759,2.759,0,0,0-2.879,2.582c-.538,3.03-1.026,6.068-1.547,9.1-.066.387-.009.722.392.81.457.1.623-.206.694-.632q.758-4.5,1.55-9c.159-.89.513-1.648,1.546-1.831.53-.094.8-.038.791.634-.031,4.05-.016,8.1-.016,12.151Z"
                                                  transform="translate(3965.166 -1633.239)" fill="#ffdfc8"/>
                                            <path id="Path_26058" data-name="Path 26058"
                                                  d="M1001.64,1358.981c0-3.973-.008-7.948.014-11.921,0-.336-.284-.871.245-1a1.427,1.427,0,0,1,1.563.468,3.5,3.5,0,0,1,.629,1.662c.433,2.81.9,5.616,1.458,8.4.025.128.061.254.083.383.064.4.221.739.7.634.428-.094.439-.45.375-.816-.554-3.108-1.062-6.225-1.671-9.322-.361-1.842-1.073-2.382-3.008-2.55-.308-.027-.392-.11-.389-.409.02-1.594.025-3.188.025-4.783a.473.473,0,0,1,.366-.5,2.654,2.654,0,0,1,2.26.2c.331.171.309.447.326.73.075,1.174.185,2.344.223,3.52.1,3.181,1.037,6.21,1.645,9.3a127.538,127.538,0,0,0,3.606,14.119,2.874,2.874,0,0,1-.022,2.015c-.957,2.564-1.872,5.143-2.771,7.729-.166.48-.362.574-.821.4-.755-.289-1.522-.551-2.3-.777a2.6,2.6,0,0,1-1.748-1.753,13.646,13.646,0,0,1-.808-4.745q.009-5.489,0-10.979Z"
                                                  transform="translate(3910.08 -1633.785)" fill="#ffdfc8"/>
                                            <path id="Path_26059" data-name="Path 26059"
                                                  d="M861.361,1541.01c-2.509,0-5.02-.025-7.529.017-.75.013-.938-.271-.931-.96.028-2.379.039-4.757,0-7.136-.016-.8.309-1.126,1.042-1.376q5.091-1.734,10.14-3.593c.532-.2.742,0,.9.385,1.373,3.482,2.732,6.972,4.1,10.455.181.461.411.9.576,1.37.191.54.135.863-.606.852C866.486,1540.986,863.923,1541.01,861.361,1541.01Z"
                                                  transform="translate(4035.431 -1792.983)" fill="#f03"/>
                                            <path id="Path_26060" data-name="Path 26060"
                                                  d="M1043.436,1540.351c-2.377,0-4.754-.024-7.131.014-.737.013-.887-.3-.683-.891.513-1.47,1.062-2.928,1.591-4.392q.765-2.118,1.519-4.241c.392-1.1.776-2.209,1.161-3.316.206-.59.648-.438,1.034-.3,1.731.635,3.452,1.3,5.177,1.949,1.555.585,3.1,1.188,4.67,1.741a.71.71,0,0,1,.546.8c-.012,2.665-.017,5.329,0,7.993,0,.516-.168.664-.676.657-2.4-.023-4.806-.011-7.21-.011Z"
                                                  transform="translate(3881.447 -1792.322)" fill="#f03"/>
                                            <path id="Path_26061" data-name="Path 26061"
                                                  d="M1002.21,1319.666c.027-.555.03-1.046.08-1.531a1.18,1.18,0,0,1,1.106-1.2,1.431,1.431,0,0,1,1.414,1.115,5.729,5.729,0,0,1,.166,1.69A4.855,4.855,0,0,0,1002.21,1319.666Z"
                                                  transform="translate(3909.546 -1615.131)" fill="#ffdfc8"/>
                                            <path id="Path_26062" data-name="Path 26062"
                                                  d="M976.925,1317.526c0,.184,0,.365,0,.549.008.26.022.456-.372.348a3.389,3.389,0,0,0-1.932.074c-.466.147-.534-.168-.452-.442a4.522,4.522,0,0,0,.143-.674c.133-1.012.8-1.684,1.578-1.6C976.58,1315.846,976.919,1316.421,976.925,1317.526Z"
                                                  transform="translate(3933.21 -1614.153)" fill="#ffdfc8"/>
                                        </g>
                                    </svg>
                                </div>
                                <div class="col text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30.105" height="49.11"
                                         viewBox="0 0 30.105 49.11">
                                        <g id="Group_7053" data-name="Group 7053"
                                           transform="translate(0 49.11) rotate(-90)">
                                            <path id="Path_665" data-name="Path 665"
                                                  d="M8,22.413.031.972A.76.76,0,0,1,1.457.459a.2.2,0,0,0,0,.051Z"
                                                  transform="translate(39.396 3.415) rotate(43)" fill="#f03"/>
                                            <path id="Path_666" data-name="Path 666"
                                                  d="M11.462,12.222.2,1.276A.76.76,0,0,1,1.26.188l.051.056Z"
                                                  transform="translate(23.61 9.617) rotate(43)" fill="#f03"/>
                                            <path id="Path_667" data-name="Path 667"
                                                  d="M26.793,9.181.544,1.483A.757.757,0,1,1,.97.031h.041Z"
                                                  transform="translate(6.261 1.113) rotate(43)" fill="#f03"/>
                                            <path id="Path_668" data-name="Path 668"
                                                  d="M8.221.678.862,1.545A.775.775,0,1,1,.688.006a.513.513,0,0,1,.154,0Z"
                                                  transform="translate(9.846 20.972) rotate(43)" fill="#f03"/>
                                            <path id="Path_669" data-name="Path 669"
                                                  d="M0,11.066,2.207.6A.761.761,0,0,1,3.695.92l-.031.1Z"
                                                  transform="translate(42.011 17.706) rotate(43)" fill="#f03"/>
                                            <path id="Path_670" data-name="Path 670"
                                                  d="M0,3.915,2.484,5.346l.239,2.862,2.13-1.924,2.788.658L6.473,4.318,7.961,1.867l-2.854.313L3.24,0,2.648,2.8Z"
                                                  transform="translate(27.791 0)" fill="#f03"/>
                                            <path id="Path_671" data-name="Path 671"
                                                  d="M1.112,5.657l1.844-.951,1.835.97L4.45,3.632l1.5-1.445L3.9,1.873,2.985,0,2.054,1.863,0,2.139,1.474,3.613Z"
                                                  transform="translate(4.113 7.098) rotate(43)" fill="#f03"/>
                                            <path id="Path_672" data-name="Path 672"
                                                  d="M0,2.648,1.375,2.7l.739,1.16.472-1.293,1.334-.339L2.838,1.37,2.92,0,1.781.77.5.262l.38,1.324Z"
                                                  transform="translate(46.242 5.803) rotate(43)" fill="#f03"/>
                                            <path id="Path_673" data-name="Path 673"
                                                  d="M.6,3.053l1-.513.99.529L2.4,1.96l.811-.78L2.1,1.016,1.611,0l-.5,1.006L0,1.16l.8.79Z"
                                                  transform="translate(19.686 15.604) rotate(43)" fill="#f03"/>
                                            <path id="Path_674" data-name="Path 674"
                                                  d="M.72,3.866A2.225,2.225,0,1,0,.583.72,2.225,2.225,0,0,0,.72,3.866Z"
                                                  transform="translate(15.561 6.845) rotate(43)" fill="#f03"/>
                                            <path id="Path_675" data-name="Path 675"
                                                  d="M.715,3.8A2.175,2.175,0,1,0,0,2.284,2.185,2.185,0,0,0,.715,3.8Z"
                                                  transform="translate(42.172 9.815) rotate(43)" fill="#f03"/>
                                            <path id="Path_676" data-name="Path 676"
                                                  d="M.393,2.1A1.206,1.206,0,1,0,.316.393,1.206,1.206,0,0,0,.393,2.1Z"
                                                  transform="translate(27.291 24.369) rotate(43)" fill="#f03"/>
                                            <path id="Path_677" data-name="Path 677"
                                                  d="M.551,2.923A1.68,1.68,0,1,0,.436.55,1.68,1.68,0,0,0,.551,2.923Z"
                                                  transform="translate(7.493 15.381) rotate(43)" fill="#f03"/>
                                            <path id="Path_678" data-name="Path 678"
                                                  d="M.4,2.1A1.206,1.206,0,1,0,0,1.26,1.206,1.206,0,0,0,.4,2.1Z"
                                                  transform="translate(38.526 26.696) rotate(43)" fill="#f03"/>
                                            <path id="Path_679" data-name="Path 679"
                                                  d="M.392,2.094A1.2,1.2,0,1,0,0,1.257,1.206,1.206,0,0,0,.392,2.094Z"
                                                  transform="translate(22.952 1.03) rotate(43)" fill="#f03"/>
                                        </g>
                                    </svg>

                                </div>
                            </div>
                            <div class="pt-3">
                                <p class="h6 text-center font-weight-bold">
                                    سپاس!
                                    <br>
                                    <span class="font-weight-light mt-1 d-inline-block">
                                        ارزیابی شما ثبت شد.
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <div class="rounded overflow-hidden">
                            <div id="23591089380">
                                <script type="text/JavaScript"
                                        src="https://www.aparat.com/embed/Nyv7p?data[rnddiv]=23591089380&data[responsive]=yes"></script>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="py-3">
                        <h6 class="site-title font-weight-bold text-center text-danger">
                            به فروشگاه
                            {{ $shop->name ?? '--' }}
                            نمره دهید
                        </h6>
                        <h5 class="text-center font-weight-bolder text-info">
                            و در قرعه کشی روزانه یک میلیون تومانی شرکت کنید
                        </h5>
                    </div>
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <form method="post" action="{{ route('setSurvey') }}">
                                @csrf
                                <input id="point-field" type="hidden" name="point" value="">
                                <input type="hidden" name="shop_code"
                                       value="{{ $shop->shop_code ?? request()->get('s') }}">
                                <input type="hidden" name="mobile" value="{{ $mobile }}">
                                <div class="point-box pb-3">
                                    @error('point')
                                    <p class="text-center text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </p>
                                    @enderror
                                    @error('comment')
                                    <p class="text-center text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </p>
                                    @enderror
                                    <div class="row no-gutters justify-content-center">
                                        <!-- 10 -->
                                        <div class="col-auto">
                                            <a href="#" class="d-block p-1 select-point good-text" data-value="10"
                                               data-label="عالی">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                                     xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="38"
                                                     height="38" x="0" y="0" viewBox="0 0 512 512"
                                                     style="enable-background:new 0 0 512 512" xml:space="preserve"
                                                     class=""><g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                            <g>
                                                                <path
                                                                    d="M256,0C114.615,0,0,114.615,0,256s114.615,256,256,256s256-114.615,256-256S397.385,0,256,0z M256,480    C132.288,480,32,379.712,32,256S132.288,32,256,32s224,100.288,224,224S379.712,480,256,480z"
                                                                    fill="currentColor" data-original="#000000" style=""
                                                                    class=""/>
                                                            </g>
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                            <g>
                                                                <circle cx="176" cy="176" r="32" fill="currentColor"
                                                                        data-original="#000000" style="" class=""/>
                                                            </g>
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                            <g>
                                                                <circle cx="336" cy="176" r="32" fill="currentColor"
                                                                        data-original="#000000" style="" class=""/>
                                                            </g>
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                            <g>
                                                                <path
                                                                    d="M368,256c0,61.856-50.144,112-112,112s-112-50.144-112-112h-32c0,79.529,64.471,144,144,144s144-64.471,144-144H368z"
                                                                    fill="currentColor" data-original="#000000" style=""
                                                                    class=""/>
                                                            </g>
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                    </g></svg>
                                            </a>
                                        </div>
                                        <!-- 8 -->
                                        <div class="col-auto">
                                            <a href="#" class="d-block p-1 select-point good-text" data-value="8"
                                               data-label="خوب">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                                     xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="38"
                                                     height="38" x="0" y="0" viewBox="0 0 295.996 295.996"
                                                     style="enable-background:new 0 0 512 512" xml:space="preserve"><g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M147.998,0C66.392,0,0,66.392,0,147.998s66.392,147.998,147.998,147.998s147.998-66.392,147.998-147.998   S229.605,0,147.998,0z M147.998,279.996c-36.256,0-69.143-14.696-93.022-38.44c-9.536-9.482-17.631-20.41-23.934-32.42   C21.442,190.847,16,170.047,16,147.998C16,75.214,75.214,16,147.998,16c34.523,0,65.987,13.328,89.533,35.102   c12.208,11.288,22.289,24.844,29.558,39.996c8.27,17.239,12.907,36.538,12.907,56.9   C279.996,220.782,220.782,279.996,147.998,279.996z"
                                                                fill="currentColor" data-original="#000000" style=""/>
                                                            <circle cx="99.666" cy="114.998" r="16" fill="currentColor"
                                                                    data-original="#000000" style=""/>
                                                            <circle cx="198.666" cy="114.998" r="16" fill="currentColor"
                                                                    data-original="#000000" style=""/>
                                                            <path
                                                                d="M147.715,229.995c30.954,0,60.619-15.83,77.604-42.113l-13.439-8.684c-15.597,24.135-44.126,37.604-72.693,34.308   c-22.262-2.567-42.849-15.393-55.072-34.308l-13.438,8.684c14.79,22.889,39.716,38.409,66.676,41.519   C140.814,229.8,144.27,229.995,147.715,229.995z"
                                                                fill="currentColor" data-original="#000000" style=""/>
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                    </g></svg>
                                            </a>
                                        </div>
                                        <!-- 6 -->
                                        <div class="col-auto">
                                            <a href="#" class="d-block p-1 select-point ave-text" data-value="6"
                                               data-label="متوسط">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                                     xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="38"
                                                     height="38" x="0" y="0" viewBox="0 0 512 512"
                                                     style="enable-background:new 0 0 512 512" xml:space="preserve"><g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                            <g>
                                                                <g>
                                                                    <path
                                                                        d="M256,0C114.615,0,0,114.615,0,256s114.615,256,256,256s256-114.615,256-256S397.385,0,256,0z M256,480     C132.288,480,32,379.712,32,256S132.288,32,256,32s224,100.288,224,224S379.712,480,256,480z"
                                                                        fill="currentColor" data-original="#000000"
                                                                        style=""/>
                                                                    <circle cx="176" cy="176" r="32" fill="currentColor"
                                                                            data-original="#000000" style=""/>
                                                                    <circle cx="336" cy="176" r="32" fill="currentColor"
                                                                            data-original="#000000" style=""/>
                                                                    <rect x="144" y="304" width="224" height="32"
                                                                          fill="currentColor" data-original="#000000"
                                                                          style=""/>
                                                                </g>
                                                            </g>
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                    </g></svg>
                                            </a>
                                        </div>
                                        <!-- 4 -->
                                        <div class="col-auto">
                                            <a href="#" class="d-block p-1 select-point bad-text" data-value="4"
                                               data-label="ضعیف">
                                                <svg id="sadness" xmlns="http://www.w3.org/2000/svg" width="38"
                                                     height="38" viewBox="0 0 295.996 295.996">
                                                    <g id="Group_7059" data-name="Group 7059">
                                                        <path fill="currentColor" id="Path_26064" data-name="Path 26064"
                                                              class="cls-1"
                                                              d="M148,0C66.392,0,0,66.392,0,148S66.392,296,148,296,296,229.6,296,148,229.6,0,148,0Zm0,280A132.073,132.073,0,0,1,16,148C16,75.214,75.214,16,148,16A132.034,132.034,0,0,1,280,148C280,220.782,220.782,280,148,280Z"/>
                                                        <circle fill="currentColor" id="Ellipse_380"
                                                                data-name="Ellipse 380" class="cls-1" cx="16" cy="16"
                                                                r="16"
                                                                transform="translate(83.666 98.998)"/>
                                                        <circle fill="currentColor" id="Ellipse_381"
                                                                data-name="Ellipse 381" class="cls-1" cx="16" cy="16"
                                                                r="16"
                                                                transform="translate(182.666 98.998)"/>
                                                        <path fill="currentColor" id="Path_26065" data-name="Path 26065"
                                                              class="cls-1"
                                                              d="M147.715,179.2a92.89,92.89,0,0,1,77.6,42.113L211.88,230a76.011,76.011,0,0,0-127.765,0l-13.438-8.684a92.909,92.909,0,0,1,66.676-41.519A90.42,90.42,0,0,1,147.715,179.2Z"
                                                              transform="translate(0 0)"/>
                                                    </g>
                                                </svg>
                                            </a>
                                        </div>
                                        <!-- 2 -->
                                        <div class="col-auto">
                                            <a href="#" class="d-block p-1 select-point bad-text" data-value="2"
                                               data-label="خیلی ضعیف">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                                     xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="38"
                                                     height="38" x="0" y="0" viewBox="0 0 512 512"
                                                     style="enable-background:new 0 0 512 512" xml:space="preserve"><g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                            <g>
                                                                <g>
                                                                    <path
                                                                        d="M256,0C114.615,0,0,114.615,0,256s114.615,256,256,256s256-114.615,256-256S397.385,0,256,0z M256,480     C132.288,480,32,379.712,32,256S132.288,32,256,32s224,100.288,224,224S379.712,480,256,480z"
                                                                        fill="currentColor" data-original="#000000"
                                                                        style=""/>
                                                                    <circle cx="176" cy="176" r="32" fill="currentColor"
                                                                            data-original="#000000" style=""/>
                                                                    <circle cx="336" cy="176" r="32" fill="currentColor"
                                                                            data-original="#000000" style=""/>
                                                                    <path
                                                                        d="M256,240c-79.529,0-144,64.471-144,144h32c0-61.856,50.144-112,112-112s112,50.144,112,112h32     C400,304.471,335.529,240,256,240z"
                                                                        fill="currentColor" data-original="#000000"
                                                                        style=""/>
                                                                </g>
                                                            </g>
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                        <g xmlns="http://www.w3.org/2000/svg">
                                                        </g>
                                                    </g></svg>
                                            </a>
                                        </div>
                                    </div>
                                    <p id="user-comment">انتخاب کنید</p>
                                </div>
                                <div>
                                    <div class="collapse" id="strengths">
                                        <div class="py-3 px-2">
                                            @if(count($strengths))
                                                @foreach($strengths as $strength)
                                                    <div class="mb-3">
                                                        <a class="survey-index text-center strength small" href="#here"
                                                           data-value="{{ $strength->id }}">
                                                            {{ $strength->title }}
                                                        </a>
                                                        <input type="hidden" name="strengths[]">
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    <div class="collapse" id="weaknesses">
                                        <div class="py-3 px-2">
                                            @if(count($weaknesses))
                                                @foreach($weaknesses as $weakness)
                                                    <div class="mb-3">
                                                        <a class="survey-index text-center weakness small" href="#here"
                                                           data-value="{{ $weakness->id }}">
                                                            {{ $weakness->title }}
                                                        </a>
                                                        <input type="hidden" name="weaknesses[]">
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" id="more-collapse">
                                    <div class="text-center">
                                        <a class="btn btn-secondary mb-3 px-5" data-toggle="collapse"
                                           href="#collapseExample" role="button" aria-expanded="false"
                                           aria-controls="collapseExample">
                                            سایر موارد
                                        </a>
                                    </div>
                                    <div class="collapse" id="collapseExample">
                                        <div class="form-group">
                                            <label>سایر موارد</label>
                                            <textarea name="comment" class="form-control" rows="3"></textarea>
                                            <small class="text-muted">حداکثر طول مجاز 200 کارکتر است</small>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button id="submit-format" type="submit" class="btn btn-success w-100">
                                            ثبت بازخورد
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        @endif
    </div>
</div>

<script src="{{ asset('assets/theme/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('assets/theme/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/theme/plugins/plugins.js') }}"></script>
<script src="{{ asset('assets/theme/js/custom.js?ver=1') }}?ver=2"></script>
</body>

</html>
