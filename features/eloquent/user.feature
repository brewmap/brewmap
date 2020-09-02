@eloquent
Feature: Test if users are working correctly

  Scenario: When user is created, UUID should be always assigned
    When there is an user created
    Then it should have UUID-formatted id

  Scenario: When user is created, profile should be always assigned
    When there is an user created:
      | id                                   |
      | 00000000-0000-0000-0000-000000000000 |
      | 00000000-0000-0000-0000-000000000001 |
    Then there should be a profile assigned:
      | user_id                              |
      | 00000000-0000-0000-0000-000000000000 |
      | 00000000-0000-0000-0000-000000000001 |
