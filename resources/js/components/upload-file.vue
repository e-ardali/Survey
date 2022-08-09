<template>
    <div>
        <form ref="upload_form">
            <div class="form-row">
                <div class="col-auto">
                    <div class="form-group mb-2">
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="upload_file" :class="['custom-file-input', input_class]" type="file"
                                       v-on:change="onImageChange">
                                <label class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <button type="button" class="btn btn-success btn-block px-4" @click="uploadFile"
                            v-html="btn_text" :disabled="btn_loading"></button>
                </div>
                <div class="col-12">
                    <p class="small m-0">فقط فایلهای اکسل</p>
                    <p class="eng h6 m-0">{{ file_name }}</p>
                    <p :class="msg_class" class="small m-0" v-html="msg"></p>
                </div>
            </div>
        </form>
        <ul class="list-unstyled text-success mt-4">
            <li v-if="run_status">
                وضعیت :
                {{ run_status }}
            </li>
            <li v-if="counts">
                تعداد سطرها:
                {{ counts }}
            </li>
            <li v-if="run_loop">
                آخرین سطر اضافه شده:
                {{ run_loop }}
            </li>
        </ul>
    </div>
</template>

<script>
    let url = $('meta[name="page-url"]').attr('content');
    let types = ["csv", "xlsx", "xls"];
    export default {
        props: ['data'],
        data() {
            return {
                upload_file: '',
                input_class: '',
                file_name: '',
                msg: '',
                msg_class: 'hide',
                btn_loading: false,
                btn_text: 'آپلود',
                req_type: this.data.req_type,
                counts: "",
                run_status: "",
                run_loop: ""
            }
        },
        methods: {
            onImageChange(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);
            },
            createImage(file) {
                let reader = new FileReader();
                reader.onload = (e) => {

                    if (!types.includes(file.name.split('.').pop())) {
                        this.input_class = 'is-invalid';
                        this.msg = 'فایلهای ' + file.name.split('.').pop() + "قابل آپلود شدن نیستند! ";
                        this.msg_class = 'text-danger';
                        return;
                    }

                    this.input_class = 'is-valid';
                    this.file_name = file.name;
                    this.upload_file = file;
                };
                reader.readAsDataURL(file);
            },
            uploadFile() {

                this.btn_loading = true;
                this.btn_text = '<i class="mdi mdi-loading mdi-spin"></i>';

                let formData = new FormData(this.$refs.upload_form);
                let vm = this;
                if (vm.upload_file != "") {
                    axios.post(url,
                        formData,
                        {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        }
                    ).then(function (response) {
                        if (response && response.status == 200) {

                            if (response.data.result == 'error') {
                                vm.input_class = 'is-invalid';
                                vm.msg = 'این فایل قابل آپلود شدن نیست!';
                                vm.msg_class = 'text-danger';
                                return;
                            }

                            if (response.data.file_name) {
                                console.log(response.data);
                                vm.insert_request(response.data.file_name, response.data.loop);
                                return;
                            }
                        }

                        vm.btn_loading = false;
                        vm.btn_text = 'آپلود';

                    }).catch(function (error) {
                        vm.input_class = 'is-invalid';
                        vm.msg = 'خطا از سمت سرور!';
                        vm.msg_class = 'text-danger';
                        vm.btn_loading = false;
                        vm.btn_text = 'آپلود';
                        console.log(error.response);
                    });
                } else {
                    vm.input_class = 'is-invalid';
                    vm.btn_loading = false;
                    vm.btn_text = 'آپلود';
                }
            },
            insert_request(file, loop) {

                let vm = this;
                if (vm.upload_file != "") {
                    axios.post(url, {'file_name': file, 'loop': loop, 'req_type': vm.req_type}
                    ).then(function (response) {
                        if (response && response.status == 200) {

                            console.log(response.data);

                            vm.counts = response.data.end_key;
                            vm.run_loop = response.data.loop;

                            if (response.data.is_end) {
                                vm.run_status = 'با موفقیت اجرا شد!'
                                vm.btn_loading = false;
                                vm.btn_text = 'آپلود';
                                window.location.href = window.location.origin + window.location.pathname + "?result=success";
                            } else {
                                vm.run_status = 'در حال اجرا ...'
                                vm.insert_request(response.data.file_name, response.data.loop);
                                return;
                            }
                        }

                        vm.btn_loading = false;
                        vm.btn_text = 'آپلود';

                    }).catch(function (error) {
                        vm.input_class = 'is-invalid';
                        vm.msg = 'خطا از سمت سرور!';
                        vm.msg_class = 'text-danger';
                        vm.btn_loading = false;
                        vm.btn_text = 'آپلود';
                        console.log(error.response);
                    });
                } else {
                    vm.input_class = 'is-invalid';
                    vm.btn_loading = false;
                    vm.btn_text = 'آپلود';
                }
            }
        }
    }
</script>
