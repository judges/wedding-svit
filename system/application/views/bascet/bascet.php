<?php
echo form_open('bascet/send_reguest');
echo '<table border=1>';
echo '<thead>Оформление заказа</thead>';
echo '<tbody>';
echo '<th></th>';
echo '<th>Серийной номер</th>';
echo '<th>Описание</th>';
echo '<th>Цена</th>';
echo '<th>Количество</th>';
echo '</tbody>';
$j=0;
//echo "<pre>";print_r($this->session->userdata('bascet_couns')); echo "</pre>";
$bascet_couns = $this->session->userdata('bascet_couns');
foreach ($query as $product => $details) {

    foreach ($details as $keys) {
    echo '<tr>';
        echo '<td><a class="info" target="_new" href="'.$this->config->site_url().'/../uploads/'.$keys->photo.'">';
        echo '<img src="'.$this->config->site_url().'/../uploads/'.$keys->photo.'" width="150" height="100"></a></td>';
        echo '<td>'.$keys->serialnum;
        echo '<input type="hidden" name="product['.$j.']" value="'.$keys->id.'"></td>';
        echo '<td>'.$keys->description.'</td>';
        echo '<td>'.$keys->price.'</td>';
        echo '<td>';
        if(isset ($bascet_couns['count'][$j]) and $bascet_couns['count'][$j] <> 1) {
                echo '<input type="text" size="3" value="'.$bascet_couns["count"][$j].'" name="count['.$j.']">';
        } else {
            echo '<input type="text" size="3" value="1" name="count['.$j.']">';
        }
        echo '</td>';
    echo '</tr>';
    }
    $j++;
}
echo '</table>';
echo '<input type="submit" name="action" value="Сохранить изменения" />';
echo '<input type="submit" name="action" value="Отправить запрос" />';
echo '</form>';

?>