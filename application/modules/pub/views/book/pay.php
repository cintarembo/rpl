<form action="javascript:;" method="post" id="pay-form" class="login" novalidate=''>
    <p class="login__title">Payment</p>
    
    <div class="field-wrap">
        <input type="hidden" name="id" value="<?php echo $this->input->get('t'); ?>">
        <input type='text' 
            placeholder='Nama Pemegang Rekening' 
            name='nama' class="login__input" required>
        <input type='text' 
            placeholder='Bank Pemegang Rekening' 
            name='bank' class="login__input" required>
        <span>Bukti Transaksi</span><br>
        <input type="file" name="bukti" class="login__input" required>
    </div>
    
    <div class="login__control">
        <button type='submit' id="pay"
            class="btn btn-md btn--warning btn--wider">
            Submit
        </button>
    </div>
</form>

<div class="clearfix"></div>
<script>
$('#pay').click(function (e) { 
    e.preventDefault();
    //let data = $('#pay-form').serialize();
    let form = document.getElementById('pay-form');
    let data = new FormData(form);
    qwest.post(base+'pub/home/pay_upload',data)
        .then((res)=>{
            console.log(res);
        })
        .catch((err)=>{

        })
});

</script>
