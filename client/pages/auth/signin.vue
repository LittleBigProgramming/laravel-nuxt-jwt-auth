<template>
  <div class="container has-text-centered">
    {{ errors }}
    <div class="column is-4 is-offset-4">
      <div class="title has-text-gray">
        <div class="box">
          <form action="#" @submit.prevent="submit">
            <div class="field">
              <div class="control">
                <label for="email" class="label">Email Address</label>
                <input
                  id="email"
                  v-model="form.email"
                  class="input is-large"
                  :class="{ 'is-danger': errors.email }"
                  type="email"
                  placeholder="Enter your email"
                  autofocus=""
                >

                <p class="help is-danger" v-if="errors.email">
                  {{ errors.email[0]}}
                </p>
              </div>
            </div>

            <div class="field">
              <div class="control">
                <label for="password" class="label">Password</label>
                <input id="password" v-model="form.password" type="password" class="input is-large">
                <p class="help is-danger" v-if="errors.password">
                  {{ errors.password[0]}}
                </p>
              </div>
            </div>
            <button class="button is-block is-info is-large is-fullwi dth">
              Login
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  middleware: 'guest',
  data() {
    return {
      form: {
        email: '',
        password: ''
      }
    }
  },
  methods: {
    async submit() {
      await this.$auth.login({
        data: this.form
      })

      this.$router.push({
        path: '/'
      })
    }
  }
}
</script>
