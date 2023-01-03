var app = new Vue({
    el: '#app',
    data:{
        showDeleteOverlay: false,
        showEditOverlay: false,
        users: [],
        newUser: {id: "", name : "", email : "", age: "", date: "",address: "", pc: "", province: "", gender: "", pswrd: ""},
        newArticle: {id: "", title: "", author: "", content:"", likes: ""},
        currentUser: {},
        currentArticle: {},
        news: [],
        lastNews: [],
        logInUser: {id: "", email: "", pswrd : ""}
    },
    mounted: function(){
        this.getAllUser();
        this.getAllNews();
        this.getLastNews();
    },
    methods:{
        getAllUser(){
            axios.get("http://localhost/BCKND/funciones_bd.php?action=read").then(function(response){
                if(response.data.error){
                    app.errorMsg = response.data.message;
                }
                else{
                    app.users = response.data.user;
                }
            });
        },
        addUser(){
            var formData = app.toFormData(app.newUser);
            axios.post("http://localhost/BCKND/funciones_bd.php?action=create", formData).then(function(response){
                app.newUser = { name : "", email : "", age: "", date: "",address: "", pc: "", province: "", gender: "", pswrd: ""};
                if(response.data.error){                    
                    app.errorMsg = response.data.message;
                }
                else{
                    app.successMsg = response.data.message;
                    app.getAllUser();
                }});
        },
        updateUser(){
            var formData = app.toFormData(app.currentUser);
            axios.post("http://localhost/BCKND/funciones_bd.php?action=update", formData).then(function(response){
                app.currentUser = {};
                if(response.data.error){                    
                    app.errorMsg = response.data.message;
                }
                else{
                    app.successMsg = response.data.message;
                    app.getAllUser();
                }});
        },
        deleteUser(){
            var formData = app.toFormData(app.currentUser);
            axios.post("http://localhost/BCKND/funciones_bd.php?action=detele", formData).then(function(response){
                app.currentUser = {};
                if(response.data.error){                    
                    app.errorMsg = response.data.message;
                }
                else{
                    app.successMsg = response.data.message;
                    app.getAllUser();
                }});
        },
         //Noticias

        getLastNews(){
            axios.get("http://localhost/BCKND/funciones_bd.php?action=readLast").then(function(response){
                if(response.data.error){
                    app.errorMsg = response.data.message;
                }
                else{
                    app.lastNews = response.data.article;
                }
            });
        }, 
        getAllNews(){
            axios.get("http://localhost/BCKND/funciones_bd.php?action=readNews").then(function(response){
                if(response.data.error){
                    app.errorMsg = response.data.message;
                }
                else{
                    app.news = response.data.article;
                }
            });
        },addNews(){
            var formData = app.toFormData(app.newArticle);
            axios.post("http://localhost/BCKND/funciones_bd.php?action=createArticle", formData).then(function(response){
                app.newArticle = { id: "", title : "", author : "", content: ""};
                if(response.data.error){                    
                    app.errorMsg = response.data.message;
                }
                else{
                    app.successMsg = response.data.message;
                    app.getAllNews();
                }});

        },
        updateArticle(){
            var formData = app.toFormData(app.currentArticle);
            axios.post("http://localhost/BCKND/funciones_bd.php?action=updateArticle", formData).then(function(response){
                app.currentArticle = {};
                if(response.data.error){                    
                    app.errorMsg = response.data.message;
                }
                else{
                    app.successMsg = response.data.message;
                    app.getAllNews();
                }});
        },
        daleteArticle(){
            var formData = app.toFormData(app.currentArticle);
            axios.post("http://localhost/BCKND/funciones_bd.php?action=deteleArticle", formData).then(function(response){
                app.currentArticle = {};
                if(response.data.error){                    
                    app.errorMsg = response.data.message;
                }
                else{
                    app.successMsg = response.data.message;
                    app.getAllNews();
                }});
        },
        // Likes
        like(article){
            app.currentArticle = article;
            var formData = app.toFormData(app.currentArticle);
            axios.post("http://localhost/BCKND/funciones_bd.php?action=like", formData).then(function(response){
                app.currentArticle = {};
                if(response.data.error){
                    app.errorMsg = response.data.message;
                }
                else{
                    app.lastNews = response.data.article;
                    app.getAllNews();
                    app.getLastNews();
                    
                }
            });
        },
        //Sesiones
        login(){
            var formData = app.toFormData(app.logInUser);
            axios.post("http://localhost/BCKND/funciones_bd.php?action=login", formData).then(function(response){
                app.logInUser = {};
                if(response.data.error){                    
                    app.errorMsg = response.data.message;
                }
                else{
                    app.successMsg = response.data.message;
                    app.getAllUser();
                }});
        },
        //Seleciones
        selectUser(user){
            app.currentUser = user;
        },
        selectNews(article){
            app.currentArticle = article;
        },
        //Formularios
        toFormData(obj){
            var fd = new FormData();
            for(var i in obj){
                fd.append(i,obj[i]);                
            }
            return fd;
        }
        
    }
});
