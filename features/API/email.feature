@API @Email
Feature: Test an ability to update user email address data

  Background:
    Given there are users created:
      | id                                   | email                    | is_admin |
      | 00000000-0000-0000-0000-000000000000 | user@example.com         | 0        |
      | 00000000-0000-0000-0000-000000000001 | another_user@example.com | 0        |

  Scenario: User is attempting to update email address with wrong method
    Given user is logged in as "user@example.com"
    And a user is requesting "api/email" using "GET"
    And request body contains "email" equal "new_email@example.com"
    When a request is sent
    Then a response status code should be "405"

  Scenario: User is attempting to update email address with busy email
    Given user is logged in as "user@example.com"
    And a user is requesting "api/email" using "PATCH"
    And request body contains "email" equal "another_user@example.com"
    When a request is sent
    Then a response status code should be "422"
    And response body should contain:
      | email | The email has already been taken |

  Scenario: User is attempting to update email address with successfully sended notification on new email address
    Given user is logged in as "user@example.com"
    And a user is requesting "api/email" using "PATCH"
    And request body contains "email" equal "new_email@example.com"
    When a request is sent
    Then a response status code should be "200"
    And response body should contain:
      | message | Notification successfully sended for your new email |
    And an email should be sent
