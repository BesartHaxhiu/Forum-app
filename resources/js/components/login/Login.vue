<template>
  <v-form @submit.prevent="login">
    <v-container>

        <v-col
          cols="6"
          md="8"
        >
          <v-text-field
            v-model="form.email"
            type="email"
            label="E-mail"
            required
          ></v-text-field>

          <v-text-field
            v-model="form.password"
            type="password"
            label="Password"
            required
          ></v-text-field>
        </v-col>

        <v-btn color='red' type="submit">
            Login

        </v-btn>
    </v-container>
  </v-form>
</template>

<script>
  export default {
      data(){
          return{
              form :{
                  email:null,
                  password:null
              }
          }
      },
      methods: {
        login(){
          axios.post('/api/auth/login', this.form)
          .then(res => console.log(res.data))
          .catch(error => console.log(error.response.data))
        }
      }
  }
</script>