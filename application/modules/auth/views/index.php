<div class="row">   
    <div class="col-md-4">
        <div class="bd-example" role="tabpanel" style="margin-bottom: 1rem">
            <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-bottom: 1rem">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" data-duration="350" data-height="true" href="#login" role="tab" aria-controls="home" aria-expanded="true">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" data-duration="350" data-height="true" href="#register" role="tab" aria-controls="profile" aria-expanded="false">Registrasi</a>
                </li>
            </ul>
            <div class="tab-content" id="loginContent">
                <div role="tabpanel" class="tab-pane fade active show" id="login" aria-labelledby="home-tab" aria-expanded="true">
                    <form action="javascript:;" id="formLogin"> 
                        <div class="form-group">   
                            <label for="username">Username</label>    
                            <input type="text" class="form-control" id="usernameLogin" name="username" required>
                        </div>
                        <div class="form-group">   
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="passwordLogin" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="remeber">Remember Me</label>
                            <input type="checkbox" name="remember" id="remember">
                        </div>
                        <button type="submit" class="btn btn-success float-right mt-2" required>Login</button>
                    </form>
                </div>
                <div class="tab-pane fade " id="register" role="tabpanel" aria-labelledby="profile-tab" aria-expanded="false">
                    <form action="javascript:;" id="formReg"> 
                        <div class="form-group">
                            <label for="username">Username</label>    
                            <input type="text" class="form-control" id="usernameReg" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>    
                            <input type="password" class="form-control" id="passwordReg"  name="password"required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>    
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="nama-depan">Nama Depan</label>    
                            <input type="text" class="form-control" id="nama-depan" name="nama-depan" required>
                        </div>
                        <div class="form-group">
                            <label for="nama-belakang">Nama Belakang</label>    
                            <input type="text" class="form-control" id="nama-belakang" name="nama-belakang" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>    
                            <input type="text" class="form-control" id="alamat" name="alamat" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">No Handphone</label>    
                            <input type="number" class="form-control" id="phone" name="phone" required>
                        </div>
                        <button type="submit" class="btn btn-success float-right mt-2">Register</button>
                    </form>  
                </div>
            </div>
        </div>
    </div>
</div>
<script>
'use strict'

let formLogin = document.getElementById('formLogin');
formLogin.onsubmit = (e) => {
    const formData = new FormData(formLogin);
    qwest.post('auth/login',formData)
    .then((res)=>{
        if(res.response==""){
            alerty.toasts('Incorect username/password',{
                place:'top',  
                bgColor: 'red',
                fontColor: '#fff' 
            });
        }else{
            alerty.toasts(res.response,{
                place:'top',  
                bgColor: 'rgb(0, 202, 67)',
                fontColor: '#fff' 
            },(res)=>{
                //Pjax.assign('<?php echo base_url()?>admin/films');
            });
            console.log(res);
            
        }
    }).catch((err)=>{
        console.log(err);
    });
}

let formReg = document.getElementById('formReg');
formReg.onsubmit = (e) => {
    const formData = new FormData(formReg);
    qwest.post('auth/register',formData)
         .then((res)=>{
            console.log(res);
            alerty.toasts(res.response,{
                place:'top',  
                bgColor: 'rgb(0, 202, 67)',
                fontColor: '#fff' 
            },(res)=>{
                //Pjax.assign('<?php echo base_url()?>admin/films');
            });
         })
         .catch((err)=>{
            console.log(err);
         })
}
</script>