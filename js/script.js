const { createApp } = Vue;

createApp({
  data() {
    return {
        listaAlbum:[],
    };
  },
  created() {
    axios
      .get("http://localhost/boolean/php-dischi-json/server.php")
      .then((resp) => {
        this.listaAlbum = resp.data.risultati;
        console.log(resp)
      });
      
  },
  methods: {

  },
}).mount("#app");