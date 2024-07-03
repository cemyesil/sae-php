<?php

class LandingPageController {

    public function show() {
        header("Location: LandingPageView.php");
    }

    public function logout() {
        session_destroy();
    }
}

?>