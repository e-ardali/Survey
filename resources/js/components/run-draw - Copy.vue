<template>
    <div>
        <div id="digit-input-show">
            <p class="text-center font-weight-light h6">کد اولین برنده را وارد فرمایید</p>
            <div id="select-code" class="form-row justify-content-center"></div>
            <div class="text-center pt-3">
                <a :href="draw_page" class="btn btn-warning px-2">
                    <i class="mdi mdi-18px mdi-arrow-right top-2 ml-2"></i>
                    بازگشت
                </a>
                <a id="start-draw-btn" href="#here" v-on:click="start_draw()" class="btn btn-warning px-2">
                    <i class="mdi mdi-18px mdi-gift-outline top-2 ml-2"></i>شروع قرعه کشی
                </a>
            </div>
        </div>
        <div id="winner-show" class="py-5" style="display: none">
            <p class="h1 text-center">
                برنده شماره
                {{ winner_index }}
            </p>
            <p class="digit-box display-3 text-center m-0 d-none">
                {{ winner_code }}
            </p>
            <h3 class="text-center mb-3" v-html="status"></h3>
            <p class="digit-box display-4 text-center">
                <span dir="ltr">{{ winner_mobile }}</span>
            </p>
        </div>
        <div id="winners-list" class="py-5">
            <div v-if="winners.length">
                <h2 class="text-center"><b>برندگان</b></h2>
                <ul class="form-row">
                    <div v-for="winner in winners" class="col-12 col-sm-4 col-lg-2 col-mb">
                        <p class="h6 badge badge-light w-100">
                            <span dir="ltr">{{ winner }}</span>
                        </p>
                    </div>
                </ul>
                <div class="pt-4 text-center">
                    <a :href="draw_page" class="btn btn-warning">
                        <i class="mdi mdi-18px mdi-arrow-right top-2 ml-2"></i>
                        دانلود برندگان
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['data'],
        data() {
            return {
                digits: this.data.codes.toString().length,
                input: '<div class="col-auto col-mb"><input class="form-control digit-input numeral"></div>',
                first_code: "",
                start_btn_content: '<i class="mdi mdi-18px mdi-gift-outline top-2 ml-2"></i>شروع قرعه کشی',
                loading_btn_content: '<i class="mdi mdi-18px mdi-loading mdi-spin top-2 ml-2"></i>توقف قرعه کشی',
                codes: parseInt(this.data.codes),
                winners_count: parseInt(this.data.winners_count),
                step: Math.floor(parseInt(this.data.codes) / parseInt(this.data.winners_count)),
                winner_codes: [],
                winner_index: 0,
                winner_code: 0,
                winner_mobile: '**********',
                status: 'در حال جستجو و بررسی<i class="mdi mdi-18px mdi-loading mdi-spin top-2 mr-2"></i>',
                winners: [],
                draw_page: $('meta[name="main-url"]').attr('content') + '/runs/' + this.data.draw_id
            }
        },
        mounted: function () {
            console.log(this.data);
            console.log(this.step);
            for (var i = 0; i < this.digits; i++) {
                $('#select-code').append(this.input);
            }
        },
        methods: {
            start_draw() {
                var vm = this;
                vm.first_code = "";
                var btn = $('#start-draw-btn');
                if (btn.hasClass('loading')) {

                } else {
                    $('#start-draw-btn').html(vm.start_btn_content).addClass('loading');
                    $('.digit-input').each(function () {
                        var digit_value = $(this).val();
                        if (digit_value == "") {
                            digit_value = 0;
                        }
                        vm.first_code = digit_value.toString() + vm.first_code;
                    });

                    if (parseInt(vm.first_code) != 0) {
                        this.compute_winners_codes();
                        $('#digit-input-show').slideUp();
                    } else {
                        $('#start-draw-btn').html(vm.start_btn_content).removeClass('loading');
                    }
                }

            },
            compute_winners_codes() {
                this.winner_codes[0] = parseInt(this.first_code);
                for (var i = 1; i < this.winners_count; i++) {
                    var next_code = this.winner_codes[i - 1] + this.step;
                    if (next_code > this.codes) {
                        next_code = next_code - this.codes;
                    }
                    this.winner_codes[i] = next_code;
                }
                this.check_winners(0);
                setTimeout(function () {
                    $('#winner-show').fadeIn();
                }, 500);
            },
            check_winners(code_index) {
                var vm = this;
                vm.winner_mobile = '**********';
                vm.status = 'در حال جستجو و بررسی<i class="mdi mdi-18px mdi-loading mdi-spin top-2 mr-2"></i>';
                //vm.winner_code = code_index;
                if (false/*vm.winner_code != vm.winner_codes[code_index]*/) {
                    setTimeout(function () {
                        vm.check_winners(code_index);
                    }, 50);
                } else {
                    axios.post($('meta[name="page-url"]').attr('content'), {
                        code: vm.winner_codes[code_index],
                    }).then(function (response) {
                        if (response && response.status == 200) {
                            if (response.data.status == "success") {
                                if (response.data.win_in) {
                                    vm.winner_codes[code_index] += 1;
                                    vm.check_winners(code_index);
                                } else {
                                    vm.winner_mobile = response.data.serial;
                                    vm.status = 'تبریک به شما :)';
                                    vm.winner_index++;
                                    vm.winners.push(vm.winner_mobile);


                                    if (code_index < vm.winners_count - 1) {
                                        setTimeout(function () {
                                            vm.check_winners(++code_index);
                                        }, parseInt(vm.data.duration * 1000));
                                    } else {
                                        vm.status = 'قرعه کشی تمام شد تبریک به برندگان';
                                    }
                                }
                            }
                            console.log(response.data);
                        }
                    }).catch(function (error) {
                        console.log(error);
                    });
                }
            },
        }
    }
</script>
