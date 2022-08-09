<footer>
    <div class="fixed-bottom border-top bg-white d-none">
        <p class="my-2 text-center small">طراحی و توسعه توسط
            <a class="text-info lazy" href="https://lavan.co/" target="_blank">
                <b>لاوان</b>
            </a>
        </p>
    </div>

    {{-- confirm alert --}}
    <div id="confirm-alert" class="modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="mdi mdi-18px mdi-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <h6>آیا مطمئنید؟</h6>
                </div>
                <div class="modal-footer">
                    <form class="run-action" method="post" action="">
                        @csrf
                        <input type="hidden" name="_method" value="delete">
                        <button type="submit" class="btn btn-sm btn-success mx-1 px-3">بله</button>
                    </form>
                    <button type="button" class="btn btn-sm btn-danger mx-1 px-3" data-dismiss="modal">خیر</button>
                </div>
            </div>
        </div>
    </div>
    {{-- end confirm alert --}}

</footer>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('assets/plugins/malihu-scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ asset('assets/plugins/persian-datepicker/persian-date.min.js') }}"></script>
<script src="{{ asset('assets/plugins/persian-datepicker/persian-datepicker.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-flexdatalist/jquery.flexdatalist.min.js') }}"></script>
<script src="{{ asset('assets/plugins/plugins.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>

</body>

</html>
