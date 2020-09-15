<template>
  <v-card
    color="grey lighten-4"
    flat
    height="200px"
    tile
  >
    <v-toolbar dense>
      <!-- <v-app-bar-nav-icon></v-app-bar-nav-icon> -->

      <v-toolbar-title>Forum</v-toolbar-title>

      <v-spacer></v-spacer>
    <div class="hidden-sm-and-down">
        
        <router-link 
        v-for="item in items"
        :key="item.title"
        :to="item.to"
        >

          <v-btn text v-if="item.show">{{item.title}}</v-btn>
        </router-link>

    </div>
    </v-toolbar>
  </v-card>
</template>



<script>
export default {
    data(){
      return {
        items:[
          {title : 'Forum', to:'/forum',show:true},
          {title : 'Login', to:'/login',show: !User.loggedIn()},
          {title : 'Ask Question', to:'/ask',show: User.loggedIn()},
          {title : 'Catgory', to:'/category',show: User.loggedIn()},
          {title : 'Logout', to:'/logout',show: User.loggedIn()},
        ]
      }
    },
      created(){
        EventBus.$on('logout', () =>{
          User.logout()
        })
      }
    
}
</script>