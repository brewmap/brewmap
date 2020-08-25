@eloquent
Feature: Test if users are working correctly

  Scenario: User is created with profile assigned
    When there is an user created:
      | id                                   |
      | 00000000-0000-0000-0000-000000000000 |
    Then there should be a profile assigned:
      | user_id                              |
      | 00000000-0000-0000-0000-000000000000 |
