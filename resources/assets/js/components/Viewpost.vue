<template id="post">
     <div >
         <h3>{{ post.title }}</h3>
          <strong>Body: </strong>   
          <div>{{ post.body }}</div>   
          <br>
          <span class="glyphicon glyphicon-arrow-left"></span>
          <router-link v-bind:to="'/'">Regresar a la lista</router-link>
     </div>
</template>
<script>
  export default{
      data: function () {
          return {post: {title: '', body: ''}}
      },
      created: function(){
          let uri = 'http://127.0.0.1:8000/posts/'+this.$route.params.id;
          Axios.get(uri).then((response) => {
              this.post = response.data;
          });
    }
   }
</script>
