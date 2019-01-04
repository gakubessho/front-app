<template>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand " href="/">LaravelSample</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!--ログイン済 -->
    <div class="collapse navbar-collapse" id="navbarNavDropdown" v-if="userState.authenticated">
        <ul class="navbar-nav mr-auto">　
          <li class="nav-item">
            <router-link to="/about" class="nav-link">About</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/" class="nav-link">Categories</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/records" class="nav-link">Records</router-link>
          </li>
        </ul>

        <ul class="navbar-nav">
          <li class="nav-item">
            <a @click="logout()" class="nav-link">Log Out</a>
          </li>
        </ul>
    </div>

    <!--未ログイン-->
    <div class="collapse navbar-collapse" id="navbarNavDropdown" v-else>
        <ul class="navbar-nav">
          <li class="nav-item">
            <router-link to="/login" class="nav-link">Log in</router-link>
          </li>
        </ul>
    </div>

  </div>
</nav>
</template>

<script>
  import userStore from '../stores/userStore'

  export default {
    data (){
      return {
        userState: userStore.state
      }
    },
    methods: {
      logout() {
        userStore.logout( () => {
          this.$router.push('/login')
        })
      }
    }
  }
</script>