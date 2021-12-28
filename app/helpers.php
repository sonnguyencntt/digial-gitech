<?php
    function auto_redirect($fe,$be){
        
        if (request()->wantsJson()) {
            return $be;
        } else {
            return $fe;
        }
    }
?>