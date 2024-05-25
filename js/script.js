const { createApp } = Vue;

createApp({
  data() {
    return {
        newAlbum:{},
        listaAlbum:[],
        like:"",
        newTitolo:"",
        newAutore:"",
        newAnno:"",
        newGenere:"",
        newImmagine:"",
    };
  },
  created() {
    axios
      .get("http://localhost/boolean/php-dischi-json/server.php")
      .then((resp) => {
        this.listaAlbum = resp.data.risultati;
        
      });
      
  },
  methods: {
    addAlbum (){
      const data = {
        newAlbum: {
        title: this.newTitolo,
        author: this.newAutore,
        genre: this.newGenere,
        year: this.newAnno,
        poster: this.newImmagine,
      },
      };
      axios
      .post("http://localhost/boolean/php-dischi-json/server.php", data, {
        headers: {
          "Content-type": "multipart/form-data",
        },
      })
      .then((resp) => {
        this.listaAlbum = resp.data.risultati;
      });
      this.newTitolo="";
      this.newAutore="";
      this.newAnno="";
      this.newGenere="";
      this.newImmagine="";
      console.log(this.listaAlbum)
    },
  },
}).mount("#app");