<td colspan="8" background="<?=base_url()?>images/Backgr_text.gif" class="pl">
<?php
$username = array(
	'name'	=> 'username',
	'id'	=> 'username',
	'size'	=> 10,
	'value' => set_value('username')
);

$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'size'	=> 10
);

$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
	'style' => 'margin:0;padding:0'
);

$confirmation_code = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8
);

?>
<?php echo form_open($this->uri->uri_string())?>
<?php echo $this->dx_auth->get_auth_error(); ?>
<table border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td><p class="note"><strong>ДОСТУП К КАТАЛОГУ ИМЕЮТ ТОЛЬКО НАШИ КЛИНЕТЫ!</strong><br>
                    Введите ваш логин и пароль в соответствующие поля.</p></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td align="center" background="<?=base_url()?>images/Login.gif">
            <?php echo form_label('Логин', $username['id']);?>
            <?php echo form_input($username)?><br>
            <?php echo form_error($username['name']); ?>
            <?php echo form_label('Пароль', $password['id']);?>
            <?php echo form_password($password)?><br>
            <?php echo form_error($password['name']); ?>
            <?php echo form_checkbox($remember);?> <?php echo form_label('Запомнить меня', $remember['id']);?><br>
            <?php echo form_submit('login','Войти');?>
            <?php echo form_close()?>    
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td align="center"><span class="note">* для получения права авторизации<br>обратитесь к менеджеру по продаже:<br>
                <a style="color:#F00; font-size: 10px;" href="mailto:info@wedding-svit.com">info@wedding-svit.com</a></span></td>
    </tr>
</table>
</td>