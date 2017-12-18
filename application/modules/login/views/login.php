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
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">   
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <button type="submit" class="btn btn-success float-right mt-2" required>Login</button>
                    </form>
                </div>
                <div class="tab-pane fade " id="register" role="tabpanel" aria-labelledby="profile-tab" aria-expanded="false">
                    <form action="javascript:;" id="formReg"> 
                        <div class="form-group">
                            <label for="username">Username</label>    
                            <input type="text" class="form-control" id="username">
                        </div>
                        <div class="form-group">
                            <label for="username">Password</label>    
                            <input type="text" class="form-control" id="username">
                        </div>
                        <div class="form-group">
                            <label for="username">Email</label>    
                            <input type="text" class="form-control" id="username">
                        </div>
                        <div class="form-group">
                            <label for="username">Nama Lengkap</label>    
                            <input type="text" class="form-control" id="username">
                        </div>
                        <div class="form-group">
                            <label for="username">Alamat</label>    
                            <input type="text" class="form-control" id="username">
                        </div>
                        <div class="form-group">
                            <label for="username">No Handphone</label>    
                            <input type="text" class="form-control" id="username">
                        </div>
                        <button type="submit" class="btn btn-success float-right mt-2">Login</button>
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
    qwest.post('login',formData)
    .then((res)=>{
        console.log(res);
    }).catch((err)=>{
        console.log(err);
    });
}

let formReg = document.getElementById('formReg');
formReg.onsubmit = (e) => {

}
</script>