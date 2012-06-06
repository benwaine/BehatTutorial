Feature: As an API user
I want to retrieve user data 
to use in my applicaion

Scenario: As an API user
I want to get the user data by supplying the user ID
Given I am an anonymous user
When I send a GET request to "api?id=1"
Then the response code should be 200
And response should contain json:
"""
{"username": "benwaine"}
"""