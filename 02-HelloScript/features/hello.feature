Feature: As a user of the hello script
I want to check that it response correctly to commands.
So my users are greeted correctly

Scenario: As a hello user 
I should be greeted with the name I enter
    Given Im in the src directory
    When I execute the hello command with "ben"
    Then I should see:
        """
        Hello Ben
        """

Scenario: As an annonymous hello scrit user
I should be greeted with the title stranger
    Given Im in the src directory
    When I execute the hello command
    Then I should see:
        """
        Hello stranger
        """ 