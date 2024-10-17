<?php
$url_host = $_SERVER['HTTP_HOST'];

$pattern_document_root = addcslashes(realpath($_SERVER['DOCUMENT_ROOT']), '\\');

$pattern_uri = '/' . $pattern_document_root . '(.*)$/';

preg_match_all($pattern_uri, __DIR__, $matches);

$url_path = $url_host . $matches[1][0];

$url_path = str_replace('\\', '/', $url_path);
?>
<div class="type-3190">
    <div class="wrapper">
        <div class="wr_select">
            <h3>Size</h3>
            <div class="wr_input">
                <span class="icon">
                    &#10003;
                </span>
                <span class="des">Blue</span>
                <span class="result">(5)</span>
            </div>
            <div class="wr_input">
                <span class="icon">
                    &#10003;
                </span>
                <span class="des">Gray</span>
                <span class="result">(3)</span>
            </div>
            <div class="wr_input">
                <span class="icon">
                    &#10003;
                </span>
                <span class="des">Green</span>
                <span class="result">(4)</span>
            </div>
            <div class="wr_input">
                <span class="icon">
                    &#10003;
                </span>
                <span class="des">Red</span>
                <span class="result">(5)</span>
            </div>
            <div class="wr_input">
                <span class="icon">
                    &#10003;
                </span>
                <span class="des">Yellow</span>
                <span class="result">(2)</span>
            </div>
        </div>

        <div class="wr_tag">
            <h3>Tag</h3>
            <span>Cleansing</span>
            <span>Coffee Bean</span>
            <span>Eye Cream</span>
            <span>Healthy</span>
            <span>Make Up</span>
            <span>Nail</span>
            <span>Oil</span>
            <span>Sale</span>
            <span>Shampoo</span>
            <span>Skin Care</span>

        </div>
    </div>

</div>