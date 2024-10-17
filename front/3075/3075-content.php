<?php
$url_host = $_SERVER['HTTP_HOST'];

$pattern_document_root = addcslashes(realpath($_SERVER['DOCUMENT_ROOT']), '\\');

$pattern_uri = '/' . $pattern_document_root . '(.*)$/';

preg_match_all($pattern_uri, __DIR__, $matches);

$url_path = $url_host . $matches[1][0];

$url_path = str_replace('\\', '/', $url_path);
?>
<div class="type-3075">


    <div class="wrapper">
        <div class="header_content">
            <h1 class="tittle_content" style="margin: 0;">Contact</h1>
            <div class="info_page">
                <a style="color: white;" href="#">Home </a> &nbsp;<span style="color: white;">/</span>&nbsp; <a style="color: #03a9f4" href="#">Contact</a>
            </div>
        </div>

        <div class="container">
            <div class="contact_info">
                <div class="content_info">
                    <h2 class="tittle_contact">Contact Information</h2>
                    <p><i class="fa fa-home"></i> 3224 Junkins Avenue, GA 31750, United States</p>
                    <p><i class="fa fa-envelope"></i> support@example.com</p>
                    <p><i class="fa fa-phone"></i> +000 000 000 000</p>
                    <p><i class="fa fa-fax"></i> +1-212-9876543</p>
                    <div class="icon_link">
                        <ul>
                            <li class="li1 li_link"><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li class="li_link"><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li class="li_link"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li class="li_link"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="mess">
                <div class="name_mail">
                    <input type="text" placeholder="Name"><input class="email" type="text" placeholder="Email">
                </div>
                <div class="subject">
                    <input type="text" placeholder="Subject">
                </div>
                <div class="Message">
                    <input type="text" placeholder="Message">
                </div>
                <button>Send</button>
            </div>
        </div>
    </div>
</div>