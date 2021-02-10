import Vue from 'vue'
import App from './App.vue'
import '../registerServiceWorker'
import router from './router'

// Import lines that were not pre generated 
import AsyncComputed from 'vue-async-computed'

import vuetify from './plugins/vuetify';
import 'roboto-fontface/css/roboto/roboto-fontface.css'
import '@mdi/font/css/materialdesignicons.css'

Vue.config.productionTip = false

// Line added to use AsyncComputed
Vue.use(AsyncComputed)

new Vue({
  router,
  vuetify,
  render: h => h(App)
}).$mount('#app')
