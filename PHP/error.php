<?php 
    class ErrorHandler {
        public string $search = '%s';
        public string $replace;
        public string $subject = '
            <br>
            <div class="alert alert-danger d-flex align-items-center" role="alert" id="form">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <div>
                    %s
                </div>
            </div>
            <br>
        ';

        function badCredentials() {
            $replace = 'Your credentials are invalid.';
            $output = str_replace($this->search, $replace, $this->subject);
            echo $output;
        }
        function emptyFields() {
            $replace = 'You need to fill every fields.';
            $output = str_replace($this->search, $replace, $this->subject);
            echo $output;
        }
        function passwordDoesntMatch() {
            $replace = 'Passwords doesn\'t match.';
            $output = str_replace($this->search, $replace, $this->subject);
            echo $output;
        }
        function mailTaken() {
            $replace = 'The provided email is already taken.';
            $output = str_replace($this->search, $replace, $this->subject);
            echo $output;
        }
        function usernameTaken() {
            $replace = 'The provided username is already taken.';
            $output = str_replace($this->search, $replace, $this->subject);
            echo $output;
        }
        function emailSyntaxInvalid() {
            $replace = 'You need to put a correct email address.';
            $output = str_replace($this->search, $replace, $this->subject);
            echo $output;
        }
    }
?>