<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="tr">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Deep Web Türkiye (DWT) - Chat</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/normalize.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.materialdesignicons.com/1.7.22/css/materialdesignicons.min.css"/>

    <link rel="stylesheet" href="emojionearea-master/dist/emojionearea.css">



    <?=$css?>
<body class="dwt-messages-color-default" ng-app="dwtChat">
<div class="header">

    <div class="container-fluid">
        <div class="row title dwt-navbar-color-default">

            <div class="col-md-12">

                    <span class="col-md-12">
                        <span class="col-md-4 titleImage">

                            <img src="<?=IMAGES_DIR?>/headicons.png"/>

                        </span>

                        <span class="text-center col-md-8 col-md-pull-2 titleText">

                            Deep Web Türkiye (DWT) - Chat


                        </span>

                    </span>

            </div>

        </div>
    </div>

</div>

<div class="container-fluid">

    <div class="row main">

        <div class="col-md-3 left dwt-bg-color-default">

            <div class="row left-head dwt-left-padding">

                <div class="col-md-12 dwt-header-color-default">

                    DWT Chat

                </div>


            </div>

            <div class="row left-search dwt-left-padding">

                <div class="col-md-12 input-group ara">
                        <span class="input-group-btn">
                            <<i class="mdi mdi-magnify"></i>
                        </span>
                    <input type="text" ng-model="searchInput" class="form-control" placeholder="Ara"><br/>
                    <hr/>
                </div><!-- /input-group -->

            </div>

            <div class="col-md-12 left-users-main dwt-left-padding">

                <div class="row">

                    <div class="col-md-12">

                        <div class="row left-users">

                            <div class="col-md-2">
                                <img  class="left-user-image" src="https://scontent-ams3-1.xx.fbcdn.net/v/t1.0-9/15327465_1041029146042842_6163400098593059882_n.jpg?oh=a88910e4743bbd525ae1e7aacb049eb7&oe=58DE05C3" alt=""/>

                            </div>
                            <div class="col-md-9 text-left left-user-name">

                                Cem Ali Bakır <br/><small>Şu an aktif</small>

                            </div>
                            <div class="col-md-1">


                            </div>

                        </div>
                        <div class="row left-users">

                            <div class="col-md-2">
                                <img  class="left-user-image" src="https://scontent-ams3-1.xx.fbcdn.net/v/l/t1.0-9/15825789_388088064874229_5232382338231556306_n.jpg?oh=9568adc565e96f9508c5a95958e1a1d5&oe=58E14E2B" alt=""/>

                            </div>
                            <div class="col-md-9 text-left left-user-name">

                                Ali Doğan <br/><small>Şu an aktif</small>

                            </div>
                            <div class="col-md-1">


                            </div>

                        </div>



                    </div>


                </div>


            </div>

            <div class="col-md-3 footer left-footer dwt-footer-color-default">
                <div class="row">
                    <div class="col-md-10 userAd">
                        <?=Session::get('first_name')?> <?=Session::get('last_name')?>
                    </div>
                    <div class="col-md-2 logout">
                        <i class="mdi mdi-logout logout"></i>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-md-9 right">

            <div class="row right-head dwt-right-header-color-default">

                <div class="container-fluid">

                    Deep Web Türkiye (DWT) - Chat <small>vBeta</small> <span style="float:right"><small>Mesaj gönderebilmek için 2 kez Enter tuşuna basın. </small>&nbsp;</span>

                </div>

            </div>

            <div id="dwt-right-messages" class="col-md-12 right-messages dwt-messages-color-default">


                <div  class="row messages">

                    <div class="col-md-12" id="right-messages" ng-controller="search">

                        <?php

                            $db = new DB();
                            $messages = $db->select('messages')->orderby('id','DESC')->limit(0,1)->run();

                        foreach ($messages as $message) {
                            $gonderdi = '';
                            $gonderdin = '';
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

                        ?>

                    </div>


                </div>


            </div>

            <div class="col-md-12 footer message">

                <div class="span6">
                    <input id="emojionearea1"/>
                </div>

            </div>


        </div>

    </div>


</div>


</div>
<!-- @JavaScripts -->
<?=$js?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!-- JavaScripts -->


</body>
</html>
