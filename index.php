<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <title>Hello, world!</title>
    </head>
    <body>
        <div class="container" id="app">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <h3>Form Validation</h3>
                    <form id="validation" name="fileinfo" @submit.prevent="processForm" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email" v-model="formData.email" v-bind:class="{ 'is-invalid' : errorsArray.email.errorStatus }">
                            <div class="alert alert-danger px-2 py-1 mt-1" role="alert" v-for="error in errorsArray.email.errors">
                                {{error}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" v-model="formData.password" v-bind:class="{ 'is-invalid': errorsArray.password.errorStatus }">
                            <div class="alert alert-danger px-2 py-1 mt-1" role="alert" v-for="error in errorsArray.password.errors">
                                {{error}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputAge">Password</label>
                            <input type="text" class="form-control" id="exampleInputAge" placeholder="Age" name="age" v-model="formData.age" v-bind:class="{ 'is-invalid': errorsArray.age.errorStatus }">
                            <div class="alert alert-danger px-2 py-1 mt-1" role="alert" v-for="error in errorsArray.age.errors">
                                {{error}}
                            </div>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>    
    
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="assets/js/validation.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script>
            $(document).ready(function(){
                // $('#validation').submit(function(e){
                //     e.preventDefault();
                //     var form = document.forms.namedItem("fileinfo");
                //     console.log(typeof form);
                //     oData = new FormData(form);
                //     console.log(typeof oData);
                //     for (var [key, value] of oData.entries()) { 
                //         console.log(key, value);
                //     }
                //     console.log(JSON.stringify(oData));
                // })
            });
            var app = new Vue({
                el: '#app',
                data: {
                    formData : {
                        email : 'webfort.princepalsingh@gmail.com',
                        password : 'admin',
                        age : ''
                    },
                    validateArray : [
                        {
                            key : 'email',
                            validations : [
                                {
                                    type : 'email',
                                }   
                            ]
                        },
                        {
                            key : 'password',
                            validations : [
                                {
                                    type : 'minMaxLen',
                                    value : [6,9]
                                }
                            ]
                        },
                        {
                            key : 'age',
                            validations : [
                                {
                                    type : 'required'
                                },
                                {
                                    type : 'minVal',
                                    value : 6
                                },
                                {
                                    type : 'maxVal',
                                    value : 9
                                },
                            ]
                        }
                    ],
                    errorsArray : []
                },
                methods : {
                    processForm : function(){
                        const obj = new validation( this.validateArray , this.formData );
                        this.errorsArray = obj.startValidate();
                        // console.log(this.errorsArray);
                    }
                },
                created (){
                    // console.log(validation.validateEmail(this.formData.email));
                    this.errorsArray = validation.generateErrorArray(this.formData);
                    // console.log(validation.generateErrorArray(this.formData));
                }
            })
        </script>
    </body>
</html>