<?php
class FacebookDebugger {
    /*
     * Thanks to:
     * https://gist.github.com/FrostyX/81d58222d1e835e24013
	 * https://www.question2answer.org/qa/70952/how-to-execute-php-code-after-someone-post-question?show=70956#a70956
	 * https://www.question2answer.org/qa/31585/plugin-simple-sharing-lightweight-javascript-iframes-updated
	 *
	 * Get access_token for your connected FB page from here
	 * https://developers.facebook.com/tools/accesstoken/
	 * and paste it in Admin panel / plugins / Clear fb cache / options
    */
    public function reload($url) {
		$fbtoken = qa_opt('fb_page_token'); // Get FB page token from admin panel
        $graph = 'https://graph.facebook.com/';
        $post = 'id=' . urlencode($url) . '&scrape=true&access_token=' . $fbtoken; // Put POST fields together
        return $this->send_post($graph, $post);
		
    }
    private function send_post($url, $post) {
        $r = curl_init();
        curl_setopt($r, CURLOPT_URL, $url);
     // curl_setopt($r, CURLOPT_POST, 1); // No need if CURLOPT_POSTFIELDS is defined
        curl_setopt($r, CURLOPT_POSTFIELDS, $post);
        curl_setopt($r, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($r, CURLOPT_CONNECTTIMEOUT, 5);
        $data = curl_exec($r);
        curl_close($r);
        return $data;

    }
}
class qa_event_clear_cache {
	
		public function process_event($event, $userid, $handle, $cookieid, $params) {
			if ((int)qa_opt('fb_page_token_buttons_status')) {
				if ($event == 'q_post') { // Check if event is new post
					$fb = new FacebookDebugger();
					$questionurl = qa_q_path($params['postid'], $params['title'], true); // Get published question URL
					//$fb->reload('http://example.com/');
					$fb->reload($questionurl); // Do the magic
				}
			}
		}
}
