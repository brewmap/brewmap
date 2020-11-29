@eloquent
Feature: Test if users are working correctly

  Scenario: When user is created, UUID should be always assigned
    When there is a user created
    Then it should have UUID-formatted id

  Scenario: When user is created, profile should be always assigned
    When there is a user created:
      | id                                   | email             |
      | 00000000-0000-0000-0000-000000000000 | test1@example.com |
      | 00000000-0000-0000-0000-000000000001 | test2@example.com |
    Then there should be a profile assigned:
      | user_id                              |
      | 00000000-0000-0000-0000-000000000000 |
      | 00000000-0000-0000-0000-000000000001 |

  Scenario: First created user should be an admin
    When there is a user created:
      | id                                   | email             |
      | 00000000-0000-0000-0000-000000000000 | test1@example.com |
      | 00000000-0000-0000-0000-000000000001 | test2@example.com |
    Then there should be is_admin assigned:
      | id                                   | is_admin |
      | 00000000-0000-0000-0000-000000000000 | 1        |
      | 00000000-0000-0000-0000-000000000001 | 0        |
