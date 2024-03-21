<?php

namespace App\Http\Controllers\Integration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IdmeController extends Controller
{
    //variable to be change according idms setting
    public $appkey = 'dc0ZPgh1';
    public $secret_key = '1Ls0E2GPQot4mpT8UJ8lMO9Fw9YxVWr7DIe3A6y7z041ZbSnuCd2c6kgKij5';
    public $idms_url = 'http://10.46.51.37/api/index.php';


    public function index(Request $request)
    {
        //dd($request);

        $username_decode = base64_decode($request->u);

        $username = str_replace($this->appkey.'*', "", $username_decode);
        $auth = $this->processAuth($username, $request->token_idms, $request->t);

        // dd($auth);

        return $auth;

        // if ($auth->status === true) {
        //     echo 'User authenticated, proceed to store session';
        // } else {
        //     echo 'User not authenticated';
        // }
    }


    public function processAuth($username, $token, $post_timestamp, $process_verification = true)
    {
        $generate_token = '';
        $original_token = $this->appkey.$username.'['.date('dmYH', $post_timestamp).']'.$this->secret_key;
        $generate_token = sha1($this->appkey.$username.'['.date('dmYH', $post_timestamp).']'.$this->secret_key);



        //exit;
        //send the request to verify the token came from idms server?
        $need_verification = false;
        $verification_pass = false;

        //validate token
        if ($process_verification) {
            $need_verification = true;
            $vd = $this->verify($username, $token, $post_timestamp);

            $verification_pass = isset($vd->status)?$vd->status:false;
        }



        if ($token == $generate_token && (($need_verification && $verification_pass) || !$need_verification)) {
            return (object) ['status'=>true,'data'=> $vd ];
        } else {
            return (object) ['status'=>false,'error'=>'Unauthorized request'];
        }
    }

    /**
     * Verify that request came from IDMS
     */
    public function verify($username, $key, $post_timestamp)
    {
        $data = $this->request('GET', 'api/login/verify/'.$username, ['key'=>$key,'t'=>$post_timestamp,'ip'=>$_SERVER['REMOTE_ADDR']]);

        //debug show data
        $this->debug($data);

        if (isset($data->user)) {
            $this->user = $data->user;
        }

        if (isset($data->access)) {
            $this->access = $data->access;
        }
        return $data;
    }

    public function request($method, $url=null, $data=null)
    {

        // send token in this format:
        $curdatetoken = date('YmdHi');
        $token = $this->appkey.':'.$curdatetoken.':'.sha1($this->secret_key.':'.$curdatetoken);

        // send GET,POST,PUT and DELETE request
        if (in_array(strtoupper($method), ['POST','GET','PUT','DELETE'])) {
            $authorization = "Authorization: Bearer ".$token;
            $url_final = $this->idms_url.'/'.$url;

            if (strtoupper($method)=='GET' && $data != null) {
                $url_final = $url_final.'?'.http_build_query($data);
            }

            // echo $url_final;

            $ch = curl_init($url_final);

            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, strtoupper($method));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

            if (strtoupper($method)=='POST') {
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            }

            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            $result = curl_exec($ch);

            curl_close($ch);
            // echo $result;

            return json_decode($result);
        } else {
            echo 'NO';
        }
    }

    /**
     * To check if user still hold the session in IDMS
     */
    public function verifySession($username, $session_token)
    {
        $result =  $this->request('GET', 'api/session', ['username'=>$username,'token'=>$session_token]);

        // dd($result);
    }

    /**
     * To logout user from the app
     */
    public function logout_idms($username, $session_token)
    {
        $this->request('GET', 'api/logout', ['username'=>$username,'token'=>$session_token]);
    }

    public function logoutidms()
    {
        $this->request('GET', 'api/logout', ['username'=>session()->get('user_idms'),'token'=>session()->get('token_idms')]);



        session()->forget(['menu','user_idms','token_idms']);
        //session()->flush();

        return redirect('http://10.46.51.37/login');

        //return redirect(config('pautan.url_moeis'));
    }

    public function debug($val)
    {
        // echo "<pre>";
        // print_r($val);
        // echo "</pre>";
    }
}