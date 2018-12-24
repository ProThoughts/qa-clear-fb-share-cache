<?php

	class qa_clear_fb_cache_admin {

		function allow_template($template)
		{
			return ($template!='admin');
		}

		function option_default($option)
		{
			switch ($option) {
					case 'fb_page_token':
					return "YOUR APP TOKEN HERE";
					break;
					case 'fb_page_token_buttons_status':
					return true;
					break;
			}
		}

		function admin_form()
		{
			
			$saved=false;
			
			if (qa_clicked('fb_page_token_save_button')) {
				$trimchars="=;\"\' \t\r\n";
				qa_opt('fb_page_token_text', trim(qa_post_text('fb_page_token_text_field'), $trimchars));
				qa_opt('fb_page_token_buttons_status', (int)qa_post_text('fb_page_token_buttons_status_field'));
				
				$saved=true;
			}
			
			$form=array(
				'ok' => $saved ? 'Settings saved' : null,
				'fields' => array(
					array(
						'id' => 'fb_page_token_text',
						'label' => 'Enter Your FB Page token here:',
						'value' => qa_html(qa_opt('fb_page_token_text')),
						'tags' => 'name="fb_page_token_text_field"',
						'note' => '<a href="https://developers.facebook.com/tools/accesstoken/" target="_blank" rel="nofollow">Get your token</a>',
					),	
					array(
						'id' => 'fb_page_token_buttons_status',					
						'label' => (int)qa_opt('fb_page_token_buttons_status')?'Currently Enabled <em>(Uncheck to disable)</em>':'Currently Disabled <em>(Check to enable)</em>',
						'type' => 'checkbox',
						'value' => (int)qa_opt('fb_page_token_buttons_status'),
						'tags' => 'name="fb_page_token_buttons_status_field"',
						'note' => '<br />Don\'t forget to enable and save!',
					),
				),

				'buttons' => array(
					array(
						'label' => 'Save Changes',
						'tags' => 'name="fb_page_token_save_button"',
					),
				),
			);

			return $form;
		}

	}
