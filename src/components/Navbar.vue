<template>
<nav> 

    <!-- nav bar -->
    <v-app-bar app>
        <v-app-bar-nav-icon class="grey--text" @click="drawer = !drawer"></v-app-bar-nav-icon>
        <v-toolbar-title class="text-uppercase grey--text">
            <span class="font-weight-light">Dynaxis</span>
            <span>BOOKONE</span>
            </v-toolbar-title>
            
            <v-spacer></v-spacer>

            <v-btn text color="grey">
                <span>Sign Out</span>
                <v-icon right>logout</v-icon>
            </v-btn>
     </v-app-bar>
     <!-- end of nav bar -->

<!-- start side bar -->
     <v-navigation-drawer v-model="drawer" :mini-variant.sync="mini"
      permanent app class="cyan darken-4">
         <v-list nav dense>
             <v-list-item v-for="link in links" :key="link.text" router :to="link.route">
                 <v-list-item-action>
                     <v-icon class="white--text">{{link.icon}}</v-icon>
                 </v-list-item-action>
                 <v-list-item-content>
                     <v-list-item-title  class="white--text">
                         {{link.text}}
                     </v-list-item-title>
                 </v-list-item-content>
             </v-list-item>
         </v-list>
     </v-navigation-drawer>
<!-- end of side bar -->

</nav>
   
  
    
</template>
<script>
export default {
data() {
    return {
        drawer: true,
        links:[
            {icon:'dashboard',text:'Dashboard',route:'/'},
            {icon:'group',text:'Mes Clients',route:'/clients'},
            {icon:'analytics',text:'Statistiques',route:'/stats'},
            {icon:'contacts',text:'Prospects',route:'/prospects'},
            {icon:'accessibility',text:'permissions',route:'/permissions'},
            
           
        ]

    }
},

    
}
</script>