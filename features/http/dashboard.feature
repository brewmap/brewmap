@nova @dashboard @auth @views
Feature: Test if dashboard works

  Background:
    Given there are users created:
      | id                                   | email             | is_admin |
      | 00000000-0000-0000-0000-000000000000 | admin@example.com | 1        |
      | 00000000-0000-0000-0000-000000000001 | user@example.com  | 0        |

  Scenario: User is requesting nova dashboard when he is not logged in
    Given a user is requesting "/dashboard"
    When a request is sent
    Then a response status code should be "302"

  Scenario: User is requesting nova dashboard when he is not an administrator
    Given user is logged in as "user@example.com"
    And a user is requesting "/dashboard"
    When a request is sent
    Then a response status code should be "403"

  Scenario: User is requesting nova dashboard when he is an administrator
    Given user is logged in as "admin@example.com"
    And a user is requesting "/dashboard"
    When a request is sent
    Then a response status code should be "200"
