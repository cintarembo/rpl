<!-- Search bar -->
<style>.alert-dismissible.close{position:absolute;top:0;right:0;padding: .75rem 1.15rem 1.3rem;color:inherit;}</style>
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
<form action="javascript:;" method="post" id="login-form" class="login" novalidate=''>
    <p class="login__title">sign in <br><span class="login-edition">welcome to A.Movie</span></p>
    
    <div class="field-wrap">
        <input type='email' placeholder='Email' name='username' class="login__input" required>
        <input type='password' placeholder='Password' name='password' class="login__input" required>

        <input type='checkbox' id='#informed' name="remember" class='login__check styled'>
        <label for='#informed' class='login__check-info'>remember me</label>
    </div>
    
    <div class="login__control">
        <button type='submit' class="btn btn-md btn--warning btn--wider">sign in</button>
        <a href="#" class="login__tracker form__tracker">Forgot password?</a>
    </div>
</form>

<div class="clearfix"></div>

<script>
$('.login').submit(function(e) {
    e.preventDefault();
    var error = 0;
    var self = $(this);

    var $email = self.find('[type=email]');
    var $pass = self.find('[type=password]');

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
    $.post(base + 'auth/login', formInput, function(res) {
        let data = JSON.parse(res);
        if (data.status == true) {
            self.children().fadeOut(300, function() {
                $(this).remove();
            });
            $(
                '<p class="login__title">sign in <br><span class="login-edition">welcome to A.Movie</span></p><p class="success">' +
                    data.messages +
                    '</p>'
            )
                .appendTo(self)
                .hide()
                .delay(300)
                .fadeIn();
            
            if (data.admin==true) {
                Pjax.replace(base+"admin/films");
            } else {
                Pjax.replace(base+"pub/home");
            }
            
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
