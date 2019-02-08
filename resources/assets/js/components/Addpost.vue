<template id="add-post">
     <div>
         <h3>Agregar nueva publicación</h3>

         <form v-on:submit.prevent = "createPost">
             <div class="form group">
                 <label for="add-title">Titulo</label>
                 <input id="add-title"  class="form-control" v-model="post.title" required />
             </div>
             <div class="form group">
                    <label for="add-body">Cuerpo</label>
                    <textarea class="form-control" rows="10" v-model="post.body" required ></textarea>
             </div>  
             <button type="submit" class="btn btn-xs btn-primary">crear publicación</button>          
             <router-link class="btn btn-xs btn-warning" v-bind:to="'/'">Cancelar</router-link>
         </form>
     </div>
</template>
<script>
  export default{
      data:function(){
          return {post: {title: '', body: ''} };
      },
      methods: {
          createPost: function(){
              
            let uri = 'http://127.0.0.1:8000/posts/';
            Axios.post(uri, this.post).then((response) => {
              this.$router.push({name: 'Listposts'})
          })
       }
      }
     }
</script>
