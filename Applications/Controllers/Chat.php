<?php

/**
 * Created by PhpStorm.
 * User: Mehmet Ali Peker
 * Date: 25.01.2017
 * Time: 21:11
 */
class Chat extends Controller
{
    use Classes;

    public function index() {

        $assets = $this->assets;

        $data = [];
        $data['css'] = $this->assets->getAssetsGroup('chat')->useAllAssets('css')->returnedData;
        $data['js'] = $this->assets->getAssetsGroup('chat')->useAllAssets('js')->returnedData;

        if(Session::get('login')){

        } else {
            header("Location: " . BASE_URL . "auth/facebook");
        }


        Load::view('chat', $data);

    }

    public function sendMessage() {

        if(Session::get('login')) {
            $db = new DB();

            $db->insert('messages')->set(array(
                'message' => $_GET['text'],
                'user' => Session::get('id'),
                'name' => Session::get('first_name'),
                'surname' => Session::get('last_name')
            ));
        }
    }

    public function getMessages() {
        if(Session::get('login')) {

            $db = new DB();

            $messages = $db->select('messages')->where('id', $_GET['lastID'], '>')->run();

            foreach ($messages as $message) {
                $gonderdi = '';
                $gonderdin = '';
                $messageStyle = '';
                if($message['user'] == Session::get('id')) {
                    $gonderdin = '<a target="_blank" href="https://facebook.com/'.$message['user'].'">
                                                    <img src="https://graph.facebook.com/' . $message['user'] .'/picture"/>
                                                </a>
                                                <br/>
                                                <small class="message-time">' . $message['date'] .'</small>';
                    $messageStyle = 'your-message dwt-your-message-color-default ';
                } else {
                    $gonderdi = '<a target="_blank" href="https://facebook.com/'.$message['user'].'">
                                                    <img src="https://graph.facebook.com/' . $message['user'] .'/picture"/>
                                                </a>
                                                <br/>
                                                <small class="message-time">' . $message['date'] .'</small>';
                    $messageStyle = 'user-message ';
                }
                echo '<div id="' . $message['id'] . '" class="row dwt-send-message">
                                <div class="col-md-1 gonderdi">
                                        '. $gonderdi .'
                                        </div>
                                        <div class="col-md-9 ">
                                            <div class="' . $messageStyle . 'dwt-message">
                                                ' . $message['message'] . '
                                            </div>
                                            </div>
                                            <div class="col-md-1 gonderdin">
                                                ' . $gonderdin .  '
                                            </div>
                                            </div>
                                            ';
            }

        }
    }

    public function facebook(){
        $fb = new Facebook(array(
            'appId'  => FB_ID,
            'secret' => FB_SECRET
        ));

        $user = $fb->getUser();

        if(empty($user)) {
            $login = $fb->getLoginUrl(array(
                'scope' => 'public_profile, email, user_birthday'
            ));
            header('Location: ' . $login);
        } else {
            header('Location: ' . BASE_URL . 'auth/facebook/step');
        }

    }

    public function logged() {
        $fb = new Facebook(array(
            'appId'  => FB_ID,
            'secret' => FB_SECRET
        ));

        $user = $fb->api('/me?fields=first_name,last_name,middle_name,email');
        Session::setArray($user);
        Session::set('login', true);
        print_r(Session::getAll());

        $db = new DB();

        $query = $db->select('user')->where('id', Session::get('id'))->run();

        if($query) {
            $db->update('user')->where('id',Session::get('id'))->set(array(
                'online' => 1
            ));
        } else {
            $db->insert('user')->set(array(
                'id' => Session::get('id'),
                'name' => Session::get('first_name'),
                'surname' => Session::get('last_name'),
                'email' => Session::get('email'),
                'online' => 1
            ));
        }

        header('Location: ' . BASE_URL);
    }

}