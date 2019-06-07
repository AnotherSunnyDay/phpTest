<template>
    <div>
        <nav class="navbar navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Php Laravel</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="#" @click="showHome()">Home</a></li>
                    <li><a href="#" @click="showForm()">Contact</a></li>
                </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
        <div class="jumbotron index">
            <h1>Welcome to our site!</h1>
            <p>Please contact us with all of your questions. We are always happy to help serve our customers. One of our agesnts will get back to you as soon as possible!</p>
            <a href="#" class="btn btn-primary btn-lg" @click="showForm()">Contact Us</a>
        </div>

        <form action="/" method="post" class='theForm'>
                <ul>
                    <!-- <li v-for="error in errors">{{ error }}</li> -->
                    <li v-if="errors.name" class='alert alert-danger'>{{errors.name}}</li>
                    <li v-if="errors.email" class='alert alert-danger'>{{errors.email}}</li>
                    <li v-if="errors.message" class='alert alert-danger'>{{errors.message}}</li>
                </ul>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name='name' v-model="contact.name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name='email' v-model="contact.email">
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea name="message" class='form-control' v-model="contact.message"></textarea>
            </div>
            <input type="submit" value="Submit" class='btn btn-success' v-on:click='save'>
        </form>

        <div class="jumbotron completed">
            <h2>Thank you for your message!</h2>    
            <p>I we need to contact you, we will do so as soon as possible.</p>
            <a href="#" class="btn btn-primary btn-lg" @click="showHome()">Home</a>
        </div>    

    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data:function(){
            return{
                errors: {
                    name: '',
                    email:'',
                    message:''
                },
                contact:{
                    name: '',
                    email:'',
                    message:''
                }
                
            }
        },
        methods: {
            showForm: function(){
                $('.index').hide();
                $('.completed').hide();
                $('.theForm').show();
            },
            showHome: function(){
                $('.completed').hide();
                $('.theForm').hide();
                $('.index').show();
            },
            save: function(e){
                e.preventDefault();
                if(this.contact.name && this.contact.email && this.contact.message){
                    let self = this;
                    let params = Object.assign({}, self.contact);
                    axios.post('/api/contact/store', params)
                        .then((response)=>{
                            console.log(response.data);
                            // router.go('/');
                            $('.index').hide();
                            $('.theForm').hide();
                            $('.completed').show();
                            self.contact.name='';
                            self.contact.email='';
                            self.contact.message='';
                            self.error=[];
                        })
                        .catch(function(error){
                            console.log(error)
                        });
                }
                if (!this.contact.name){
                    this.errors.name = "Name required"
                } 
                else { this.errors.name = ""}
                if (!this.contact.message){
                    this.errors.message = "Message required"
                } 
                else { this.errors.message = ""}
                if (!this.contact.email){
                    this.errors.email = "Email required"
                } 
                else if (!this.validateEmail(this.contact.email)){
                    this.errors.email='Valid email required.';
                }
                else { this.errors.email = ""}
                    
            },

            validateEmail: function (email) {
                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(email);
            },
        }
    }
</script>

<style>
    .theForm{
        display:none;
    }
    .completed{
        display:none;
    }
</style>

