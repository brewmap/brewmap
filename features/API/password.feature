@API @Password
Feature: Test an ability to update user password data

  Background:
    Given there are users created:
      | id                                   | email            | is_admin |
      | 00000000-0000-0000-0000-000000000000 | user@example.com | 0        |

  Scenario: User is attempting to update password with wrong method
    Given user is logged in as "user@example.com"
    And a user is requesting "api/password" using "GET"
    And request body contains "password" equal "newpassword"
    And request body contains "password_confirmation" equal "newpassword"
    And request body contains "old_password" equal "oldpasswordnotvalid"
    When a request is sent
    Then a response status code should be "405"

  Scenario: User is attempting to update password with mismatch old password
    Given user is logged in as "user@example.com"
    And a user is requesting "api/password" using "PATCH"
    And request body contains "password" equal "newpassword"
    And request body contains "password_confirmation" equal "newpassword"
    And request body contains "old_password" equal "oldpasswordnotvalid"
    When a request is sent
    Then a response status code should be "422"
    And response body should contain:
      | message | Old password is mismatch |

  Scenario: User is attempting to update password with mismatch password confirmation
    Given user is logged in as "user@example.com"
    And a user is requesting "api/password" using "PATCH"
    And request body contains "password" equal "newpassword"
    And request body contains "password_confirmation" equal "newpasswordwithfault"
    And request body contains "old_password" equal "password"
    When a request is sent
    Then a response status code should be "422"
    And response body should contain:
      | password | The password confirmation does not match |

  Scenario: User is attempting to update password
    Given user is logged in as "user@example.com"
    And a user is requesting "api/password" using "PATCH"
    And request body contains "password" equal "newpassword"
    And request body contains "password_confirmation" equal "newpassword"
    And request body contains "old_password" equal "password"
    When a request is sent
    Then a response status code should be "200"
    And response body should contain:
      | message | Successfully updated password |
