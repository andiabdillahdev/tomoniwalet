<template>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">

                            </div>
                            <h4>Hello! let's get started</h4>
                            <h6 class="font-weight-light">Sign in to continue.</h6>
                            <form class="pt-3">
                                <div class="form-group" :class="{'has-error': errors.email}">
                                    <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username" v-model="data.email">
                                    <p class="text-danger" v-if="errors.email">{{ errors.email[0] }}</p>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg"
                                        id="exampleInputPassword1" placeholder="Password" :class="{'has-error': errors.password}">
                                        <p class="text-danger" v-if="errors.password">{{ errors.password[0] }}</p>
                                </div>
                                <div class="alert alert-danger" v-if="errors.invalid">{{ errors.invalid }}</div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" @click.prevent="postLogin">SIGN IN </button>
                                </div>
                              
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
</template>
<script>
import { mapActions, mapMutations, mapGetters, mapState } from 'vuex';
export default {
    data() {
        return {
            data: {
                email: '',
                password: '',
                remember_me: false
            }
        }
    },
    //SEBELUM COMPONENT DI-RENDER
    created() {
        //KITA MELAKUKAN PENGECEKAN JIKA SUDAH LOGIN DIMANA VALUE isAuth BERNILAI TRUE
        if (this.isAuth) {
            //MAKA DI-DIRECT KE ROUTE DENGAN NAME home
            this.$router.push({ name: 'home' })
        }
    },
    computed: {
        ...mapGetters(['isAuth']), //MENGAMBIL GETTERS isAuth DARI VUEX
      	...mapState(['errors'])
    },
    methods: {
        ...mapActions('auth', ['submit']), //MENGISIASI FUNGSI submit() DARI VUEX AGAR DAPAT DIGUNAKAN PADA COMPONENT TERKAIT. submit() BERASAL DARI ACTION PADA FOLDER STORES/auth.js
        ...mapMutations(['CLEAR_ERRORS']),
      
      	//KETIKA TOMBOL LOGIN DITEKAN, MAKA AKAN MEMINCU METHODS postLogin()
        postLogin() {
            //DIMANA TOMBOL INI AKAN MENJALANKAN FUNGSI submit() DENGAN MENGIRIMKAN DATA YANG DIBUTUHKAN
            this.submit(this.data).then(() => {
                //KEMUDIAN DI CEK VALUE DARI isAuth
                //APABILA BERNILAI TRUE
                if (this.isAuth) {
                    this.CLEAR_ERRORS()
                    //MAKA AKAN DI-DIRECT KE ROUTE DENGAN NAME home
                    this.$router.push({ name: 'home' })
                }
            })
        }
    }
}
</script>