<template>
  <div class="row login-page">
    <div class="col login-page__left-column"></div>
    <div class="col login-page__right-column">
      <div class="row justify-content-center login-page__logo">
        <div class="col-10">
          <div class="row justify-content-center">
            <div class="col p-0" style="max-width: 84px;">
              <svg width="84" height="100" viewBox="0 0 84 100" fill="none" xmlns="http://www.w3.org/2000/svg"
                   xmlns:xlink="http://www.w3.org/1999/xlink">
                <rect x="0.333374" y="-6.10352e-05" width="83.3333" height="100" fill="url(#pattern0)"/>
                <defs>
                  <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                    <use xlink:href="#image0" transform="scale(0.005 0.00416667)"/>
                  </pattern>
                  <image id="image0" width="200" height="240"
                         xlink:href="data:image/png;base64,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"/>
                </defs>
              </svg>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col login-page__caption">
              <h5>Формирование интерактивной карты благоустройства г. Москвы</h5>
            </div>
          </div>
        </div>
      </div>
      <div class="row justify-content-center login-page__form-wrapper">
        <div class="col-9 login-page__form">
          <div class="row">
            <div class="col">
              <div class="form-group">
                <h4>Войти</h4>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <span class="paragraph2">Введите свой логин и пароль</span>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col">
              <form autocomplete="off" @submit.prevent="login" method="post">
                <div class="form-group">
                  <div class="control">
                    <label>
                      <input type="text" placeholder=" " v-model="user.name">
                      <span>Ваш логин</span>
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="control">
                    <label>
                      <input type="password" placeholder=" " v-model="user.password">
                      <span>Ваш пароль</span>
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="control">
                    <button class="button button-label" type="submit">Войти</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: "Login",
    data: function () {
      return {
        user: {
          name: '',
          password: '',
          has_error: false,
          error: ''
        }
      }
    },
    methods: {
      login() {
        // get the redirect object
        var app = this
        this.$auth
            .login({
              data: {
                name: app.user.name,
                password: app.user.password
              }, // Axios
              redirect: 'home',
              fetchUser: true,
              staySignedIn: true,
            })
            .then((res) => {
              this.$auth.remember(JSON.stringify({
                name: this.$auth.user().name,
                roles: this.$auth.user().roles
              }));
              this.$router.push({name: 'home'});
            }, (res) => {
              this.errors(
                  res.response || // Axios
                  res             // VueResource
              );
            });
      }
    }
  }
</script>

<style scoped>

</style>
