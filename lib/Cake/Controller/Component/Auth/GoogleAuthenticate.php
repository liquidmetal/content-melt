<?php

    App::uses('CakeSession', 'Model/Datasource');
    App::uses('BaseAuthentiate', 'Controller/Component/Auth');
    App::uses('HttpSocket', 'Network/Http');

    class FacebookAuthenticate extends BaseAuthenticate {
        var $settings = array(
            "client_id" => "354920870478.apps.googleusercontent.com",
            'client_secret' => 'SxQtIbhFCdYjx6do-LwChETX',
            'url' => 'http://localhost/users/callback'
        );

        public function authenticate(CakeRequest $request, CakeResponse $response) {
            $session = new CakeSession();
            if(isset($request->query) && isset($request->query['code']) && isset($request->query['state'])) {
                if($request->query['state']==$session->read('state')) {
                    $result = $HttpSocket->post('https://accounts.google.com/o/oauth2/token',
                        http_build_query(array('client_id'=>$this->settings['client_id'], 
                            'client_secret'=>$this->settings['client_secret'],
                            'redirect_uri'=>$this->settings['url'],
                            'code'=>$request->query['code'],
                            'grant_type'=>'authorization_code')));
    
                    $params = null;
                    parse_str($result, $params);

                    if(isset($params['access_token'])) {
                        // Get the user's email id
                        // if(email in aishack.users)
                        //    Log them in and
                        //    Update the access/refresh tokens
                        // else
                        //    Create a new user
                        //    Update the access/refresh tokens
                        // Changes to the users table
                        // recent_login_with: Which provider did the user use most recently
                    }
                }
            }
        }
    }

?>
