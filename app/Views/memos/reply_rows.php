<?php

foreach ($replies as $reply_info) {
    echo view("memos/reply_row", array("reply_info" => $reply_info));
} 