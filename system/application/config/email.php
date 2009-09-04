<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
 *
 useragent	CodeIgniter	Нет	Почтовый клиент.
protocol	mail	mail, sendmail, или smtp	Протокол.
mailpath	/usr/sbin/sendmail	Нет	Серверный путь к Sendmail.
smtp_host	Не определено	Нет	Адрес SMTP-сервера.
smtp_user	Не определено	Нет	SMTP логин.
smtp_pass	Не определено	Нет	SMTP пароль.
smtp_port	25	Нет	SMTP порт.
smtp_timeout	5	Нет	SMTP тайм-аут (в секундах).
wordwrap	TRUE	TRUE или FALSE (boolean)	Включение переносов.
wrapchars	76		Число символов до переноса.
mailtype	text	text или html	Тип письма. Если отсылаете письмо в виде HTML, то Вы должны отправить его как полноценную веб-страницу. Убедитесь, что отсутствуют относительные ссылки и относительные пути изображений, иначе они не будут работать.
charset         utf-8		Установка кодировки письма (utf-8, iso-8859-1 и т.д.).
validate	FALSE	TRUE или FALSE (boolean)	Валидация email-адреса.
priority	3	1, 2, 3, 4, 5	Email-приоритеты. 1 = самый высокий. 5 = самый низкий. 3 = нормальный.
newline         \n	"\r\n" или "\n"	Тип переноса на новую строку. (Используйте "\r\n" для соблюдения стандарта RFC 822).
bcc_batch_mode	FALSE	TRUE или FALSE (boolean)	Включение пакетного режима BCC.
bcc_batch_size	200	Нет	Количество адресов в одном BCC-пакете.
 *
 */
$config['protocol'] = 'sendmail';
$config['mailpath'] = '/usr/sbin/sendmail';
$config['charset'] = 'utf-8';
$config['wordwrap'] = TRUE;
$config['wrapchars'] = 140;
$config['mailtype'] = 'text';
$config['newline'] = "\r\n";

?>
