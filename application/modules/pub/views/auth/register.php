<!-- Search bar -->

<div class="search-wrapper">
    <div class="container container--add">
        <form id='search-form' method='get' class="search">
            <input type="text" class="search__field" placeholder="Search">
            <select name="sorting_item" id="search-sort" class="search__sort" tabindex="0">
                <option value="1" selected='selected'>By title</option>
                <option value="2">By year</option>
                <option value="3">By producer</option>
                <option value="4">By title</option>
                <option value="5">By year</option>
            </select>
            <button type='submit' class="btn btn-md btn--danger search__button">search a movie</button>
        </form>
    </div>
</div>

<!-- Main content -->
<form action="javascript:;" method="post" id="register-form" class="register" novalidate=''>
    <p class="login__title">sign up <br><span class="login-edition">fill all fields</span></p>
    
    <div class="field-wrap">
    <div class="row">
        <div class="col">
            <input type='text' placeholder='Username' name='username' class="login__input" required>
        </div>
        <div class="col">
         <input type='password' placeholder='Password' name='password' class="login__input" required>
        </div>
    </div>
        <input type='email' placeholder='Email' name='email' class="login__input" required>
    <div class="row">
        <div class="col">
            <input type='text' placeholder='Nama Depan' name='nama-depan' class="login__input" required>
        </div>
        <div class="col">
            <input type='text' placeholder='Nama Belakang' name='nama-belakang' class="login__input" required>
        </div>
    </div>
        <input type='text' placeholder='Alamat' name='alamat' class="login__input" required>
        <input type='number' placeholder='Nomor Telepon' name='phone' class="login__input" required>
    
    </div>
    
    <div class="login__control">
        <button type='submit' class="btn btn-md btn--warning btn--wider">sign up</button>
    </div>
</form>

<div class="clearfix"></div>

<script>
$('.register').submit(function(e) {
    e.preventDefault();
    var error = 0;
    var self = $(this);

    var $email = self.find('[type=email]');
    var $pass  = self.find('[type=password]');
    var $namaD = self.find('[name=nama-depan]');
    var $namaB = self.find('[name=nama-belakang]');
    var $alamat= self.find('[name=alamat]');

    let username = self.find('[name=username]');
    let password = self.find('[name=password]');

    var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

    if (!emailRegex.test($email.val())) {
        createErrTult('Error! Wrong email!', $email);
        error++;
    }

    if ($pass.val().length > 1 && $pass.val() != $pass.attr('placeholder')) {
        $pass.removeClass('invalid_field');
    } else {
        createErrTult('Error! Wrong password!', $pass);
        error++;
    }

    if (error != 0) return;
    self.find('[type=submit]').attr('disabled', 'disabled');

    var formInput = self.serialize();
    $.post(base + 'auth/register', formInput, function(res) {
        let data = JSON.parse(res);
        if (data.status == true) {
            self.children().fadeOut(300, function() {
                $(this).remove();
            });
            $(
                '<p class="login__title">sign up <br><span class="login-edition">fill all fields</span></p><p class="success">' +
                    data.messages +
                    '</p>'
            )
                .appendTo(self)
                .hide()
                .delay(300)
                .fadeIn();
            $.post(base+'auth/login',{
                username:$email,
                password:$pass
            },(res)=>{

            });
           // Pjax.replace(base+'pub/home');
        } else {
            let element =
			'<div class="inv-em alert alert-danger alert-dismissible" role="alert"><strong>' +
			data.messages +
			'</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            $(element)
                .prependTo('.field-wrap')
                .hide()
                .delay(300)
                .fadeIn();
            $(element).hide();
            self.find('[type=submit]').removeAttr('disabled');
        }
    }); // end post
}); // end submit

function createErrTult(text, $elem) {
    $elem.focus();
    $('<p />', {
        class: 'inv-em alert alert-danger',
        html:
            '<span class="icon-warning"></span>' +
            text +
            ' <a class="close" data-dismiss="alert" href="#" aria-hidden="true"></a>'
    })
        .appendTo($elem.addClass('invalid_field').parent())
        .insertAfter($elem)
        .delay(4000)
        .animate({ opacity: 0 }, 300, function() {
            $(this).slideUp(400, function() {
                $(this).remove();
            });
        });
}     
</script>
