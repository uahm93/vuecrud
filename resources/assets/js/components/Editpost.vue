<template id="post-edit">
     <div>
         <h3>Agregar nueva publicación</h3>

         <form v-on:submit.prevent = "updatePost">
             <div class="form group">
                 <label for="edit-title">Titulo</label>
                 <input id="edit-title"  class="form-control" v-model="post.title" required />
             </div>
             <div class="form group">
                    <label for="edit-body">Cuerpo</label>
                    <textarea class="form-control" rows="10" v-model="post.body" required ></textarea>
             </div>  
             <button type="submit" class="btn btn-xs btn-primary">crear publicación</button>          
             <router-link class="btn btn-xs btn-warning" v-bind:to="'/'">Cancelar</router-link>
         </form>
     </div>
</template>
<script>
export default {
    data: function(){
          return {post: {title: '', body: ''}};
      },
        created: function(){
            let uri = 'http://127.0.0.1:8000/posts/'+this.$route.params.id+'/edit';
            Axios.get(uri).then((response) => {
                this.post = response.data;
          });
    },
    methods: {
        updatePost: function(){
            let uri = 'http://127.0.0.1:8000/posts/'+this.$route.params.id;
            Axios.patch(uri, this.post).then((response) => {
            this.$router.push({name: 'Listposts'})
            })
        }
    }
}
</script>
