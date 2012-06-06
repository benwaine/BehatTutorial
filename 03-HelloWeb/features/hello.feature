Feature: As a user of the salutation website 
I want to supply my name and be greeted correctly

Scenario: As a user of the greetings website 
I should be able to recieve a personalised greeting
Given I am on "/"
When I fill in "name" with "ben"
And I press "submit"
Then I should see "Hello Ben" 

Scenario: As a user of the greetings website
I should be be able to remain annoymous and still recieve a greeting
Given I am on "/"
When I press "submit"
Then I should see "Hello Stranger"

Scenario: As a user of the greetings website
I should be be able to reset the greeting
Given I am on "/"
When I press "submit"
Then I should see "Hello Stranger"
And I follow "Clear"
Then I should not see "Hello"

@javascript
Scenario: As a user of the greetings website
I should recieve name suggestions when I type my name
Given I am on "/"
When I fill in "name" with "ben"
Then I wait for the suggestion box to appear