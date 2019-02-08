<template id="post-list">
     <div class="row">
         <div class="pull right">
             
             <router-link class="btn btn:xs btn-primary" v-bind:to="{path: '/add-post'}">
             <span class="glyphicon glyphicon-plus"></span>
             Agregar nuevo POST
            </router-link>
            <br>
         </div>
         <table class="table table-bordered">
             <thead>
                 <tr>
                     <th>#</th>
                     <th>titulo de la publicación</th>
                     <th>Contenido de la publicación</th>
                     <th class="col-md-2">Acciones</th>
                 </tr>
             </thead>
             <tbody>
                 <tr v-for="(post, index) in filteredPosts">
                     <td>{{ index + 1 }}</td>
                     <td>{{ post.title }}</td>
                     <td>{{ post.body }}</td>
                     <td>
                         <router-link class="btn btn-info info-xs" v-bind:to="{name: 'Viewpost', params: {id:post.id}}">Mostrar</router-link>            
                         <router-link class="btn btn-warning warning-xs" v-bind:to="{name: 'Editpost', params: {id:post.id}}">Editar</router-link>            
                         <router-link class="btn btn-danger danger-xs" v-bind:to="{name: 'Deletepost', params: {id:post.id}}">Borrar</router-link>            
                     </td>
                 </tr>
             </tbody>
         </table>
     </div>
</template>
<script>
  export default{
      data:function(){
          return {posts: ''};
      },
      created: function(){
          let uri = 'http://127.0.0.1:8000/posts/';
          Axios.get(uri).then((response) => {
              this.posts = response.data;
          });
      },
      computed: {
          filteredPosts: function(){
              if(this.posts.length){
                  return this.posts;
              }
          }
      }
  }
  
</script>
