import Vue from 'vue'
import App from './App.vue'
import router from './router'
import vuetify from './plugins/vuetify'
import 'material-design-icons-iconfont/dist/material-design-icons.css'
import axios from 'axios'


Vue.config.productionTip = false

new Vue({
  router,
  vuetify,
  axios,
  render: h => h(App)
}).$mount('#app')
