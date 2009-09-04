<?php


class Bascet extends Controller {

    function __construct() {
        parent::Controller();

        $this->load->model('Catalog_model');
        $this->load->model('Product_model');

        $this->load->library('DX_Auth');
        
        $this->load->library('session');
        $this->load->library('email');
    }

    function Bascet() {
        parent::Controller();

        $this->load->model('Catalog_model');
        $this->load->model('Product_model');

        $this->load->library('DX_Auth');

        $this->load->library('session');
        $this->load->library('email');
    }

    function index() {
        if ( !$this->dx_auth->is_logged_in() )
        {
            redirect('auth');
        } else {
            redirect('catalog');
        }
    }
    
    function new_list() {
        if ( !$this->dx_auth->is_logged_in() )
        {
            redirect('auth');
        } else {
            if ( $this->session->userdata('bascet') ) {
                $product = $this->session->userdata('bascet');
                $new_product = intval($this->uri->segment(3));
                if ( !in_array($new_product, $product) )
                {
                   $product[] = $new_product;
                }
                $this->session->set_userdata('bascet', $product);
            } else {
                $this->session->set_userdata('bascet', array( intval( $this->uri->segment(3) ) ) );
            }
            redirect('catalog');
        }
    }

    function ceck_out() {
        if ( !$this->dx_auth->is_logged_in() )
        {
            redirect('auth');
        } else {

            $data['production'] = $this->Product_model->list_product();
            $data['curent_production'] = 'Корзина';
            $data['query'] = $this->Catalog_model->ceck_out_product($this->session->userdata('bascet'));

            $data['path'] = $this->config->site_url();
            
            $this->load->view('catalog/header',$data);
            $this->load->view('bascet/bascet');
            $this->load->view('catalog/navigation',$data);
        }
    }

    function send_reguest() {
        if ( !$this->dx_auth->is_logged_in() )
        {
            redirect('auth');
        } else {
            if ($_POST['action'] == 'Сохранить изменения') {
                $bascet_count = array ('product' => $_POST['product'], 'count' => $_POST['count']);
                $this->session->set_userdata('bascet_couns', $bascet_count);
                //echo "<pre>";print_r($this->session->userdata('bascet_couns')); echo "</pre>";
                redirect('bascet/ceck_out');
            } else {

            $this->email->from('manager@wedding-cvit.com.ua', 'Manager');
            $this->email->to($this->session->userdata('DX_webmaster_email'));
            //$this->email->to('drongous@localhost');
            $this->email->subject('Заказ');

            $message = '';
            $bascet_couns = $this->session->userdata('bascet_couns');
            
            for ($i = 0; $i <count($_POST['product']); $i++) {
                $product = $this->Catalog_model->get_product_details($_POST['product'][$i]);
                $message = $message." Был заказан товар с серийным номером:".$product[0]->serialnum;
                if (isset ($bascet_couns['count'][$i])) {
                    $message = $message.' в количестве '.$bascet_couns['count'][$i].' штук. ';
                } else {
                    $message = $message.' в количестве '.$_POST['count'][$i].' штук.  ';
                }
            }
            $message = $message."От пользователя ".$this->session->userdata('DX_username');
            $this->email->message($message);
            $this->email->send();
            //echo $this->email->print_debugger();
            $this->session->unset_userdata('bascet');
            $this->session->unset_userdata('bascet_couns');
            redirect('catalog');
            }
        }
    }
    
}

?>
