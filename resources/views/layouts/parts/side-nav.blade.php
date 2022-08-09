<div id="side-menu">
    <ul class="list-unstyled p-0">
        <li class="@if($page_group == 'home') current-page @endif">
            <a href="{{ route('home') }}">
                <i class="mdi mdi-18px mdi-view-dashboard"></i>
                داشبورد
            </a>
        </li>
        <li class="@if($page_group == 'indices') current-page @endif">
            <a href="{{ route('indices.index') }}">
                <i class="mdi mdi-18px mdi-alert-circle-check-outline"></i>
                شاخص ها
            </a>
        </li>
        <li class="@if($page_group == 'survey') current-page @endif">
            <a href="{{ route('surveyResult') }}">
                <i class="mdi mdi-18px mdi-comment-question-outline"></i>
                نظرات
            </a>
        </li>
        <li class="@if($page_group == 'shop') current-page @endif">
            <a href="{{ route('shops.index') }}">
                <i class="mdi mdi-18px mdi-cart-outline"></i>
                فروشگاهها
            </a>
        </li>
        <li class="@if($page_group == 'setting') current-page @endif">
            <a href="#here">
                <i class="mdi mdi-cog mdi-18px"></i>
                تنظیمات
            </a>
        </li>
    </ul>
</div>
