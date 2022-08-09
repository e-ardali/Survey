<template>
    <div class="py-4 px-5">
        <p>
            <a data-toggle="collapse" href="#collapse-1">
                آیا میخواهید سریالهای از ابتدا ساخته شوند؟
            </a>
        </p>
        <div class="collapse pb-4" id="collapse-1">
            <div class="alert-danger">
                <p class="mb-2">دقت داشته باشید که با ساخت کدهای جدید از ابتدا، کدهای ساخته شده در قرعه کشی های قبل (به
                    جز برندگان) پاک خواهد شد.</p>
            </div>
            <input type="checkbox" name="from_first" value="1" v-on:change="changeStarting">
            از ابتدا ساخته شود
        </div>
        <div class="row">
            <div class="col-12 col-lg-6 col-xl-4">
                <div class="form-group">
                    <label>عنوان</label>
                    <input id="draw-title" class="form-control" v-model="title">
                    {{ msg}}
                </div>
            </div>
            <div class="col-12 col-xl-auto text-center align-self-end">
                <div class="form-group">
                    <button v-if="loading" type="submit" class="btn btn-success disabled">
                        <i class="mdi mdi-loading mdi-spin"></i>
                        در حال تولید سریال
                    </button>
                    <button v-else type="submit" class="btn btn-success px-5" v-on:click="insert_draw">
                        افزودن
                    </button>

                </div>
            </div>
        </div>
        <p>
            شروع از کد:
            <span class="badge badge-success">
                {{ indexing.toLocaleString() }}
            </span>
        </p>
        <p v-if="latest_code" class="text-success">
            در حال تولید کد:
            <span class="badge badge-success">
                {{ latest_code.toLocaleString() }}
            </span>
        </p>
    </div>
</template>

<script>
    let url = $('meta[name="page-url"]').attr('content');
    export default {
        props: ['data'],
        data() {
            return {
                msg: '',
                title: '',
                loading: false,
                draw_id: null,
                latest_code: "",
                indexing: this.data.indexing,
                starting: this.data.starting
            }
        },

        methods: {
            changeStarting(e) {
                if (e.target.checked) {
                    this.starting = 0;
                    this.indexing = 0;
                } else {
                    this.starting = this.data.starting
                    this.indexing = this.data.indexing
                }
            },
            insert_draw() {
                let vm = this;
                vm.loading = true;
                axios.post(url, {'req_type': 'draw_insert', 'title': vm.title, 'start': vm.starting}
                ).then(function (response) {
                    if (response && response.status == 200) {
                        console.log(response.data);
                        if (response.data.draw_id) {
                            vm.draw_id = response.data.draw_id;
                            vm.generate_code(vm.starting, vm.indexing);
                        } else {
                            vm.loading = false;
                        }
                    }

                }).catch(function (error) {
                    console.log(error.response);
                    vm.loading = false;
                });
            },
            generate_code(start, index) {
                let vm = this;
                vm.loading = true;
                axios.post(url, {
                        'req_type': 'generate_code',
                        'draw_id': vm.draw_id,
                        'index': index,
                        'start': start,
                    }
                ).then(function (response) {
                    if (response && response.status == 200) {
                        console.log(response.data);
                        if (response.data.index) {
                            if (response.data.is_end) {
                                window.location = $('meta[name="main-url"]').attr('content') + '/runs/' + vm.draw_id;
                            } else {
                                vm.generate_code(response.data.start, response.data.index);
                                vm.latest_code = response.data.index;
                            }
                        } else {
                            vm.loading = false;
                        }
                    }

                }).catch(function (error) {
                    console.log(error.response);
                    vm.loading = false;
                });
            }
        }
    }
</script>
