<template>
  <div>
    <div v-if="userState.authenticated">
        <div>
            <div class="form-group">
            <input type="text" class="form-control"
                v-model="name" @keyup.enter="addCategory" placeholder="new category...">
            <button class="btn btn-primary" disabled="disabled" v-if="name === ''">
                Add category
            </button>
            <button class="btn btn-primary" @click='addCategory' v-else>
                Add category
            </button>
            </div>
        </div>
    </div>    
    <p v-else>
         please <router-link to="/login">Login.</router-link>
    </p>
  </div>
</template>
<script>
  import http from '../services/http'
  import userStore from '../stores/userStore' 

  export default {
    mounted() {
      this.fetchCategories()
    },
    data() {
      return {
        categories: [],
        name: '',
        showAlert: false,
        alertMessage: '',
        userState: userStore.state, 
      }
    },
    methods: {
      fetchCategories () {
        // TODO: not to send request when the user is not authenticated
        http.get('categories', res => {
          this.categories = res.data
        })
      },
      addCategory () {
        if (this.name === '') {
          this.showAlert = true
          this.alertMessage = 'Category name should not be blank.'
          return false
        }
        http.post('categories', {name: this.name}, res => {
          this.categories[res.data.id] = res.data
          this.name = ''
          this.showAlert = false
          this.alertMessage = ''
        })
      },
      completeCategory (category) {
        http.put('categories/' + category.id, {is_done: !category.is_done}, res => {
          this.categories[category.id] = res.data
          this.$forceUpdate()
        })
      },
      removeCategory (category) {
        http.delete('categories/' + category.id, {}, () => {
          delete this.categories[category.id]
          this.$forceUpdate()
        })
      },
    }
  }
</script>