<template>
    <div class="container container-fluid">
        <h4>MERCURIUS系统管理后台</h4>
        <div class="login-container-form">
            <i-form ref = "account_form" :model = "account">
                <item prop = "username">
                    <i-input type = "text" size = "large" v-model = "account.username" placeholder = "用户名/手机号">
                        <i-icon type="ios-person-outline" slot="prepend"></i-icon>
                    </i-input>
                </item>
                <item prop = "password">
                    <i-input type = "password" size = "large" v-model = "account.password" placeholder = "账号密码">
                        <i-icon type="ios-lock-outline" slot="prepend"></i-icon>
                    </i-input>
                </item>
                <item class="remember-me" prop = "rememberMe">
                    <i-check-box v-model="account.rememberMe">
                        <span>记住我</span>
                    </i-check-box>
                    <a class="forget-link" href="#">
                        <span>忘记密码</span>
                    </a>
                </item>
                <item>
                    <i-button class = "login-btn" type="success" @click="handleSubmit" long>登陆</i-button>
                </item>
                <item class="register-item">
                    <a class="register-link" href="#">
                        <span>立即注册<i-icon type="ios-arrow-dropright-circle" /></span>
                    </a>
                </item>
            </i-form>
        </div>
    </div>
</template>

<script>
    import { Button, Form, FormItem, Input, Icon, Checkbox} from 'iview';
    export default {
        name: "Login",
        props: ['rememberMe'],
        components: {
            'i-button': Button,
            'i-form': Form,
            'i-input': Input,
            'item': FormItem,
            'i-icon': Icon,
            'i-check-box': Checkbox
        },
        data() {
            return {
                account: {
                    username: null,
                    password: null,
                    rememberMe: false
                }
            };
        },
        created () {
          this.account.rememberMe = this.rememberMe;
          console.log('remember me ', this.rememberMe);
        },
        methods: {
            handleSubmit () {
                console.log('remember me ', this.rememberMe);
            }
        }
    }
</script>
<style lang="scss">
    html {
        height: 100%;
        position: absolute;
        width: 100%;
    }
    body {
        height: 100%;
        width: 100%;
    }
</style>
<style lang="scss" scoped>
    h4{
        position: relative;
        top: 22vh;
        margin: auto;
        text-align: center;
        text-align: -moz-center;
        text-align: -webkit-center;
    }
    .login-container-form {
        margin:  auto;
        padding: 52px 48px 24px 48px;
        border-radius: 3%;
        border: 1px #dadada solid;
        width: 26vw;
        min-width: 300px;
        max-width: 350px;
        top: 24vh;
        position: relative;
    }
    .ivu-form-item .ivu-checkbox-wrapper{
        margin-bottom: 0;
    }
    .ivu-form-item {
        margin-bottom: 16px;
    }
    .ivu-form-item .ivu-form-item-content{
        line-height: 24px;
    }
    .login-btn {
        word-spacing: 64px;
    }
    .remember-me span, .register-item span{
        color: #2ab27b;
    }
    .forget-link , .register-link{
        position: absolute;
        right: 6px;
    }
    .forget-link span:hover, .register-link span:hover{
        color: #cb4231;
    }
</style>
