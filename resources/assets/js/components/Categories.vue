<template>
  <div>
    <div v-if="userState.authenticated">
        <div>
            <!-- <ul v-for="category in categories" v-bind:key="category.id">
                <li>
                    {{category.id}}
                    {{ category.name }}
                </li>
                <button @click="removeCategory(category)" class="btn btn-sm btn-danger">Remove</button>
            </ul> -->
            <ul v-for="category in categories" v-bind:key="category.id">
              <li>
                 {{category.id}}
                 <input type="text" name="name" v-bind:value=category.name v-if="edit">
                 <input type="text" name="name" v-bind:value=category.name disabled="disabled" v-else>
              </li>
                 <button @click="edit = true" class="btn btn-sm btn-danger">Edit</button>
                 <button @click="removeCategory(category)" class="btn btn-sm btn-danger">Remove</button>
            </ul>

            <div class="form-group">
            <div class="alert alert-d   anger" role="alert" v-if="showAlert">
                {{ alertMessage }}
            </div>
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
        edit: false,
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