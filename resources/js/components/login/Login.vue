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

        <router-link to="/signup">
        <v-btn>
            Sign up
        </v-btn>
        </router-link>

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
      created(){
        if(User.loggedIn()){
          this.$router.push({name:'forum'})
        }
      },
      methods: {
        login(){
          User.login(this.form)
        }
      }
  }
</script>