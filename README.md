# REST-API-Post-meta-data
This plugin is used to add meta data (postmeta) when publishing posts via REST API.

Python3 example:
````python
#!/usr/bin/python
# -*- coding: utf-8 -*-
import requests
import json

user_id = "admin" # REST API User Name
user_passwd = '6eRX JG3r OdIu 08TV qJPJ cZ6k' # REST API Application Passwords
end_point_url_posts = "http://127.0.0.1/wp-json/wp/v2/posts" # REST API URL

p_title = "test"
p_status = "publish"
p_author = "1"
p_content =  'test\n'

metadata = [
        {'key': 'metadata1','value': 'yes'},
        {'key': 'metadata2', 'value': '2'}
        ]

payload = {
    'title': p_title,
    'content': p_content,
    'status': p_status,
    'author': p_author,
    'metadata': metadata
    }


headers = {'content-type': "Application/json"}
r = requests.post(end_point_url_posts, data=json.dumps(payload), headers=headers, auth=(user_id, user_passwd))
print(json.loads(r.text))
````
