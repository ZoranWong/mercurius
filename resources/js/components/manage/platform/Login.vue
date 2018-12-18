<template>
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
                <i-check-box v-model="account.rememberMe" :disabled="disabled">
                    <span>记住我</span>
                </i-check-box>
            </item>
            <item>
                <i-button class = "login-btn" type="success" @click="handleSubmit" long>登陆</i-button>
            </item>
        </i-form>
    </div>
</template>

<script>
    import { Button, Form, FormItem, Input, Icon, Checkbox} from 'iview';
    export default {
        name: "Login",
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
        methods: {
            handleSubmit () {

            }
        }
    }
</script>

<style scoped>
    .login-container-form {
        margin:  auto;
        padding: 52px 48px 24px 48px;
        border-radius: 3%;
        border: 1px #dadada solid;
        width: 300px;
        top: 300px;
        position: relative;
    }
    .ivu-form-item .ivu-checkbox-wrapper{
        margin-bottom: 0;
    }
    .ivu-form-item {
        margin-bottom: 12px;
    }
    .ivu-form-item .ivu-form-item-content{
        line-height: 24px;
    }
    .login-btn {
        word-spacing: 64px;
    }
</style>
