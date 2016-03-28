
<p>Olá <?=$user->name?>, seja bem vindo ao Portal Transparência.</p>

<p>Para acessar o sistema, entre no endereço (<a href="<?=url('auth/login')?>"><?=url('auth/login') ?></a>) e utilize as seguintes informações:</p>

Usuário: <em><?=$user->email ?></em><br>
Senha: <em><?=$user->password ?></em><br><br>

<p><strong>Para a sua segurança, recomendamos que altere esta senha o mais rápido possível.</strong></p>

<p>Qualquer dúvida entre em contato conosco.</p>

<p>Portal Transparência.</p>
